<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Http\Resources\SiteResource;
use App\Http\Resources\SiteCollection;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return SiteCollection
     */
    public function index(Request $request)
    {
        return new SiteCollection(Site::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return SiteResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $site = Site::create($requestData);
        return (new SiteResource($site))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Site $site
     * @return SiteResource
     */
    public function show(Site $site)
    {
        return new SiteResource($site);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Site $site
     * @return SiteResource
     */
    public function update(Request $request, Site $site)
    {
        $requestData = $request->all();
        $site->update($requestData);
        return (new SiteResource($site))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Site $site
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Site $site)
    {
        $site->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
