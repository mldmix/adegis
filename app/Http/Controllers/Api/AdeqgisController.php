<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Adeqgis;
use App\Http\Resources\AdeqgisResource;
use App\Http\Resources\AdeqgisCollection;

class AdeqgisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AdeqgisCollection
     */
    public function index(Request $request)
    {
        return new AdeqgisCollection(Adeqgis::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return AdeqgisResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $adeqgis = Adeqgis::create($requestData);
        return (new AdeqgisResource($adeqgis))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Adeqgis $adeqgis
     * @return AdeqgisResource
     */
    public function show(Adeqgis $adeqgis)
    {
        return new AdeqgisResource($adeqgis);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Adeqgis $adeqgis
     * @return AdeqgisResource
     */
    public function update(Request $request, Adeqgis $adeqgis)
    {
        $requestData = $request->all();
        $adeqgis->update($requestData);
        return (new AdeqgisResource($adeqgis))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Adeqgis $adeqgis
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Adeqgis $adeqgis)
    {
        $adeqgis->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
