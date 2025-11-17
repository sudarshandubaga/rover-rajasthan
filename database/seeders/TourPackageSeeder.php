<?php

namespace Database\Seeders;

use App\Models\TourPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tours = [
            [
                'slug' => 'jaipur',
                'name' => 'Jaipur Sightseeing',
                'type' => 'sightseeing',
                'description' => "Explore the Pink City's majestic forts and palaces.",
                'image_url' => 'https://picsum.photos/seed/jaipur-palace/600/400',
                'price' => '$50',
                'duration' => 'Full Day',
                'long_description' => "Immerse yourself in the royal heritage of Jaipur, the Pink City. This full-day tour covers the magnificent Amber Fort, the stunning Hawa Mahal, the City Palace complex, and the Jantar Mantar observatory.",
                'gallery' => [
                    'https://picsum.photos/seed/jaipur-amber-fort/800/600',
                    'https://picsum.photos/seed/jaipur-hawa-mahal/800/600',
                    'https://picsum.photos/seed/jaipur-city-palace/800/600',
                    'https://picsum.photos/seed/jaipur-market/800/600',
                ],
                'inclusions' => [
                    'Private air-conditioned vehicle',
                    'Professional tour guide',
                    'Entry fees to all monuments',
                    'Bottled water'
                ],
                'exclusions' => [
                    'Meals and beverages',
                    'Personal expenses',
                    'Gratuities'
                ],
                'itinerary' => [
                    ['day' => 'Morning', 'description' => 'Pick-up from hotel and visit Amber Fort.'],
                    ['day' => 'Afternoon', 'description' => 'Visit Hawa Mahal, City Palace, and Jantar Mantar.'],
                    ['day' => 'Evening', 'description' => 'Explore local markets and return to hotel.']
                ]
            ],
            [
                'slug' => 'udaipur',
                'name' => 'Udaipur Sightseeing',
                'type' => 'sightseeing',
                'description' => 'Discover the romantic City of Lakes and its stunning architecture.',
                'image_url' => 'https://picsum.photos/seed/udaipur-lake/600/400',
                'price' => '$60',
                'duration' => 'Full Day',
                'long_description' => "Experience the romance of Udaipur, the City of Lakes. Visit the City Palace, take a serene boat ride on Lake Pichola, explore Jagdish Temple, and enjoy the beautiful Saheliyon-ki-Bari gardens.",
                'gallery' => [
                    'https://picsum.photos/seed/udaipur-pichola/800/600',
                    'https://picsum.photos/seed/udaipur-jagdish-temple/800/600',
                    'https://picsum.photos/seed/udaipur-saheliyon-ki-bari/800/600',
                    'https://picsum.photos/seed/udaipur-boat-ride/800/600',
                ],
                'inclusions' => [
                    'Private vehicle',
                    'Licensed guide',
                    'Boat ride on Lake Pichola',
                    'All monument entry fees'
                ],
                'exclusions' => [
                    'Lunch',
                    'Camera fees',
                    'Tips and gratuities'
                ],
                'itinerary' => [
                    ['day' => '9:00 AM', 'description' => 'Pickup and City Palace visit.'],
                    ['day' => '1:00 PM', 'description' => 'Lunch break (at own expense).'],
                    ['day' => '2:30 PM', 'description' => 'Boat ride and Jag Mandir visit.'],
                    ['day' => '5:00 PM', 'description' => 'Return to hotel.']
                ]
            ],
            [
                'slug' => 'bikaner',
                'name' => 'Bikaner Sightseeing',
                'type' => 'sightseeing',
                'description' => 'Experience the desert charm and rich history of Bikaner.',
                'image_url' => 'https://picsum.photos/seed/bikaner-desert/600/400',
                'price' => '$45',
            ],
            [
                'slug' => 'agra',
                'name' => 'Agra Sightseeing',
                'type' => 'sightseeing',
                'description' => 'Witness the timeless beauty of the Taj Mahal and other Mughal wonders.',
                'image_url' => 'https://picsum.photos/seed/taj-mahal-agra/600/400',
                'price' => '$55',
            ],
            [
                'slug' => 'delhi',
                'name' => 'Delhi Sightseeing',
                'type' => 'sightseeing',
                'description' => "Journey through the vibrant history and culture of India's capital.",
                'image_url' => 'https://picsum.photos/seed/delhi-india-gate/600/400',
                'price' => '$65',
            ],
            [
                'slug' => 'halfday',
                'name' => 'Jodhpur Half Day Tour',
                'type' => 'daytour',
                'description' => "A quick yet comprehensive tour of Jodhpur's main attractions.",
                'image_url' => 'https://picsum.photos/seed/jodhpur-fort-day/600/400',
                'price' => '$30',
                'duration' => '4-5 Hours',
                'long_description' => 'Perfect for travelers with limited time, this half-day tour covers Mehrangarh Fort and Jaswant Thada.',
                'gallery' => [
                    'https://picsum.photos/seed/jodhpur-mehrangarh/800/600',
                    'https://picsum.photos/seed/jodhpur-jaswant-thada/800/600',
                    'https://picsum.photos/seed/jodhpur-blue-houses/800/600'
                ],
                'inclusions' => [
                    'Air-conditioned transport',
                    'English-speaking guide',
                    'All taxes and service charges'
                ],
                'exclusions' => [
                    'Entrance fees to monuments',
                    'Food and drinks',
                    'Tips'
                ],
                'itinerary' => [
                    ['day' => 'Stop 1', 'description' => 'Pickup and proceed to Mehrangarh Fort.'],
                    ['day' => 'Stop 2', 'description' => 'Explore the fort for 2-3 hours.'],
                    ['day' => 'Stop 3', 'description' => 'Visit Jaswant Thada memorial.'],
                    ['day' => 'Stop 4', 'description' => 'Drop-off at hotel.']
                ]
            ],
            [
                'slug' => 'fullday',
                'name' => 'Jodhpur Full Day Tour',
                'type' => 'daytour',
                'description' => 'Immerse yourself in the Blue City with a full day of exploration.',
                'image_url' => 'https://picsum.photos/seed/jodhpur-blue-city/600/400',
                'price' => '$50',
            ],
            [
                'slug' => '2days',
                'name' => 'Jodhpur 2 Days Tour',
                'type' => 'daytour',
                'description' => "An in-depth experience of Jodhpur's culture, food, and sights.",
                'image_url' => 'https://picsum.photos/seed/jodhpur-market-night/600/400',
                'price' => '$90',
            ],
        ];

        foreach ($tours as $tour) {
            TourPackage::create($tour);
        }
    }
}
