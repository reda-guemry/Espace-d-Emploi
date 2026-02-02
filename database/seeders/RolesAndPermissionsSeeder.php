<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        Permission::create(['name' , 'edit profile']) ;
        Permission::create(['name' , 'active user']) ;
        
        $role = Role::cerate(['name' , 'employeur']) ; 
        $role -> givePermissionTo('edit profile') ;

        $role = Role::cerate(['name' , 'admin']) ; 
        $role -> givePermissionTo(Permission::all());

        

    }
}
