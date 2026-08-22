<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageSettings extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return __('Settings');
    }

    public static function getNavigationLabel(): string
    {
        return __('Site Settings');
    }

    public function getTitle(): string
    {
        return __('Site Settings');
    }

    protected static string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        if (isset($settings['topbar_announcements']) && is_string($settings['topbar_announcements'])) {
            $decoded = json_decode($settings['topbar_announcements'], true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $settings['topbar_announcements'] = $decoded;
            }
        }
        $this->form->fill($settings);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make(__('Settings'))
                    ->tabs([
                        Forms\Components\Tabs\Tab::make(__('Logo & Branding'))
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Forms\Components\FileUpload::make('site_logo_dark')
                                    ->label(__('Dark Logo (For Light Backgrounds)'))
                                    ->image()
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->hint(__('Optimal size: 200×50 px (4:1 Ratio)'))
                                    ->hintIcon('heroicon-m-information-circle')
                                    ->helperText(__('Recommended: PNG or SVG with transparent background. Display height capped at 40px.')),
                                Forms\Components\FileUpload::make('site_logo_light')
                                    ->label(__('White / Light Logo (For Dark Backgrounds)'))
                                    ->image()
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->hint(__('Optimal size: 200×50 px (4:1 Ratio)'))
                                    ->hintIcon('heroicon-m-information-circle')
                                    ->helperText(__('Recommended: White PNG or SVG for dark header/footer. Display height capped at 40px.')),
                                Forms\Components\FileUpload::make('site_favicon')
                                    ->label(__('Favicon Icon'))
                                    ->image()
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->hint(__('Optimal size: 32×32 px or 64×64 px (1:1 Ratio)'))
                                    ->hintIcon('heroicon-m-information-circle')
                                    ->helperText(__('Square icon displayed in browser tabs (PNG, ICO, or SVG).')),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('Inventory Page'))
                            ->icon('heroicon-o-truck')
                            ->schema([
                                Forms\Components\FileUpload::make('inventory_hero_bg_image')
                                    ->label(__('Hero Background Banner Image'))
                                    ->image()
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->helperText(__('Custom background banner for the /cars inventory page. Leave empty to use default showroom graphic.')),
                                Forms\Components\TextInput::make('inventory_hero_badge')
                                    ->label(__('Hero Badge Tag'))
                                    ->placeholder(__('e.g. Inventario de Vehículos Nuevos y Usados')),
                                Forms\Components\TextInput::make('inventory_hero_title')
                                    ->label(__('Hero Title'))
                                    ->placeholder(__('e.g. Encuentra el auto que estás buscando')),
                                Forms\Components\Textarea::make('inventory_hero_subtitle')
                                    ->label(__('Hero Subtitle Copy'))
                                    ->rows(2)
                                    ->placeholder(__('e.g. Inventario verificado con garantía, inspección certificada y opciones de financiamiento.')),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('General'))
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\TextInput::make('site_name')
                                    ->label(__('Site Name'))
                                    ->required(),
                                Forms\Components\TextInput::make('site_slogan')
                                    ->label(__('Default Site Slogan / Fallback Announcement')),
                                Forms\Components\TextInput::make('currency_symbol')
                                    ->label(__('Currency Symbol'))
                                    ->default('$')
                                    ->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('Topbar Announcements'))
                            ->icon('heroicon-o-megaphone')
                            ->schema([
                                Forms\Components\Repeater::make('topbar_announcements')
                                    ->label(__('Announcement Messages'))
                                    ->helperText(__('Add multiple promotional messages, discounts, or announcements to rotate in the header topbar.'))
                                    ->schema([
                                        Forms\Components\TextInput::make('text')
                                            ->label(__('Announcement Text'))
                                            ->placeholder(__('e.g. More than 800+ special collection cars in this summer'))
                                            ->required(),
                                        Forms\Components\TextInput::make('button_text')
                                            ->label(__('Button Text'))
                                            ->placeholder(__('e.g. Access Now')),
                                        Forms\Components\TextInput::make('button_url')
                                            ->label(__('Button Link URL'))
                                            ->placeholder('e.g. /cars'),
                                    ])
                                    ->columns(3)
                                    ->defaultItems(0)
                                    ->reorderable()
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['text'] ?? null),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('Contact Info'))
                            ->icon('heroicon-o-envelope')
                            ->schema([
                                Forms\Components\TextInput::make('contact_email')
                                    ->label(__('Contact Email'))
                                    ->email()
                                    ->required(),
                                Forms\Components\TextInput::make('contact_phone')
                                    ->label(__('Contact Phone'))
                                    ->required(),
                                Forms\Components\Textarea::make('contact_address')
                                    ->label(__('Contact Address'))
                                    ->rows(3),
                                Forms\Components\Textarea::make('google_map_embed')
                                    ->label(__('Google Map Embed URL'))
                                    ->rows(3),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('Social Links'))
                            ->icon('heroicon-o-share')
                            ->schema([
                                Forms\Components\TextInput::make('social_facebook')
                                    ->label(__('Facebook URL'))
                                    ->url(),
                                Forms\Components\TextInput::make('social_twitter')
                                    ->label(__('Twitter / X URL'))
                                    ->url(),
                                Forms\Components\TextInput::make('social_instagram')
                                    ->label(__('Instagram URL'))
                                    ->url(),
                                Forms\Components\TextInput::make('social_behance')
                                    ->label(__('Behance URL'))
                                    ->url(),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('Theme Colors'))
                            ->icon('heroicon-o-swatch')
                            ->schema([
                                Forms\Components\Grid::make(2)->schema([
                                    Forms\Components\ColorPicker::make('primary_color')
                                        ->label(__('Primary Brand Color'))
                                        ->default('#70f46d'),
                                    Forms\Components\ColorPicker::make('primary_hover_color')
                                        ->label(__('Primary Hover Color'))
                                        ->default('#5edd5b'),
                                    Forms\Components\ColorPicker::make('secondary_color')
                                        ->label(__('Secondary Brand Color'))
                                        ->default('#8acfff'),
                                    Forms\Components\ColorPicker::make('accent_color')
                                        ->label(__('Accent / Slider Color'))
                                        ->default('#f15d44'),
                                    Forms\Components\ColorPicker::make('button_text_color')
                                        ->label(__('Button Text Color'))
                                        ->default('#101010'),
                                    Forms\Components\ColorPicker::make('button_hover_text_color')
                                        ->label(__('Button Hover Text Color'))
                                        ->default('#000000'),
                                    Forms\Components\ColorPicker::make('header_bg_color')
                                        ->label(__('Header Top Bar BG'))
                                        ->default('#101010'),
                                    Forms\Components\ColorPicker::make('footer_bg_color')
                                        ->label(__('Footer Background Color'))
                                        ->default('#101010'),
                                    Forms\Components\ColorPicker::make('heading_color')
                                        ->label(__('Heading Text Color'))
                                        ->default('#000000'),
                                ]),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('Footer'))
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\TextInput::make('footer_copyright')
                                    ->label(__('Copyright Notice'))
                                    ->default('© 2026 Carento. All rights reserved.'),
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
            $valToSave = is_array($value) ? json_encode($value) : $value;
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $valToSave]
            );
            \Illuminate\Support\Facades\Cache::forget('setting_' . $key);
        }

        \Illuminate\Support\Facades\Cache::flush();

        Notification::make()
            ->title(__('Settings saved successfully!'))
            ->success()
            ->send();
    }
}
