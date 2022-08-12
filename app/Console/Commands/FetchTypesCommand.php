<?php

namespace App\Console\Commands;

use App\Models\State;
use App\Models\Type;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchTypesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'types:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch all types of regions from back4app API data.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = json_decode(Http::withHeaders([
            'X-Parse-Application-Id' => 'lqQDzzsHQWGvebktR0Pqo3wshjQ60c4B6Op47OzM',
            'X-Parse-REST-API-Key' => '8g94GN95DpRsRr6iJmkvA2RMOMXHoU2YkLkifkCj',
            'X-Parse-Master-Key' => 'Afi6AtO5J8iQV2IGHF8HIAwWHPNzs0X4eeNFYDsI'
        ])->get('https://parseapi.back4app.com/classes/Continentscountriescities_Subdivisions_States_Provinces?limit=5000'));

        foreach ($response->results as $names) {
            if (isset($names->Subdivion_Type)) {
                Type::updateOrCreate([
                    'name' => $names->Subdivion_Type
                ]);
            }
        }
        return 0;
    }
}
