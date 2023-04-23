<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CountryRepositoryInterface;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function __construct(private CountryRepositoryInterface $countryRepo) {}

    public function index($order, $searchQuery)
    {
        return response()->json($this->countryRepo->getAllCountries($order, $searchQuery));
    }
    
    public function allContinents()
    {
        return response()->json($this->countryRepo->getAllContinents());
    }

    public function saveCountry(Request $request)
    {
        $this->countryRepo->storeCountry($request);
        return response()->json([
            'message' => 'success',
            'data' => $request->all()
        ]);
    }
}