<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Vanne;
use App\Http\Resources\VanneResource;
use App\Http\Resources\VanneCollection;
use Illuminate\Support\Facades\Log;

class VanneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return VanneCollection
     */
    public function index(Request $request)
    {
        return new VanneCollection(Vanne::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return VanneResource
     */
    public function store(Request $request)
    {        
        $requestData = $request->all();
        $vanne = Vanne::create($requestData);
        return (new VanneResource($vanne))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Vanne $vanne
     * @return VanneResource
     */
    public function show(Vanne $vanne)
    {
        return new VanneResource($vanne);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Vanne $vanne
     * @return VanneResource
     */
    public function update(Request $request, Vanne $vanne)
    {
        $requestData = $request->all();
        $vanne->update($requestData);
        return (new VanneResource($vanne))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vanne $vanne
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Vanne $vanne)
    {
        $vanne->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
