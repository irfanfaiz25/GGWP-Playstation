<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- link icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- link bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <title>Rental PS</title>

    <style>

    </style>
</head>

<body id="bodyId">

    @include('dashboard.partials.sidebar')

    <div class="height-100 bg-light wrap">
        @if (session()->has('success'))
            <div class="toast-container position-fixed top-0 end-0 p-3">

                <!-- Then put toasts within -->
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-ijo text-light">
                        {{-- <img src="" class="rounded me-2" alt="..."> --}}
                        <i class="fa fa-circle-info me-2"></i>
                        <strong class="me-auto">GGWP Gaming</strong>
                        <small>Just Now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                </div>

            </div>
        @endif
        @if (session()->has('error'))
            <div class="toast-container position-fixed top-0 end-0 p-3">

                <!-- Then put toasts within -->
                <div class="toast toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-red text-light">
                        {{-- <img src="" class="rounded me-2" alt="..."> --}}
                        <i class="fa fa-circle-info me-2"></i>
                        <strong class="me-auto">GGWP Gaming</strong>
                        <small>Just Now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ session('error') }}
                    </div>
                </div>

            </div>
        @endif
        @yield('container')
    </div>


    {{-- page loader --}}
    <div class="loader-wrapper">
        <div class="spinner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    @include('dashboard.partials.script')

</body>

</html>
