<?php


$pages = [
    'dashboard',
    'profile',
    'settings',
];

$product_upload_dir = './assets/img/product/';
$brand_upload_dir = './assets/img/brand/';
$category_upload_dir = './assets/img/categories/';
$clients_upload_dir = './assets/img/clients/';

$is_logged = isset($_SESSION['user']) ?? false;

// CURRENCY SETTINGS
$currency = 'DZD';
$appName = 'Gestion de service technique';

$api = './api/?route=';