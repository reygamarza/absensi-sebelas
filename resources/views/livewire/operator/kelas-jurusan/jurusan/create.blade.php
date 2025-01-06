<div>
    <button class="table-button" data-toggle="modal" data-target="#tambahJurusan">
        <i class="ri-add-line mr-1"></i>Tambah Jurusan
    </button>

    <!-- Modal -->
    <div class="modal fade" id="tambahJurusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="store">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="majorId">ID Jurusan</label>
                            <input type="text" class="form-control @error('majorId') is-invalid @enderror"
                                wire:model="majorId">
                            @error('majorId')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="majorName">Nama Jurusan</label>
                            <input type="text" class="form-control @error('majorName') is-invalid @enderror"
                                wire:model="majorName">
                            @error('majorName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>
