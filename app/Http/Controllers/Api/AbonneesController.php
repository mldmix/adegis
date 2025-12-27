<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Abonnees;
use App\Http\Resources\AbonneesResource;
use App\Http\Resources\AbonneesCollection;
use Illuminate\Support\Facades\Log;

class AbonneesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AbonneesCollection
     */
    public function index(Request $request)
    {
        return new AbonneesCollection(Abonnees::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return AbonneesResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $abonnees = Abonnees::create($requestData);        
        return (new AbonneesResource($abonnees))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Abonnees $abonnees
     * @return AbonneesResource
     */
    public function show(Abonnees $abonnees)
    {
        return new AbonneesResource($abonnees);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Abonnees $abonnees
     * @return AbonneesResource
     */
    public function update(Request $request, Abonnees $abonnees)
    {
        $requestData = $request->all();
        $abonnees->update($requestData);
        return (new AbonneesResource($abonnees))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Abonnees $abonnees
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Abonnees $abonnees)
    {
        $abonnees->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
