<?php

namespace App\Livewire;

use App\Models\Property;
use Livewire\Component;

class Home extends Component
{
    public $categoryParameter;
    public $countryParameter;

    public function mount()
    {
        $this->categoryParameter = request()->input('cat');
        $this->countryParameter = request()->input('country');
    }
    public function render()
    {
        return view('livewire.home', [
            "data" => Property::whereHas('category', function ($query) {
                if (isset($this->categoryParameter)) {
                    $query->where('url_slug', '=', "$this->categoryParameter");
                } else {
                    $query->where('url_slug', '=', "/");
                }
            })->whereHas('area', function ($query) {
                $query->whereHas('country', function ($query) {
                    if (isset($this->countryParameter)) {
                        $query->where('name', '=', $this->countryParameter);
                    }
                });

            })->limit(20)->get(),
        ]);
    }


}
