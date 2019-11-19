

<div class="modal fade login-modal" id="approve-res-payment-modal" tabindex="-1" role="dialog" aria-labelledby="approve-res-payment-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    Approve Payment
                </div>
                {{ html()->form('POST', route('admin.transaction.reservation.approve', $reservation))->attribute("enctype","multipart/form-data")->class('form-horizontal')->open() }}
                <div class="modal-body">
                    <div class="containerlogin-wrapper">  
                        <hr>
                        
                         <div class="row  mt-4 text-center ">
                             <div class="col">
                                 <h3 class="text-title">ARE YOU SURE YOU WANT TO APPROVE THIS PAYMENT?</h3>
                             </div>
                         </div>
                    </div>
                </div>
                <div class="modal-footer"> 
                    <div class="col">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div><!--col-->
    
                    <div class="col text-right">
                        {{ form_submit('Approve') }}
                    </div><!--col-->
                </div>
                {{ html()->form()->close() }}
                {{-- {{ html()->form('POST', route('admin.transaction.reservation.approve', $reservation))->attribute("enctype","multipart/form-data")->class('form-horizontal')->open() }}
                <div class="modal-body">
                    <div class="containerlogin-wrapper">  
                        <hr>
                        <div class="row">
                            <div class="col col-sm-12">
                                <div class="form-group">
                                    {{ html()->label("Employee")->for('employee') }}
                                    <select name="employee" id="employee" class="selectpicker form-control" data-live-search="true">
                                        @foreach($users as $user) 
                                            <option value="{{ $user->id }}" >{{ $user->full_name  . " | " . $user->email }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col col-sm-12">
                                <div class="form-group">
                                    {{ html()->label("Room")->for('room') }}
                                    <select name="room" id="room" class="selectpicker form-control"  data-live-search="true">
                                        @foreach($rooms as $room)
                                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div> 
                        </div>

                         <div class="row  mt-4 text-center ">
                             <div class="col">
                                 <h3 class="text-title">ARE YOU SURE YOU WANT TO APPROVE THIS PAYMENT?</h3>
                             </div>
                         </div>
                    </div>
                </div>
                <div class="modal-footer"> 
                    <div class="col">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div><!--col-->
    
                    <div class="col text-right">
                        {{ form_submit('Approve') }}
                    </div><!--col-->
                </div>
                {{ html()->form()->close() }} --}}
            </div>
        </div>
    </div>
    
    
@push('after-styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('after-scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    $('#employee').selectpicker();
    $('#room').selectpicker();
</script>
@endpush