@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Branches' )

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        Branches - {{ $branches->total() . ' current available'}}
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    @foreach($branches as $branch)
                    <div class="row mt-4">
                        <div class="col">
                            <div class="card p-4">
                                <h3>{{ $branch->name }}</h3>
                                <p>{{ $branch->sub_address }}</p>
                                <p>{{ $branch->contact_number . ' | ' . $branch->tel_number }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            {!! $branches->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
