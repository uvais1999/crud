<?php

namespace App\Repositories;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRoleRepository
{

    public function store($data){
      $role =  Role::create([
            'name' => $data->name,
        ]);

        $role->syncPermissions($data->selected_permissions);
    }

    public function getAllPermissions(){
        return Permission::get();
    }

}
