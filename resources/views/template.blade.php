@include('partials_theme.header')
@include('partials_theme.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @yield('content')
</div>
<!-- /.content-wrapper -->

@include('partials_theme.footer')