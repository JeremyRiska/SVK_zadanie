<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $keyType = 'int';
    protected $primaryKey = 'country_id';
    public $timestamps = false;

    public $fillable = [
        'code',
        'name',
        'full_name',
        'iso3',
        'number',
        'continent_code' 
    ];

    public function continent()
    {
        return $this->belongsTo(Continent::class, 'continent_code', 'code');
    }

    public function setDisplayOrder()
    {
        $maxDisplayOrder = static::max('display_order');
        $this->display_order = $maxDisplayOrder ? $maxDisplayOrder + 1 : 1;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($country) {
            $country->setDisplayOrder();
        });
    }

}
