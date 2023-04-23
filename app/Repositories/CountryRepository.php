<?php

namespace App\Repositories;

use App\Models\Country;
use App\Models\Continent;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class CountryRepository implements CountryRepositoryInterface
{
    public function getAllCountries($order, $searchQuery)
    {
        return Country::query()
            ->with('continent')
            ->whereHas('continent', function ($query) use ($searchQuery) {

                if ($searchQuery !== 'all') {
                    $query->where('name', 'LIKE', '%' . $searchQuery . '%');
                } 
            })->orderBy('name', $order)->paginate(10);
    }
    
    public function getAllContinents()
    {
        return Cache::rememberForever('all-continents', function () { 
            return Continent::query()->get();
        });
    }

    public function storeCountry($request)
    {
       Country::query()->create([
        'code' => $request['code'],
        'name' => $request['name'],
        'full_name' => $request['full_name'],
        'iso3' => $request['iso3'],
        'number' => $request['number'],
        'continent_code' => $request['continent_code'],
       ]);
    }
}