@extends('backend.layouts.app')

@section('title', 'Service Management' . ' | ' . 'Assign Branch')

@section('content')
{{ html()->modelForm($service, 'PATCH', route('admin.record.service.store_branch', $service))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                    Service Management
                        <small class="text-muted">Assign Branch</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row">
                @foreach($branches as $branch)
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                        
                            <div class="checkbox d-flex align-items-center">

                                {{ html()->label(
                                        html()->checkbox('branches[]', in_array($branch->id, $serviceBranches), $branch->id)
                                                ->class('switch-input')
                                                ->id('branch-'.$branch->id) 
                                            . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                        ->class('switch switch-label switch-pill switch-primary mr-2')
                                    ->for('branch-'.$branch->id) }}
                                {{ html()->label(ucwords($branch->name))->for('branch-'.$branch->id) }}
                                        
                            </div>
                        </div>
                    </div>
                @endforeach 
            </div>

        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.record.service.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit('Save') }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
