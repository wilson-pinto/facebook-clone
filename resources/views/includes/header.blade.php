<nav class="navbar navbar-expand-lg navbar-light bg-white d-flex justify-content-between w-100">
    <h2 class="navbar-brand d-block text-primary font-weight-bold" href="/">Facebook</h2>
    <ul class="navbar-nav" style="width: fit-content !important">
        <li class="nav-item active">
            <a class="nav-link" href="/">
                <i class="fa fa-home" aria-hidden="true"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-television" aria-hidden="true"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-users" aria-hidden="true"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-gamepad" aria-hidden="true"></i>
            </a>
        </li>
    </ul>

    <div class="d-flex justify-content-center align-items-center">
        @php
        $u = Auth::user();
        @endphp
        <img src="/img/profile/{{$u->img_url}}" class="rounded-circle" style="width: 30px; height: 30px;" alt="...">
        <h6 class="mb-0 ml-2">{{$u->name}}</h6>
    </div>

</nav>