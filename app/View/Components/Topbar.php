<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Topbar extends Component
{
    public bool $transparent;
    public array $announcements = [];
    public string $phone;
    public string $phoneRaw;
    public string $email;
    public string $slogan;

    /**
     * Create a new component instance.
     */
    public function __construct(bool $transparent = false)
    {
        $this->transparent = $transparent;
        $this->phone = setting('contact_phone', '+1 222-555-33-99');
        $this->phoneRaw = preg_replace('/[^0-9+]/', '', $this->phone);
        $this->email = setting('contact_email', 'sale@carento.com');
        $this->slogan = setting('site_slogan', 'More than 800+ special collection cars in this summer');

        $announcementsRaw = setting('topbar_announcements');
        if (is_array($announcementsRaw)) {
            $this->announcements = $announcementsRaw;
        } elseif (is_string($announcementsRaw) && !empty($announcementsRaw)) {
            $decoded = json_decode($announcementsRaw, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $this->announcements = $decoded;
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.topbar');
    }
}
