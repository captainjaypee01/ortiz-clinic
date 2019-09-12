<?php

Breadcrumbs::for('admin.production.product.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Product Management'), route('admin.production.product.index'));
});

Breadcrumbs::for('admin.production.product.create', function ($trail) {
    $trail->parent('admin.production.product.index');
    $trail->push(__('Create Product'), route('admin.production.product.create'));
});

Breadcrumbs::for('admin.production.product.edit', function ($trail, $id) {
    $trail->parent('admin.production.product.index');
    $trail->push(__('Edit Product'), route('admin.production.product.edit', $id));
});

Breadcrumbs::for('admin.production.product.show', function ($trail, $id) {
    $trail->parent('admin.production.product.index');
    $trail->push(__('Edit Product'), route('admin.production.product.show', $id));
});