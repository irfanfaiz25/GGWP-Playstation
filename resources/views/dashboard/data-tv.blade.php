@extends('dashboard.layouts.main')

@section('container')
    <div class="card">
        <div class="card-header">
            TV / Console Data
        </div>
        <div class="card-body">
            <div class="container mt-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addData">
                    <i class="fa fa-circle-plus"></i> New
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Data TV</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
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

                <div class="table-responsive mt-2">
                    <table class="table table-striped table-sm text-center align-middle">
                        <thead class="table-success align-middle">
                            <tr height="40">
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
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($televisions as $television)
                                <tr height="40">
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $television->name }}
                                    </td>
                                    <td>
                                        {{ number_format($television->tarif) }}
                                    </td>
                                    <td>
                                        {{ $television->status }}
                                    </td>
                                    <td>
                                        <a type="button" data-bs-toggle="modal"
                                            data-bs-target="#editData{{ $television->id }}"
                                            class="badge bg-warning text-light"><i class="fa fa-pen-to-square"></i></a>
                                        <a type="button" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $television->id }}"
                                            class="badge bg-danger text-light"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                {{-- modal edit data --}}
                                @include('dashboard.modal-action')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
