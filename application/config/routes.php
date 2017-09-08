<?php 

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

|	http://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There area two reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router what URI segments to use if those provided

| in the URL cannot be matched to a valid route.

|

*/



$route['default_controller'] = 'pages/view';

$route['application'] = 'application';

$route['contact'] = 'contact';

$route['contact/send'] = 'contact/send';

$route['contact/send_json'] = 'contact/send_json';

$route['application/appreview'] = 'application/appreview';

$route['application/processPayments'] = 'application/processPayments';

$route['application/appsubmit'] = 'application/appsubmit';

$route['application/notify_payment'] = 'application/notify_payment';

$route['application/notify_payment/(:any)'] = 'application/notify_payment/$1';

$route['application/cancel_payment'] = 'application/cancel_payment';

$route['application/cancel_payment/(:any)'] = 'application/cancel_payment/$1';

$route['application/address-approve'] = 'application/address_approve';

$route['application/address-approve/(:any)'] = 'application/address_approve/$1';

$route['application/download-evisa'] = 'application/download_evisa';

$route['application/download-evisa/(:any)'] = 'application/download_evisa/$1';

$route['application/check-status'] = 'application/check_status';

$route['application/check-status/(:any)'] = 'application/check_status/$1';

$route['application/check-status-json'] = 'application/check_status_json';

$route['application/check-status-json/(:any)'] = 'application/check_status_json/$1';

$route['application/payments'] = 'application/payments';

$route['application/get_country_list'] = 'application/get_country_list';

$route['application/payments/(:any)'] = 'application/payments/$1';

$route['application/return_payment'] = 'application/return_payment';

$route['application/return_payment/(:any)'] = 'application/return_payment/$1';

$route['application/generate_pdf'] = 'application/generate_pdf';

$route['application/approve'] = 'application/approve';
$route['service/servicereview'] = 'service/servicereview';
$route['service/servicesubmit'] = 'service/servicesubmit';
$route['service/notify_payment'] = 'service/notify_payment';
$route['service/notify_payment/(:any)'] = 'service/notify_payment/$1';
$route['service/cancel_payment'] = 'service/cancel_payment';
$route['service/cancel_payment/(:any)'] = 'service/cancel_payment/$1';
$route['service/get_country_list'] = 'service/get_country_list';
$route['service/payments'] = 'service/payments';
$route['service/payments/(:any)'] = 'service/payments/$1';
$route['application/invoice'] = 'application/invoice';
$route['application/invoice/(:any)'] = 'application/invoice/$1';
$route['application/allied_return/(:any)'] = 'application/allied_return/$1';
$route['application/allied_payment/(:any)'] = 'application/allied_payment/$1';
$route['application/allied_confirm/(:any)'] = 'application/allied_confirm/$1';
$route['application/apppreview'] = 'application/apppreview';
$route['application/apppreview/(:any)'] = 'application/apppreview/$1';


$route['(:any)'] = 'pages/view/$1';

$route['404_override'] = '';





/* End of file routes.php */

/* Location: ./application/config/routes.php */