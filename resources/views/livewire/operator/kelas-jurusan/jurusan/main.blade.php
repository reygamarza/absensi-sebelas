<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Daftar Jurusan</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <div class="row justify-content-between">
                                <div class="col-sm-12 col-md-6">
                                    <div id="user_list_datatable_info" class="dataTables_filter">
                                        <form class="mr-3 position-relative">
                                            <div class="form-group mb-0">
                                                <input wire:model.live.debounce.300ms="search" type="text"
                                                    class="form-control" id="exampleInputSearch" placeholder="Search">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="user-list-files d-flex float-right">
                                        <livewire:operator.kelas-jurusan.jurusan.create />
                                    </div>
                                </div>
                            </div>
                            <table id="user-list-table" class="table table-striped table-hover table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th wire:click="setSortBy('id_jurusan')" class="title-sorting">
                                            ID Jurusan
                                            @if ($sortBy === 'id_jurusan')
                                                <i class="ri-arrow-{{ $sortDir === 'ASC' ? 'up' : 'down' }}-s-line"></i>
                                            @endif
                                        </th>
                                        <th wire:click="setSortBy('nama_jurusan')" class="title-sorting">
                                            Nama Jurusan
                                            @if ($sortBy === 'nama_jurusan')
                                                <i class="ri-arrow-{{ $sortDir === 'ASC' ? 'up' : 'down' }}-s-line"></i>
                                            @endif
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($majors as $index => $major)
                                        <tr wire:key="{{ $major->id_jurusan }}">
                                            <td>{{ ($majors->currentPage() - 1) * $majors->perPage() + $loop->index + 1 }}</td>
                                            <td>{{ $major->id_jurusan }}</td>
                                            <td>{{ $major->nama_jurusan }}</td>
                                            <td>
                                                <div class="flex align-items-center list-user-action">
                                                    <button class="table-action" data-toggle="modal"
                                                        data-target="#editJurusan-{{ $major->id_jurusan }}"><i
                                                            class="ri-pencil-line"></i></button>
                                                    <button wire:click="delete('{{ $major->id_jurusan }}')"
                                                        class="table-action"><i class="ri-delete-bin-line"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <livewire:operator.kelas-jurusan.jurusan.edit :major="$major"
                                            :key="$major->id_jurusan" />
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-between mt-3">
                            <div class="form-group row col-md-6">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="perPage">Per
                                    Page</label>
                                <div class="col-sm-2">
                                    <select wire:model.live="perPage" class="form-control-perPage pr-2">
                                        <option value="7">7</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            {{ $majors->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
