<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Member extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    protected $guard = 'member';

    protected $table = 'members';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'admin',
        'gender',

        'country',
        'city',
        'nationality',
        'dual_nationality',

        'marriage_type',
        'marital_status',
        'age',
        'children_number',

        'weight',
        'tall',
        'skin',
        'body_status',

        'religiosity',
        'pray',
        'smoke',
        'beard',

        'education',
        'money_status',
        'work_field',
        'work',
        'money_month',
        'health_status',

        'partner_description',
        'your_description',

        'full_name',
        'phone',


        'status',
        'online',
        'condition_agree',
        'last_seen',
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
