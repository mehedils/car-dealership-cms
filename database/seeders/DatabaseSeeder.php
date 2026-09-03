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
            $amenities[] = Amenity::create(['name' => $name, 'icon' => 'heroicon-o-check-circle']);
        }

        $this->command->info('Seeding Cars...');
        $carImages = File::glob(public_path('assets/imgs/cars-details/*.*'));

        $brandModels = [
            'Toyota' => ['Corolla', 'RAV4', 'Camry', 'Hilux', 'Yaris'],
            'BMW' => ['Serie 3', 'Serie 5', 'X3', 'X5', 'M4'],
            'Mercedes' => ['Clase C', 'Clase E', 'GLC', 'GLA', 'Clase A'],
            'Lexus' => ['RX 350', 'NX 300', 'ES 350', 'IS 300'],
            'Honda' => ['Civic', 'CR-V', 'Accord', 'HR-V'],
            'Chevrolet' => ['Tahoe', 'Silverado', 'Onix', 'Tracker'],
            'Jaguar' => ['F-Pace', 'XE', 'XF', 'F-Type'],
            'Acura' => ['MDX', 'RDX', 'TLX', 'Integra'],
            'Bugatti' => ['Chiron', 'Veyron'],
        ];

        $cars = [];
        for ($i = 0; $i < 24; $i++) {
            $selectedBrand = $faker->randomElement($brands);
            $availableModels = $brandModels[$selectedBrand->name] ?? ['Sedan', 'SUV', 'Coupe'];
            $selectedModel = $faker->randomElement($availableModels);
            $year = $faker->numberBetween(2019, 2025);
            $name = "{$year} {$selectedBrand->name} {$selectedModel}";
            $condition = $year >= 2024 ? $faker->randomElement(['new', 'certified']) : $faker->randomElement(['used', 'certified']);
            $status = $faker->randomElement(['available', 'available', 'available', 'reserved', 'sold']);
            $price = $faker->randomElement([18500, 24900, 32500, 41000, 54000, 68000, 89000]);
            $mileage = $condition === 'new' ? $faker->numberBetween(10, 150) : $faker->numberBetween(8000, 95000);

            $car = Car::create([
                'brand_id' => $selectedBrand->id,
                'car_type_id' => $faker->randomElement($carTypes)->id,
                'fuel_type_id' => $faker->randomElement($fuelTypes)->id,
                'location_id' => $faker->randomElement($locations)->id,
                'name' => $name,
                'year' => $year,
                'model' => $selectedModel,
                'condition' => $condition,
                'status' => $status,
                'slug' => Str::slug($name . '-' . $faker->unique()->numberBetween(100, 9999)),
                'price' => $price,
                'monthly_payment' => round(($price * 0.8 * 1.12) / 48, 0),
                'rating' => $faker->randomFloat(1, 4, 5),
                'is_featured' => $faker->boolean(35),
                'mileage' => $mileage,
                'transmission' => $faker->randomElement(env('APP_LOCALE') === 'es' ? ['Automática', 'Manual'] : ['Automatic', 'Manual']),
                'seats' => $faker->randomElement([4, 5, 7]),
                'doors' => $faker->randomElement([2, 4]),
                'luggage' => '3 Bags',
                'engine_capacity' => $faker->randomElement(['1.6L Turbo', '2.0L Turbo', '2.5L I4', '3.0L V6', 'EV']),
                'included_in_price' => "Garantía de 12 meses o 20,000 km\nInspección mecánica de 150 puntos\nDocumentación en regla y verificación vigente",
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
                'icon' => 'heroicon-o-briefcase',
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

        $this->command->info('Seeding Why Us Features...');
        $features = env('APP_LOCALE') === 'es' ? [
            [
                'title' => 'Inspección Certificada',
                'description' => 'Cada vehículo pasa por una rigurosa revisión de más de 150 puntos por técnicos calificados.',
                'icon' => 'fi fi-rr-shield-check',
                'sort_order' => 0,
            ],
            [
                'title' => 'Financiamiento Flexible',
                'description' => 'Planes de crédito y arrendamiento a tu medida con tasas de interés altamente competitivas.',
                'icon' => 'fi fi-rr-badge-percent',
                'sort_order' => 1,
            ],
            [
                'title' => 'Precios Transparentes',
                'description' => 'Sin comisiones ocultas y con la mejor valuación garantizada para tomar tu auto a cuenta.',
                'icon' => 'fi fi-rr-dollar',
                'sort_order' => 2,
            ],
            [
                'title' => 'Garantía y Asistencia',
                'description' => 'Conduce con total tranquilidad gracias a nuestra garantía de agencia y soporte 24/7 en carretera.',
                'icon' => 'fi fi-rr-award',
                'sort_order' => 3,
            ],
        ] : [
            [
                'title' => 'Certified Inspection',
                'description' => 'Every vehicle undergoes a rigorous 150+ point multi-point mechanical inspection.',
                'icon' => 'fi fi-rr-shield-check',
                'sort_order' => 0,
            ],
            [
                'title' => 'Flexible Financing',
                'description' => 'Tailored financing and lease plans with low competitive rates for all credit profiles.',
                'icon' => 'fi fi-rr-badge-percent',
                'sort_order' => 1,
            ],
            [
                'title' => 'Transparent Pricing',
                'description' => 'Zero hidden fees with instant, fair-market valuation for your trade-in vehicle.',
                'icon' => 'fi fi-rr-dollar',
                'sort_order' => 2,
            ],
            [
                'title' => 'Warranty & Roadside',
                'description' => 'Drive with peace of mind backed by dealership warranty and 24/7 roadside assistance.',
                'icon' => 'fi fi-rr-award',
                'sort_order' => 3,
            ],
        ];

        foreach ($features as $feature) {
            WhyUsFeature::create($feature);
        }

        $this->command->info('Seeding Settings...');
        $defaultSettings = [
            // General
            'site_name' => 'Carento',
            'site_slogan' => 'More than 800+ special collection cars in this summer',
            'currency_symbol' => '$',

            // Inventory Header
            'inventory_hero_badge' => env('APP_LOCALE') === 'es' ? 'Inventario de Vehículos Nuevos y Usados' : 'New & Used Vehicle Inventory',
            'inventory_hero_title' => env('APP_LOCALE') === 'es' ? 'Encuentra el auto que estás buscando' : 'Find Your Perfect Car',
            'inventory_hero_subtitle' => env('APP_LOCALE') === 'es' ? 'Inventario verificado con garantía, inspección certificada y opciones de financiamiento.' : 'Verified dealership inventory with multi-point inspection and flexible financing.',
            'inventory_hero_bg_image' => null,

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
            'footer_copyright' => '© {year} {site_name}. ' . (env('APP_LOCALE') === 'es' ? 'Todos los derechos reservados.' : 'All rights reserved.'),
        ];

        foreach ($defaultSettings as $key => $val) {
            Setting::updateOrCreate(['key' => $key], ['value' => $val]);
        }

        $this->command->info('Database Seeding Completed!');
    }
}
