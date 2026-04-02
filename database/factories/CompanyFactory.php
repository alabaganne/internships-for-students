<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
    {
        $companies = [
            ['name' => 'Vermeg', 'website' => 'https://www.vermeg.com', 'about' => 'Vermeg is a global software company specializing in financial services, insurance, and securities post-trade solutions. Based in Tunis with offices across Europe and the US, Vermeg serves top-tier banks and financial institutions worldwide.'],
            ['name' => 'Telnet Holding', 'website' => 'https://www.telnet.tn', 'about' => 'Telnet Holding is a leading Tunisian technology group offering engineering services, IoT solutions, and digital transformation consulting. With over 2000 engineers, Telnet works with major European and North American clients.'],
            ['name' => 'Sofrecom', 'website' => 'https://www.sofrecom.com', 'about' => 'Sofrecom is an Orange Group subsidiary providing consulting and engineering services for telecom operators globally. Their Tunis office focuses on network architecture, digital services, and OSS/BSS transformation.'],
            ['name' => 'Proxym Group', 'website' => 'https://www.proxym-group.com', 'about' => 'Proxym is a Tunisian IT group delivering software development, digital transformation, and cloud services to international clients. Known for agile delivery and strong engineering culture.'],
            ['name' => 'ITS Group Tunisia', 'website' => 'https://www.its-group.com', 'about' => 'ITS Group is a French IT services company with a significant development center in Tunisia. They focus on application development, infrastructure, and digital workplace solutions.'],
            ['name' => 'Wevioo', 'website' => 'https://www.wevioo.com', 'about' => 'Wevioo is a digital transformation and consulting firm headquartered in Tunis, serving clients in Africa, Europe, and the Middle East. They specialize in data analytics, ERP, and process automation.'],
            ['name' => 'Cynapsys', 'website' => 'https://www.cynapsys.com', 'about' => 'Cynapsys is a Tunisian software and services company focused on enterprise solutions, mobile apps, and cloud computing. They partner with Oracle, Microsoft, and SAP to deliver integrated business solutions.'],
            ['name' => 'Talan Tunisia', 'website' => 'https://talan.com', 'about' => 'Talan is an international consulting and IT services group with a nearshore center in Tunis. They deliver innovation, digital transformation, and software engineering services for Fortune 500 companies.'],
            ['name' => 'BIAT (Banque Internationale Arabe de Tunisie)', 'website' => 'https://www.biat.com.tn', 'about' => 'BIAT is Tunisia\'s leading private bank, offering retail and corporate banking, investment services, and insurance. Their IT department drives digital banking innovation across Tunisia.'],
            ['name' => 'Ooredoo Tunisia', 'website' => 'https://www.ooredoo.tn', 'about' => 'Ooredoo Tunisia is a major telecom operator offering mobile, internet, and enterprise solutions. Their tech team develops innovative digital services for millions of subscribers.'],
            ['name' => 'Satoripop', 'website' => 'https://www.satoripop.com', 'about' => 'Satoripop is a Tunisian digital agency specializing in mobile applications, web development, and UI/UX design. They build products for startups and enterprises across Europe and North Africa.'],
            ['name' => 'Expensya', 'website' => 'https://www.expensya.com', 'about' => 'Expensya is a fast-growing SaaS startup from Tunisia that automates expense management for businesses. Used by over 5000 companies worldwide, they are one of Africa\'s top B2B SaaS success stories.'],
            ['name' => 'Softeo', 'website' => 'https://www.softeo.fr', 'about' => 'Softeo is an IT services company with development teams in Tunisia, delivering web, mobile, and enterprise software solutions for French and European clients.'],
            ['name' => 'Global Net', 'website' => 'https://www.globalnet.tn', 'about' => 'Global Net is one of Tunisia\'s oldest internet service providers and IT solutions companies, offering connectivity, cloud hosting, and cybersecurity services to businesses.'],
            ['name' => 'Keyrus Tunisia', 'website' => 'https://www.keyrus.com', 'about' => 'Keyrus is an international consulting firm specializing in data intelligence and digital experience. Their Tunis center delivers analytics, BI, and AI solutions for global clients.'],
        ];

        $cityIds = City::pluck('id')->toArray();
        $company = $this->faker->randomElement($companies);

        return [
            'website' => $company['website'],
            'about'   => $company['about'],
            'city_id' => $this->faker->randomElement($cityIds ?: [1]),
        ];
    }
}
