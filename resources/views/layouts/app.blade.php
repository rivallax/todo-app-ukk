<!DOCTYPE html>
<html lang="en">

{{--  MODULAR LAYOUT --}}

@include('partials.head') <!-- Panggil head -->

<body>
    @include('partials.modal') <!-- Panggil modal -->
    
    @yield('content') <!-- Render content -->

    @include('partials.scripts') <!-- Panggil scripts -->
</body>

</html>
