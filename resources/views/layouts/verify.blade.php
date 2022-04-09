<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-metatag/>
    <x-favicon/>
    <x-app_css/>
</head>
<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <x-verify_navbar/>
        <div class="content-wrapper">
            <div class="content pt-5">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Made with <i class="fa fa-heart text-danger"></i> in Cirebon
            </div>
            <x-copyright />
        </footer>
    </div>
    <x-app_script/>
</body>
</html>
