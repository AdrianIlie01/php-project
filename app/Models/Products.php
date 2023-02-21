<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed $product_name
 * @property mixed $sku
 * @property mixed $price
 * @property mixed $description_product
 * @method static find($productName)
 */
class Products extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Uuids;

    protected $table = 'products';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_name',
        'description_product',
        'sku',
        'price',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];
}
