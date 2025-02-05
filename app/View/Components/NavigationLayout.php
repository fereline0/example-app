<?php

namespace App\View\Components;

use App\Models\SocialInfo;
use Illuminate\View\Component;
use Illuminate\View\View;

class NavigationLayout extends Component
{
    public function render(): View
    {
        return view('layouts.navigation');
    }
}
