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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['default_controller'] = 'Admin'; //管理员pc页面
$route['api/deal'] = 'Admin/deal'; //管理员解决

$route['m/admin'] = 'mobile/Admin/index'; //管理员移动详情页
$route['m/user'] = 'mobile/User/apply'; //用户申报页
$route['m/repair'] = 'mobile/User/repair'; //用户手册页
$route['m/index'] = 'mobile/User/index'; //用户报修首页
$route['m/submit/success'] = 'mobile/User/success';
$route['m/deal/success'] = 'mobile/Admin/success';
$route['api/submit'] = 'mobile/User/submit'; //用户提交
$route['api/mobile/deal'] = 'mobile/Admin/deal';

$route['verify']='mobile/User/verify';

$route['manual']='mobile/Manual/index';

//development
//警告，此设置部署时必须移除
$route['setMenu']='mobile/User/setMenu'; //启用该路由设置微信菜单
$route['testNotice']='mobile/Admin/testNotice';