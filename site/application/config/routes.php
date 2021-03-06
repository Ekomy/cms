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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route["product-list"] = "home/product_list";
$route["product-detail/(:any)"] = "home/product_detail/$1";

$route["course-list"] = "home/course_list";
$route["course-detail/(:any)"] = "home/course_detail/$1";

$route["reference-list"] = "home/reference_list";
$route["brand-list"]     = "home/brand_list";
$route["service-list"]   = "home/service_list";
$route["about-us"]       = "home/about_us";

$route["contact_us"]         = "home/contact";
$route["send-message"]       = "home/send_contact_message";
$route["become-member"]      = "home/make_me_member";

$route["news"]          = "home/news_list";
$route["new/(:any)"]    = "home/news_detail/$1";

$route["picture-gallery"]        = "home/image_gallery_list";
$route["picture-gallery/(:any)"] = "home/image_gallery/$1";

$route["video-gallery"]          = "home/video_gallery_list";
$route["video-gallery/(:any)"]   = "home/video_gallery/$1";

$route["file-gallery"]           = "home/file_gallery_list";
$route["file-gallery/(:any)"]    = "home/file_gallery/$1";










