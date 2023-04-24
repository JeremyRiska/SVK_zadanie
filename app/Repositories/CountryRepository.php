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
            'number' => 'required|integer|digits:3',
            'continent_code' => 'required|max:2|alpha',
        ], [
            'code.required' => 'The country code is required.',
            'code.max' => 'The country code must be a maximum of 2 characters.',
            'code.unique' => 'The country code already exists. Please enter a unique code.',
            'name.required' => 'The country name is required.',
            'name.max' => 'The country name must be a maximum of 64 characters.',
            'full_name.required' => 'The full country name is required.',
            'iso3.required' => 'The ISO3 code is required.',
            'iso3.max' => 'The ISO3 code must be a maximum of 3 characters.',
            'iso3.alpha' => 'The ISO3 code must contain only alphabetic characters.',
            'number.required' => 'The country number is required.',
            'number.integer' => 'The country number must be a number',
            'number.max' => 'The country number must be a maximum of 3 digits.',
            'continent_code.required' => 'The continent code is required.',
            'continent_code.aplha' => 'The continent code can be onyl aplhabetic.',
            'continent_code.max' => 'The continent code must be a maximum of 2 characters.',
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