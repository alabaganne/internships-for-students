<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $companies = [
            ['name' => 'Vermeg', 'email' => 'careers@vermeg.com', 'website' => 'https://www.vermeg.com', 'about' => 'Vermeg is a global software company specializing in financial services, insurance, and securities post-trade solutions. Based in Tunis with offices across Europe and the US, Vermeg serves top-tier banks and financial institutions worldwide.', 'city' => 'Tunis'],
            ['name' => 'Telnet Holding', 'email' => 'rh@telnet.tn', 'website' => 'https://www.telnet.tn', 'about' => 'Telnet Holding is a leading Tunisian technology group offering engineering services, IoT solutions, and digital transformation consulting. With over 2000 engineers, Telnet works with major European and North American clients.', 'city' => 'Tunis'],
            ['name' => 'Proxym Group', 'email' => 'hr@proxym-group.com', 'website' => 'https://www.proxym-group.com', 'about' => 'Proxym is a Tunisian IT group delivering software development, digital transformation, and cloud services to international clients. Known for agile delivery and strong engineering culture.', 'city' => 'Sousse'],
            ['name' => 'Wevioo', 'email' => 'talent@wevioo.com', 'website' => 'https://www.wevioo.com', 'about' => 'Wevioo is a digital transformation and consulting firm headquartered in Tunis, serving clients in Africa, Europe, and the Middle East. They specialize in data analytics, ERP, and process automation.', 'city' => 'Tunis'],
            ['name' => 'Cynapsys', 'email' => 'jobs@cynapsys.com', 'website' => 'https://www.cynapsys.com', 'about' => 'Cynapsys is a Tunisian software and services company focused on enterprise solutions, mobile apps, and cloud computing. They partner with Oracle, Microsoft, and SAP.', 'city' => 'Ariana'],
            ['name' => 'Talan Tunisia', 'email' => 'recrutement@talan.com', 'website' => 'https://talan.com', 'about' => 'Talan is an international consulting and IT services group with a nearshore center in Tunis. They deliver innovation, digital transformation, and software engineering services for Fortune 500 companies.', 'city' => 'Tunis'],
            ['name' => 'Satoripop', 'email' => 'hello@satoripop.com', 'website' => 'https://www.satoripop.com', 'about' => 'Satoripop is a Tunisian digital agency specializing in mobile applications, web development, and UI/UX design. They build products for startups and enterprises across Europe and North Africa.', 'city' => 'Sousse'],
            ['name' => 'Expensya', 'email' => 'hiring@expensya.com', 'website' => 'https://www.expensya.com', 'about' => 'Expensya is a fast-growing SaaS startup from Tunisia that automates expense management for businesses. Used by over 5000 companies worldwide, they are one of Africa\'s top B2B SaaS success stories.', 'city' => 'Tunis'],
            ['name' => 'Keyrus Tunisia', 'email' => 'careers@keyrus.com', 'website' => 'https://www.keyrus.com', 'about' => 'Keyrus is an international consulting firm specializing in data intelligence and digital experience. Their Tunis center delivers analytics, BI, and AI solutions for global clients.', 'city' => 'Tunis'],
            ['name' => 'Sofrecom', 'email' => 'rh@sofrecom.com', 'website' => 'https://www.sofrecom.com', 'about' => 'Sofrecom is an Orange Group subsidiary providing consulting and engineering services for telecom operators globally. Their Tunis office focuses on network architecture, digital services, and OSS/BSS transformation.', 'city' => 'Ben Arous'],
        ];

        $password = bcrypt('password');
        $cityMap = \App\Models\City::pluck('id', 'name')->toArray();

        foreach ($companies as $data) {
            $cityId = $cityMap[$data['city']] ?? array_values($cityMap)[0];

            $company = Company::create([
                'website' => $data['website'],
                'about'   => $data['about'],
                'city_id' => $cityId,
            ]);

            $company->user()->save(User::create([
                'name'        => $data['name'],
                'email'       => $data['email'],
                'password'    => $password,
                'phone_number' => '+216' . rand(20000000, 99999999),
                'email_verified_at' => now(),
            ]));
        }
    }
}
