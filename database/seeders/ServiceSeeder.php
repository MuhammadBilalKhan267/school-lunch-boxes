<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Gourmet Lunch Box',
                'description' => 'Indulge in our gourmet lunch box with special treats like avocado rolls, fruit bowls, and much more to satisfy your cravings.',
                'imgUrl' => 'media/gourmetbox.jpeg',
            ],
            [
                'name' => 'Freshly Baked Bread & Breakfast',
                'description' => 'Start your day right with our freshly baked bread and homemade porridge, crafted to bring you warmth and energy.',
                'imgUrl' => 'media/bread.jpeg',
            ],
            [
                'name' => 'Hot Lunches',
                'description' => 'Enjoy a variety of hot lunches that change daily, featuring fresh, locally sourced ingredients and global flavors.',
                'imgUrl' => 'media/hotlunch.jpeg',
            ],
            [
                'name' => 'Free Pickup & Drop-off',
                'description' => 'We provide free, convenient pickup and drop-off services to ensure you never miss out on your favorite meals.',
                'imgUrl' => 'media/platter.jpeg',
            ],
            [
                'name' => 'Picnic Packages',
                'description' => 'Plan your next event with our customized picnic packages, offering a range of delicious options to suit your taste.',
                'imgUrl' => 'media/picnic.jpeg',
            ],
        ];

        DB::table('services')->insert($services);
    }
}
