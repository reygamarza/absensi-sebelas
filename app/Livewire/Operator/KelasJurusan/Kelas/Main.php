<?php

namespace App\Livewire\Operator\KelasJurusan\Kelas;

use App\Models\Kelas;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public $sortBy = 'created_at';
    public $sortDir = 'DESC';

    public $perPage = 7;

    public function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir === 'ASC') ? 'DESC' : 'ASC';
        } else {
            $this->sortBy = $sortByField;
            $this->sortDir = 'ASC';
        }
    }

    public function render()
    {
        return view('livewire.operator.kelas-jurusan.kelas.main', [
            'classes' => Kelas::search($this->search)
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
        ]);
    }

    public function delete(Kelas $major)
    {
        $major->delete();
    }
}
