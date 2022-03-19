<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMyUserAPIRequest;
use App\Http\Requests\API\UpdateMyUserAPIRequest;
use App\Models\MyUser;
use App\Repositories\MyUserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Hash;
use Response;

/**
 * Class MyUserController
 * @package App\Http\Controllers\API
 */

class MyUserAPIController extends AppBaseController
{
    /** @var  MyUserRepository */
    private $myUserRepository;

    public function __construct(MyUserRepository $myUserRepo)
    {
        $this->myUserRepository = $myUserRepo;
    }

    /**
     * Display a listing of the MyUser.
     * GET|HEAD /myUsers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $myUsers = $this->myUserRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($myUsers->toArray(), 'My Users retrieved successfully');
    }

    /**
     * Store a newly created MyUser in storage.
     * POST /myUsers
     *
     * @param CreateMyUserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMyUserAPIRequest $request)
    {
        $data = $request->all();
        $userinfo=[
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_fromEsmt' => $data['is_fromEsmt'],
            'is_newsletter' => $data['is_newsletter'],
        ];
        $myUser = $this->myUserRepository->create($userinfo);

        return $this->sendResponse($myUser->toArray(), 'My User saved successfully');
    }

    /**
     * Display the specified MyUser.
     * GET|HEAD /myUsers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MyUser $myUser */
        $myUser = $this->myUserRepository->find($id);

        if (empty($myUser)) {
            return $this->sendError('My User not found');
        }

        return $this->sendResponse($myUser->toArray(), 'My User retrieved successfully');
    }

    /**
     * Update the specified MyUser in storage.
     * PUT/PATCH /myUsers/{id}
     *
     * @param int $id
     * @param UpdateMyUserAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMyUserAPIRequest $request)
    {
        $input = $request->all();

        /** @var MyUser $myUser */
        $myUser = $this->myUserRepository->find($id);

        if (empty($myUser)) {
            return $this->sendError('My User not found');
        }

        $myUser = $this->myUserRepository->update($input, $id);

        return $this->sendResponse($myUser->toArray(), 'MyUser updated successfully');
    }

    /**
     * Remove the specified MyUser from storage.
     * DELETE /myUsers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MyUser $myUser */
        $myUser = $this->myUserRepository->find($id);

        if (empty($myUser)) {
            return $this->sendError('My User not found');
        }

        $myUser->delete();

        return $this->sendSuccess('My User deleted successfully');
    }
}
