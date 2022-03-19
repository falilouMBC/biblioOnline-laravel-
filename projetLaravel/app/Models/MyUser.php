<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class MyUser
 * @package App\Models
 * @version March 15, 2022, 11:39 pm UTC
 *
 * @property string $email
 * @property boolean $is_fromEsmt
 * @property boolean $is_newsletter
 * @property boolean $is_admin
 * @property boolean $is_active
 * @property integer $password
 */
class MyUser extends Model
{


    public $table = 'users';




    public $fillable = [
        'email',
        'password',
        'is_fromEsmt',
        'is_newsletter',
        'is_admin',
        'is_active'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'email' => 'string',
        'is_fromEsmt' => 'boolean',
        'is_newsletter' => 'boolean',
        'is_admin' => 'boolean',
        'is_active' => 'boolean',
        'password' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
