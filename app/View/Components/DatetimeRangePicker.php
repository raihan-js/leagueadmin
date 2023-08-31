<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DatetimeRangePicker extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $dateFilterName
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.datetime-range-picker');
    }
}
