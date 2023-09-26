<!-- Modal data pengeluaran -->
<div class="modal fade" id="addExp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pengeluaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/data-finance/expend" method="post">
                    @csrf
                    <div class="row g-3 align-items-center ms-3 me-3">
                        <div class="col-3">
                            <label for="tanggal" class="col-form-label">Tanggal</label>
                        </div>
                        <div class="col-9">
                            <input type="date" id="tanggal" name="tanggal"
                                class="form-control form-control-sm @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal') }}">
                        </div>
                        <div class="col-3">
                            <label for="keperluan" class="col-form-label">Keperluan</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="keperluan" name="keperluan"
                                class="form-control form-control-sm @error('keperluan') is-invalid @enderror"
                                value="{{ old('keperluan') }}">
                            @error('keperluan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="hargaExpendAdd" class="col-form-label">Harga</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="hargaExpendAdd" name="harga"
                                class="form-control form-control-sm @error('harga') is-invalid @enderror"
                                value="{{ old('harga') }}">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="jumlah" class="col-form-label">Jumlah</label>
                        </div>
                        <div class="col-9">
                            <input type="number" id="jumlah" name="jumlah"
                                class="form-control form-control-sm @error('jumlah') is-invalid @enderror"
                                value="{{ old('jumlah') }}">
                            @error('jumlah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="keterangan" class="col-form-label">Keterangan</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="keterangan" name="keterangan"
                                class="form-control form-control-sm @error('keterangan') is-invalid @enderror"
                                value="{{ old('keterangan') }}">
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-disk"></i>
                    Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal data pengeluaran -->


<!-- Modal edit pengeluaran -->
<div class="modal fade" id="editPengeluaranModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pengeluaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editExpendForm" action="/dashboard/data-finance/expend" method="post">
                    @method('put')
                    @csrf
                    {{-- <input type="hidden" id="idExpend" name="id"> --}}
                    <div class="row g-3 align-items-center ms-3 me-3">
                        <div class="col-3">
                            <label for="tanggalExpend" class="col-form-label">Tanggal</label>
                        </div>
                        <div class="col-9">
                            <input type="date" id="tanggalExpend" name="tanggal"
                                class="form-control form-control-sm @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal') }}">
                        </div>
                        <div class="col-3">
                            <label for="keperluanExpend" class="col-form-label">Keperluan</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="keperluanExpend" name="keperluan"
                                class="form-control form-control-sm @error('keperluan') is-invalid @enderror"
                                value="{{ old('keperluan') }}">
                            @error('keperluan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="hargaExpend" class="col-form-label">Harga</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="hargaExpend" name="harga"
                                class="form-control form-control-sm @error('harga') is-invalid @enderror">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="jumlahExpend" class="col-form-label">Jumlah</label>
                        </div>
                        <div class="col-9">
                            <input type="number" id="jumlahExpend" name="jumlah"
                                class="form-control form-control-sm @error('jumlah') is-invalid @enderror"
                                value="{{ old('jumlah') }}">
                            @error('jumlah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="keteranganExpend" class="col-form-label">Keterangan</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="keteranganExpend" name="keterangan"
                                class="form-control form-control-sm @error('keterangan') is-invalid @enderror"
                                value="{{ old('keterangan') }}">
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-disk"></i>
                    Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal edit pengeluaran -->


<!-- Modal edit income angkringan -->
<div class="modal fade" id="editIncomeAngkringan" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Income Angkringan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editAngkringanForm" action="" method="post">
                    @method('put')
                    @csrf
                    <div class="row g-3 align-items-center ms-3 me-3">
                        <div class="col-3">
                            <label for="namaMenuAngkringan" class="col-form-label">Nama Menu</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="namaMenuAngkringan" name="nama_menu"
                                class="form-control form-control-sm @error('nama_menu') is-invalid @enderror"
                                value="{{ old('nama_menu') }}">
                            @error('nama_menu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="hargaAngkringan" class="col-form-label">Harga</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="hargaAngkringan" name="harga"
                                class="form-control form-control-sm @error('harga') is-invalid @enderror">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="jumlahAngkringan" class="col-form-label">Jumlah</label>
                        </div>
                        <div class="col-9">
                            <input type="number" id="jumlahAngkringan" name="jumlah"
                                class="form-control form-control-sm @error('jumlah') is-invalid @enderror"
                                value="{{ old('jumlah') }}">
                            @error('jumlah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-disk"></i>
                    Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal edit income angkringan -->


<!-- Modal edit income ps -->
<div class="modal fade" id="editIncomePs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Income Angkringan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPsForm" action="" method="post">
                    @method('put')
                    @csrf
                    <div class="row g-3 align-items-center ms-3 me-3">
                        <div class="col-3">
                            <label for="userPs" class="col-form-label">User</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="userPs" name="user"
                                class="form-control form-control-sm @error('user') is-invalid @enderror"
                                value="{{ old('user') }}">
                            @error('user')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="totalPs" class="col-form-label">Total PS</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="totalPs" name="total_ps"
                                class="form-control form-control-sm @error('total_ps') is-invalid @enderror">
                            @error('total_ps')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="totalTambahanPs" class="col-form-label">Total Tambahan</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="totalTambahanPs" name="total_tambahan"
                                class="form-control form-control-sm @error('total_tambahan') is-invalid @enderror"
                                value="{{ old('total_tambahan') }}">
                            @error('total_tambahan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-disk"></i>
                    Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal edit income ps -->


{{-- delete confirmation expend --}}
<div id="deletePengeluaranModal" class="modal fade" tabindex="	-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center pb-5 pt-4">
                        <img src="{{ asset('/img/delete.png') }}" alt="delete" width="200">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center text-secondary">
                        <h2>ARE YOU SURE ?</h2>
                        <h6 class="pb-5">Do you want to delete ? This process cannot be
                            undone.
                        </h6>
                        <form id="deleteExpendForm" action="/dashboard/data-finance" method="post">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                    class="fa-regular fa-circle-xmark"></i>
                                CANCEL
                            </button>
                            <button type="submit" class="btn btn-success" name="delete-sample"><i
                                    class="fa-regular fa-circle-check"></i>
                                YES
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end delete confirmation expend --}}

{{-- delete confirmation income angkringan --}}
<div id="deleteAngkringanModal" class="modal fade" tabindex="	-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center pb-5 pt-4">
                        <img src="{{ asset('/img/delete.png') }}" alt="delete" width="200">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center text-secondary">
                        <h2>ARE YOU SURE ?</h2>
                        <h6 class="pb-5">Do you want to delete ? This process cannot be
                            undone.
                        </h6>
                        <form id="deleteAngkringanForm" action="/dashboard/data-finance/angkringan" method="post">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                    class="fa-regular fa-circle-xmark"></i>
                                CANCEL
                            </button>
                            <button type="submit" class="btn btn-success" name="delete-sample"><i
                                    class="fa-regular fa-circle-check"></i>
                                YES
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end delete confirmation income angkringan --}}


{{-- delete confirmation income ps --}}
<div id="deletePsModal" class="modal fade" tabindex="	-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center pb-5 pt-4">
                        <img src="{{ asset('/img/delete.png') }}" alt="delete" width="200">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center text-secondary">
                        <h2>ARE YOU SURE ?</h2>
                        <h6 class="pb-5">Do you want to delete ? This process cannot be
                            undone.
                        </h6>
                        <form id="deletePsForm" action="" method="post">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                    class="fa-regular fa-circle-xmark"></i>
                                CANCEL
                            </button>
                            <button type="submit" class="btn btn-success" name="delete-sample"><i
                                    class="fa-regular fa-circle-check"></i>
                                YES
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end delete confirmation income ps --}}
