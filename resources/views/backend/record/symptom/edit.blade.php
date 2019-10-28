@extends('backend.layouts.app')

@section('title', 'Symptom Management' . ' | ' . 'Edit Symptom')

@section('content')
{{ html()->modelForm($symptom, 'PATCH', route('admin.record.symptom.update', $symptom))->class('form-horizontal')->open() }} 
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Symptom Management
                        <small class="text-muted">Edit Symptom</small>
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
                        {{ html()->label("Services")->for('services') }}
                        <select name="services[]" id="services" class="selectpicker form-control" multiple="multiple" data-live-search="true">
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                            
                        </select>
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
                    {{ form_cancel(route('admin.record.symptom.index'), __('buttons.general.cancel')) }}
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
      
    var selectedServices = []; 
    @foreach($symptomServices as $service)
        selectedServices.push({{ $service->id }}); 
    @endforeach 
    $('#services').val(selectedServices);  
    $('#services').selectpicker();
</script>
@endpush

