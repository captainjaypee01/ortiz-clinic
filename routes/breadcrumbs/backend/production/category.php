<?php

Breadcrumbs::for('admin.production.category.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Category Management'), route('admin.production.category.index'));
});

Breadcrumbs::for('admin.production.category.create', function ($trail) {
    $trail->parent('admin.production.category.index');
    $trail->push(__('Create Category'), route('admin.production.category.create'));
});

Breadcrumbs::for('admin.production.category.edit', function ($trail, $id) {
    $trail->parent('admin.production.category.index');
    $trail->push(__('Edit Category'), route('admin.production.category.edit', $id));
});

Breadcrumbs::for('admin.production.category.show', function ($trail, $id) {
    $trail->parent('admin.production.category.index');
    $trail->push(__('Edit Category'), route('admin.production.category.show', $id));
});