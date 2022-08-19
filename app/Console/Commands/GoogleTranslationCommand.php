<?php

namespace App\Console\Commands;

use App\Models\State;
use Google\Cloud\Translate\V2\TranslateClient;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class GoogleTranslationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'names:translate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Country names translation with usage of google translation API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $languages = ['de', 'pl', 'es', 'fr', 'ru', 'hr', 'cs', 'pt', 'tr', 'uk'];

        $value = array_fill_keys($languages, 0);
        $count = DB::table('translated_states')
            ->select('language', \DB::raw("count('language') as 'count'"))
            ->whereIn('language', $languages)
            ->groupBy('language')
            ->get();
        $merged = array_merge($value, $count->pluck('count', 'language')->toArray());
        $filtered = array_filter($merged, fn($n) => $n < 4717);
        if (!empty($filtered)) {
            foreach (array_flip($filtered) as $lang) {
                $states = State::whereDoesntHave('translated', function (Builder $query) use ($lang) {
                    $query->where('language', $lang);
                })->limit(4)->get();
                foreach ($states as $state) {
                    $translate = new TranslateClient([
                        'key' => 'AIzaSyAwqTdDzc_D1XF5SPS3xEc7c-FHb3SxXCQ'
                    ]);
                    $result = $translate->translate($state->name, [
                        'source' => 'en',
                        'target' => $lang
                    ]);
                    $state->translated()->create([
                        'language' => $lang,
                        'translated_name' => $result['text']
                    ]);
                }
            }
        }
        return 0;
    }
}

