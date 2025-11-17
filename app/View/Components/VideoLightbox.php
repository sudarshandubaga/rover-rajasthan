<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VideoLightbox extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $videoID)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $thumbnailUrl = "https://img.youtube.com/vi/" . $this->videoID . "/0.jpg";
        return view('components.video-lightbox', compact('thumbnailUrl'));
    }
}
