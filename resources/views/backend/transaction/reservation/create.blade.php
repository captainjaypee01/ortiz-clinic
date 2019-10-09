@extends('backend.layouts.app')

@section('title', 'Reservation Management' . ' | ' . 'Create Reservation')

@section('content')
{{ html()->form('POST', route('admin.transaction.reservation.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                    Reservation Management
                        <small class="text-muted">Create Reservation</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>
            

            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Customer")->for('customer') }}
                        <select name="customer" id="customer" class="selectpicker form-control" data-live-search="true">
                            @foreach($customers as $customer)
                                @if($customer->hasRole("user"))
                                <option value="{{ $customer->id }}" >{{ $customer->full_name  . " | " . $customer->email }}</option>
                                @endif
                            @endforeach
                            
                        </select>
                    </div>
                </div> 
            </div> 
            
            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Services")->for('service') }}
                        <select name="service" id="service" class="selectpicker form-control" data-live-search="true">
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" data-price="{{ $service->price }}" data-name="{{ $service->name  . " | " . $service->format_price }}">{{ $service->name  . " | " . $service->format_price }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div> 
            </div> 
            <div class="row" >
                <div class="col col-sm-12" id="section-branch" style="display:none;" >
                    <div class="form-group">
                        {{ html()->label("Branches")->for('branch') }}
                        <select name="branch" id="branch" class="selectpicker form-control" data-live-search="true">
                            
                        </select>
                    </div>
                </div> 
                <div class="col col-sm-12" id="section-no-branch" style="display:none;" >
                    No Available Branches for this service
                </div>
            </div> 

            <div class="row" id="section-reservation" style="display:none;"> 
                <div class="form-group col">
                    {{ html()->label("Reservation Date")->for('reservation_date') }}
                    {{ html()->date('reservation_date')
                            ->class('form-control calendar')  
                            ->required() }} 
                </div>
                
                <div class="form-group col">
                    {{ html()->label("Reservation Time")->for('reservation_time') }}
                    {{ html()->time('reservation_time')
                            ->class('form-control')   
                            ->required() }}
                </div>  
            </div> 
             

        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.transaction.order.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create'))->id("btn-submit")->attribute('disabled') }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection

@push('after-styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">

@endpush
@push('after-scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script>

    Date.prototype.addDays = function(days) {
        this.setDate(this.getDate() + parseInt(days));
        return this;
    };
    var minimumDate = new Date(new Date().getDate() + 2);
    $('#reservation_date').datetimepicker( {
        minDate : new Date().addDays(1),
        format:'Y-M-DD'
    }); 
    $('#customer').selectpicker();
    $('#service').selectpicker();
    
    $('#customer').val(0);
    $('#service').val(0);
    $('.selectpicker').selectpicker('refresh');

    $("#service").change(function(e){
        var d = $(this).val();
         $.ajax({
            url : "{{ route('admin.transaction.reservation.service.branches') }}" + '?service=' + d,
            type : "GET",
            dataType : 'json',
            success : function(response){
                if(response.success){
                    $("#branch").html(response.html);
                    $("#section-branch").show();
                    $("#section-no-branch").hide(); 
                    $("#section-reservation").hide();

                    $('#branch').val(0);
                    $('.selectpicker').selectpicker('refresh'); 
                }
                else{ 
                    $("#section-branch").hide();
                    $("#section-reservation").hide();
                    $("#section-no-branch").show();
                }
            },
            error : function(response){
                console.log(response);
            }
         });
    });

    $("#branch").change(function(e){
        $("#section-reservation").show();
    });

    $("#reservation_time").on("input", function() { 
        $("#btn-submit").prop("disabled", false);
    });
  
</script>
@endpush
