<div class="col-md-{{ $width }} connectedSortable">
    <div class="card">
        <div class="card-header border-transparent">
        <h3 class="card-title">{{ $title }}</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool ml-2" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
        </div>
        <div class="card-body p-0">
            <div class="input-group input-group-sm float-left mb-2 ml-3 pl-1" style="width: 75px;">
                <select class="form-control" wire:model="perPage">
                    <option value="5">5</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="{{ $data->total() }}">All</option>
               </select>
            </div>
            <div class="input-group input-group-sm float-right mb-2 mr-3" style="width: 200px;">
                <input type="text" name="table_search" class="form-control" placeholder="Search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped m-0">
                    <thead>
                        <tr>
                            <th class="text-center"><input type="checkbox"></th>
                            <th>No</th>
                            @foreach($thead as $val)
                            <th>{{ $val }}</th>
                            @endforeach
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key=>$row)
                        <tr>
                            <td class="text-center"><input type="checkbox"></td>
                            <td>{{$data->firstItem() + $key}}</td>
                            @foreach($tbody as $val)
                            <td>{{ $row->$val }}</td>
                            @endforeach
                            <td>
                                {{ $btn }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer clearfix">
            {{ $data->links() }}
        </div>
    </div>
</div>