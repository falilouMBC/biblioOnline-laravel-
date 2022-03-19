<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMyUserRequest;
use App\Models\Correction;
use App\Models\Epreuve;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $epreuves = Epreuve::all();
        $corrections = Correction::all();
        return view('users.index')->with('epreuves', $epreuves)->with('corrections', $corrections);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profil()
    {

        return view('users.profil');
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
        $myUser = User::findorFail($id);

        if (empty($myUser)) {
            Flash::error('My User not found');

            return redirect(route('welcome'));
        }

        return view('users.edit')->with('myUser', $myUser);
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
        $myUser = User::findorFail($id);

        if (empty($myUser)) {
            Flash::error('My User not found');

            return redirect(route('welcome'));
        }
        $data = $request->all();
        $myUser->is_fromEsmt = $data['is_fromEsmt'];
        $myUser->is_newsletter = $data['is_newsletter'];
        $myUser->save();

        Flash::success('My User updated successfully.');

        return redirect(route('profil'));
    }


    /**
     * Display the specified Correction.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showCorrections(request $request, $id)
    {

        $corrections = Correction::all()->where('id_epreuve', '=', $id);
        $epreuve = Epreuve::find($id);
        if (empty($corrections)) {
            Flash::error('Correction not found');

            return redirect(route('home'));
        }

        return view('users.corrections')->with('corrections', $corrections)->with('epreuve', $epreuve);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function sendMailNewsletter(Request $request)
    {

        $id = Auth::user()->id;
        $details = [
            'title' => 'Inscription newsletter',
            'body' => 'bienvenue sur le newsletter de eLibrary,\n vous recevrez des messages dorenavant',
        ];
        $user = User::findorfail($id);
        if ($user->is_newsletter) {

            Flash::success('Vous etes deja isncrit a la Newsletter.');

            return redirect(route('home'));

        }
        $user->is_newsletter = 1;
        $user->save();

        Mail::to($user)->send(new \App\Mail\MyTestMail($details));

        Flash::success('inscription Newsletter successfull.');

        return redirect(route('home'));
    }

    /**
     * Show the form for editing the specified MyUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function editPassword($id)
    {
        $myUser = User::findorFail($id);

        if (empty($myUser)) {
            Flash::error('My User not found');

            return redirect(route('home'));
        }

        return view('users.change_password')->with('myUser', $myUser);
    }

    /**
     * Update the specified MyUser in storage.
     *
     * @param int $id
     * @param \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function updatePassword($id, Request $request)
    {
        $myUser = User::findorFail($id);
        $data = $request->all();

        $password1 = $data['password1'];
        $password2 = $data['password2'];

//        dd($myUser->password);
        if (empty($myUser)) {
            Flash::error('My User not found');

            return redirect(route('home'));
        }
        if (!(Hash::check($data['password'],$myUser->password))) {
            Flash::error('Mot de passe incorrect');

            return redirect()->back();
        }
        if ($password1 != $password2) {
            Flash::error('Mot de passe 1 et 2 different');

            return redirect()->back();
        }else{
            $myUser->password =  Hash::make($password1);
            $myUser->save();
        }


        Flash::success('Password updated successfully.');

        return redirect(route('profil'));
    }


}
