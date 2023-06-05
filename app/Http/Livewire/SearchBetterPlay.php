<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchBetterPlay extends Component
{
    public ?string $searchBetterPlay = '';

    public function render()
    {
        $searchBetterPlayResults = [];
        return view(
            'livewire.search-better-play',
            [
                'searchBetterPlayResults' => collect($searchBetterPlayResults)->take(7),
            ]
        );
    }
}
