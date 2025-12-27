<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Tablepointsintero;
use App\Http\Resources\TablepointsinteroResource;
use App\Http\Resources\TablepointsinteroCollection;

class TablepointsinteroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return TablepointsinteroCollection
     */
    public function index(Request $request)
    {
        return new TablepointsinteroCollection(Tablepointsintero::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return TablepointsinteroResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $tablepointsintero = Tablepointsintero::create($requestData);
        return (new TablepointsinteroResource($tablepointsintero))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Tablepointsintero $tablepointsintero
     * @return TablepointsinteroResource
     */
    public function show(Tablepointsintero $tablepointsintero)
    {
        return new TablepointsinteroResource($tablepointsintero);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Tablepointsintero $tablepointsintero
     * @return TablepointsinteroResource
     */
    public function update(Request $request, Tablepointsintero $tablepointsintero)
    {
        $requestData = $request->all();
        $tablepointsintero->update($requestData);
        return (new TablepointsinteroResource($tablepointsintero))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tablepointsintero $tablepointsintero
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Tablepointsintero $tablepointsintero)
    {
        $tablepointsintero->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
