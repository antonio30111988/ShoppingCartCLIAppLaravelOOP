<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku', 'quantity'
    ];

    public function inventory(){
        return $this->hasOne(Inventory::class, 'sku', 'sku');
    }
}
