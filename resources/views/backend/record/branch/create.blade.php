@extends('backend.layouts.app')

@section('title', 'Branch Management' . ' | ' . 'Create Branch')

@section('content')
{{ html()->form('POST', route('admin.record.branch.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                    Branch Management
                        <small class="text-muted">Create Branch</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>
            
            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Name")->for('name') }}
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" required>
                    </div>
                </div> 
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Contact Number")->for('contact_number') }}
                        <input type="text" name="contact_number" id="contact_number" placeholder="Contact Number" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Telephone Number")->for('tel_number') }}
                        <input type="text" name="tel_number" id="tel_number" placeholder="Telephone Number" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Address Line 1")->for('address_line_1') }}
                        <input type="text" name="address_line_1" id="address_line_1" placeholder="Address Line 1" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Barangay")->for('barangay') }}
                        <input type="text" name="barangay" id="barangay" placeholder="Barangay" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        {{ html()->label("City/Muncipality")->for('city') }}
                        <input type="text" name="city" id="city" placeholder="City/Muncipality" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Province")->for('province') }}
                        
                        <select name="province" id="province" class="form-control">
                            @foreach($provinces as $province)
                                <option value="{{ $province->name }}">{{ $province->name }}</option>
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
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection
