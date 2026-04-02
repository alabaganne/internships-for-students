<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\User;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $students = [
            ['name' => 'Ahmed Ben Salah', 'email' => 'ahmed.bensalah@esprit.tn'],
            ['name' => 'Salma Trabelsi', 'email' => 'salma.trabelsi@insat.tn'],
            ['name' => 'Yassine Mrabet', 'email' => 'yassine.mrabet@supcom.tn'],
            ['name' => 'Nour Gharbi', 'email' => 'nour.gharbi@fst.utm.tn'],
            ['name' => 'Hamza Jebali', 'email' => 'hamza.jebali@ensi.rnu.tn'],
            ['name' => 'Ines Ayari', 'email' => 'ines.ayari@isamm.uma.tn'],
            ['name' => 'Oussama Chaouachi', 'email' => 'oussama.chaouachi@enit.utm.tn'],
            ['name' => 'Mariem Khelifi', 'email' => 'mariem.khelifi@isg.rnu.tn'],
            ['name' => 'Khaled Sfaxi', 'email' => 'khaled.sfaxi@iset.sfax.tn'],
            ['name' => 'Rania Boukadida', 'email' => 'rania.boukadida@sesame.utm.tn'],
            ['name' => 'Adem Oueslati', 'email' => 'adem.oueslati@esprit.tn'],
            ['name' => 'Farah Mansouri', 'email' => 'farah.mansouri@issg.rnu.tn'],
            ['name' => 'Bilel Hammami', 'email' => 'bilel.hammami@isetna.tn'],
            ['name' => 'Cyrine Zouari', 'email' => 'cyrine.zouari@isg.rnu.tn'],
            ['name' => 'Saber Karray', 'email' => 'saber.karray@fst.rnu.tn'],
        ];

        $password = bcrypt('password');

        foreach ($students as $data) {
            $student = Student::factory()->create();
            $student->user()->save(User::create([
                'name'              => $data['name'],
                'email'             => $data['email'],
                'password'          => $password,
                'phone_number'      => '+216' . rand(20000000, 99999999),
                'email_verified_at' => now(),
            ]));
        }
    }
}
