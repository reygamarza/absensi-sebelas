<div class="col-sm-12 col-lg-6">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Setting Waktu Presensi</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form wire:submit.prevent="update">
                <div class="form-group">
                    <label for="email">Presensi Masuk</label>
                    <input type="time" step="1" class="form-control @error('presenceIn') is-invalid @enderror"
                        wire:model="presenceIn">
                    @error('presenceIn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Batas Presensi Masuk</label>
                    <input type="time" step="1"
                        class="form-control @error('presenceInLimit') is-invalid @enderror"
                        wire:model="presenceInLimit">
                    @error('presenceInLimit')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Presensi Pulang</label>
                    <input type="time" step="1" class="form-control @error('presenceOut') is-invalid @enderror"
                        wire:model="presenceOut">
                    @error('presenceOut')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Batas Presensi Pulang</label>
                    <input type="time" step="1"
                        class="form-control @error('presenceOutLimit') is-invalid @enderror"
                        wire:model="presenceOutLimit">
                    @error('presenceOutLimit')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
