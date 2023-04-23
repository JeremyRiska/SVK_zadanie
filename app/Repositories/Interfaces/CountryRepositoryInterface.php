<?php

namespace App\Repositories\Interfaces;

interface CountryRepositoryInterface
{
    public function getAllCountries($order, $searchQuery);
    public function getAllContinents();
    public function storeCountry($request);
}