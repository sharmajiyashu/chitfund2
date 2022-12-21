<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['success-flash'] = 'MyFlashController/success';
$route['Failure-flash'] = 'MyFlashController/Failure';
$route['warning-flash'] = 'MyFlashController/warning';
$route['info-flash'] = 'MyFlashController/info';
