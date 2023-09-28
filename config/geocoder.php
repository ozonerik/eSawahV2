<?php

return [

    /*
     * The api key used when sending Geocoding requests to Google.
     */
    'key' => env('GOOGLE_MAPS_GEOCODING_API_KEY', 'AIzaSyBqwQN7X6S8XBouI2elWqNMTGZfCyxzU1g'),

    /*
     * The language param used to set response translations for textual data.
     *
     * More info: https://developers.google.com/maps/faq#languagesupport
     */

    'language' => 'id',

    /*
     * The region param used to finetune the geocoding process.
     *
     * More info: https://developers.google.com/maps/documentation/geocoding/requests-geocoding#RegionCodes
     */
    'region' => 'id',

    /*
     * The bounds param used to finetune the geocoding process.
     *
     * More info: https://developers.google.com/maps/documentation/geocoding/requests-geocoding#Viewports
     */
    'bounds' => '',

    /*
     * The country param used to limit results to a specific country.
     *
     * More info: https://developers.google.com/maps/documentation/javascript/geocoding#GeocodingRequests
     */
    'country' => 'ID',

];
