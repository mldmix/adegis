<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Tuyaux90;
use App\Http\Resources\Tuyaux90Resource;
use App\Http\Resources\Tuyaux90Collection;

class Tuyaux90Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Tuyaux90Collection
     */
    public function index(Request $request)
    {
        return new Tuyaux90Collection(Tuyaux90::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Tuyaux90Resource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $tuyaux90 = Tuyaux90::create($requestData);
        return (new Tuyaux90Resource($tuyaux90))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Tuyaux90 $tuyaux90
     * @return Tuyaux90Resource
     */
    public function show(Tuyaux90 $tuyaux90)
    {
        return new Tuyaux90Resource($tuyaux90);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Tuyaux90 $tuyaux90
     * @return Tuyaux90Resource
     */
    public function update(Request $request, Tuyaux90 $tuyaux90)
    {
        $requestData = $request->all();
        $tuyaux90->update($requestData);
        return (new Tuyaux90Resource($tuyaux90))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tuyaux90 $tuyaux90
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Tuyaux90 $tuyaux90)
    {
        $tuyaux90->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
