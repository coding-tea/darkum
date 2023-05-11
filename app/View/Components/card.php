<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card extends Component
{
    public $title;
    public $description;
    public $image;
    public $id;
    public $routeDelete;
    public $routeEdit;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $description, $image, $id, $routeDelete, $routeEdit)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->id = $id;
        $this->routeDelete = $routeDelete;
        $this->routeEdit = $routeEdit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
