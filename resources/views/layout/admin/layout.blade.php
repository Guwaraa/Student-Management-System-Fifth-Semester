@include('layout.header_footer.head')
@include('layout.admin.sidebar')
@include('layout.admin.navbar')
<main class="content">
    <div class="container-fluid p-0">
        @yield('content')
    </div>

</main>
@include('layout.header_footer.footer')



