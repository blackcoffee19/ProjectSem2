@include('user.partials.head')
@include('user.partials.header')
@yield('content')
@include('user.partials.modal-fade')
@include('user.partials.footer')




    <!-- Libs JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/simplebar.min.js') }}"></script>
    <!-- Theme JS -->
    <script src="{{ asset('js/theme.min.js') }}."></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/countdown.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/slick-slider.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <script src="{{ asset('js/tns-slider.js') }}"></script>
    <script src="{{ asset('js/zoom.js') }}"></script>
    <script src="{{ asset('js/increment-value.js') }}"></script>
</body>

</html>
