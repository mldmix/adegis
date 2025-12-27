<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Resources\AdminResource;
use App\Http\Resources\AdminCollection;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AdminCollection
     */
    public function index(Request $request)
    {
        return new AdminCollection(Admin::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return AdminResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $admin = Admin::create($requestData);
        return (new AdminResource($admin))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Admin $admin
     * @return AdminResource
     */
    public function show(Admin $admin)
    {
        return new AdminResource($admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Admin $admin
     * @return AdminResource
     */
    public function update(Request $request, Admin $admin)
    {
        $requestData = $request->all();
        $admin->update($requestData);
        return (new AdminResource($admin))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Admin $admin
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
