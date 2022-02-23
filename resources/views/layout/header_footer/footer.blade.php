</div>
</div>
{{-- {{asset('')}} --}}
{{-- @Scripts.Render("~/bundles/jquery")
@Scripts.Render("~/bundles/bootstrap")
@RenderSection("scripts", required: false) --}}
<script src="{{ asset('assets/js/app.js') }}"></script>
@yield('page-specific-script')
</body>

</html>
