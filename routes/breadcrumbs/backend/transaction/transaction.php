<?php

Breadcrumbs::for('admin.transaction.transaction.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Transaction Management'), route('admin.transaction.transaction.index'));
});

Breadcrumbs::for('admin.transaction.transaction.create', function ($trail) {
    $trail->parent('admin.transaction.transaction.index');
    $trail->push(__('Create Transaction'), route('admin.transaction.transaction.create'));
});

Breadcrumbs::for('admin.transaction.transaction.edit', function ($trail, $id) {
    $trail->parent('admin.transaction.transaction.index');
    $trail->push(__('Edit Transaction'), route('admin.transaction.transaction.edit', $id));
});

Breadcrumbs::for('admin.transaction.transaction.show', function ($trail, $id) {
    $trail->parent('admin.transaction.transaction.index');
    $trail->push(__('Edit Transaction'), route('admin.transaction.transaction.show', $id));
});