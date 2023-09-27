@extends('dashboard.layouts.main')

@section('container')
    <div class="card">
        <div class="card-header">
            Playstation Transactions
        </div>
        <div class="card-body">

            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">

                            @foreach ($transactions as $transaction)
                                <div class="col-md-6 card-management">
                                    @if ($transaction->user == '')
                                        <div class="card transaction-card-inactive">
                                        @else
                                            <div class="card transaction-card">
                                    @endif
                                    <div class="content">
                                        <div class="title mb-2">
                                            {{ $transaction->name }}
                                        </div>
                                        <div class="price mb-3">
                                            <span class="fa fa-television"></span>
                                        </div>
                                        @isset($transaction->user)
                                            <div class="time time-start d-flex">
                                                <p class="ket">Start</p>
                                                <p class="price mx-2">{{ date('H:i', strtotime($transaction->jam_mulai)) }}
                                                </p>
                                            </div>
                                        @endisset
                                        {{-- <div class="time-finish d-flex">
                                                <p class="ket">End</p>
                                                <p class="price mx-2">{{ $transaction->jam_selesai }}</p>
                                            </div> --}}
                                        <div class="time time-end">
                                            @if (isset($transaction->user))
                                                <p class="ket">{{ Str::upper($transaction->user) }}</p>
                                            @else
                                                <p class="ket">USER</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row card-btn pt-5">
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <button class="button" data-bs-toggle="modal"
                                                data-bs-target="#startModal{{ $transaction->id }}"
                                                @isset($transaction->user)
                                                    disabled
                                                @endisset>
                                                Start
                                            </button>
                                            <button class="button mx-2" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $transaction->id }}"
                                                @empty($transaction->user)
                                                    disabled
                                                @endempty>
                                                End
                                            </button>
                                            {{-- <button class="button" data-bs-toggle="modal"
                                                data-bs-target="#editTrans{{ $transaction->id }}"
                                                @empty($transaction->user)
                                                    disabled
                                                @endempty>
                                                Edit
                                            </button> --}}
                                            <div class="dropup">
                                                <button class="button dropbtn" data-bs-toggle="dropdown"
                                                    @empty($transaction->user)
                                                    disabled
                                                @endempty>
                                                    Option
                                                </button>
                                                @isset($transaction->user)
                                                    <div class="dropup-content">
                                                        <a href="" data-bs-toggle="modal"
                                                            data-bs-target="#editTrans{{ $transaction->id }}">
                                                            <i class="fa fa-pencil"></i> Edit
                                                        </a>
                                                        <a href="" data-bs-toggle="modal"
                                                            data-bs-target="#resetModal{{ $transaction->id }}"><i
                                                                class="fa fa-rotate"></i> Reset</a>
                                                    </div>
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        {{-- modal start --}}
                        <div class="modal fade" id="startModal{{ $transaction->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Start
                                            {{ $transaction->name }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/dashboard/transaction/start" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $transaction->id }}">
                                            <div class="row g-3 align-items-center ms-3 me-3">
                                                <div class="col-3">
                                                    <label for="user" class="col-form-label">User</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" id="user" name="user"
                                                        class="form-control form-control-sm @error('user') is-invalid @enderror"
                                                        value="{{ old('user') }}">
                                                    @error('user')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-3">
                                                    <label for="tanggal" class="col-form-label">Tanggal</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="date" id="tanggal" name="tanggal"
                                                        class="form-control form-control-sm @error('tanggal') is-invalid @enderror"
                                                        value="{{ date('Y-m-d') }}">
                                                    @error('tanggal')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-3">
                                                    <label for="jam_mulai" class="col-form-label">Jam Mulai</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="time" id="jam_mulai" name="jam_mulai"
                                                        class="form-control form-control-sm" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Start</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end modal start --}}

                        {{-- modal edit transaction --}}
                        <div class="modal fade" id="editTrans{{ $transaction->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Start
                                            {{ $transaction->name }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/dashboard/transaction/edit-trans" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $transaction->id }}">
                                            <div class="row g-3 align-items-center ms-3 me-3">
                                                <div class="col-3">
                                                    <label for="user" class="col-form-label">User</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" id="user" name="user"
                                                        class="form-control form-control-sm @error('user') is-invalid @enderror"
                                                        value="{{ $transaction->user }}">
                                                    @error('user')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-3">
                                                    <label for="tanggal" class="col-form-label">Tanggal</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="date" id="tanggal" name="tanggal"
                                                        class="form-control form-control-sm @error('tanggal') is-invalid @enderror"
                                                        value="{{ date('Y-m-d', strtotime($transaction->jam_mulai)) }}">
                                                    @error('tanggal')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-3">
                                                    <label for="jam_mulai" class="col-form-label">Jam Mulai</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="time" id="jam_mulai" name="jam_mulai"
                                                        class="form-control form-control-sm"
                                                        value="{{ date('H:i', strtotime($transaction->jam_mulai)) }}"
                                                        required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end modal edit transaction --}}

                        {{-- End confirmation modal --}}
                        <div id="deleteModal{{ $transaction->id }}" class="modal fade" tabindex="	-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center pb-5 pt-4">
                                                <img src="{{ asset('/img/waning-logo.png') }}" alt="finish"
                                                    width="200">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center text-secondary">
                                                <h2>ARE YOU SURE ?</h2>
                                                <h6 class="pb-5">Do you want to stop and reset {{ $transaction->name }}
                                                    ?
                                                </h6>
                                                <form action="/dashboard/transaction/end" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $transaction->id }}">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i>
                                                        CANCEL
                                                    </button>
                                                    <button type="submit" class="btn btn-success"
                                                        name="delete-sample"><i class="fa-regular fa-circle-check"></i>
                                                        YES
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end End confirmation modal --}}

                        {{-- Reset confirmation modal --}}
                        <div id="resetModal{{ $transaction->id }}" class="modal fade" tabindex="	-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center pb-5 pt-4">
                                                <img src="{{ asset('/img/waning-logo.png') }}" alt="finish"
                                                    width="200">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center text-secondary">
                                                <h2>ARE YOU SURE ?</h2>
                                                <h6 class="pb-5">Do you want to stop and reset {{ $transaction->name }}
                                                    ?
                                                </h6>
                                                <form action="/dashboard/transaction/reset" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $transaction->id }}">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i>
                                                        CANCEL
                                                    </button>
                                                    <button type="submit" class="btn btn-success"
                                                        name="delete-sample"><i class="fa-regular fa-circle-check"></i>
                                                        YES
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end Reset confirmation modal --}}
                        @endforeach

                    </div>
                </div>

                <div class="col-md-4">

                    <div class="card">
                        <div class="card-header">
                            Detail Transaction
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <tbody>
                                        <form action="/dashboard/transaction/pay" method="post">
                                            @csrf
                                            <input type="hidden" name="tv_id"
                                                @if (session()->has('trans_id')) value="{{ session('trans_id') }}" 
                                                @elseif (isset($trans_id))
                                                value="{{ $trans_id }}" @endif>
                                            {{-- <input type="hidden" name="total_tambahan"
                                                @if (isset($trans_total_tambahan)) value="{{ $trans_total_tambahan }}"
                                                @else
                                                value="{{ old('total_tambahan') }}" @endif> --}}
                                            <tr>
                                                <td colspan="2">
                                                    <input type="text" id="user" name="user"
                                                        class="form-control form-control-sm" placeholder="User"
                                                        @if (isset($trans_user)) value="{{ $trans_user }}"
                                                        @else
                                                        value="{{ old('user') }}" @endif
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <input type="text" id="lama_main" name="lama_main"
                                                        class="form-control form-control-sm" placeholder="Lama main"
                                                        @if (isset($trans_lama_main)) value="{{ $trans_lama_main }}"
                                                        @else
                                                        value="{{ old('lama_main') }}" @endif
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-floating">
                                                        <input type="text" id="total_tambahan" name="total_tambahan"
                                                            class="form-control form-control-sm"
                                                            @if (isset($trans_total_tambahan)) value="{{ $trans_total_tambahan }}"
                                                            @else
                                                            value="{{ old('total_tambahan') }}" @endif
                                                            readonly>
                                                        <label for="total_tambahan">Total tambahan</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-floating">
                                                        <input type="text" id="total_rent" name="total_rent"
                                                            class="form-control form-control-sm"
                                                            @if (isset($trans_total_rent)) value="{{ $trans_total_rent }}"
                                                            @else
                                                            value="{{ old('total_rent') }}" @endif>
                                                        <label for="total_rent">Total PS</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="total" id="total-bayar" placeholder="total"
                                                        @if (isset($trans_total)) value="{{ $trans_total }}"
                                                        @else
                                                        value="{{ old('total') }}" @endif
                                                        readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" id="dibayar" name="dibayar"
                                                        class="form-control form-control-sm" placeholder="Dibayar">
                                                </td>
                                                <td width="110">
                                                    <div class="d-grid">
                                                        <button type="submit" id="pay-btn"
                                                            class="btn btn-success btn-sm">
                                                            <i class="fa fa-coins"></i> Pay</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </form>
                                        <tr class="text-center">
                                            <td colspan="2">
                                                <div class="d-grid">
                                                    <a href="/dashboard/transaction" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-arrow-rotate-left"></i> Reset
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- modal kembalian --}}
                    <div id="modalKembalian" class="modal fade" tabindex="	-1" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <a href="/dashboard/transaction"
                                        class="fa-regular fa-circle-xmark text-decoration-none text-secondary"></a>
                                    <div class="row">
                                        <svg width="115px" height="115px" viewBox="0 0 133 133" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="check-group" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <circle id="filled-circle" fill="#07b481" cx="66.5" cy="66.5"
                                                    r="54.5" />
                                                <circle id="white-circle" fill="#FFFFFF" cx="66.5" cy="66.5"
                                                    r="55.5" />
                                                <circle id="outline" stroke="#07b481" stroke-width="4" cx="66.5"
                                                    cy="66.5" r="54.5" />
                                                <polyline id="check" stroke="#FFFFFF" stroke-width="5.5"
                                                    points="41 70 56 85 92 49" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center text-secondary">
                                            <h4>Kembalian</h4>
                                            @isset($kembalian)
                                                <h2>{{ $kembalian }}</h2>
                                            @endisset
                                            <a href="/dashboard/transaction" id="done-kembalian"
                                                class="mt-4 btn btn-success" autofocus>Done</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end modal kembalian --}}

                    <div class="card mt-2">
                        <div class="card-header">
                            Menu Purchases
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr class="text-center">
                                            <td>
                                                <div class="d-grid">
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal" data-bs-target="#tambahanModal"><i
                                                            class="fa fa-martini-glass-citrus"></i> Add. Menu
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-grid">
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        data-bs-toggle="modal" data-bs-target="#purchaseList"><i
                                                            class="fa fa-list"></i> User Add.
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- modal menu tambahan --}}
                <form action="/dashboard/transaction/tambahan" method="post">
                    @csrf
                    <div class="modal fade" id="tambahanModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Menu Purchases</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="pembeli">Pembeli</label>
                                        </div>
                                        <div class="col-md-10">
                                            <select class="form-select form-select-sm" name="pembeli" id="pembeli">
                                                <option value="0" selected>Cash</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->user }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <h4 class="text-center">Makanan</h4>
                                            <div class="table-responsive">
                                                <table class="table text-center align-middle">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nama Menu</th>
                                                            <th>Pilih</th>
                                                            <th>Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($foods as $food)
                                                            <tr>
                                                                <td>
                                                                    {{ $loop->iteration }}
                                                                </td>
                                                                <td>
                                                                    {{ $food->nama_menu }}
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" class="form-check-input"
                                                                        name="items[{{ $food->id }}][nama_menu]"
                                                                        value="{{ $food->nama_menu }}">
                                                                </td>
                                                                <td class="d-flex justify-content-center">
                                                                    <div class="num-block skin-1">
                                                                        <div class="num-in">
                                                                            <span class="minus dis"></span>
                                                                            <input type="text"
                                                                                name="items[{{ $food->id }}][jumlah]"
                                                                                class="in-num" value="1"
                                                                                readonly="">
                                                                            <span class="plus"></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <input type="hidden"
                                                                    name="items[{{ $food->id }}][harga]"
                                                                    value="{{ $food->harga }}">
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-center">Minuman</h4>
                                            <div class="table-responsive">
                                                <table class="table text-center align-middle">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nama Menu</th>
                                                            <th>Pilih</th>
                                                            <th>Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($drinks as $drink)
                                                            <tr>
                                                                <td>
                                                                    {{ $loop->iteration }}
                                                                </td>
                                                                <td>
                                                                    {{ $drink->nama_menu }}
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" class="form-check-input"
                                                                        name="items[{{ $drink->id }}][nama_menu]"
                                                                        value="{{ $drink->nama_menu }}">
                                                                </td>
                                                                <td class="d-flex justify-content-center">
                                                                    <div class="num-block skin-1">
                                                                        <div class="num-in">
                                                                            <span class="minus dis"></span>
                                                                            <input type="text"
                                                                                name="items[{{ $drink->id }}][jumlah]"
                                                                                class="in-num" value="1"
                                                                                readonly="">
                                                                            <span class="plus"></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <input type="hidden"
                                                                    name="items[{{ $drink->id }}][harga]"
                                                                    value="{{ $drink->harga }}">
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-sm"><i
                                            class="fa fa-floppy-disk"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- end modal menu tambahan --}}

                {{-- modal purchase list --}}
                <div class="modal fade" id="purchaseList" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">List User Menu Purchases</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <div class="input-group mb-3">
                                            <input type="text" id="search"
                                                class="form-control rounded-start-1 rounded-end-0"
                                                placeholder="Search . . ." autofocus>
                                            <span
                                                class="input-group-text rounded-end-1 bg-secondary text-light rounded-start-0"><i
                                                    class="fa-brands fa-searchengin"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User</th>
                                                <th>Tambahan</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Subtotal</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="items-list">
                                            @forelse ($additionals as $additional)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>
                                                        {{ $additional->MenuPurchase->user }}
                                                    </td>
                                                    <td>
                                                        {{ $additional->nama_menu }}
                                                    </td>
                                                    <td>
                                                        {{ 'Rp. ' . number_format($additional->harga) }}
                                                    </td>
                                                    <td>
                                                        {{ $additional->jumlah }}
                                                    </td>
                                                    <td>
                                                        {{ 'Rp. ' . number_format($additional->total) }}
                                                    </td>
                                                    <td>
                                                        <a href="/dashboard/transaction/delete-order/{{ $additional->id }}"
                                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">
                                                        <h6>User additional menu empty.</h6>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal purchase list --}}

            </div>
        </div>
    </div>
@endsection
