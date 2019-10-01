<?php

Breadcrumbs::for('admin.transaction.order.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Order Management'), route('admin.transaction.order.index'));
});

Breadcrumbs::for('admin.transaction.order.create', function ($trail) {
    $trail->parent('admin.transaction.order.index');
    $trail->push(__('Create Order'), route('admin.transaction.order.create'));
});

Breadcrumbs::for('admin.transaction.order.edit', function ($trail, $id) {
    $trail->parent('admin.transaction.order.index');
    $trail->push(__('Edit Order'), route('admin.transaction.order.edit', $id));
});

Breadcrumbs::for('admin.transaction.order.show', function ($trail, $id) {
    $trail->parent('admin.transaction.order.index');
    $trail->push(__('Edit Order'), route('admin.transaction.order.show', $id));
});