<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ownerRole = Role::create([
            'name' => 'owner'
        ]);

        $PemohonPenggalanganRole = Role::create([
            'name' => 'pemohon_penggalangan'
        ]);

        // $userOwner = User::create([
        //     'nama' => 'Kalsel Peduli',
        //     'avatar' => asset('assets/images/photos/avatar-default.svg'),
        //     'email' => 'kalselpeduli@kalselpeduli.com',
        //     'password' => bcrypt('123')
        // ]);

        $userOwner = User::create([
            'nama' => 'Kalsel Peduli',
            'avatar' => 'images/avatar-admin/avatar-default.svg', // Path relatif ke storage/app/public/
            'email' => 'kalselpeduli@kalselpeduli.com',
            'password' => bcrypt('123')
        ]);

        // $userPemohonPenggalang = User::create([
        //     'nama' => 'Bekantan Borneo',
        //     'avatar' => 'public/images/avatar/default-avatar.svg',
        //     'email' => 'bekantanborneo@kalselpeduli.com',
        //     'password' => bcrypt('123')
        // ]);

        $userOwner->assignRole($ownerRole);
        // $userPemohonPenggalang->assignRole($PemohonPenggalanganRole);
    }
}
