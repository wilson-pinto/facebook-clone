<!DOCTYPE html>
<html lang="en">
@include('includes.head')

<body class="bg-light">

    @auth
    @include('includes.header')
    @endauth
    <div class="container">
        @yield('body')
    </div>

    @yield('scripts')

</body>

</html>