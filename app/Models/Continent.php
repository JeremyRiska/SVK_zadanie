<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    use HasFactory; 

    protected $keyType = 'string';
    protected $primaryKey = 'code';
    public $incrementing = false;

    public function countries()
    {
        return $this->hasMany(Country::class, 'continet_code', 'code' );
    }
}
