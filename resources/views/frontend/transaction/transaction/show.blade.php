@extends('frontend.layouts.app')

@section('title', 'Transaction Management' . ' | ' . 'Show Transaction')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                        <h4 class="card-title mb-0">
                                Transaction Management
                            <small class="text-muted">Show Transaction</small>
                        </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                        </div><!--col-->
                    </div><!--row-->
            
                    <div class="row mt-4 mb-4">
                        <div class="col">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-poll-h"></i> @lang('labels.backend.access.users.tabs.titles.overview')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#reservation" role="tab" aria-controls="reservation" aria-expanded="true"><i class="fas fa-poll-h"></i> Reservations</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#service" role="tab" aria-controls="service" aria-expanded="true"><i class="fas fa-list-alt"></i> Orders</a>
                                </li> 
                            </ul>
            
                            <div class="tab-content">
                                <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                                    @include('frontend.transaction.transaction.show.tabs.overview')
                                </div><!--tab-->
                                <div class="tab-pane" id="reservation" role="tabpanel" aria-expanded="true">
                                    @include('frontend.transaction.transaction.show.tabs.reservations')
                                </div><!--tab-->
                                <div class="tab-pane" id="service" role="tabpanel" aria-expanded="true">
                                    @include('frontend.transaction.transaction.show.tabs.orders') 
                                </div><!--tab--> 
                            </div><!--tab-content-->
                        </div><!--col-->
                    </div><!--row-->
                </div><!--card-body-->
            
                <div class="card-footer">
                    <div class="row">
                        
                        <div class="col col-md-4">
                            <a href="{{route('frontend.transaction.transaction.index')}}" class="btn btn-info btn-sm">Go Back</a>
                        </div>
                        <div class="col col-md-8">
                            <small class="float-right text-muted">
                                <strong>@lang('labels.backend.access.users.tabs.content.overview.created_at'):</strong> {{ timezone()->convertToLocal($transaction->created_at) }} ({{ $transaction->created_at->diffForHumans() }}),
                                <strong>@lang('labels.backend.access.users.tabs.content.overview.last_updated'):</strong> {{ timezone()->convertToLocal($transaction->updated_at) }} ({{ $transaction->updated_at->diffForHumans() }})
                                @if($transaction->trashed())
                                    <strong>@lang('labels.backend.access.users.tabs.content.overview.deleted_at'):</strong> {{ timezone()->convertToLocal($transaction->deleted_at) }} ({{ $transaction->deleted_at->diffForHumans() }})
                                @endif
                            </small>
                        </div><!--col-->
                    </div><!--row-->
                </div><!--card-footer-->
            </div><!--card-->
        </div>
    </div>
</div>

@endsection
