@extends('backend.layouts.app')

@section('title', 'Room Management' . ' | ' . 'Edit Room')

@section('content')
{{ html()->modelForm($room, 'PATCH', route('admin.record.room.update', $room))->class('form-horizontal')->open() }} 
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Room Management
                        <small class="text-muted">Edit Room</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>
            
            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Branches")->for('branches') }}
                        <select name="branch" id="branches" class="selectpicker form-control"  data-live-search="true">
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}" {{ $room->branch_id == $branch->id ? 'selected' : ''}}>{{ $branch->name }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div> 
            </div>

            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Name")->for('name') }}
                        {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder('Name')
                                ->attribute('maxlength', 191)
                                ->required() }} 
                    </div>
                </div> 
            </div>
            

        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.record.room.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection

@push('after-styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@endpush
@push('after-scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
     
    $('#branches').selectpicker();
</script>
@endpush

