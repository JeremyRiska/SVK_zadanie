<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;


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

    protected static function boot()
    {
        parent::boot();
        
        static::created(function ($model) {
            Cache::forget('all-continents');
        });
        static::updated(function ($model) {
            Cache::forget('all-continents');
        });
        static::deleted(function ($model) {
            Cache::forget('all-continents');
        });
    }
}
