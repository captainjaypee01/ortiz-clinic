<?php

Breadcrumbs::for('admin.record.room.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Room Management'), route('admin.record.room.index'));
});

Breadcrumbs::for('admin.record.room.create', function ($trail) {
    $trail->parent('admin.record.room.index');
    $trail->push(__('Create Room'), route('admin.record.room.create'));
});

Breadcrumbs::for('admin.record.room.edit', function ($trail, $id) {
    $trail->parent('admin.record.room.index');
    $trail->push(__('Edit Room'), route('admin.record.room.edit', $id));
});

Breadcrumbs::for('admin.record.room.show', function ($trail, $id) {
    $trail->parent('admin.record.room.index');
    $trail->push(__('Edit Room'), route('admin.record.room.show', $id));
});