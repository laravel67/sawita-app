<?php

namespace App\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $footer = Setting::first();
        return view('livewire.admin.footer', compact('footer'));
    }
}
