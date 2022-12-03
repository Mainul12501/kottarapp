<script src="{{ asset('/') }}frontend/assets/js/jquery-3.4.1.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/select2.min.js"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
<script src="{{ asset('/') }}frontend/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/aos.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script> <!-- ck editor script -->
<script src="{{ asset('/') }}backend/assets/js/vendor/toastrjs.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/custom.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/customJs.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(function () {
        $( "#datepicker" ).datepicker();

        // $('.defaultSelect2').select2({
        //     width: 'resolve',
        // });

    })
</script>

@if(\Illuminate\Support\Facades\Session::has('success'))
    <script>
        toastr.success("{{ \Illuminate\Support\Facades\Session::get('success') }}");
    </script>
    {{ \Illuminate\Support\Facades\Session::forget('success') }}
@endif

@if(\Illuminate\Support\Facades\Session::has('error'))
    <script>
        toastr.error("{{ \Illuminate\Support\Facades\Session::get('error') }}");
    </script>
    {{ \Illuminate\Support\Facades\Session::forget('error') }}
@endif

<script>
    $(function () {
        $('.select2').select2({
            width: 'resolve',
            placeholder: $(this).attr('data-placeholder'),
        });
    })
</script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>


@yield('script')
