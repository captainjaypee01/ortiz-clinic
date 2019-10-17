@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Total Users</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <h3>{!! $users->total . ' Users' !!}</h3>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
        <div class="col">
            <div class="card">
                <div class="card-header">
                        <strong>Total Products</strong>
                </div><!--card-header-->
                <div class="card-body">
                        <h3>{!! $products->total . ' Products' !!}</h3>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
        <div class="col">
            <div class="card">
                <div class="card-header">
                        <strong>Total Services</strong>
                </div><!--card-header-->
                <div class="card-body">
                        <h3>{!! $services->total . ' Services' !!}</h3>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
        <div class="col">
            <div class="card">
                <div class="card-header">
                        <strong>Total Branches</strong>
                </div><!--card-header-->
                <div class="card-body">
                        <h3>{!! $branches->total . ' Branches' !!}</h3>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

    <!-- Charts -->
    @include('backend.dashboard.charts')
@endsection

@push('after-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js" charset="utf-8"></script>
{!! $userChart->script() !!}
{!! $productChart->script() !!}
{!! $orderChart->script() !!}
{!! $totalOrderChart->script() !!}
{!! $reservationChart->script() !!}
{!! $totalReservationChart->script() !!}

@endpush
