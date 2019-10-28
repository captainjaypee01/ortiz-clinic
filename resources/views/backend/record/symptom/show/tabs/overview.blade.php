<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">  

            <tr>
                <th>Name</th>
                <td>{{ $symptom->name }}</td>
            </tr>
 
            <tr>
                <th>Last Updated At</th>
                <td>
                    @if($symptom->updated_at)
                        {{ timezone()->convertToLocal($symptom->updated_at) }}
                    @else
                        N/A
                    @endif
                </td>
            </tr>
 
        </table>
    </div>
</div><!--table-responsive-->
