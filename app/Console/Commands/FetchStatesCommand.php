<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\State;
use App\Models\Type;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchStatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'states:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch all states, voivodship, parish from back4app API data.';

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
        $collection = collect($response->results);
        $types = Type::all('name', 'id');
        $countries = Country::all('code', 'id');
        foreach ($countries as $country) {
            $states = $collection->filter(function ($value, $key) use ($country, $collection) {
                if ($value->Country_Code == $country->code) {
                    $collection->forget($key);
                    return true;
                }
            });
            foreach ($states as $state) {
                $type_id = null;
                if (isset($state->Subdivion_Type)) {
                    if (!($type = $types->where('name', $state->Subdivion_Type)->first())) {
                        $type = Type::updateOrCreate([
                            'name' => $state->Subdivion_Type,
                        ]);
                        $types->fresh();
                    }
                    $type_id = $type->id;
                }
                State::updateOrCreate([
                    'country_id' => $country->id,
                    'code' => $state->Subdivision_Code
                ],
                    [
                        'name' => $state->Subdivision_Name,
                        'type_id' => $type_id,
                    ]);
            }
        }
        return 0;
    }
}
