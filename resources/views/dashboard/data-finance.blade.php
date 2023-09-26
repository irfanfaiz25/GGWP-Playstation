@extends('dashboard.layouts.main')

@section('container')
    <div class="container mt-2">
        <div class="tabs">

            <input type="radio" id="tab1" name="tab-control" @if (session()->has('ps') || !session()->has('ps') || !session()->has('angkringan')) checked @endif>
            <input type="radio" id="tab2" name="tab-control" @if (session()->has('angkringan')) checked @endif>
            <input type="radio" id="tab3" name="tab-control" @if (session()->has('expend')) checked @endif>
            <input type="radio" id="tab4" name="tab-control">

            <ul>
                <li title="Income PS">
                    <label for="tab1" role="button">
                        <i class="fa-brands fa-playstation"></i>
                        <br><span>Income PS</span>
                    </label>
                </li>
                <li title="Income Angkringan">
                    <label for="tab2" role="button">
                        <i class="fa fa-plate-wheat"></i>
                        <br><span>Income Angkringan</span>
                    </label>
                </li>
                <li title="Pengeluaran">
                    <label for="tab3" role="button">
                        <i class="fa fa-money-bill-wheat"></i>
                        <br><span>Pengeluaran</span>
                    </label>
                </li>
                {{-- <li title="Pengeluaran">
                    <label for="tab3" role="button">
                        <i class="fa fa-money-bill-wheat"></i>
                        <br><span>Pengeluaran</span>
                    </label>
                </li> --}}
            </ul>
            {{-- 
            <div class="slider">
                <div class="indicator"></div>
            </div> --}}
            <div class="content">
                <section>
                    <h2>Income PS</h2>

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <input type="text" id="searchIncomePs"
                                    class="form-control form-control-sm rounded-start-1 rounded-end-0"
                                    placeholder="Search . . ." autofocus>
                                <span class="input-group-text rounded-end-1 bg-secondary text-light rounded-start-0"><i
                                        class="fa-brands fa-searchengin"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-end">
                        <div class="col-lg-2">
                            <select id="timeSearch" class="form-select form-select-sm">
                                <option value="today" selected>Hari ini</option>
                                <option value="yesterday">Kemarin</option>
                                <option value="week">Minggu ini</option>
                                <option value="month">Bulan ini</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table table-sm text-center align-middle">
                            <thead class="align-middle">
                                <tr height="40">
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        TV
                                    </th>
                                    <th>
                                        User
                                    </th>
                                    <th>
                                        Mulai
                                    </th>
                                    <th>
                                        Selesai
                                    </th>
                                    <th>
                                        Lama Main
                                    </th>
                                    <th>
                                        Total PS
                                    </th>
                                    <th>
                                        Total Tambahan
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody id="incomeps-list">
                                @forelse ($rents as $rent)
                                    <tr height="40">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $rent->financeDataTVName->name }}
                                        </td>
                                        <td>
                                            {{ $rent->user }}
                                        </td>
                                        <td>
                                            {{ date('H:i | d-m-Y', strtotime($rent->jam_mulai)) }}
                                        </td>
                                        <td>
                                            {{ date('H:i | d-m-Y', strtotime($rent->jam_selesai)) }}
                                        </td>
                                        <td>
                                            {{ $rent->lama_main }}
                                        </td>
                                        <td>
                                            {{ 'Rp. ' . number_format($rent->total_rent) }}
                                        </td>
                                        <td>
                                            {{ 'Rp. ' . number_format($rent->total_tambahan) }}
                                        </td>
                                        <td>
                                            {{ 'Rp. ' . number_format($rent->total) }}
                                        </td>
                                        <td>
                                            <a type="button" class="badge bg-primary" id="btnEditPs"
                                                data-id="{{ $rent->id }}" data-user="{{ $rent->user }}"
                                                data-total-ps="{{ $custom_function->rupiahFormat($rent->total_rent) }}"
                                                data-total-tambahan="{{ $custom_function->rupiahFormat($rent->total_tambahan) }}">
                                                <i class="fa fa-pen-to-square ps-1"></i>
                                            </a>
                                            <a type="button" class="badge bg-danger" id="btnDeletePs"
                                                data-id="{{ $rent->id }}">
                                                <i class="fa fa-trash ps-1"></i>
                                            </a>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="10">
                                            <h6>Data masih kosong.</h6>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>
                <section>
                    <h2>Income Angkringan</h2>

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <input type="text" id="searchIncomeAngkringan"
                                    class="form-control form-control-sm rounded-start-1 rounded-end-0"
                                    placeholder="Search . . ." autofocus>
                                <span class="input-group-text rounded-end-1 bg-secondary text-light rounded-start-0"><i
                                        class="fa-brands fa-searchengin"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-end">
                        <div class="col-lg-2">
                            <select id="timeSearchAngkringan" class="form-select form-select-sm">
                                <option value="today" selected>Hari ini</option>
                                <option value="yesterday">Kemarin</option>
                                <option value="week">Minggu ini</option>
                                <option value="month">Bulan ini</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table table-sm text-center align-middle">
                            <thead class="align-middle">
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
                                        Jumlah
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody id="incomeangkringan-list">
                                @forelse ($sales as $sale)
                                    <tr height="40">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $sale->nama_menu }}
                                        </td>
                                        <td>
                                            {{ 'Rp. ' . number_format($sale->harga_menu) }}
                                        </td>
                                        <td>
                                            {{ $sale->jumlah }}
                                        </td>
                                        <td>
                                            {{ 'Rp. ' . number_format($sale->total) }}
                                        </td>
                                        <td>
                                            <a type="button" class="badge bg-primary" id="btnEditAngkringan"
                                                data-id="{{ $sale->id }}" data-nama-menu="{{ $sale->nama_menu }}"
                                                data-harga="{{ $custom_function->rupiahFormat($sale->harga_menu) }}"
                                                data-jumlah="{{ $sale->jumlah }}">
                                                <i class="fa fa-pen-to-square ps-1"></i>
                                            </a>
                                            <a type="button" class="badge bg-danger" id="btnDeleteAngkringan"
                                                data-id="{{ $sale->id }}">
                                                <i class="fa fa-trash ps-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <h6>Data masih kosong.</h6>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>
                <section>
                    <h2>Pengeluaran</h2>

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <input type="text" id="searchExpend"
                                    class="form-control form-control-sm rounded-start-1 rounded-end-0"
                                    placeholder="Search . . ." autofocus>
                                <span class="input-group-text rounded-end-1 bg-secondary text-light rounded-start-0"><i
                                        class="fa-brands fa-searchengin"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex">
                        <div class="col-lg-10 justify-content-start">
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                data-bs-target="#addExp"><i class="fa fa-circle-plus"></i> Tambah</button>
                        </div>
                        <div class="col-lg-2 justify-content-end">
                            <select id="timeSearchExpend" class="form-select form-select-sm">
                                <option value="today" selected>Hari ini</option>
                                <option value="yesterday">Kemarin</option>
                                <option value="week">Minggu ini</option>
                                <option value="month">Bulan ini</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table table-sm text-center align-middle">
                            <thead class="align-middle">
                                <tr height="40">
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Tanggal
                                    </th>
                                    <th>
                                        Keperluan
                                    </th>
                                    <th>
                                        Harga
                                    </th>
                                    <th>
                                        Jumlah
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <th>
                                        Ket
                                    </th>
                                    <th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody id="expend-list">
                                @forelse ($expenditures as $expend)
                                    <tr height="40">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ date('d-m-Y', strtotime($expend->tanggal)) }}
                                        </td>
                                        <td>
                                            {{ $expend->keperluan }}
                                        </td>
                                        <td>
                                            {{ 'Rp. ' . number_format($expend->harga) }}
                                        </td>
                                        <td>
                                            {{ $expend->jumlah }}
                                        </td>
                                        <td>
                                            {{ 'Rp. ' . number_format($expend->total) }}
                                        </td>
                                        <td>
                                            {{ $expend->keterangan }}
                                        </td>
                                        <td>
                                            <a type="button" class="badge bg-primary" id="editPengeluaran"
                                                data-id="{{ $expend->id }}" data-tanggal="{{ $expend->tanggal }}"
                                                data-keperluan="{{ $expend->keperluan }}"
                                                data-harga="{{ $custom_function->rupiahFormat($expend->harga) }}"
                                                data-jumlah="{{ $expend->jumlah }}"
                                                data-ket="{{ $expend->keterangan }}">
                                                <i class="fa fa-pen-to-square ps-1"></i>
                                            </a>
                                            <a type="button" class="badge bg-danger" id="deletePengeluaran"
                                                data-id="{{ $expend->id }}">
                                                <i class="fa fa-trash ps-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">
                                            <h6>Data masih kosong.</h6>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>

        @include('dashboard.partials.modal-data-finance')
    @endsection
