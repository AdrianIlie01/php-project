<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed $user_id
 * @property mixed $first_name
 * @property mixed $last_name
 * @property mixed $photo
 * @property mixed $country
 * @property mixed $city
 * @property mixed $street
 * @property mixed $postal_code
 * @property mixed $bio
 * @property mixed $birth_date
 */
class Profile extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

//    fillable == date ce le completeaza user-ul
    protected $fillable = [
        'first_name',
        'last_name',
        'photo',
        'country',
        'city',
        'street',
        'postal_code',
        'bio',
        'birth_date'
    ];
    protected $casts = [
        'id',
        'user_id',
        'first_name',
        'last_name',
        'photo',
        'country',
        'city',
        'street',
        'postal_code',
        'bio',
        'birth_date'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
