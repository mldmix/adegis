<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Tuyaux25de1000mdbr;
use App\Http\Resources\Tuyaux25de1000mdbrResource;
use App\Http\Resources\Tuyaux25de1000mdbrCollection;

class Tuyaux25de1000mdbrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Tuyaux25de1000mdbrCollection
     */
    public function index(Request $request)
    {
        return new Tuyaux25de1000mdbrCollection(Tuyaux25de1000mdbr::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Tuyaux25de1000mdbrResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $tuyaux25de1000mdbr = Tuyaux25de1000mdbr::create($requestData);
        return (new Tuyaux25de1000mdbrResource($tuyaux25de1000mdbr))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Tuyaux25de1000mdbr $tuyaux25de1000mdbr
     * @return Tuyaux25de1000mdbrResource
     */
    public function show(Tuyaux25de1000mdbr $tuyaux25de1000mdbr)
    {
        return new Tuyaux25de1000mdbrResource($tuyaux25de1000mdbr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Tuyaux25de1000mdbr $tuyaux25de1000mdbr
     * @return Tuyaux25de1000mdbrResource
     */
    public function update(Request $request, Tuyaux25de1000mdbr $tuyaux25de1000mdbr)
    {
        $requestData = $request->all();
        $tuyaux25de1000mdbr->update($requestData);
        return (new Tuyaux25de1000mdbrResource($tuyaux25de1000mdbr))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tuyaux25de1000mdbr $tuyaux25de1000mdbr
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Tuyaux25de1000mdbr $tuyaux25de1000mdbr)
    {
        $tuyaux25de1000mdbr->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
