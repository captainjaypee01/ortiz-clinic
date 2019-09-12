@extends('backend.layouts.app')

@section('title', 'Category Management' . ' | ' . 'Show Category')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Category Management
                    <small class="text-muted">Show Category</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-poll-h"></i> @lang('labels.backend.access.users.tabs.titles.overview')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#products" role="tab" aria-controls="products" aria-expanded="true"><i class="fas fa-list-alt"></i> Products</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                        @include('backend.production.category.show.tabs.overview')
                    </div><!--tab-->
                    <div class="tab-pane" id="products" role="tabpanel" aria-expanded="true">
                        @include('backend.production.category.show.tabs.products')
                    </div><!--tab-->
                </div><!--tab-content-->
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>@lang('labels.backend.access.users.tabs.content.overview.created_at'):</strong> {{ timezone()->convertToLocal($category->created_at) }} ({{ $category->created_at->diffForHumans() }}),
                    <strong>@lang('labels.backend.access.users.tabs.content.overview.last_updated'):</strong> {{ timezone()->convertToLocal($category->updated_at) }} ({{ $category->updated_at->diffForHumans() }})
                    @if($category->trashed())
                        <strong>@lang('labels.backend.access.users.tabs.content.overview.deleted_at'):</strong> {{ timezone()->convertToLocal($category->deleted_at) }} ({{ $category->deleted_at->diffForHumans() }})
                    @endif
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection
