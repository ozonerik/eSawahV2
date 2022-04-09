<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-metatag/>
    <x-favicon/>
    @livewireStyles
    <x-app_css/>
    @stack('css')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <x-navbar />
        <x-sidebar>
            <x-navitem_menu name="Dashboard" routename="dashboard" icon="fas fa-tachometer-alt" />
            <x-navitem_tree icon="fas fa-tachometer-alt" name="Menu Utama" :open="cek_currentroute(['routelain','routelain2'])">
                <x-navitem_menu name="Sub Menu 1" routename="home" icon="far fa-circle nav-icon" />
                <x-navitem_menu name="Sub Menu 2" routename="home" icon="far fa-circle nav-icon" />
            </x-navitem_tree>
        </x-sidebar>
        <div class="content-wrapper">
            <div class="content">
                @yield('content')
            </div>
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Made with <i class="fa fa-heart text-danger"></i> in Cirebon
            </div>
            <x-copyright />
        </footer>
    </div>
    @livewireScripts
    <x-app_script/>
    @stack('js')
</body>
</html>