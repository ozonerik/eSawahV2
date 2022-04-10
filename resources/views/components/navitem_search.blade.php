<!-- Navbar Search -->
<li class="nav-item">
    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
    </a>
    <div class="navbar-search-block">
        @livewire('search',[ 'target_comp' => $target, 'placeholder_comp' => $placeholder])
    </div>
</li>