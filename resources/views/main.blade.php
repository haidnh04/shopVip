<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body>
    <!--class="animsition" -->

    <!-- Header -->
    @include('header')
    @include('sliders')
    <!-- Cart -->
    @include('carts')

    @yield('content')

    @include('footer')

</body>

</html>
