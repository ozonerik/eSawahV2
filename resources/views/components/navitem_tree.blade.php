<li class="nav-item @if($open) menu-open @endif ">
    <a href="#" class="nav-link">
        <i class="nav-icon {{ $icon }}"></i>
        {{ $name }}
        <i class="right fas fa-angle-left"></i>
    </a>
    <ul class="nav nav-treeview">
        {{ $slot }}
    </ul>
</li>