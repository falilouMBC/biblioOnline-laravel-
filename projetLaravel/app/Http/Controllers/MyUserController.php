<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMyUserRequest;
use App\Http\Requests\UpdateMyUserRequest;
use App\Repositories\MyUserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Hash;
use Response;

class MyUserController extends AppBaseController
{
    /** @var MyUserRepository $myUserRepository*/
    private $myUserRepository;

    public function __construct(MyUserRepository $myUserRepo)
    {
        $this->myUserRepository = $myUserRepo;
    }

    /**
     * Display a listing of the MyUser.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $myUsers = $this->myUserRepository->paginate(10);

        return view('my_users.index')
            ->with('myUsers', $myUsers);
    }

    /**
     * Show the form for creating a new MyUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('my_users.create');
    }

    /**
     * Store a newly created MyUser in storage.
     *
     * @param CreateMyUserRequest $request
     *
     * @return Response
     */
    public function store(CreateMyUserRequest $request)
    {
        $data = $request->all();
        $userinfo=[
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_fromEsmt' => $data['is_fromEsmt'],
            'is_newsletter' => $data['is_newsletter'],
        ];
        $myUser = $this->myUserRepository->create($userinfo);

        Flash::success('My User saved successfully.');

        return redirect(route('myUsers.index'));
    }

    /**
     * Display the specified MyUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $myUser = $this->myUserRepository->find($id);

        if (empty($myUser)) {
            Flash::error('My User not found');

            return redirect(route('myUsers.index'));
        }

        return view('my_users.show')->with('myUser', $myUser);
    }

    /**
     * Show the form for editing the specified MyUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $myUser = $this->myUserRepository->find($id);

        if (empty($myUser)) {
            Flash::error('My User not found');

            return redirect(route('myUsers.index'));
        }

        return view('my_users.edit')->with('myUser', $myUser);
    }

    /**
     * Update the specified MyUser in storage.
     *
     * @param int $id
     * @param UpdateMyUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMyUserRequest $request)
    {
        $myUser = $this->myUserRepository->find($id);

        if (empty($myUser)) {
            Flash::error('My User not found');

            return redirect(route('myUsers.index'));
        }
        $data = $request->all();
        $userinfo=[
            'is_active'=> $data['is_active'],
            'is_admin'=> $data['is_admin'],
            'is_fromEsmt' => $data['is_fromEsmt'],
            'is_newsletter' => $data['is_newsletter'],
        ];

        $myUser = $this->myUserRepository->update($userinfo, $id);

        Flash::success('My User updated successfully.');

        return redirect(route('myUsers.index'));
    }

    /**
     * Remove the specified MyUser from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $myUser = $this->myUserRepository->find($id);

        if (empty($myUser)) {
            Flash::error('My User not found');

            return redirect(route('myUsers.index'));
        }

        $this->myUserRepository->delete($id);

        Flash::success('My User deleted successfully.');

        return redirect(route('myUsers.index'));
    }


}
