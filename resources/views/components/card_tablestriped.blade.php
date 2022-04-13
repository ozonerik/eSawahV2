<div class="col-md-{{ $width }} connectedSortable">
    <div class="card">
        <div class="card-header border-transparent">
        <h3 class="card-title">{{ $title }}</h3>
        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 250px;">
                <input type="text" name="table_search" class="form-control float-left" placeholder="Search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                    </button>
                </div>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
            </button>
            </div>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped m-0">
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
            <div class="float-left">
                {{ $footer }}
            </div>
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
</div>