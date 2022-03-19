<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCorrectionAPIRequest;
use App\Http\Requests\API\UpdateCorrectionAPIRequest;
use App\Models\Correction;
use App\Repositories\CorrectionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CorrectionController
 * @package App\Http\Controllers\API
 */

class CorrectionAPIController extends AppBaseController
{
    /** @var  CorrectionRepository */
    private $correctionRepository;

    public function __construct(CorrectionRepository $correctionRepo)
    {
        $this->correctionRepository = $correctionRepo;
    }

    /**
     * Display a listing of the Correction.
     * GET|HEAD /corrections
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $corrections = $this->correctionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($corrections->toArray(), 'Corrections retrieved successfully');
    }

    /**
     * Store a newly created Correction in storage.
     * POST /corrections
     *
     * @param CreateCorrectionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCorrectionAPIRequest $request)
    {
        $input = $request->all();

        $correction = $this->correctionRepository->create($input);

        return $this->sendResponse($correction->toArray(), 'Correction saved successfully');
    }

    /**
     * Display the specified Correction.
     * GET|HEAD /corrections/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Correction $correction */
        $correction = $this->correctionRepository->find($id);

        if (empty($correction)) {
            return $this->sendError('Correction not found');
        }

        return $this->sendResponse($correction->toArray(), 'Correction retrieved successfully');
    }

    /**
     * Update the specified Correction in storage.
     * PUT/PATCH /corrections/{id}
     *
     * @param int $id
     * @param UpdateCorrectionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCorrectionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Correction $correction */
        $correction = $this->correctionRepository->find($id);

        if (empty($correction)) {
            return $this->sendError('Correction not found');
        }

        $correction = $this->correctionRepository->update($input, $id);

        return $this->sendResponse($correction->toArray(), 'Correction updated successfully');
    }

    /**
     * Remove the specified Correction from storage.
     * DELETE /corrections/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Correction $correction */
        $correction = $this->correctionRepository->find($id);

        if (empty($correction)) {
            return $this->sendError('Correction not found');
        }

        $correction->delete();

        return $this->sendSuccess('Correction deleted successfully');
    }
}
