<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Correction
 * @package App\Models
 * @version March 16, 2022, 11:51 am UTC
 *
 * @property string $intitulet
 * @property string $file
 * @property integer $id_user
 * @property integer $id_epreuve
 */
class Correction extends Model
{


    public $table = 'corrections';




    public $fillable = [
        'intitulet',
        'file',
        'id_user',
        'id_epreuve'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'intitulet' => 'string',
        'file' => 'string',
        'id_user' => 'integer',
        'id_epreuve' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function id()
    {
        return $this->belongsTo(\App\Models\User::class, 'id', 'id_user');
    }


}
