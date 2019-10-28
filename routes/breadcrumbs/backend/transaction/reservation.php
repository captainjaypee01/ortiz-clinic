<?php

Breadcrumbs::for('admin.transaction.reservation.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Reservation Management'), route('admin.transaction.reservation.index'));
});

Breadcrumbs::for('admin.transaction.reservation.create', function ($trail) {
    $trail->parent('admin.transaction.reservation.index');
    $trail->push(__('Create Reservation'), route('admin.transaction.reservation.create'));
});

Breadcrumbs::for('admin.transaction.reservation.edit', function ($trail, $id) {
    $trail->parent('admin.transaction.reservation.index');
    $trail->push(__('Edit Reservation'), route('admin.transaction.reservation.edit', $id));
});

Breadcrumbs::for('admin.transaction.reservation.show', function ($trail, $id) {
    $trail->parent('admin.transaction.reservation.index');
    $trail->push(__('Edit Reservation'), route('admin.transaction.reservation.show', $id));
});