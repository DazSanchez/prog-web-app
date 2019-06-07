<?php
defined('BASEPATH') or exit('No direct script access allowed');

// -- Auth
$route['/auth'] = 'auth';

// -- Users
$route['/users'] = 'users';

// -- Participants
$route['/participants'] = 'participants';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
