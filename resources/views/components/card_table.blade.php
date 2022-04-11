<div class="col-md-{{ $width }} connectedSortable">
    <div class="card">
        <div class="card-header border-transparent">
        <h3 class="card-title">{{ $title }}</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
            </button>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0">
                    <thead>
                        <tr>
                            {{ $thead }}
                        </tr>
                    </thead>
                <tbody>
                    {{ $slot }}
                </tbody>
            </table>
        </div>
        </div>
        <div class="card-footer clearfix">
            {{ $footer }}
        </div>
    </div>
</div>