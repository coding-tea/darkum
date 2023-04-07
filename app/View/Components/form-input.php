<?php

namespace App\View\Components;

use Illuminate\View\Component;

class form extends Component
{
    public $title;
    public $name;
    public $placeholder;
    public $value;
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $name, $placeholder, $value, $type)
    {
        $this->title = $title;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-input');
    }
}
