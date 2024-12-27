<?php

namespace App\Livewire\Layouts;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{
    public $operator;
    public $tenagaKependidikan;

    public function mount()
    {
        $this->operator = Auth::user()->role == 'operator';
        $this->tenagaKependidikan = in_array(Auth::user()->role, ['kesiswaan', 'waliKelas']);
    }

    public function render()
    {
        return view('livewire.layouts.sidebar');
    }
}
