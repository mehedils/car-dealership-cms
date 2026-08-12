<?php

namespace Database\Seeders;

use App\Models\Amenity;
use App\Models\BlogPost;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarType;
use App\Models\Faq;
use App\Models\FuelType;
use App\Models\Inquiry;
use App\Models\Location;
use App\Models\Review;
use App\Models\Service;
use App\Models\Setting;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\WhyUsFeature;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $this->command->info('Creating Superadmin...');
        \App\Models\User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'admin',
                'password' => bcrypt('password'),
            ]
        );

        $this->command->info('Seeding Taxonomies...');

        // Brands
        $brandData = [
            'Toyota' => 'assets/imgs/page/homepage2/toyota.png',
            'BMW' => 'assets/imgs/page/homepage2/bmw.png',
            'Mercedes' => 'assets/imgs/page/homepage2/mer.png',
            'Lexus' => 'assets/imgs/page/homepage2/lexus.png',
            'Honda' => 'assets/imgs/page/homepage2/honda.png',
            'Chevrolet' => 'assets/imgs/page/homepage2/chevrolet.png',
            'Jaguar' => 'assets/imgs/page/homepage2/jaguar.png',
            'Acura' => 'assets/imgs/page/homepage2/acura.png',
            'Bugatti' => 'assets/imgs/page/homepage2/bugatti.png',
        ];
        $brands = [];
        foreach ($brandData as $name => $logo) {
            $brands[] = Brand::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'logo' => $logo,
            ]);
        }

        // Car Types
        $typeFiles = File::glob(public_path('assets/imgs/categories/*.*'));
        $carTypes = [];
        $typeNames = env('APP_LOCALE') === 'es' 
            ? ['SUV', 'Sedán', 'Hatchback', 'Cupé', 'Convertible', 'Pick-up'] 
            : ['SUV', 'Sedan', 'Hatchback', 'Coupe', 'Convertible', 'Pickup'];
        foreach ($typeNames as $i => $name) {
            $image = isset($typeFiles[$i]) ? 'assets/imgs/categories/' . basename($typeFiles[$i]) : null;
            $carTypes[] = CarType::create(['name' => $name, 'slug' => Str::slug($name), 'image' => $image]);
        }

        // Fuel Types
        $fuelTypes = [];
        $fuelNames = env('APP_LOCALE') === 'es'
            ? ['Gasolina', 'Diésel', 'Eléctrico', 'Híbrido']
            : ['Petrol', 'Diesel', 'Electric', 'Hybrid'];
        foreach ($fuelNames as $name) {
            $fuelTypes[] = FuelType::create(['name' => $name, 'slug' => Str::slug($name)]);
        }

        // Locations
        $locations = [];
        $locationNames = env('APP_LOCALE') === 'es'
            ? ['Ciudad de México', 'Guadalajara', 'Monterrey', 'Cancún', 'Puebla']
            : ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Miami'];
        foreach ($locationNames as $name) {
            $locations[] = Location::create(['name' => $name, 'address' => $faker->address]);
        }

        // Amenities
        $amenities = [];
        $amenityNames = env('APP_LOCALE') === 'es'
            ? ['Bluetooth', 'Cámara de Reversa', 'Navegación GPS', 'Asientos de Piel', 'Quemacocos', 'Asientos Calefaccionados', 'Apple CarPlay']
            : ['Bluetooth', 'Backup Camera', 'Navigation', 'Leather Seats', 'Sunroof', 'Heated Seats', 'Apple CarPlay'];
        foreach ($amenityNames as $name) {
            $amenities[] = Amenity::create(['name' => $name, 'icon' => 'check-circle']);
        }

        $this->command->info('Seeding Cars...');
        $carImages = File::glob(public_path('assets/imgs/cars-details/*.*'));

        $cars = [];
        for ($i = 0; $i < 20; $i++) {
            $car = Car::create([
                'brand_id' => $faker->randomElement($brands)->id,
                'car_type_id' => $faker->randomElement($carTypes)->id,
                'fuel_type_id' => $faker->randomElement($fuelTypes)->id,
                'location_id' => $faker->randomElement($locations)->id,
                'name' => $faker->company . ' ' . $faker->word,
                'slug' => $faker->unique()->slug,
                'price' => $faker->randomElement([25000, 35000, 45000, 55000, 65000]),
                'rating' => $faker->randomFloat(1, 4, 5),
                'is_featured' => $faker->boolean(30),
                'mileage' => $faker->numberBetween(10, 50) . 'k km',
                'transmission' => $faker->randomElement(env('APP_LOCALE') === 'es' ? ['Automático', 'Manual'] : ['Automatic', 'Manual']),
                'seats' => $faker->randomElement([2, 4, 5, 7]),
                'doors' => $faker->randomElement([2, 4]),
                'luggage' => $faker->randomElement(['2 Bags', '3 Bags', '4 Bags']),
                'engine_capacity' => $faker->randomElement(['1.6L', '2.0L', '3.0L', 'EV']),
                'included_in_price' => "Free cancellation up to 48 hours\nUnlimited Mileage\nInsurance Included",
                'description' => $faker->paragraphs(3, true),
            ]);

            // Attach 3-5 random amenities
            $car->amenities()->attach($faker->randomElements(collect($amenities)->pluck('id')->toArray(), rand(3, 5)));
            
            // Attach Spatie Media Images
            if (!empty($carImages)) {
                $imagesToAttach = $faker->randomElements($carImages, min(3, count($carImages)));
                foreach ($imagesToAttach as $imgPath) {
                    $car->addMedia($imgPath)->preservingOriginal()->toMediaCollection('gallery');
                }
            }

            $cars[] = $car;
        }

        $this->command->info('Seeding Interactions...');
        foreach ($cars as $car) {
            // Inquiries
            for ($j = 0; $j < rand(0, 3); $j++) {
                Inquiry::create([
                    'car_id' => $car->id,
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'phone' => $faker->phoneNumber,
                    'message' => $faker->sentence,
                    'status' => $faker->randomElement(['pending', 'read', 'replied']),
                ]);
            }
            // Reviews
            for ($j = 0; $j < rand(1, 4); $j++) {
                Review::create([
                    'car_id' => $car->id,
                    'user_name' => $faker->name,
                    'user_email' => $faker->email,
                    'rating' => $faker->numberBetween(4, 5),
                    'comment' => $faker->paragraph,
                    'is_approved' => true,
                ]);
            }
        }

        $this->command->info('Seeding Content...');
        $serviceFiles = File::glob(public_path('assets/imgs/services/*.*'));
        for ($i = 0; $i < 4; $i++) {
            $image = isset($serviceFiles[$i]) ? 'assets/imgs/services/' . basename($serviceFiles[$i]) : null;
            Service::create([
                'title' => $faker->words(3, true),
                'slug' => $faker->unique()->slug,
                'description' => $faker->paragraph,
                'image' => $image,
                'icon' => 'briefcase',
                'is_active' => true,
            ]);
        }

        $testFiles = File::glob(public_path('assets/imgs/testimonials/*.*'));
        for ($i = 0; $i < 5; $i++) {
            $avatar = isset($testFiles[$i]) ? 'assets/imgs/testimonials/' . basename($testFiles[$i]) : null;
            Testimonial::create([
                'author_name' => $faker->name,
                'author_role' => $faker->jobTitle,
                'author_avatar' => $avatar,
                'content' => $faker->paragraph,
                'rating' => 5,
            ]);
        }

        $blogFiles = File::glob(public_path('assets/imgs/blog/*.*'));
        for ($i = 0; $i < 6; $i++) {
            $image = isset($blogFiles[$i]) ? 'assets/imgs/blog/' . basename($blogFiles[$i]) : null;
            BlogPost::create([
                'title' => $faker->sentence,
                'slug' => $faker->unique()->slug,
                'excerpt' => $faker->paragraph,
                'content' => $faker->paragraphs(4, true),
                'image' => $image,
                'author_name' => $faker->name,
                'published_at' => now()->subDays(rand(1, 30)),
            ]);
        }

        for ($i = 0; $i < 6; $i++) {
            Faq::create([
                'question' => $faker->sentence . '?',
                'answer' => $faker->paragraph,
                'sort_order' => $i,
            ]);
        }

        $teamFiles = File::glob(public_path('assets/imgs/team/*.*'));
        for ($i = 0; $i < 4; $i++) {
            $photo = isset($teamFiles[$i]) ? 'assets/imgs/team/' . basename($teamFiles[$i]) : null;
            TeamMember::create([
                'name' => $faker->name,
                'role' => $faker->jobTitle,
                'title' => $faker->word,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'photo_path' => $photo,
                'bio' => $faker->paragraph,
            ]);
        }

        for ($i = 0; $i < 4; $i++) {
            WhyUsFeature::create([
                'title' => $faker->words(3, true),
                'description' => $faker->sentence,
                'icon' => 'star',
                'sort_order' => $i,
            ]);
        }

        $this->command->info('Seeding Settings...');
        $defaultSettings = [
            // General
            'site_name' => 'Carento',
            'site_slogan' => 'More than 800+ special collection cars in this summer',
            'currency_symbol' => '$',

            // Contact
            'contact_email' => 'sale@carento.com',
            'contact_phone' => '+1 222-555-33-99',
            'contact_address' => '750 7th Avenue, Manhattan, New York, NY 10019, USA',
            'google_map_embed' => 'https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d283661.3575233618!2d2.2296777857951824!3d47.16509219592609!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1712486491620!5m2!1svi!2s',

            // Socials
            'social_facebook' => 'https://facebook.com',
            'social_twitter' => 'https://twitter.com',
            'social_instagram' => 'https://instagram.com',
            'social_behance' => 'https://behance.net',

            // Theme Colors
            'primary_color' => '#70f46d',
            'primary_hover_color' => '#5edd5b',
            'secondary_color' => '#8acfff',
            'accent_color' => '#f15d44',
            'button_text_color' => '#101010',
            'button_hover_text_color' => '#000000',
            'header_bg_color' => '#101010',
            'footer_bg_color' => '#101010',
            'heading_color' => '#000000',

            // Footer
            'footer_copyright' => env('APP_LOCALE') === 'es' ? '© ' . date('Y') . ' Carento. Todos los derechos reservados.' : '© ' . date('Y') . ' Carento. All rights reserved.',
        ];

        foreach ($defaultSettings as $key => $val) {
            Setting::updateOrCreate(['key' => $key], ['value' => $val]);
        }

        $this->command->info('Database Seeding Completed!');
    }
}
