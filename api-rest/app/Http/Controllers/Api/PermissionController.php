<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;

class PermissionController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */

     public static function middleware(): array
    {
        return [
            new Middleware('auth:api'),
        ];
    }

    public function index()
    {

        //Gate::authorize('permissions.index','api');

        $permissions = ModelsPermission::all();
        return PermissionResource::collection($permissions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        $data['guard_name'] = 'api';

        $permission = ModelsPermission::create($data);

        return new PermissionResource($permission);
    }

    /**
     * Display the specified resource.
     */
    public function show(ModelsPermission $permission)
    {
        return PermissionResource::make($permission);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsPermission $permission)
    {
        $data = $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
        ]);

        $permission->update($data);

        return PermissionResource::make($permission);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsPermission $permission)
    {
        $permission->delete();
        return response()->json(null, 204);
    }
}
