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
            <x-navitem_menu name="Profile" routename="profile" icon="fas fa-user" />
            <x-navitem_tree icon="fas fa-tools" name="Settings" :open="cek_currentroute(['users','info'])">
                <x-navitem_menu name="Users" routename="users" icon="fas fa-users" />
                <x-navitem_menu name="Info" routename="home" icon="fas fa-bullhorn" />
            </x-navitem_tree>
        </x-sidebar>
        <div class="content-wrapper">
            <div class="content">
                @yield('content')
            </div>
        </div>
        <footer class="main-footer">
            <x-app_version />
            <x-copyright />
        </footer>
    </div>
    @livewireScripts
    <x-app_script/>
    @stack('js')
</body>
</html>