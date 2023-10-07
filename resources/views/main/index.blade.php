<!DOCTYPE html>
<html lang="en">

<head>
    @include('main.header')
</head>

<body class="loading font-[poppins] overscroll-none secondary-bg-color text-white" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid"
    data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default'
    data-sidebar-user='true'>

    <!-- Begin page -->
    <div id="wrapper">
        @include('main.navbar')
        @yield('content')
        @include('main.footer')
    {{-- tutup div wrapper ada di file footer.blade.php --}}
    </div>
    @include('main.script')
</body>


</html>
