<?php

namespace App\Http\Controllers;

use App\Http\Resources\CountryResource;
use App\Jobs\TranslateRequest;
use App\Models\Country;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TranslateRequestController extends Controller
{



    public function index(Request $request)
    {
        $url = $request->url();
        $decodedUrl = urldecode($request->fullUrl());
        $userLanguage = $request->input('lang', []);
        $parameters = parse_url($decodedUrl, PHP_URL_QUERY);
        if (isset($parameters)) {
            if (is_array($userLanguage)) {
                if ($request->input('lang', [])) {
                    $userLanguage = $request->input('lang', []);
                } else if ($userLanguage = $request->input('langs', null)) {
                    $userLanguage = explode(',', $userLanguage);
                }
            } else {
                return 'Parameter need to be an array!';
            }
        }
        $count = DB::table('translated_countries')
            ->select('language', \DB::raw("count('language') as 'count'"))
            ->whereIn('language', $userLanguage)
            ->groupBy('language')
            ->get();
        $value = array_fill_keys($userLanguage, 0);
        $merged = array_merge($value, $count->pluck('count', 'language')->toArray());
        $difference = array_filter($merged, fn($n) => $n < 3);
        if (!empty($difference)) {
            $this->dispatch(new TranslateRequest($difference, $userLanguage, $url));
            return response()->json(['error' => 'We do not have one of your languages']);
        } else {
            if (empty($userLanguage)) {
                return CountryResource::collection(Country::with('translated')->get());
            } else {
                return CountryResource::collection(Country::whereHas('translated', function (Builder $query) use ($userLanguage) {
                    $query->whereIn('language', $userLanguage);
                })->get());
            }
        }
    }

    public function take()
    {
        $response = json_decode(Http::asJson()->get('countries-api.ddev.site/api/names?lang[]=pl'));
    }

    public function post(Request $request)
    {
        Log::info('dane odebrane', $request->all());
    }
}

