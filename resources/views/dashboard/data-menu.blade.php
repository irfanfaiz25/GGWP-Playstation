@extends('dashboard.layouts.main')

@section('container')
    <div class="card">
        <div class="card-header">
            Menu
        </div>
        <div class="card-body">
            <div class="container mt-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addMenu">
                    <i class="fa fa-circle-plus"></i> New
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Menu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/dashboard/data-menu" method="post">
                                    @csrf
                                    <div class="row g-3 align-items-center ms-3 me-3">
                                        <div class="col-3">
                                            <label for="nama_menu" class="col-form-label">Nama Menu</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" id="nama_menu" name="nama_menu"
                                                class="form-control form-control-sm @error('nama_menu') is-invalid @enderror"
                                                value="{{ old('nama_menu') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-3">
                                            <label for="harga" class="col-form-label">Harga</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" id="harga" name="harga"
                                                class="form-control form-control-sm @error('harga') is-invalid @enderror"
                                                value="{{ old('harga') }}">
                                            @error('harga')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-3">
                                            <label for="jenis" class="col-form-label">Jenis</label>
                                        </div>
                                        <div class="col-9">
                                            <select class="form-select form-select-sm" name="jenis">
                                                <option value="makanan" selected>Makanan</option>
                                                <option value="minuman">Minuman</option>
                                            </select>
                                            @error('jenis')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-floppy-disk"></i>
                                    Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive mt-2">
                    <table class="table table-striped table-sm text-center align-middle">
                        <thead class="table-success align-middle">
                            <tr height="40">
                                <th>
                                    #
                                </th>
                                <th>
                                    Nama Menu
                                </th>
                                <th>
                                    Harga
                                </th>
                                <th>
                                    Jenis
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                                <tr height="40">
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $menu->nama_menu }}
                                    </td>
                                    <td>
                                        {{ number_format($menu->harga) }}
                                    </td>
                                    <td>
                                        {{ $menu->jenis }}
                                    </td>
                                    <td>
                                        <a type="button" data-bs-toggle="modal"
                                            data-bs-target="#editMenu{{ $menu->id }}"
                                            class="badge bg-warning text-light"><i class="fa fa-pen-to-square"></i></a>
                                        <a type="button" data-bs-toggle="modal"
                                            data-bs-target="#deleteMenu{{ $menu->id }}"
                                            class="badge bg-danger text-white"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                {{-- Edit Modal --}}
                                <form action="/dashboard/data-menu/{{ $menu->id }}" method="post">
                                    @method('put')
                                    @csrf
                                    <div class="modal fade" id="editMenu{{ $menu->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-3 align-items-center ms-3 me-3">
                                                        <div class="col-3">
                                                            <label for="nama_menu" class="col-form-label">Nama
                                                                Menu</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" id="nama_menu" name="nama_menu"
                                                                class="form-control form-control-sm @error('nama_menu') is-invalid @enderror"
                                                                value="{{ old('nama_menu', $menu->nama_menu) }}">
                                                            @error('nama_menu')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-3">
                                                            <label for="harga" class="col-form-label">Harga</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" id="harga" name="harga"
                                                                class="form-control form-control-sm @error('harga') is-invalid @enderror"
                                                                value="{{ old('harga', $menu->harga) }}">
                                                            @error('harga')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-3">
                                                            <label for="jenis" class="col-form-label">Jenis</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <select class="form-select form-select-sm" name="jenis">
                                                                @if ($menu->jenis == 'makanan')
                                                                    <option value="makanan" selected>Makanan</option>
                                                                    <option value="minuman">Minuman</option>
                                                                @else
                                                                    <option value="makanan">Makanan</option>
                                                                    <option value="minuman" selected>Minuman</option>
                                                                @endif
                                                            </select>
                                                            @error('jenis')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                {{-- end edit modal --}}

                                {{-- delete confirmation modal --}}
                                <div id="deleteMenu{{ $menu->id }}" class="modal fade" tabindex="	-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 text-center pb-5 pt-4">
                                                        <img src="{{ asset('/img/delete.png') }}" alt="delete"
                                                            width="200">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 text-center text-secondary">
                                                        <h2>ARE YOU SURE ?</h2>
                                                        <h6 class="pb-5">Do you want to delete ? This process cannot be
                                                            undone.
                                                        </h6>
                                                        <form action="/dashboard/data-menu/{{ $menu->id }}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-bs-dismiss="modal"><i
                                                                    class="fa-regular fa-circle-xmark"></i>
                                                                CANCEL
                                                            </button>
                                                            <button type="submit" class="btn btn-success btn-sm"><i
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
