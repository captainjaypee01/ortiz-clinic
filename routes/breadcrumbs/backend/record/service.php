<?php

Breadcrumbs::for('admin.record.service.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Service Management'), route('admin.record.service.index'));
});

Breadcrumbs::for('admin.record.service.create', function ($trail) {
    $trail->parent('admin.record.service.index');
    $trail->push(__('Create Service'), route('admin.record.service.create'));
});

Breadcrumbs::for('admin.record.service.edit', function ($trail, $id) {
    $trail->parent('admin.record.service.index');
    $trail->push(__('Edit Service'), route('admin.record.service.edit', $id));
});

Breadcrumbs::for('admin.record.service.show', function ($trail, $id) {
    $trail->parent('admin.record.service.index');
    $trail->push(__('Show Service'), route('admin.record.service.show', $id));
});

Breadcrumbs::for('admin.record.service.assign_branch', function ($trail, $id) {
    $trail->parent('admin.record.service.index');
    $trail->push("Service", route('admin.record.service.show', $id));
    $trail->push(__('Assign Branch'), route('admin.record.service.assign_branch', $id));
});