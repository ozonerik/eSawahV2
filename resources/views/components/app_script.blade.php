<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
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