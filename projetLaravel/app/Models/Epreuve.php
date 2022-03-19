<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Epreuve
 * @package App\Models
 * @version March 16, 2022, 11:14 am UTC
 *
 * @property \App\Models\User $id
 * @property string $intitulet
 * @property string $matiere
 * @property string $filiere
 * @property string $professeur
 * @property string $file
 * @property integer $id_user
 */
class Epreuve extends Model
{
    use SoftDeletes;


    public $table = 'epreuves';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'intitulet',
        'matiere',
        'filiere',
        'professeur',
        'file',
        'id_user'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'intitulet' => 'string',
        'matiere' => 'string',
        'filiere' => 'string',
        'professeur' => 'string',
        'file' => 'string',
        'id_user' => 'integer'
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
