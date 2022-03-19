<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCorrectionRequest;
use App\Http\Requests\UpdateCorrectionRequest;
use App\Models\Epreuve;
use App\Repositories\CorrectionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AppBaseController;
use Flash;
use Response;


class CorrectionUserController extends AppBaseController
{
    /** @var CorrectionRepository $correctionRepository*/
    private $correctionRepository;

    public function __construct(CorrectionRepository $correctionRepo)
    {
        $this->correctionRepository = $correctionRepo;
    }

    /**
     * Display a listing of the Correction.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new Correction.
     *
     * @return Response
     */
    public function create($id)
    {

        return view('correctionsUser.create')->with('id_epreuve',$id);
    }

    /**
     * Store a newly created Correction in storage.
     *
     * @param CreateCorrectionRequest $request
     *
     * @return Response
     */
    public function store(CreateCorrectionRequest $request)
    {

        $input = $request->all();
        if (empty($request->file('file'))) {
            Flash::error('file missing');

            return redirect(route('addCorrection', $input['id_epreuve']));
        }
        $path = $request->file('file')->store('public/files');
        $correctionInfo=[
            'intitulet' => $input['intitulet'],
            'id_epreuve'=> $input['id_epreuve'],
            'id_user'=> $input['id_user'],
            'file'=> $path,
        ];
        $correction = $this->correctionRepository->create($correctionInfo);

        Flash::success('Correction saved successfully.');

        return redirect(route('corrections',$input['id_epreuve']));
    }

    /**
     * Display the specified Correction.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified Correction.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $correction = $this->correctionRepository->find($id);
        if (empty($correction)) {
            Flash::error('Correction not found');

            return redirect(route('home'));
        }
        return view('correctionsUser.edit')->with('correction', $correction)->with('id_epreuves', $id);
    }

    /**
     * Update the specified Correction in storage.
     *
     * @param int $id
     * @param UpdateCorrectionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCorrectionRequest $request)
    {
        $correction = $this->correctionRepository->find($id);
        if (empty($correction)) {
            Flash::error('Correction not found');

            return redirect(route('home'));
        }

        if (empty($request->file('file'))) {
            $path = $correction->file;
        }else{
            Storage::delete($correction->file);
            $path = $request->file('file')->store('public/files');
        }
        $input = $request->all();
        $correctionInfo=[
            'intitulet' => $input['intitulet'],
            'file'=> $path,
        ];

        $correction = $this->correctionRepository->update($correctionInfo, $id);

        Flash::success('Correction updated successfully.');

        return redirect(route('corrections',$correction->id_epreuve));
    }

    /**
     * Remove the specified Correction from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $correction = $this->correctionRepository->find($id);

        if (empty($correction)) {
            Flash::error('Correction not found');

            return redirect(route('home'));
        }
        Storage::delete($correction->file);
        $this->correctionRepository->delete($id);

        Flash::success('Correction deleted successfully.');

        return redirect(route('home'));
    }

}
