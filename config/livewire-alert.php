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
        'icon' => false,
        'position' => 'center',
        'toast' => false,
        'timer' => null,
        'showConfirmButton' => true,
        'showCancelButton' => true,
        'confirmButtonText' => 'Yes',
        'cancelButtonText' => 'No',
        'confirmButtonColor' => '#dc3545',
        'cancelButtonColor' => '#0d6efd',
        'focusCancel' => true,
        'focusConfirm' => false,
        'buttonsStyling' =>false,
        'customClass' => [
            'title' => 'font-weight-normal',
            'confirmButton' => 'btn btn-danger mr-2',
            'cancelButton' => 'btn btn-primary font-weight-normal',
           ]
        
    ]
];
