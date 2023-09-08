@extends('dashboard.layouts.main')

@section('container')
    <div class="card">
        <div class="container mt-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addData">
                New
            </button>

            @if (session()->has('success'))
                <div class="col-md-6 mt-2">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close alert-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <!-- Modal -->
            <div class="modal fade" id="addData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Data TV</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/dashboard/data-tv" method="post">
                                @csrf
                                <div class="row g-3 align-items-center ms-3 me-3">
                                    <div class="col-3">
                                        <label for="name" class="col-form-label">TV Name</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" id="name" name="name"
                                            class="form-control form-control-sm @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}">
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
                                            value="{{ old('tarif') }}">
                                        @error('tarif')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-3">
                                        <label for="kondisi_tv" class="col-form-label">Kondisi TV</label>
                                    </div>
                                    <div class="col-9">
                                        <select class="form-select form-select-sm" id="kondisi_tv" name="kondisi_tv">
                                            <option selected value="baik">Baik</option>
                                            <option value="rusak">Rusak</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label for="kondisi_ps" class="col-form-label">Kondisi PS</label>
                                    </div>
                                    <div class="col-9">
                                        <select class="form-select form-select-sm" id="kondisi_ps" name="kondisi_ps">
                                            <option selected value="baik">Baik</option>
                                            <option value="rusak">Rusak</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive mt-2">
                <table class="table table-striped table-sm text-center align-middle">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                TV Name
                            </th>
                            <th>
                                Tarif
                            </th>
                            <th>
                                Kondisi TV
                            </th>
                            <th>
                                Kondisi PS
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($televisions as $television)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $television->name }}
                                </td>
                                <td>
                                    {{ $television->tarif }}
                                </td>
                                <td>
                                    {{ $television->kondisi_tv }}
                                </td>
                                <td>
                                    {{ $television->kondisi_ps }}
                                </td>
                                <td>
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#editData{{ $television->id }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-pen-to-square"></i></button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            {{-- modal edit data --}}
                            @include('dashboard.modal-action')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
