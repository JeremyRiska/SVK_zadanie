<?php

namespace App\Repositories;

use App\Models\Country;
use App\Models\Continent;
use Illuminate\Support\Facades\Cache;
use App\Repositories\Interfaces\CountryRepositoryInterface;

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
        $request->validate([
            'code' => 'required|max:2|unique:countries',
            'name' => 'required|max:64',
            'full_name' => 'required',
            'iso3' => 'required|max:3|alpha',
            'number' => 'required|max:3',
            'continent_code' => 'required|max:2',
        ]);
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