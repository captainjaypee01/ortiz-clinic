

    <div class="row mb-4">
        <div class="col">
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add-room-modal">
                    Add Room
                </button>   
        </div>
        @include('backend.record.branch.show.modals.add-room')
    </div>
@if(count($branchRooms) > 0)
<div class="col">
    <div class="table-responsive">
        <table class="table table-hover"> 
            <thead>
                <tr>
                    <th>Name</th>  
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead> 
            <tbody>
                @foreach($branchRooms as $room)
                <tr>
                    <td>{{ $room->name }}</td>
                    <td>{!! $branch->status_label !!}</td>
                    <td>
                        <a href="{{ route('admin.record.branch.rooms.destroy', [$branch, $room]) }}" class="btn btn-warning btn-sm">Remove </a>
                    </td>
                </tr>
                @endforeach   

            </tbody>
 
        </table>
    </div>
</div><!--table-responsive-->
@else
    <div class="row align-items-center justify-content-md-center">
        <div class="col-lg-3 col-xl-2 text-center">
            <img src="{{ asset('img/frontend/no_data.png') }}" height="200" class="mt-4">
        </div>
        <div class="col-lg-3 text-center">
            <h1 class="display-4">Oops..</h1>
            <p class="lead"><strong>There are no rooms assigned to this branch. Please asssign atleast 1 room in this branch</strong></p>
        </div>
    </div>
@endif



