<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use SunAppModules\Cms\Entities\CmsCountry;

class FetchCountriesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'countries:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch all countries from back4app API data.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = json_decode(Http::acceptJson()
            ->get('https://raw.githubusercontent.com/nnjeim/world/master/resources/json/countries.json'));

        foreach ($response as $country) {
            $data = [
                'code' => $country->iso2 ?? null,
                'code_3' => $country->iso3 ?? null,
                'name' => $country->name,
                'code_num' => $country->numeric_code,
                'call_prefix' => $country->phone_code,
            ];
            Country::updateOrCreate(
                [
                    'ext_id' => $country->id,
                ],
                $data,
            );
        }
        return 0;
    }
}
