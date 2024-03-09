<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Bootstrap 5 -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- bs-datepicker -->
<script src="{{ asset('plugins/bs-datepicker/bs-datepicker.min.js') }}"></script>
<script src="{{ asset('plugins/bs-datepicker/bs-datepicker-ID.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{get_googleapikey()}}&language=id&libraries=places"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    // Make the dashboard widgets sortable Using jquery UI
    $('.connectedSortable').sortable({
        placeholder: 'sort-highlight',
        connectWith: '.connectedSortable',
        handle: '.card-header, .nav-tabs',
        forcePlaceholderSize: true,
        zIndex: 999999
    })
    $('.connectedSortable .card-header').css('cursor', 'move');
</script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
@livewire('flash')
<script>
    var toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
    var currentTheme = localStorage.getItem('theme');
    var mainHeader = document.querySelector('.main-header');

    if (currentTheme) {
        if (currentTheme === 'dark') {
        if (!document.body.classList.contains('dark-mode')) {
            document.body.classList.add("dark-mode");
        }
        if (mainHeader.classList.contains('navbar-light')) {
            mainHeader.classList.add('navbar-dark');
            mainHeader.classList.remove('navbar-light');
        }
        toggleSwitch.checked = true;
        }
    }

    function switchTheme(e) {
        if (e.target.checked) {
        if (!document.body.classList.contains('dark-mode')) {
            document.body.classList.add("dark-mode");
        }
        if (mainHeader.classList.contains('navbar-light')) {
            mainHeader.classList.add('navbar-dark');
            mainHeader.classList.remove('navbar-light');
        }
        localStorage.setItem('theme', 'dark');
        } else {
        if (document.body.classList.contains('dark-mode')) {
            document.body.classList.remove("dark-mode");
        }
        if (mainHeader.classList.contains('navbar-dark')) {
            mainHeader.classList.add('navbar-light');
            mainHeader.classList.remove('navbar-dark');
        }
        localStorage.setItem('theme', 'light');
        }
    }

    toggleSwitch.addEventListener('change', switchTheme, false);
</script>