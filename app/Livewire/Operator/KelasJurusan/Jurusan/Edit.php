<?php

namespace App\Livewire\Operator\KelasJurusan\Jurusan;

use App\Models\Jurusan;
use Livewire\Component;

class Edit extends Component
{
    public $oldMajorId;
    public $majorId;
    public $majorName;

    public function rules()
    {
        return [
            'majorId' => 'required|string|unique:jurusans,id_jurusan,' . $this->oldMajorId . ',id_jurusan|max:10',
            'majorName' => 'required|string|unique:jurusans,nama_jurusan,' . $this->oldMajorId . ',id_jurusan|max:100',
        ];
    }

    public function mount($major)
    {
        $this->oldMajorId = $major->id_jurusan;
        $this->majorId = $major->id_jurusan;
        $this->majorName = $major->nama_jurusan;
    }

    public function update()
    {
        $this->validate();

        Jurusan::findOrFail($this->oldMajorId)->update([
            'id_jurusan' => $this->majorId,
            'nama_jurusan' => $this->majorName
        ]);

        return redirect()->route('operator.jurusan');
    }

    public function render()
    {
        return view('livewire.operator.kelas-jurusan.jurusan.edit');
    }
}
