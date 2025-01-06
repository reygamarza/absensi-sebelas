 <div class="col-sm-12 col-lg-6">
     <div class="iq-card">
         <div class="iq-card-header d-flex justify-content-between">
             <div class="iq-header-title">
                 <h4 class="card-title">Setting Lokasi, Alamat dan Maksimum Radius</h4>
             </div>
         </div>
         <div class="iq-card-body">
             <div class="mb-2" id="map" wire:ignore></div>
             <form wire:submit.prevent="update">
                 <div class="form-group">
                     <label for="urlMaps">Url Maps</label>
                     <input type="text" class="form-control @error('urlMaps') is-invalid @enderror"
                         placeholder="Masukan url maps untuk generate latitude dan longitude" wire:model.live="urlMaps">
                     @error('urlMaps')
                         <div class="invalid-feedback">{{ $message }}</div>
                     @else
                         <p class="font-size-12">contoh : https://maps.app.goo.gl/... atau
                             https://www.google.com/maps/...</p>
                     @enderror
                 </div>
                 <div class="row mb-3">
                     <div class="col">
                         <label for="latitude">Latitude</label>
                         <input type="text" class="form-control @error('latitude') is-invalid @enderror"
                             wire:model="latitude">
                         @error('latitude')
                             <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                     </div>
                     <div class="col">
                         <label for="longitude">Longitude</label>
                         <input type="text" class="form-control @error('longitude') is-invalid @enderror"
                             wire:model="longitude">
                         @error('longitude')
                             <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="radiusMaksimum">Radius Maksimal (meter)</label>
                     <input type="number" class="form-control @error('radiusMaksimum') is-invalid @enderror"
                         wire:model="radiusMaksimum">
                     @error('radiusMaksimum')
                         <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                 </div>
                 <button type="submit" class="btn btn-primary">Submit</button>
             </form>
         </div>
     </div>
 </div>

 @push('myscript')
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         var map = L.map('map').setView([{{ $latitude }}, {{ $longitude }}], 13);
         L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
             maxZoom: 19,
             attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
         }).addTo(map);
         var marker = L.marker([{{ $latitude }}, {{ $longitude }}]).addTo(map);
         var circle = L.circle([{{ $latitude }}, {{ $longitude }}], {
             color: 'red',
             fillColor: '#f03',
             fillOpacity: 0.5,
             radius: {{ $radiusMaksimum }}
         }).addTo(map);
     });
 </script>
@endpush

