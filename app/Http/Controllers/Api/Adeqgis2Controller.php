<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Adeqgis2;
use App\Http\Resources\Adeqgis2Resource;
use App\Http\Resources\Adeqgis2Collection;

class Adeqgis2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Adeqgis2Collection
     */
    public function index(Request $request)
    {
        return new Adeqgis2Collection(Adeqgis2::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Adeqgis2Resource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $adeqgis2 = Adeqgis2::create($requestData);
        return (new Adeqgis2Resource($adeqgis2))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Adeqgis2 $adeqgis2
     * @return Adeqgis2Resource
     */
    public function show(Adeqgis2 $adeqgis2)
    {
        return new Adeqgis2Resource($adeqgis2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Adeqgis2 $adeqgis2
     * @return Adeqgis2Resource
     */
    public function update(Request $request, Adeqgis2 $adeqgis2)
    {
        $requestData = $request->all();
        $adeqgis2->update($requestData);
        return (new Adeqgis2Resource($adeqgis2))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Adeqgis2 $adeqgis2
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Adeqgis2 $adeqgis2)
    {
        $adeqgis2->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
