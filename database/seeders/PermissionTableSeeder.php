<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [            
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'archive-list',
            'archive-create',
            'archive-edit',
            'archive-delete',
            'projet-list',
            'projet-create',
            'projet-edit',
            'projet-delete',
            'type_archive-list',
            'type_archive-create',
            'type_archive-edit',
            'type_archive-delete',
            'type_projet-list',
            'type_projet-create',
            'type_projet-edit',
            'type_projet-delete',
            
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}