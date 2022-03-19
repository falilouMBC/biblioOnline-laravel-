<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;


use App\Http\Requests\CreateCorrectionRequest;
use App\Http\Requests\UpdateCorrectionRequest;
use App\Models\Epreuve;
use App\Repositories\CorrectionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CorrectionController extends AppBaseController
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
        $corrections = $this->correctionRepository->paginate(10);

        return view('corrections.index')
            ->with('corrections', $corrections);
    }

    /**
     * Show the form for creating a new Correction.
     *
     * @return Response
     */
    public function create()
    {
        $epreuves = Epreuve::all();
        $list=[];
        foreach ($epreuves as $epreuve ){
         $list[$epreuve->id]= ("id: $epreuve->id intitulet : $epreuve->intitulet matiere : $epreuve->matiere");
        }

        return view('corrections.create')->with('epreuves', $list);
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
        $path = $request->file('file')->store('public/files');
        $input = $request->all();
        $correctionInfo=[
            'intitulet' => $input['intitulet'],
            'id_epreuve'=> $input['id_epreuve'],
            'id_user'=> $input['id_user'],
            'file'=> $path,
        ];
        $correction = $this->correctionRepository->create($correctionInfo);

        Flash::success('Correction saved successfully.');

        return redirect(route('corrections.index'));
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
        $correction = $this->correctionRepository->find($id);

        if (empty($correction)) {
            Flash::error('Correction not found');

            return redirect(route('corrections.index'));
        }

        return view('corrections.show')->with('correction', $correction);
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
        $epreuves = Epreuve::all();
        if (empty($correction)) {
            Flash::error('Correction not found');

            return redirect(route('corrections.index'));
        }

        $list=[];
        foreach ($epreuves as $epreuve ){
            $list[$epreuve->id]= ("id: $epreuve->id intitulet : $epreuve->intitulet matiere : $epreuve->matiere");
        }

        return view('corrections.edit')->with('correction', $correction)->with('epreuves', $list);
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

            return redirect(route('corrections.index'));
        }
        Storage::delete($correction->file);
        $path = $request->file('file')->store('public/files');
        $input = $request->all();
        $correctionInfo=[
            'intitulet' => $input['intitulet'],
            'file'=> $path,
        ];

        $correction = $this->correctionRepository->update($correctionInfo, $id);

        Flash::success('Correction updated successfully.');

        return redirect(route('corrections.index'));
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

            return redirect(route('corrections.index'));
        }
        Storage::delete($correction->file);
        $this->correctionRepository->delete($id);

        Flash::success('Correction deleted successfully.');

        return redirect(route('corrections.index'));
    }


      /**
     * download file
     *
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Auth\Access\Response
     */
    public function download(Request $request, $id)
    {
        $correction = $this->correctionRepository->find($id);
        return Storage::download($correction->file);
    }


    public function readFile(Request $request, $id)
    {
        $correction = $this->correctionRepository->find($id);

        if (empty($correction)) {
            Flash::error('Correction not found');

            return redirect(route('home'));
        }
        $url = Storage::url($correction->file);
        return redirect($url);
    }
}
