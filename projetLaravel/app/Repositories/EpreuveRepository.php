<?php

namespace App\Repositories;

use App\Models\Epreuve;
use App\Repositories\BaseRepository;

/**
 * Class EpreuveRepository
 * @package App\Repositories
 * @version March 16, 2022, 11:14 am UTC
*/

class EpreuveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'intitulet',
        'matiere',
        'filiere',
        'professeur',
        'file',
        'id_user'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Epreuve::class;
    }
}
