<div class="col">
    <div class="table-responsive">
        <table class="table table-hover"> 
            <tr>
                <th>Name</th>
                <td>{{ $category->name }}</td>
            </tr>
 
            <tr>
                <th>Description</th>
                <td>{{ $category->description }}</td>
            </tr> 

            <tr>
                <th>Last Updated At</th>
                <td>
                    @if($category->updated_at)
                        {{ timezone()->convertToLocal($category->updated_at) }}
                    @else
                        N/A
                    @endif
                </td>
            </tr>
 
        </table>
    </div>
</div><!--table-responsive-->
