<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $user = \App\Models\User::factory()->create([
            'name' => 'Akash Dutta',
            'email' => "akashduttaphp@gmail.com",
            'mobile' => "9836555023",
            'password' => Hash::make("Admin@123"),
            'is_approved' => 1,
        ]);
        $user->assignRole($role);   
    }
}
