<div class="col-md-{{ $width }} order-{{ $smallorder }} order-md-{{ $order }} connectedSortable">
    <div class="card card-{{ $type }}">
        <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
        <div class="card-tools">
            <button wire:click.prevent="onRead" class="btn btn-tool" data-toggle="tooltip" title="Back" >
                <i class="fa fa-arrow-left"></i>
            </button>
            <button type="button" class="btn btn-tool ml-2" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
        </div>
        <div class="card-body">
            <div class="row mx-3 pl-1 mb-2">
                <div class="col-md-1 p-0 order-1 pr-md-3">
                    <div class="input-group input-group-sm mx-auto float-md-left mb-2 mb-md-0">
                        <select class="form-control" wire:model="perPage">
                            <option value="5">5</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="{{ $data->total() }}">All</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped m-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            @foreach($thead as $val)
                            <th>{{ $val }}</th>
                            @endforeach
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key=>$row)
                        <tr class="table-primary">
                            <td>{{$data->firstItem() + $key}}</td>
                            @foreach($tbody as $val)
                                <td>
                                @if($val=="images"||$val=="photos"||$val=="img"||$val=="photo"||$val=="image")
                                        @if(!empty($row->$val))
                                        <img alt="images" src="{{ asset('storage/'.$row->$val) }}" class="img-thumbnail rounded float-left" style="max-height:150px"/> 
                                        @else
                                        <img alt="images" src="{{ asset('img/image.png') }}" class="img-thumbnail rounded float-left" style="max-height:150px"/> 
                                        @endif
                                    @else 
                                        {{ $row->$val }} 
                                    @endif 
                                </td>
                            @endforeach
                            <td>
                                @if( in_array('restore',$tbtn) &&  in_array('del',$tbtn) )
                                <button wire:click.prevent="onResDel({{ $row->id }})" class="btn btn-sm btn-success" data-toggle="tooltip" title="Restore" ><i class="fas fa-trash-restore-alt"></i></button>         
                                <button wire:click.prevent="onDelForce({{ $row->id }})" class="btn btn-sm btn-danger mt-1 mt-md-0" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                @elseif(in_array('restore',$tbtn))
                                <button wire:click.prevent="onResDel({{ $row->id }})" class="btn btn-sm btn-success" data-toggle="tooltip" title="Restore" ><i class="fas fa-trash-restore-alt"></i></button>
                                @elseif(in_array('del',$tbtn))
                                <button wire:click.prevent="onDelForce({{ $row->id }})" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer clearfix">
            <div class="float-left">
                <small>Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} entries</small>
            </div>
            {{ $data->links() }} 
        </div>
    </div>
</div>