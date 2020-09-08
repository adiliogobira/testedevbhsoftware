<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert(
            [
                'nome'=>'Admin',
                "sobrenome" => "do site",
                "cpf"=>"123.456.789-00",
                "rg"=>"22111444",
                "dtNascimento"=>"1989-11-29",
                'email'=>"adiliogobira@gmail.com",
                'password'=>Hash::make("123456"),
                'level'=>10
                ]
            );
    }
}
