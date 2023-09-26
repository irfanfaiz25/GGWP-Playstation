{{-- Edit Modal --}}
<form action="/dashboard/data-tv/{{ $television->id }}" method="post">
    @method('put')
    @csrf
    <div class="modal fade" id="editData{{ $television->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3 align-items-center ms-3 me-3">
                        <div class="col-3">
                            <label for="name" class="col-form-label">TV Name</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="name" name="name"
                                class="form-control form-control-sm @error('name') is-invalid @enderror"
                                value="{{ old('name', $television->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="tarif" class="col-form-label">Tarif Perjam</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="tarif" name="tarif"
                                class="form-control form-control-sm @error('tarif') is-invalid @enderror"
                                value="{{ old('tarif', $television->tarif) }}">
                            @error('tarif')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- end edit modal --}}

{{-- delete confirmation modal --}}
<div id="deleteModal{{ $television->id }}" class="modal fade" tabindex="	-1">
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
                        <h6 class="pb-5">Do you want to delete ? This process cannot be undone.
                        </h6>
                        <form action="/dashboard/data-tv/{{ $television->id }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i
                                    class="fa-regular fa-circle-xmark"></i>
                                CANCEL
                            </button>
                            <button type="submit" class="btn btn-success btn-sm" name="delete-sample"><i
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
{{-- end delete confirmation modal --}}
