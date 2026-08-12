<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageHomepageSettings extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return __('Content');
    }

    public static function getNavigationLabel(): string
    {
        return __('Home Editor');
    }

    public function getTitle(): string
    {
        return __('Home Editor');
    }

    protected static string $view = 'filament.pages.manage-homepage-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        // Convert string boolean values if stored as string
        $visibilityKeys = [
            'home_show_hero', 'home_show_search', 'home_show_brands',
            'home_show_featured', 'home_show_cta', 'home_show_categories',
            'home_show_why_us', 'home_show_latest', 'home_show_services',
            'home_show_testimonials', 'home_show_blog',
        ];

        foreach ($visibilityKeys as $key) {
            if (!isset($settings[$key])) {
                $settings[$key] = true;
            } else {
                $settings[$key] = filter_var($settings[$key], FILTER_VALIDATE_BOOLEAN);
            }
        }

        $this->form->fill($settings);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Homepage Settings')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Section Visibility')
                            ->icon('heroicon-o-eye')
                            ->schema([
                                Forms\Components\Section::make('Enable / Disable Homepage Sections')
                                    ->description('Toggle which sections appear on the main website homepage.')
                                    ->schema([
                                        Forms\Components\Grid::make(3)->schema([
                                            Forms\Components\Toggle::make('home_show_hero')
                                                ->label('Hero Banner Section')
                                                ->default(true),
                                            Forms\Components\Toggle::make('home_show_search')
                                                ->label('Search / Callback Form')
                                                ->default(true),
                                            Forms\Components\Toggle::make('home_show_brands')
                                                ->label('Brands Showcase Section')
                                                ->default(true),
                                            Forms\Components\Toggle::make('home_show_featured')
                                                ->label('Featured Vehicles Section')
                                                ->default(true),
                                            Forms\Components\Toggle::make('home_show_cta')
                                                ->label('CTA Promo Banner Section')
                                                ->default(true),
                                            Forms\Components\Toggle::make('home_show_categories')
                                                ->label('Car Categories Section')
                                                ->default(true),
                                            Forms\Components\Toggle::make('home_show_why_us')
                                                ->label('Why Choose Us Section')
                                                ->default(true),
                                            Forms\Components\Toggle::make('home_show_latest')
                                                ->label('Latest Arrivals Section')
                                                ->default(true),
                                            Forms\Components\Toggle::make('home_show_services')
                                                ->label('Services Section')
                                                ->default(true),
                                            Forms\Components\Toggle::make('home_show_testimonials')
                                                ->label('Testimonials Section')
                                                ->default(true),
                                            Forms\Components\Toggle::make('home_show_blog')
                                                ->label('Blog / News Section')
                                                ->default(true),
                                        ]),
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Hero Section')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Forms\Components\FileUpload::make('home_hero_bg_image')
                                    ->label('Hero Background Image')
                                    ->image()
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->hint('Optimal size: 3838×1784 px or 1920×892 px (~2.15:1 Aspect Ratio)')
                                    ->hintIcon('heroicon-m-information-circle')
                                    ->helperText('Upload a high-resolution banner image for the homepage hero section. Displayed with 0.6 opacity dark overlay.'),
                                Forms\Components\TextInput::make('home_hero_tagline')
                                    ->label('Hero Small Tagline')
                                    ->placeholder('e.g. Find Your Perfect Car'),
                                Forms\Components\Textarea::make('home_hero_title')
                                    ->label('Hero Main Title')
                                    ->rows(2)
                                    ->placeholder('e.g. Looking for a vehicle? You’re in the perfect spot.'),
                                Forms\Components\Grid::make(3)->schema([
                                    Forms\Components\TextInput::make('home_hero_bullet_1')
                                        ->label('Bullet Point 1')
                                        ->placeholder('e.g. High quality at a low cost.'),
                                    Forms\Components\TextInput::make('home_hero_bullet_2')
                                        ->label('Bullet Point 2')
                                        ->placeholder('e.g. Premium services'),
                                    Forms\Components\TextInput::make('home_hero_bullet_3')
                                        ->label('Bullet Point 3')
                                        ->placeholder('e.g. 24/7 roadside support.'),
                                ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Featured Vehicles')
                            ->icon('heroicon-o-truck')
                            ->schema([
                                Forms\Components\TextInput::make('home_featured_title')
                                    ->label('Section Title')
                                    ->placeholder('e.g. Featured Vehicles'),
                                Forms\Components\TextInput::make('home_featured_subtitle')
                                    ->label('Section Subtitle')
                                    ->placeholder('e.g. Explore our hand-picked premium selection'),
                            ]),

                        Forms\Components\Tabs\Tab::make('CTA Banner')
                            ->icon('heroicon-o-megaphone')
                            ->schema([
                                Forms\Components\TextInput::make('home_cta_badge')
                                    ->label('Badge Label')
                                    ->placeholder('e.g. Best Car Rental System'),
                                Forms\Components\TextInput::make('home_cta_title')
                                    ->label('Banner Heading')
                                    ->placeholder('e.g. Receive a Competitive Offer Sell Your Car to Us Today.'),
                                Forms\Components\Textarea::make('home_cta_description')
                                    ->label('Description Copy')
                                    ->rows(3),
                                Forms\Components\TextInput::make('home_cta_video_url')
                                    ->label('Video Popup URL')
                                    ->placeholder('e.g. https://www.youtube.com/watch?v=AOg61RB75Ho'),
                                Forms\Components\FileUpload::make('home_cta_image')
                                    ->label('Banner Media / Video Image')
                                    ->image()
                                    ->directory('settings')
                                    ->preserveFilenames(),
                                Forms\Components\Section::make('Feature Bullet List')->schema([
                                    Forms\Components\Grid::make(2)->schema([
                                        Forms\Components\TextInput::make('home_cta_bullet_1')->label('Feature 1')->placeholder('e.g. Expert Certified Mechanics'),
                                        Forms\Components\TextInput::make('home_cta_bullet_2')->label('Feature 2')->placeholder('e.g. Get Reasonable Price'),
                                        Forms\Components\TextInput::make('home_cta_bullet_3')->label('Feature 3')->placeholder('e.g. Genuine Spares Parts'),
                                        Forms\Components\TextInput::make('home_cta_bullet_4')->label('Feature 4')->placeholder('e.g. First Class Services'),
                                        Forms\Components\TextInput::make('home_cta_bullet_5')->label('Feature 5')->placeholder('e.g. 24/7 road assistance'),
                                        Forms\Components\TextInput::make('home_cta_bullet_6')->label('Feature 6')->placeholder('e.g. Free Pick-Up & Drop-Offs'),
                                    ]),
                                ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Categories')
                            ->icon('heroicon-o-rectangle-stack')
                            ->schema([
                                Forms\Components\TextInput::make('home_categories_title')
                                    ->label('Section Title')
                                    ->placeholder('e.g. Browse by Type'),
                                Forms\Components\TextInput::make('home_categories_subtitle')
                                    ->label('Section Subtitle')
                                    ->placeholder('e.g. Find the perfect ride for any occasion'),
                            ]),

                        Forms\Components\Tabs\Tab::make('Why Choose Us')
                            ->icon('heroicon-o-star')
                            ->schema([
                                Forms\Components\TextInput::make('home_why_us_subtitle')
                                    ->label('Badge / Subtitle')
                                    ->placeholder('e.g. WHY CHOOSE US'),
                                Forms\Components\TextInput::make('home_why_us_title')
                                    ->label('Main Title')
                                    ->placeholder('e.g. Presenting Your Premier Car Dealership Experience'),
                            ]),

                        Forms\Components\Tabs\Tab::make('Latest Arrivals')
                            ->icon('heroicon-o-clock')
                            ->schema([
                                Forms\Components\TextInput::make('home_latest_title')
                                    ->label('Section Title')
                                    ->placeholder('e.g. Latest Arrivals'),
                                Forms\Components\TextInput::make('home_latest_subtitle')
                                    ->label('Section Subtitle')
                                    ->placeholder('e.g. Check out the newest additions to our inventory'),
                            ]),

                        Forms\Components\Tabs\Tab::make('Services & Reviews')
                            ->icon('heroicon-o-wrench-screwdriver')
                            ->schema([
                                Forms\Components\TextInput::make('home_services_title')
                                    ->label('Services Title')
                                    ->placeholder('e.g. Our Services'),
                                Forms\Components\TextInput::make('home_services_subtitle')
                                    ->label('Services Subtitle')
                                    ->placeholder('e.g. Serving You with Quality, Comfort, and Convenience'),
                                Forms\Components\TextInput::make('home_testimonials_subtitle')
                                    ->label('Testimonials Badge')
                                    ->placeholder('e.g. Testimonials'),
                                Forms\Components\TextInput::make('home_testimonials_title')
                                    ->label('Testimonials Title')
                                    ->placeholder('e.g. What they say about us?'),
                            ]),

                        Forms\Components\Tabs\Tab::make('Blog & News')
                            ->icon('heroicon-o-newspaper')
                            ->schema([
                                Forms\Components\TextInput::make('home_blog_title')
                                    ->label('Section Title')
                                    ->placeholder('e.g. Latest News & Articles'),
                                Forms\Components\TextInput::make('home_blog_subtitle')
                                    ->label('Section Subtitle')
                                    ->placeholder('e.g. Stay updated with our latest stories and automotive insights'),
                                Forms\Components\TextInput::make('home_blog_button_text')
                                    ->label('Button Text')
                                    ->placeholder('e.g. View All Posts'),
                            ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            $valToSave = is_bool($value) ? ($value ? '1' : '0') : (is_array($value) ? json_encode($value) : $value);
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $valToSave]
            );
        }

        Notification::make()
            ->title('Homepage settings saved successfully!')
            ->success()
            ->send();
    }
}
