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

        $userOwner = User::create([
            'nama' => 'Kalsel Peduli',
            'avatar' => 'images/default-avatar.png',
            'email' => 'kalselpeduli@kalselpeduli.com',
            'password' => bcrypt('123')
        ]);

        $userPemohonPenggalang = User::create([
            'nama' => 'Bekantan Borneo',
            'avatar' => 'images/default-avatar.png',
            'email' => 'bekantanborneo@kalselpeduli.com',
            'password' => bcrypt('123')
        ]);

        $userOwner->assignRole($ownerRole);
        $userPemohonPenggalang->assignRole($PemohonPenggalanganRole);
    }
}
