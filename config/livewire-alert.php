<?php

/*
 * For more details about the configuration, see:
 * https://sweetalert2.github.io/#configuration
 */
return [
    'alert' => [
        'position' => 'top-end',
        'timer' => 3000,
        'toast' => true,
        'text' => null,
        'showCancelButton' => false,
        'showConfirmButton' => false
    ],
    'confirm' => [
        'icon' => 'warning',
        'position' => 'center',
        'toast' => false,
        'timer' => null,
        'showConfirmButton' => true,
        'showCancelButton' => true,
        'confirmButtonText' => 'YES',
        'cancelButtonText' => 'No',
        'confirmButtonColor' => '#dc3545',
        'cancelButtonColor' => '#0d6efd',
        'focusCancel' => true,
        'focusConfirm' => false,
        
    ]
];
