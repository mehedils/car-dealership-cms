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

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'Site Settings';

    protected static ?string $title = 'Site Settings';

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
                Forms\Components\Tabs::make('Settings')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Logo & Branding')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Forms\Components\FileUpload::make('site_logo_dark')
                                    ->label('Dark Logo (For Light Backgrounds)')
                                    ->image()
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->hint('Optimal size: 200×50 px (4:1 Ratio)')
                                    ->hintIcon('heroicon-m-information-circle')
                                    ->helperText('Recommended: PNG or SVG with transparent background. Display height capped at 40px.'),
                                Forms\Components\FileUpload::make('site_logo_light')
                                    ->label('White / Light Logo (For Dark Backgrounds)')
                                    ->image()
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->hint('Optimal size: 200×50 px (4:1 Ratio)')
                                    ->hintIcon('heroicon-m-information-circle')
                                    ->helperText('Recommended: White PNG or SVG for dark header/footer. Display height capped at 40px.'),
                                Forms\Components\FileUpload::make('site_favicon')
                                    ->label('Favicon Icon')
                                    ->image()
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->hint('Optimal size: 32×32 px or 64×64 px (1:1 Ratio)')
                                    ->hintIcon('heroicon-m-information-circle')
                                    ->helperText('Square icon displayed in browser tabs (PNG, ICO, or SVG).'),
                            ]),
                        Forms\Components\Tabs\Tab::make('General')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\TextInput::make('site_name')
                                    ->label('Site Name')
                                    ->required(),
                                Forms\Components\TextInput::make('site_slogan')
                                    ->label('Default Site Slogan / Fallback Announcement'),
                                Forms\Components\TextInput::make('currency_symbol')
                                    ->label('Currency Symbol')
                                    ->default('$')
                                    ->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Topbar Announcements')
                            ->icon('heroicon-o-megaphone')
                            ->schema([
                                Forms\Components\Repeater::make('topbar_announcements')
                                    ->label('Announcement Messages')
                                    ->helperText('Add multiple promotional messages, discounts, or announcements to rotate in the header topbar.')
                                    ->schema([
                                        Forms\Components\TextInput::make('text')
                                            ->label('Announcement Text')
                                            ->placeholder('e.g. More than 800+ special collection cars in this summer')
                                            ->required(),
                                        Forms\Components\TextInput::make('button_text')
                                            ->label('Button Text')
                                            ->placeholder('e.g. Access Now'),
                                        Forms\Components\TextInput::make('button_url')
                                            ->label('Button Link URL')
                                            ->placeholder('e.g. /cars-list-1'),
                                    ])
                                    ->columns(3)
                                    ->defaultItems(0)
                                    ->reorderable()
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['text'] ?? null),
                            ]),
                        Forms\Components\Tabs\Tab::make('Contact Info')
                            ->icon('heroicon-o-envelope')
                            ->schema([
                                Forms\Components\TextInput::make('contact_email')
                                    ->label('Contact Email')
                                    ->email()
                                    ->required(),
                                Forms\Components\TextInput::make('contact_phone')
                                    ->label('Contact Phone')
                                    ->required(),
                                Forms\Components\Textarea::make('contact_address')
                                    ->label('Contact Address')
                                    ->rows(3),
                                Forms\Components\Textarea::make('google_map_embed')
                                    ->label('Google Map Embed URL')
                                    ->rows(3),
                            ]),
                        Forms\Components\Tabs\Tab::make('Social Links')
                            ->icon('heroicon-o-share')
                            ->schema([
                                Forms\Components\TextInput::make('social_facebook')
                                    ->label('Facebook URL')
                                    ->url(),
                                Forms\Components\TextInput::make('social_twitter')
                                    ->label('Twitter / X URL')
                                    ->url(),
                                Forms\Components\TextInput::make('social_instagram')
                                    ->label('Instagram URL')
                                    ->url(),
                                Forms\Components\TextInput::make('social_behance')
                                    ->label('Behance URL')
                                    ->url(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Theme Colors')
                            ->icon('heroicon-o-swatch')
                            ->schema([
                                Forms\Components\Grid::make(2)->schema([
                                    Forms\Components\ColorPicker::make('primary_color')
                                        ->label('Primary Brand Color')
                                        ->default('#70f46d'),
                                    Forms\Components\ColorPicker::make('primary_hover_color')
                                        ->label('Primary Hover Color')
                                        ->default('#5edd5b'),
                                    Forms\Components\ColorPicker::make('secondary_color')
                                        ->label('Secondary Brand Color')
                                        ->default('#8acfff'),
                                    Forms\Components\ColorPicker::make('accent_color')
                                        ->label('Accent / Slider Color')
                                        ->default('#f15d44'),
                                    Forms\Components\ColorPicker::make('button_text_color')
                                        ->label('Button Text Color')
                                        ->default('#101010'),
                                    Forms\Components\ColorPicker::make('button_hover_text_color')
                                        ->label('Button Hover Text Color')
                                        ->default('#000000'),
                                    Forms\Components\ColorPicker::make('header_bg_color')
                                        ->label('Header Top Bar BG')
                                        ->default('#101010'),
                                    Forms\Components\ColorPicker::make('footer_bg_color')
                                        ->label('Footer Background Color')
                                        ->default('#101010'),
                                    Forms\Components\ColorPicker::make('heading_color')
                                        ->label('Heading Text Color')
                                        ->default('#000000'),
                                ]),
                            ]),
                        Forms\Components\Tabs\Tab::make('Footer')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\TextInput::make('footer_copyright')
                                    ->label('Copyright Notice')
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
        }

        Notification::make()
            ->title('Settings saved successfully!')
            ->success()
            ->send();
    }
}
