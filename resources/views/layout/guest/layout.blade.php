@include('layout.header_footer.head')
@include('layout.guest.sidebar')
@include('layout.guest.navbar')
<main class="content">
    <div class="container-fluid p-0">
        @yield('content');

    </div>
</main>
@include('layout.header_footer.footer')



