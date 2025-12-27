<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Empchateau;
use App\Http\Resources\EmpchateauResource;
use App\Http\Resources\EmpchateauCollection;

class EmpchateauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return EmpchateauCollection
     */
    public function index(Request $request)
    {
        return new EmpchateauCollection(Empchateau::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return EmpchateauResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $empchateau = Empchateau::create($requestData);
        return (new EmpchateauResource($empchateau))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Empchateau $empchateau
     * @return EmpchateauResource
     */
    public function show(Empchateau $empchateau)
    {
        return new EmpchateauResource($empchateau);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Empchateau $empchateau
     * @return EmpchateauResource
     */
    public function update(Request $request, Empchateau $empchateau)
    {
        $requestData = $request->all();
        $empchateau->update($requestData);
        return (new EmpchateauResource($empchateau))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Empchateau $empchateau
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Empchateau $empchateau)
    {
        $empchateau->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
