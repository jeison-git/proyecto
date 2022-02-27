<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditorLayout extends Component
{
    public $publication;//propiedad la cual se le asignara al constructor para poder ser utilizadad esde la vista

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($publication)
    {
        $this->publication = $publication;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('layouts.editor');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
   /*  public function render()
    {
        return view('components.editor-layout');
    } */
}
