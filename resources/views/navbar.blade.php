<nav class="navbar navbar-expand-lg bg-dark shadow-lg">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold ms-5 fw-bold text-white " href="#">
            <h1 class="ms-3">Music Bar</h1></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto me-5">
                <li class="nav-item fw-light me-3">
                    <a class="nav-link active text-white" aria-current="page" href="{{ url('/') }}">Bands</a>
                </li>
                <li class="nav-item fw-light me-3">
                    <a class="nav-link text-white" href="{{ url('/booking') }}">Bookings</a>
                </li>
                <li class="nav-item fw-light me-3">
                    <a class="nav-link text-white" href="#">Contacts</a>
                </li>
                <li class="nav-item fw-light">
                    <a class="nav-link text-white" href="#">About</a>
                </li>
        </div>
    </div>
</nav>
