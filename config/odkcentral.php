<?php

return [

  /*
    |--------------------------------------------------------------------------
    | ODK Central API URL
    |--------------------------------------------------------------------------
    |
    | The base URL for your ODK Central instance. This is where all API
    | requests will be sent. You can set this using the environment file.
    |
    */

	'api_url' => env('ODK_API_URL', 'https://central.milletsodisha.com/v1/'),

  /*
    |--------------------------------------------------------------------------
    | ODK Central Authentication
    |--------------------------------------------------------------------------
    |
    | An administrator user of your ODK Central application. Provide the email
    | and password for the user to authenticate requests. It is recommended to
    | store these values in your .env file for security purposes.
    |
    */

	'user_email' => env('ODK_USER_EMAIL', 'niranjan@wassan.org'),

	'user_password' => env('ODK_USER_PASSWORD', 'mkr5htgi@123'),

];
