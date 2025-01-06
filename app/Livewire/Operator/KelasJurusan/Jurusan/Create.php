<?php

namespace App\Livewire\Operator\KelasJurusan\Jurusan;

use App\Models\Jurusan;
use Livewire\Component;

class Create extends Component
{
    public $majorId = '';
    public $majorName = '';

    public function rules()
    {
        return [
            'majorId' => 'required|string|unique:jurusans,id_jurusan|max:10',
            'majorName' => 'required|string|unique:jurusans,nama_jurusan|max:100',
        ];
    }

    public function store()
    {
        $this->validate();

        Jurusan::create([
            'id_jurusan' => $this->majorId,
            'nama_jurusan' => $this->majorName
        ]);

        return redirect()->route('operator.jurusan');
    }
    public function render()
    {
        return view('livewire.operator.kelas-jurusan.jurusan.create');
    }
}
