<?php

namespace Database\Seeders;

use App\Models\Kereta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KeretaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kereta::insert([
            [
                "username" => "solo",
                "password" => Hash::make("123"),
                "nama_kereta" => "Railbus Solo"
            ],
            [
                "username" => "aceh",
                "password" => Hash::make("123"),
                "nama_kereta" => "Railbus Aceh"
            ],
            
        ]);
    }
}
