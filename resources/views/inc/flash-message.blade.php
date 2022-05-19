<div class="bg-dark w-100 d-flex justify-content-center align-items-center">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block w-25 bg-dark d-flex justify-content-center align-items-center border-0">
            <p class="me-3">✔</p>
            <strong>{{ $message }}</strong>
        </div>
    @endif


    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block  w-25 bg-dark d-flex justify-content-center align-items-center border-0">
            <p class="me-3">❌</p>
            <strong>{{ $message }}</strong>
        </div>
    @endif


    @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-block w-25 bg-dark d-flex justify-content-center align-items-center border-0">
            <p class="me-3">⚠</p>
            <strong>{{ $message }}</strong>
        </div>
    @endif


    @if ($message = Session::get('info'))
        <div class="alert alert-info alert-block w-25 bg-dark d-flex justify-content-center align-items-center border-0">
            <p class="me-3">ℹ</p>
            <strong>{{ $message }}</strong>
        </div>
    @endif


    @if ($errors->any())
        <div class="alert alert-danger w-25 bg-dark d-flex justify-content-center align-items-center border-0">
            <p class="me-3"></p>
            <strong>Please check the form below for errors</strong>
        </div>
    @endif

</div>
