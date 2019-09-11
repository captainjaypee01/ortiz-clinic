<?php

Breadcrumbs::for('admin.record.branch.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Branch Management'), route('admin.record.branch.index'));
});

Breadcrumbs::for('admin.record.branch.create', function ($trail) {
    $trail->parent('admin.record.branch.index');
    $trail->push(__('Create Branch'), route('admin.record.branch.create'));
});

Breadcrumbs::for('admin.record.branch.edit', function ($trail, $id) {
    $trail->parent('admin.record.branch.index');
    $trail->push(__('Edit Branch'), route('admin.record.branch.edit', $id));
});

Breadcrumbs::for('admin.record.branch.show', function ($trail, $id) {
    $trail->parent('admin.record.branch.index');
    $trail->push(__('Edit Branch'), route('admin.record.branch.show', $id));
});