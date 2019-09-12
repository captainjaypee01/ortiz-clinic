@extends('backend.layouts.app')

@section('title', 'Service Management' . ' | ' . 'Edit Service')

@section('content')
{{ html()->modelForm($service, 'PATCH', route('admin.record.service.update', $service))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                    Service Management
                        <small class="text-muted">Edit Service</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>
            
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

            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Price")->for('price') }}
                        <input type="number" name="price" id="price" value="{{ $service->price }}" class="form-control" required>
                    </div>
                </div> 
            </div>

            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Description")->for('description') }}
                        {{ html()->textarea('description')
                                ->class('form-control')
                                ->placeholder('Description')
                                ->attribute('rows', 15)
                                ->required() }}  
                    </div>
                </div> 
            </div>

 

        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.record.service.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
