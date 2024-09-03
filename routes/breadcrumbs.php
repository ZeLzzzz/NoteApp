<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail): void {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('account.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('dashboard');

    $trail->push('Account Information', route('account.index'));
});
Breadcrumbs::for('note.show', function (BreadcrumbTrail $trail, $slug): void {
    $trail->parent('dashboard');

    $title = session('title', $slug);
    $trail->push($title, route('note.show', [ 'slug' => $slug ]));
});
