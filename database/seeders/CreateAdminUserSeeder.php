<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'prenom' => 'admin',
            'profil' => 'info',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            
        ]);
    
        $role = Role::create(['name' => 'Admin']);
        $role1= Role::create(['name' => 'coordinateur']);
        $role2= Role::create(['name' => 'employe']);
        $role3= Role::create(['name' => 'visiteur']);
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}