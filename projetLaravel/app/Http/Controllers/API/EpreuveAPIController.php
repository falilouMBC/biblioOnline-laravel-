<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEpreuveAPIRequest;
use App\Http\Requests\API\UpdateEpreuveAPIRequest;
use App\Models\Epreuve;
use App\Repositories\EpreuveRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EpreuveController
 * @package App\Http\Controllers\API
 */

class EpreuveAPIController extends AppBaseController
{
    /** @var  EpreuveRepository */
    private $epreuveRepository;

    public function __construct(EpreuveRepository $epreuveRepo)
    {
        $this->epreuveRepository = $epreuveRepo;
    }

    /**
     * Display a listing of the Epreuve.
     * GET|HEAD /epreuves
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $epreuves = $this->epreuveRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($epreuves->toArray(), 'Epreuves retrieved successfully');
    }

    /**
     * Store a newly created Epreuve in storage.
     * POST /epreuves
     *
     * @param CreateEpreuveAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEpreuveAPIRequest $request)
    {
        $input = $request->all();
        $path = $request->file('file')->store('public/files');

        $epreuve = $this->epreuveRepository->create($input);

        return $this->sendResponse($epreuve->toArray(), 'Epreuve saved successfully');
    }

    /**
     * Display the specified Epreuve.
     * GET|HEAD /epreuves/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Epreuve $epreuve */
        $epreuve = $this->epreuveRepository->find($id);

        if (empty($epreuve)) {
            return $this->sendError('Epreuve not found');
        }

        return $this->sendResponse($epreuve->toArray(), 'Epreuve retrieved successfully');
    }

    /**
     * Update the specified Epreuve in storage.
     * PUT/PATCH /epreuves/{id}
     *
     * @param int $id
     * @param UpdateEpreuveAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEpreuveAPIRequest $request)
    {
        $input = $request->all();

        /** @var Epreuve $epreuve */
        $epreuve = $this->epreuveRepository->find($id);

        if (empty($epreuve)) {
            return $this->sendError('Epreuve not found');
        }
        $path = $request->file('file')->store('public/files');

        $epreuve = $this->epreuveRepository->update($input, $id);

        return $this->sendResponse($epreuve->toArray(), 'Epreuve updated successfully');
    }

    /**
     * Remove the specified Epreuve from storage.
     * DELETE /epreuves/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Epreuve $epreuve */
        $epreuve = $this->epreuveRepository->find($id);

        if (empty($epreuve)) {
            return $this->sendError('Epreuve not found');
        }

        $epreuve->delete();

        return $this->sendSuccess('Epreuve deleted successfully');
    }
}
