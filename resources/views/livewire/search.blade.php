<form class="form-inline" wire:submit.prevent="get_search">
    <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" wire:model.defer="search_txt" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</form>