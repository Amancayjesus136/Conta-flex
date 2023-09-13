<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1= Role::create(['name' => 'superadministrador']);
        $role2= Role::create(['name' => 'administrador']);
        $role3= Role::create(['name' => 'jefesucursal']);
        $role4= Role::create(['name' => 'operador']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'listadoreportes.index.index'])->syncRoles([$role1]);
        

    }
}
