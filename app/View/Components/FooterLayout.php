<?php

namespace App\View\Components;

use App\Models\SocialInfo;
use Illuminate\View\Component;
use Illuminate\View\View;

class FooterLayout extends Component
{
    public $socialInfos;

    public function __construct()
    {
        $this->socialInfos = SocialInfo::first();
    }

    public function render(): View
    {
        return view('layouts.footer', ['socialInfos' => $this->socialInfos]);
    }
}
