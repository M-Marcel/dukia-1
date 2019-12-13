<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table= 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'first_name', 'last_name', 'email', 'bvn', 'user_id', 'api_token', 'password', 'dob', 'phoneno', 'wallet', 'bank_name', 'bank_account', 'license', 'gender', 'id_card', 'address', 'location', 'registration_address', 'business_address', 'contact_phone', 'date_of_incorporation', 'country_of_incorporation', 'tax_number', 'image_path', 'qrcode_path', 'status', 'role', 'dukia_club', 'flag', 'notification_id', 'brand', 'remember_token', 'device_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
