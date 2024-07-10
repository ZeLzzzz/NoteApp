<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail): void {
    $trail->push('Page', route('home'));
});

Breadcrumbs::for('account.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('dashboard');

    $trail->push('Account Information', route('account.index'));
});
Breadcrumbs::for('company.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('dashboard');

    $trail->push('Company Information', route('company.index'));
});
