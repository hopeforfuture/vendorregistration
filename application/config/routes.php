<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'vendor';
$route['create'] = 'vendor/createvendor';
$route['login'] = 'vendor/index';
$route['logout'] = 'vendor/logout';
$route['changepassword'] = 'vendor/updatepassword';
$route['vendordashboard'] = 'vendor/dashboard';
$route['vendordashboard/(:any)'] = 'vendor/dashboard/$1';
$route['vendor/create/(:num)/(:num)'] = 'vendor/createvendor/$1/$2';
$route['vendor/createprocess/(:num)/(:num)'] = 'vendor/createvendorprocess/$1/$2';
$route['vendor/upload/(:any)'] = 'vendor/uploadinvoicequotation/$1';
$route['forgotpassword'] = 'vendor/forgotpassword';
$route['admin'] = 'admin/admin/login';
$route['admin/dashboard'] = 'admin/admin/dashboard';
$route['admin/vendor/filelist'] = 'admin/admin/dashboard';
$route['admin/vendor/filelist/(:any)'] = 'admin/admin/filelist/$1';
$route['admin/vendor/list'] = 'admin/admin/vendorlist';
$route['admin/contact/add'] = 'admin/admin/addcontact';
$route['admin/contact/edit/(:num)'] = 'admin/admin/editcontact/$1';
$route['admin/contact/list'] = 'admin/admin/contactlist';
$route['admin/vendor/assign/(:num)'] = 'admin/admin/vendorassign/$1';
$route['admin/vendor/assignprocess/(:num)'] = 'admin/admin/assignprocess/$1';
$route['admin/logout'] = 'admin/admin/logout';
$route['download/(:any)'] = 'admin/admin/filedownload/$1';
/*$route['admin/generatepdf'] = 'admin/admin/generatepdf';*/
$route['allfiledownloads/(:num)'] = 'admin/admin/vendorfiledownloads/$1';
$route['404_override'] = 'vendor/pagenotfound';
$route['translate_uri_dashes'] = FALSE;
