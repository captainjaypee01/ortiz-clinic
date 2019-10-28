@extends('backend.layouts.app')

@section('title', 'Branch Management' . ' | ' . 'Edit Branch')

@section('content')
{{ html()->modelForm($branch, 'PATCH', route('admin.record.branch.update', $branch))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                    Branch Management
                        <small class="text-muted">Edit Branch</small>
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
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Contact Number")->for('contact_number') }}
                        {{ html()->text('contact_number')
                                ->class('form-control')
                                ->placeholder('Contact Number')
                                ->attribute('maxlength', 30)
                                ->required() }}  
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Telephone Number")->for('contact') }}
                        {{ html()->text('tel_number')
                                ->class('form-control')
                                ->placeholder('Telephone Number')
                                ->attribute('maxlength', 30)
                                ->required() }}   
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Address Line 1")->for('address_line_1') }}
                        {{ html()->text('address_line_1')
                                ->class('form-control')
                                ->placeholder('Address Line 1') 
                                ->required() }}  
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Barangay")->for('barangay') }}
                        {{ html()->text('barangay')
                                ->class('form-control')
                                ->placeholder('Barangay') 
                                ->required() }}   
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        {{ html()->label("City/Muncipality")->for('city') }}
                        {{ html()->text('city')
                                ->class('form-control')
                                ->placeholder('City/Muncipality') 
                                ->required() }}   
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Province")->for('province') }}
                        
                        <select name="province" id="province" class="form-control">
                            @foreach($provinces as $province)
                                <option value="{{ $province->name }}" {{ $province->name == $branch->province ? 'selected' : '' }}>{{ $province->name }}</option>
                            @endforeach 
                        </select>  
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Country")->for('country') }}
                        <select name="country" id="country" class="form-control">
                            <option value="philippines">Philippines</option>
                        </select> 
                    </div>
                </div>
            </div>
            

        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.record.branch.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
