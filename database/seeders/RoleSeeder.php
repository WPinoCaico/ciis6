<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=> 'Administrador']);
        $role2 = Role::create(['name'=> 'Asistente']);
        $role3 = Role::create(['name'=> 'Postulante']);
        $role4 = Role::create(['name'=> 'Asesor']);
        $role5 = Role::create(['name'=> 'Colaborador']);
        $role6 = Role::create(['name'=> 'Comision']);
        $role7 = Role::create(['name'=> 'Tesoreria']);

        Permission::create(['name'=>'admin.home'])->assignRole($role1);
        Permission::create(['name'=>'asistente.home'])->assignRole($role2);
        Permission::create(['name'=>'postulante.home'])->assignRole($role3);
        Permission::create(['name'=>'asesor.home'])->assignRole($role4);
        Permission::create(['name'=>'colaborador.home'])->assignRole($role5);
        Permission::create(['name'=>'comision.home'])->assignRole($role6);
        Permission::create(['name'=>'tesoreria.home'])->assignRole($role7);
        
    }
}
