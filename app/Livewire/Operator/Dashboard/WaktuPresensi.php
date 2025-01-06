<?php

namespace App\Livewire\Operator\Dashboard;

use App\Models\WaktuPresensi as ModelWaktuPresensi;
use Livewire\Component;

class WaktuPresensi extends Component
{
    public $attendanceTime;
    public $presenceIn;
    public $presenceInLimit;
    public $presenceOut;
    public $presenceOutLimit;

    public function rules()
    {
        return [
            'presenceIn' => 'required|date_format:H:i:s',
            'presenceInLimit' => 'required|date_format:H:i:s|after:presenceIn',
            'presenceOut' => 'required|date_format:H:i:s|after:presenceInLimit',
            'presenceOutLimit' => 'required|date_format:H:i:s|after:presenceOut'
        ];
    }

    public function mount()
    {
        $this->attendanceTime = ModelWaktuPresensi::first();
        $this->presenceIn = $this->attendanceTime->presensi_masuk;
        $this->presenceInLimit = $this->attendanceTime->batas_presensi_masuk;
        $this->presenceOut = $this->attendanceTime->presensi_pulang;
        $this->presenceOutLimit = $this->attendanceTime->batas_presensi_pulang;
    }

    public function update()
    {
        $this->validate();

        ModelWaktuPresensi::first()->update([
            'presensi_masuk' => $this->presenceIn,
            'batas_presensi_masuk' => $this->presenceInLimit,
            'presensi_pulang' => $this->presenceOut,
            'batas_presensi_pulang' => $this->presenceOutLimit,
        ]);

        return redirect()->route('operator.dashboard');
    }

    public function render()
    {
        return view('livewire.operator.dashboard.waktu-presensi');
    }
}
