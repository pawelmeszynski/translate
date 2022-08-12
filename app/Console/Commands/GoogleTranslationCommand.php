<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\State;
use App\Models\TranslatedCountries;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

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
        $languages = ['BG', 'CS', 'DA', 'DE', 'EL', 'EN-GB', 'EN-US', 'ES', 'ET', 'FI', 'FR', 'HU', 'ID', 'IT',
            'JA', 'LT', 'LV', 'NL', 'PL', 'PT-BR', 'PT-PT', 'RO', 'RU', 'SK', 'SL', 'TR', 'SV', 'ZH']; //list of available languages
        $states = State::all('name');
        $countries = Country::all('name');
        foreach ($languages as $language) {
            foreach ($countries as $country) {
                $response1 = json_decode(Http::withHeaders([
                    'content-type' => 'application/x-www-form-urlencoded',
                ])->post('https://api-free.deepl.com/v2/translate?auth_key=' . env('DEEPL_AUTH_KEY') . '&text='
                    . $country->name . '&target_lang=' . $language));
                if (!TranslatedCountries::where('language', $language)->exists()) {
                    foreach ($response1->translations as $translation) { //insert data if country name not exists in specified language
                        TranslatedCountries::updateOrCreate([
                            'language' => $language
                        ],
                            [
                                'translated_name' => $translation->text,
                            ]);
                    }
                } else {
                    foreach ($states as $state) { //if all languages exists, will start translating name of states
                        $response2 = json_decode(Http::withHeaders([
                            'content-type' => 'application/x-www-form-urlencoded',
                        ])->post('https://api-free.deepl.com/v2/translate?auth_key=' . env('DEEPL_AUTH_KEY') . '&text='
                            . $state->name . '&target_lang=' . $language));
                        foreach ($response2->translations as $translation) {
                            TranslatedCountries::updateOrCreate([
                                'language' => $language
                            ],
                                [
                                    'translated_name' => $translation->text,
                                ]);
                        }
                    }
                }
            }
        }
        return 0;
    }
}

