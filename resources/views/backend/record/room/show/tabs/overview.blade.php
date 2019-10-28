<div class="col">
    <div class="table-responsive">
        <table class="table table-hover"> 
            <tr>
                <th>Branch</th>
                <td>{{ $room->branch->name }}</td>
            </tr>

            <tr>
                <th>Room Name</th>
                <td>{{ $room->name }}</td>
            </tr>
 
            <tr>
                <th>Last Updated At</th>
                <td>
                    @if($room->updated_at)
                        {{ timezone()->convertToLocal($room->updated_at) }}
                    @else
                        N/A
                    @endif
                </td>
            </tr>
 
        </table>
    </div>
</div><!--table-responsive-->
