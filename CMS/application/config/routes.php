<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| 	example.com/class/method/id/
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
| There are two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['scaffolding_trigger'] = 'scaffolding';
|
| This route lets you set a "secret" word that will trigger the
| scaffolding feature for added security. Note: Scaffolding must be
| enabled in the controller in which you intend to use it.   The reserved 
| routes must come before any wildcard or regular expression routes.
|
*/

$route['setup']="home/setup";
$route['setup/(:num)']="home/setup";

$route['home']="home";
$route['home/(:any)']="home/$1";
$route['home/(:any)/(:any)']="home/$1/$2";
$route['home/(:any)/(:any)/(:any)']="home/$1/$2/$3";

$route['admin']="admin";
$route['admin/(:any)']="admin/$1";
$route['admin/(:any)/(:any)']="admin/$1/$2";
$route['admin/(:any)/(:any)/(:any)']="admin/$1/$2/$3";

$route['page']="page";
$route['page/(:any)']="page/$1";
$route['page/(:any)/(:any)']="page/$1/$2";
$route['page/(:any)/(:any)/(:any)']="page/$1/$2/$3";

$route['widget']="widget";
$route['widget/(:any)']="widget/$1";
$route['widget/(:any)/(:any)']="widget/$1/$2";
$route['widget/(:any)/(:any)/(:any)']="widget/$1/$2/$3";

$route['layout']="layout";
$route['layout/(:any)']="layout/$1";
$route['layout/(:any)/(:any)']="layout/$1/$2";
$route['layout/(:any)/(:any)/(:any)']="layout/$1/$2/$3";

$route['news']="news";
$route['news/(:any)']="news/$1";
$route['news/(:any)/(:any)']="news/$1/$2";
$route['news/(:any)/(:any)/(:any)']="news/$1/$2/$3";

$route['upload']="upload";
$route['upload/(:any)']="upload/$1";
$route['upload/(:any)/(:any)']="upload/$1/$2";
$route['upload/(:any)/(:any)/(:any)']="upload/$1/$2/$3";

$route['user/']="user";
$route['user/(:any)']="user/$1";
$route['user/(:any)/(:any)']="user/$1/$2";
$route['user/(:any)/(:any)/(:any)']="user/$1/$2/$3";

$route['common/']="common";
$route['common/(:any)']="common/$1";
$route['common/(:any)/(:any)']="common/$1/$2";
$route['common/(:any)/(:any)/(:any)']="common/$1/$2/$3";

$route['contact']="contact";
$route['contact/(:any)']="contact/$1";
$route['contact/(:any)/(:any)']="contact/$1/$2";
$route['contact/(:any)/(:any)/(:any)']="contact/$1/$2/$3";

$route['about']="about";
$route['about/(:any)']="about/$1";
$route['about/(:any)/(:any)']="about/$1/$2";
$route['about/(:any)/(:any)/(:any)']="about/$1/$2/$3";

$route['picture/(:num)'] = "picture/index";
$route['picture/view/(:num)'] = "picture/view";

$route['pictures/(:num)'] = "post/view";
$route['pictures/(:num)/(:num)'] = "post/view";
#$route[':any'] = "category/index";
$route[':any'] = "home/index";

$route['default_controller'] = "home";
$route['scaffolding_trigger'] = "";

/* End of file routes.php */
/* Location: ./system/application/config/routes.php */