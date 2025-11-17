<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use App\Models\MenuLocation;
use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        MenuLocation::truncate();
        MenuItem::truncate();
        Page::truncate();
        Schema::enableForeignKeyConstraints();

        // Insert pages
        $pages = [
            ['id' => 1, 'title' => 'Home', 'slug' => 'home', 'template' => 'home'],
            ['id' => 2, 'title' => 'About Us', 'slug' => 'about-us', 'template' => 'about'],
            ['id' => 3, 'title' => 'Cab Services', 'slug' => 'cab-services', 'template' => 'services'],
            ['id' => 4, 'title' => 'Sightseeing Tour', 'slug' => 'sightseeing-tour', 'template' => 'sightseeing_tour'],
            ['id' => 5, 'title' => 'Customized Tour', 'slug' => 'customized-tour', 'template' => 'customized_tour'],
            ['id' => 6, 'title' => 'Day Tour', 'slug' => 'day-tour', 'template' => 'day_tour'],
            ['id' => 7, 'title' => 'Contact Us', 'slug' => 'contact-us', 'template' => 'contact_us'],
            ['id' => 8, 'title' => 'Studio', 'slug' => 'studio', 'template' => 'studio'],
            ['id' => 9, 'title' => 'Privacy Policy', 'slug' => 'privacy-policy', 'template' => 'page'],
            ['id' => 10, 'title' => 'Terms & Conditions', 'slug' => 'terms-and-conditions', 'template' => 'page'],
            ['id' => 11, 'title' => 'Disclaimer', 'slug' => 'disclaimer', 'template' => 'page'],
        ];

        Page::insert($pages);

        /*

        // Insert menu locations
        $locations = [
            ['id' => 1, 'name' => 'Header'],
            ['id' => 2, 'name' => 'Footer 1'],
            ['id' => 3, 'name' => 'Footer 2'],
        ];

        MenuLocation::insert($locations);

        // Header Menu
        $menuItems = [
            [
                'label' => 'Home',
                'page_id' => 1,
                'menu_location_id' => 1
            ],
            [
                'label' => 'About',
                'page_id' => 2,
                'menu_location_id' => 1
            ],
            [
                'label' => 'Telivision',
                'page_id' => 6,
                'menu_location_id' => 1
            ],
            [
                'label' => 'VFX',
                'page_id' => 7,
                'menu_location_id' => 1
            ],
            [
                'label' => 'Studio',
                'page_id' => 8,
                'menu_location_id' => 1
            ],
            [
                'label' => 'Syndication',
                'page_id' => 9,
                'menu_location_id' => 1
            ],
            [
                'label' => 'Career',
                'page_id' => 12,
                'menu_location_id' => 1
            ],
            [
                'label' => 'Contact',
                'page_id' => 3,
                'menu_location_id' => 1
            ],
        ];

        MenuItem::insert($menuItems);

        // Footer Menu 1
        $menuItems = [
            [
                'label' => 'Telivision',
                'page_id' => 6,
                'menu_location_id' => 2
            ],
            [
                'label' => 'VFX',
                'page_id' => 7,
                'menu_location_id' => 2
            ],
            [
                'label' => 'Studio',
                'page_id' => 8,
                'menu_location_id' => 2
            ],
            [
                'label' => 'Syndication',
                'page_id' => 9,
                'menu_location_id' => 2
            ],
            [
                'label' => 'News',
                'page_id' => 5,
                'menu_location_id' => 2
            ],
            [
                'label' => 'Career',
                'page_id' => 12,
                'menu_location_id' => 2
            ],
        ];

        MenuItem::insert($menuItems);

        // Footer Menu 2
        $menuItems = [
            [
                'label' => 'About Us',
                'page_id' => 2,
                'menu_location_id' => 3
            ],
            [
                'label' => 'Contact Us',
                'page_id' => 3,
                'menu_location_id' => 3
            ],
            [
                'label' => 'FAQs',
                'page_id' => 4,
                'menu_location_id' => 3
            ],
            [
                'label' => 'Privacy Policy',
                'page_id' => 10,
                'menu_location_id' => 3
            ],
            [
                'label' => 'Terms & Conditions',
                'page_id' => 11,
                'menu_location_id' => 3
            ],
        ];

        MenuItem::insert($menuItems);

        */
    }
}
