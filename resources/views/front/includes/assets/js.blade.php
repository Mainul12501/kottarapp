<script src="{{ asset('/') }}frontend/assets/js/jquery-3.4.1.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/select2.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/aos.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<script src="{{ asset('/') }}frontend/assets/js/custom.js"></script>
<script>
    $(function () {
        $( "#datepicker" ).datepicker();

        $('.defaultSelect2').select2({
            width: 'resolve',
        });
    })
</script>
@yield('script')
