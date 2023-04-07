<?php

namespace App\View\Components;

use Illuminate\View\Component;

class textarea extends Component
{

    public $title;
    public $name;
    public $placeholder;
    public $value;
    public $cols;
    public $rows;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $name, $placeholder, $cols='30', $rows='10' ,$value = '')
    {
        $this->title = $title;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->cols = $cols;
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.textarea');
    }
}
