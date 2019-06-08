<?php
defined('BASEPATH') or exit('No direct script access allowed');

// -- Auth
$route['auth'] = 'auth';

// -- Users
$route['users'] = 'users';

// -- Participants
$route['participants'] = 'participants';

// -- Courses
$route['courses'] = 'courses';

// -- Errors
$route['access_deny'] = 'errors/access_deny';

$route['default_controller'] = 'welcome';
$route['404_override'] = 'errors/not_found';
$route['translate_uri_dashes'] = FALSE;
