<li class="nav-item">
    <a href="#" class="nav-link @if( request()->routeIs( $routename ) ) active @endif">
    <i class="nav-icon {{ $icon }}"></i>
        {{ $name }}
    </a>
</li>