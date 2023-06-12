<?php
// namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'test'.'@gmail.com',
            'nik' => '162',
            'role_id' => '1',   
            'password' => Hash::make('password'),
        ]);

        // DB::table('roles')->insert([
        //     'r' => '1'
        // ]);
    }
}
