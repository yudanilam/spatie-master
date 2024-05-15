<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DB;
use App\Models\User;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('permitions.index', [
            'permission' => Permission::orderBy('id','DESC')->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('permitions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request) : RedirectResponse
    {
        $permit = Permission::create(['name' => $request->name]);
        return redirect()->route('permitions.index')
                ->withSuccess('New permitions is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission): View
    {
        $permision = Permission::where("id",$permission->id)
                    ->select('name')
                    ->get();
                    
                    return view('permitions.show', [
                        'permision' => $permision
                    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission,User $user): View
    {
         // Check Only Super Admin can update his own Profile
         if ($user->hasRole('Super Admin')){
            if($user->id != auth()->user()->id){
                abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
            }
        }
        return view('permitions.edit', [
            'user' => $user,
            'roles' => Role::pluck('name')->all(),
            'userRoles' => $user->roles->pluck('name')->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
