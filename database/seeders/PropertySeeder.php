<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    public function run()
    {
        $properties = [
            [
                'title' => 'Property 1',
                'description' => 'Description of Property 1',
                'price' => 100000.00,
                'location' => 'New York, USA',
                'image' => 'img1.jpg',
            ],
            [
                'title' => 'Property 2',
                'description' => 'Description of Property 2',
                'price' => 200000.00,
                'location' => 'London, UK',
                'image' => 'img2.jpg',
            ],
            [
                'title' => 'Property 3',
                'description' => 'Description of Property 3',
                'price' => 200000.00,
                'location' => 'Paris, France',
                'image' => 'img3.jpg',
            ],
            [
                'title' => 'Property 4',
                'description' => 'Description of Property 4',
                'price' => 200000.00,
                'location' => 'Tokyo, Japan',
                'image' => 'img4.jpg',
            ],
            [
                'title' => 'Property 5',
                'description' => 'Description of Property 5',
                'price' => 300000.00,
                'location' => 'Sydney, Australia',
                'image' => 'img5.jpg',
            ],
            [
                'title' => 'Property 6',
                'description' => 'Description of Property 6',
                'price' => 250000.00,
                'location' => 'Toronto, Canada',
                'image' => 'img6.jpg',
            ],
            [
                'title' => 'Property 7',
                'description' => 'Description of Property 7',
                'price' => 180000.00,
                'location' => 'Dubai, UAE',
                'image' => 'img7.jpg',
            ],
            [
                'title' => 'Property 8',
                'description' => 'Description of Property 8',
                'price' => 220000.00,
                'location' => 'Mumbai, India',
                'image' => 'img8.jpg',
            ],
            [
                'title' => 'Property 9',
                'description' => 'Description of Property 9',
                'price' => 210000.00,
                'location' => 'Rio de Janeiro, Brazil',
                'image' => 'img9.jpg',
            ],
            [
                'title' => 'Property 10',
                'description' => 'Description of Property 10',
                'price' => 190000.00,
                'location' => 'Cape Town, South Africa',
                'image' => 'img10.jpg',
            ],
            [
                'title' => 'Property 11',
                'description' => 'Description of Property 11',
                'price' => 230000.00,
                'location' => 'Rome, Italy',
                'image' => 'img11.jpg',
            ],
            [
                'title' => 'Property 12',
                'description' => 'Description of Property 12',
                'price' => 240000.00,
                'location' => 'Berlin, Germany',
                'image' => 'img12.jpg',
            ],
            [
                'title' => 'Property 13',
                'description' => 'Description of Property 13',
                'price' => 300000.00,
                'location' => 'Barcelona, Spain',
                'image' => 'img13.jpg',
            ],
            [
                'title' => 'Property 14',
                'description' => 'Description of Property 14',
                'price' => 180000.00,
                'location' => 'Moscow, Russia',
                'image' => 'img14.jpg',
            ],
            [
                'title' => 'Property 15',
                'description' => 'Description of Property 15',
                'price' => 210000.00,
                'location' => 'Seoul, South Korea',
                'image' => 'img15.jpg',
            ],
            [
                'title' => 'Property 16',
                'description' => 'Description of Property 16',
                'price' => 190000.00,
                'location' => 'Beijing, China',
                'image' => 'img16.jpg',
            ],
            [
                'title' => 'Property 17',
                'description' => 'Description of Property 17',
                'price' => 220000.00,
                'location' => 'Istanbul, Turkey',
                'image' => 'img17.jpg',
            ],
            [
                'title' => 'Property 18',
                'description' => 'Description of Property 18',
                'price' => 250000.00,
                'location' => 'Amsterdam, Netherlands',
                'image' => 'img18.jpg',
            ],
            [
                'title' => 'Property 19',
                'description' => 'Description of Property 19',
                'price' => 300000.00,
                'location' => 'Stockholm, Sweden',
                'image' => 'img19.jpg',
            ],
            [
                'title' => 'Property 20',
                'description' => 'Description of Property 20',
                'price' => 210000.00,
                'location' => 'Cairo, Egypt',
                'image' => 'img20.jpg',
            ],
            [
                'title' => 'Property 21',
                'description' => 'Description of Property 21',
                'price' => 230000.00,
                'location' => 'Mexico City, Mexico',
                'image' => 'img21.jpg',
            ],
            [
                'title' => 'Property 22',
                'description' => 'Description of Property 22',
                'price' => 240000.00,
                'location' => 'Bangkok, Thailand',
                'image' => 'img22.jpg',
            ],
            [
                'title' => 'Property 23',
                'description' => 'Description of Property 23',
                'price' => 180000.00,
                'location' => 'Auckland, New Zealand',
                'image' => 'img23.jpg',
            ],
        ];
        

        foreach ($properties as $property) {
            $imagePath = 'images/'.$property['image'];
            $storedImagePath = Storage::disk('public')->putFile('images', public_path($imagePath));

            Property::create([
                'title' => $property['title'],
                'description' => $property['description'],
                'price' => $property['price'],
                'location' => $property['location'],
                'image' => $storedImagePath,
            ]);
        }
    }
}



