<?php

namespace App\Repositories;

use App\Models\MyUser;
use App\Repositories\BaseRepository;

/**
 * Class MyUserRepository
 * @package App\Repositories
 * @version March 15, 2022, 11:39 pm UTC
*/

class MyUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email',
        'is_fromEsmt',
        'is_newsletter',
        'is_admin',
        'is_active'
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
        return MyUser::class;
    }
}
