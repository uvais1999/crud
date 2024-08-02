<?php

namespace App\Http\Controllers;

use App\Repositories\UserRoleRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    private $user_role_repo;

    public function __construct(UserRoleRepository $user_roles)
    {
        $this->user_role_repo = $user_roles;
    }

    public function index()
    {
        return Inertia::render(
            'UserRole/Index',
            [
                'roles' => Role::get(),
            ]
        );
    }


    public function create()
    {
        return Inertia::render('UserRole/Create', [
            'permissions' => $this->user_role_repo->getAllPermissions(),
        ]);
    }


    public function store(Request $request)
    {

        DB::beginTransaction();

        try {
            $this->user_role_repo->store($request);
        } catch (Exception $th) {
            if ($th instanceof ValidationException) throw $th;
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('user-roles.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
