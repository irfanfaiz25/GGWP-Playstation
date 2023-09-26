{{-- link jquery --}}
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>

<script type="text/javascript">
    $('#search').on('keyup', function() {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('search') }}',
            data: {
                'search': $value
            },
            success: function(data) {
                $('#items-list').html(data);
            }
        });
    });

    $('#searchIncomePs').on('keyup', function() {
        $searchIncomePs = $(this).val();
        $timeValue = $('#timeSearch').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('incomeps') }}',
            data: {
                'search': $searchIncomePs,
                'time_search': $timeValue
            },
            success: function(data) {
                $('#incomeps-list').html(data);
            }
        });
    });

    $('#timeSearch').on('change', function() {
        $timeValue = $(this).val();
        $searchIncomePs = $('#searchIncomePs').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('incomeps') }}',
            data: {
                'search': $searchIncomePs,
                'time_search': $timeValue
            },
            success: function(data) {
                $('#incomeps-list').html(data);
            }
        });
    });

    $('#searchIncomeAngkringan').on('keyup', function() {
        $searchIncomeAngkringan = $(this).val();
        $timeValueAngkringan = $('#timeSearchAngkringan').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('incomeangkringan') }}',
            data: {
                'search': $searchIncomeAngkringan,
                'time_search': $timeValueAngkringan
            },
            success: function(data) {
                $('#incomeangkringan-list').html(data);
            }
        });
    });

    $('#timeSearchAngkringan').on('change', function() {
        $timeValueAngkringan = $(this).val();
        $searchIncomeAngkringan = $('#searchIncomeAngkringan').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('incomeangkringan') }}',
            data: {
                'search': $searchIncomeAngkringan,
                'time_search': $timeValueAngkringan
            },
            success: function(data) {
                $('#incomeangkringan-list').html(data);
            }
        });
    });

    $('#searchExpend').on('keyup', function() {
        $SearchExpend = $(this).val();
        $timeValueExpend = $('#timeSearchExpend').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('expend') }}',
            data: {
                'search': $SearchExpend,
                'time_search': $timeValueExpend
            },
            success: function(data) {
                $('#expend-list').html(data);
            }
        });
    });

    $('#timeSearchExpend').on('change', function() {
        $timeValueExpend = $(this).val();
        $SearchExpend = $('#searchExpend').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('expend') }}',
            data: {
                'search': $SearchExpend,
                'time_search': $timeValueExpend
            },
            success: function(data) {
                $('#expend-list').html(data);
            }
        });
    });

    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });

    @if (session('success'))
        $(document).ready(function() {
            $('.toast').toast('show');
        });
    @endif

    @if (session('error'))
        $(document).ready(function() {
            $('.toast-error').toast('show');
        });
    @endif

    @if (session('doneKembalian'))
        let modalKembalian = new bootstrap.Modal(document.getElementById('modalKembalian'), {});
        modalKembalian.show();

        var redirectUrl = 'http://127.0.0.1:8082/dashboard/transaction';
        var delay = 3000;

        setTimeout(function() {
            window.location.href = redirectUrl;
        }, delay);
    @endif

    // realtime sum
    $(function() {
        $('#total_tambahan, #total_rent').keyup(function() {
            var value1 = parseFloat($('#total_tambahan').val().replace(/\./g, '')) || 0;
            var value2 = parseFloat($('#total_rent').val().replace(/\./g, '')) || 0;
            $('#total-bayar').val(parseInt(value1 + value2).toLocaleString().replace(',', '.'));
        });
    });

    // edit expend modals
    $(document).ready(function() {
        $(document).on('click', '#editPengeluaran', function() {
            let editPengeluaranModal = new bootstrap.Modal(document.getElementById(
                'editPengeluaranModal'), {});
            var expendId = $(this).data('id');
            var tanggal = $(this).data('tanggal');
            var keperluan = $(this).data('keperluan');
            var harga = $(this).data('harga');
            var jumlah = $(this).data('jumlah');
            var keterangan = $(this).data('ket');

            // $('#idExpend').val(expendId);
            $('#tanggalExpend').val(tanggal);
            $('#keperluanExpend').val(keperluan);
            $('#hargaExpend').val(harga);
            $('#jumlahExpend').val(jumlah);
            $('#keteranganExpend').val(keterangan);

            $('#editExpendForm').attr('action', '/dashboard/data-finance/expend/' + expendId);

            editPengeluaranModal.show();
        });
    });
    // end edit expend modals

    // delete expend confirmation modal
    $(document).ready(function() {
        $(document).on('click', '#deletePengeluaran', function() {
            let deletePengeluaranModal = new bootstrap.Modal(document.getElementById(
                'deletePengeluaranModal'), {});
            var deleteExpendId = $(this).data('id');

            $('#deleteExpendForm').attr('action', '/dashboard/data-finance/expend/' + deleteExpendId);

            deletePengeluaranModal.show();
        });
    });
    // end delete expend confirmation modal

    // edit income angkringan modals
    $(document).ready(function() {
        $(document).on('click', '#btnEditAngkringan', function() {
            let editIncomeAngkringan = new bootstrap.Modal(document.getElementById(
                'editIncomeAngkringan'), {});
            var incomeAngkriganId = $(this).data('id');
            var namaMenu = $(this).data('nama-menu');
            var harga = $(this).data('harga');
            var jumlah = $(this).data('jumlah');

            $('#namaMenuAngkringan').val(namaMenu);
            $('#hargaAngkringan').val(harga);
            $('#jumlahAngkringan').val(jumlah);

            $('#editAngkringanForm').attr('action', '/dashboard/data-finance/angkringan/' +
                incomeAngkriganId);

            editIncomeAngkringan.show();
        });
    });
    // end edit income angkringan modals

    // delete income angkringan confirmation modal
    $(document).ready(function() {
        $(document).on('click', '#btnDeleteAngkringan', function() {
            let deleteAngkringanModal = new bootstrap.Modal(document.getElementById(
                'deleteAngkringanModal'), {});
            var deleteAngkringanId = $(this).data('id');

            $('#deleteAngkringanForm').attr('action', '/dashboard/data-finance/angkringan/' +
                deleteAngkringanId);

            deleteAngkringanModal.show();
        });
    });
    // end delete income angkringan confirmation modal

    // edit income PS modals
    $(document).ready(function() {
        $(document).on('click', '#btnEditPs', function() {
            let editIncomePs = new bootstrap.Modal(document.getElementById(
                'editIncomePs'), {});
            var incomePsId = $(this).data('id');
            var user = $(this).data('user');
            var totalPs = $(this).data('total-ps');
            var totalTambahan = $(this).data('total-tambahan');

            $('#userPs').val(user);
            $('#totalPs').val(totalPs);
            $('#totalTambahanPs').val(totalTambahan);

            $('#editPsForm').attr('action', '/dashboard/data-finance/ps/' +
                incomePsId);

            editIncomePs.show();
        });
    });
    // end edit income PS modals

    // delete income ps confirmation modal
    $(document).ready(function() {
        $(document).on('click', '#btnDeletePs', function() {
            let deletePsModal = new bootstrap.Modal(document.getElementById(
                'deletePsModal'), {});
            var deletePsId = $(this).data('id');

            $('#deletePsForm').attr('action', '/dashboard/data-finance/ps/' +
                deletePsId);

            deletePsModal.show();
        });
    });
    // end delete income ps confirmation modal
</script>
{{-- link js --}}
<script src="{{ asset('/js/main.js') }}"></script>
