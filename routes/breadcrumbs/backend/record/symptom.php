<?php

Breadcrumbs::for('admin.record.symptom.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Symptom Management'), route('admin.record.symptom.index'));
});

Breadcrumbs::for('admin.record.symptom.create', function ($trail) {
    $trail->parent('admin.record.symptom.index');
    $trail->push(__('Create Symptom'), route('admin.record.symptom.create'));
});

Breadcrumbs::for('admin.record.symptom.edit', function ($trail, $id) {
    $trail->parent('admin.record.symptom.index');
    $trail->push(__('Edit Symptom'), route('admin.record.symptom.edit', $id));
});

Breadcrumbs::for('admin.record.symptom.show', function ($trail, $id) {
    $trail->parent('admin.record.symptom.index');
    $trail->push(__('Edit Symptom'), route('admin.record.symptom.show', $id));
});