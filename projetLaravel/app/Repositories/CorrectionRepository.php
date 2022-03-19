<?php

namespace App\Repositories;

use App\Models\Correction;
use App\Repositories\BaseRepository;

/**
 * Class CorrectionRepository
 * @package App\Repositories
 * @version March 16, 2022, 11:51 am UTC
*/

class CorrectionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'intitulet',
        'file',
        'id_user',
        'id_epreuve'
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
        return Correction::class;
    }
}
