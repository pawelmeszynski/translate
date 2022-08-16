<?php

namespace App\Jobs;

use App\Http\Resources\CountryResource;
use App\Models\Country;
use Google\Cloud\Translate\V2\TranslateClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TranslateRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $difference;
    public $userLanguage;
    public $url;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($difference, $userLanguage, $url)
    {
        $this->difference = $difference;
        $this->userLanguage = $userLanguage;
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Throwable
     */
    public function handle()
    {
        foreach (array_flip($this->difference) as $lang) {
            $countries = Country::whereDoesntHave('translated', function (Builder $query) use ($lang) {
                $query->where('language', $lang);
            })->limit(3)->get();
            foreach ($countries as $country) {
                $translate = new TranslateClient([
                    'key' => 'AIzaSyAwqTdDzc_D1XF5SPS3xEc7c-FHb3SxXCQ'
                ]);
                $result = $translate->translate($country->name, [
                    'source' => 'en',
                    'target' => $lang
                ]);
                $country->translated()->create([
                    'language' => $lang,
                    'translated_name' => $result['text']
                ]);
            }
        }
        $collection = CountryResource::collection(Country::with('translated')->get());
        try {
            $request = Http::post($this->url, [
                $collection->toJson()
            ]);
            Log::info($collection->toJson());
        } catch (\Throwable $exception) {
            if ($this->attempts() >= 2) {
                // hard fail after 2 attempts
                throw $exception;
            }
            // requeue this job to be executes
            // in 5 minutes (300 seconds) from now
            $this->release(300);
            return;
        }
    }
}
