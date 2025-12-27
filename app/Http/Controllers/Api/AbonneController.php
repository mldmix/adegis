<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Abonne;
use App\Http\Resources\AbonneResource;
use App\Http\Resources\AbonneCollection;

class AbonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AbonneCollection
     */
    public function index(Request $request)
    {
        return new AbonneCollection(Abonne::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return AbonneResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $abonne = Abonne::create($requestData);
        return (new AbonneResource($abonne))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Abonne $abonne
     * @return AbonneResource
     */
    public function show(Abonne $abonne)
    {
        return new AbonneResource($abonne);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Abonne $abonne
     * @return AbonneResource
     */
    public function update(Request $request, Abonne $abonne)
    {
        $requestData = $request->all();
        $abonne->update($requestData);
        return (new AbonneResource($abonne))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Abonne $abonne
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Abonne $abonne)
    {
        $abonne->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
