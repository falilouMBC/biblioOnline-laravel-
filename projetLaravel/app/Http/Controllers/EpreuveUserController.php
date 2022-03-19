<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEpreuveRequest;
use App\Http\Requests\UpdateEpreuveRequest;
use App\Repositories\EpreuveRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AppBaseController;
use Flash;
use Response;

class EpreuveUserController extends AppBaseController
{
    /** @var EpreuveRepository $epreuveRepository */
    private $epreuveRepository;

    public function __construct(EpreuveRepository $epreuveRepo)
    {
        $this->epreuveRepository = $epreuveRepo;
    }

    /**
     * Display a listing of the Epreuve.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new Epreuve.
     *
     * @return Response
     */
    public function create()
    {
        return view('epreuvesUser.create');
    }

    /**
     * Store a newly created Epreuve in storage.
     *
     * @param CreateEpreuveRequest $request
     *
     * @return Response
     */
    public function store(CreateEpreuveRequest $request)
    {
        if (empty($request->file('file'))) {
            Flash::error('file missing');

            return redirect(route('epreuvesUser.create'));
        }

        $path = $request->file('file')->store('public/files');
        $input = $request->all();
        $epreuveInfo = [
            'intitulet' => $input['intitulet'],
            'matiere' => $input['matiere'],
            'filiere' => $input['filiere'],
            'professeur' => $input['professeur'],
            'id_user' => $input['id_user'],
            'file' => $path,
        ];

        $epreuve = $this->epreuveRepository->create($epreuveInfo);

        Flash::success('Epreuve saved successfully.');

        return redirect(route('home'));
    }

    /**
     * Display the specified Epreuve.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified Epreuve.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $epreuve = $this->epreuveRepository->find($id);

        if (empty($epreuve)) {
            Flash::error('Epreuve not found');

            return redirect(route('home'));
        }

        return view('epreuvesUser.edit')->with('epreuve', $epreuve);
    }

    /**
     * Update the specified Epreuve in storage.
     *
     * @param int $id
     * @param UpdateEpreuveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEpreuveRequest $request)
    {
        $epreuve = $this->epreuveRepository->find($id);

        if (empty($epreuve)) {
            Flash::error('Epreuve not found');

            return redirect(route('home'));
        }
        if (empty($request->file('file'))) {
            $path = $epreuve->file;
        }else{
            Storage::delete($epreuve->file);
            $path=$request->file('file')->store('public/files');
        }
        $input = $request->all();
        $epreuveInfo = [
            'intitulet' => $input['intitulet'],
            'matiere' => $input['matiere'],
            'filiere' => $input['filiere'],
            'professeur' => $input['professeur'],
            'file' => $path,
        ];

        $epreuve = $this->epreuveRepository->update($epreuveInfo, $id);

        Flash::success('Epreuve updated successfully.');

        return redirect(route('home'));
    }

    /**
     * Remove the specified Epreuve from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $epreuve = $this->epreuveRepository->find($id);

        if (empty($epreuve)) {
            Flash::error('Epreuve not found');

            return redirect(route('home'));
        }
        Storage::delete($epreuve->file);
        $this->epreuveRepository->delete($id);

        Flash::success('Epreuve deleted successfully.');

        return redirect(route('home'));
    }
}

