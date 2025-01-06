<?php

namespace App\Livewire\Operator\Dashboard;

use App\Helpers\ExtractCoordinateFromURLHelper;
use App\Models\LokasiSekolah;
use Livewire\Component;

class Lokasi extends Component
{
    public $schoolLocation;
    public $urlMaps;
    public $latitude;
    public $longitude;
    public $radiusMaksimum;

    public function rules()
    {
        return [
            'urlMaps' => 'nullable|url',
            'latitude'  => 'required|numeric|regex:/^-?(\d{1,3})\.(\d{1,15})?$/|between:-90, 90',
            'longitude' => 'required|numeric|regex:/^-?(\d{1,3})\.(\d{1,15})?$/|between:-180, 180',
            'radiusMaksimum' => 'required|numeric|min:1',
        ];
    }

    public function mount()
    {
        $this->schoolLocation = LokasiSekolah::first();
        $this->latitude = (string)$this->schoolLocation->latitude;
        $this->longitude = (string)$this->schoolLocation->longitude;
        $this->radiusMaksimum = $this->schoolLocation->radius_maksimum;
    }

    public function updatedUrlMaps()
    {
        $this->validateOnly('urlMaps');

        $extractLatLongPlace = ExtractCoordinateFromURLHelper::getCoordinatesAndPlace($this->urlMaps);

        if ($extractLatLongPlace) {
            $this->latitude = $extractLatLongPlace['latitude'] ?? 0;
            $this->longitude = $extractLatLongPlace['longitude'] ?? 0;
        }
    }

    public function update()
    {
        $this->validate();

        LokasiSekolah::first()->update([
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'radius_maksimum' => $this->radiusMaksimum
        ]);

        return redirect()->route('operator.dashboard');
    }

    public function render()
    {
        return view('livewire.operator.dashboard.lokasi', [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'radiusMaksimum' => $this->radiusMaksimum,
        ]);
    }
}
