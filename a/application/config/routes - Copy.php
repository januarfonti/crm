<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$route['default_controller'] 					= "";
$route['404_override'] 							= ''; 

//admin login
$route['admin'] 								= "admin/login/login"; 
$route['admin/verify']							= "admin/login/verify";
$route['admin/logout']							= "admin/login/logout";

//admin attributes
$route['admin/config'] 							= "admin/config"; 

$route['admin/component']						= "admin/asset/page";
$route['admin/asset/add']						= "admin/asset/add";
$route['admin/asset/edit/:num']					= "admin/asset/edit";
$route['admin/asset/drop/:num']					= "admin/asset/drop";

$route['admin/route/:num']						= "admin/asset/route/page";
$route['admin/route/:num/on/:num']				= "admin/asset/route/stat/on";
$route['admin/route/:num/off/:num']				= "admin/asset/route/stat/off";

$route['admin/route/:num/add']					= "admin/asset/route/add";
$route['admin/route/:num/edit/:num']			= "admin/asset/route/edit";
$route['admin/route/:num/drop/:num']			= "admin/asset/route/drop";

$route['admin/database']						= "admin/database/page"; 

//admin user manager
$route['admin/user']							= "admin/user/page";
$route['admin/user/add']						= "admin/user/add";
$route['admin/user/edit/:num']					= "admin/user/edit";
$route['admin/user/drop/:num']					= "admin/user/drop"; 

//admin user level manager
$route['admin/user/level']						= "admin/user/level/page";
$route['admin/user/level/add']					= "admin/user/level/add";
$route['admin/user/level/edit/:num']			= "admin/user/level/edit";
$route['admin/user/level/drop/:num']			= "admin/user/level/drop";

//admin menu manager
$route['admin/menu']							= "admin/menu/page";
$route['admin/menu/add']						= "admin/menu/add";
$route['admin/menu/edit/:num']					= "admin/menu/edit";
$route['admin/menu/drop/:num']					= "admin/menu/drop";

//admin child menu manager
$route['admin/menu/:num/child']					= "admin/menu/child/page";

$route['admin/menu/:num/child/component']		= "component/page";
$route['admin/menu/:num/child/component/:num']	= "component/page";

$route['admin/menu/:num/child/add']				= "admin/menu/child/add";
$route['admin/menu/:num/child/edit/:num']		= "admin/menu/child/edit";
$route['admin/menu/:num/child/drop/:num']		= "admin/menu/child/drop";

//admin form manager
$route['admin/form']							= "admin/form/page";
$route['admin/form/add']						= "admin/form/add";
$route['admin/form/:num/edit']					= "admin/form/edit";
$route['admin/form/:num/drop']					= "admin/form/drop";

//admin form field manager
$route['admin/form/:num/field']					= "admin/form/field/page";
$route['admin/form/:num/field/add']				= "admin/form/field/add";
$route['admin/form/:num/field/edit/:num']		= "admin/form/field/edit";
$route['admin/form/:num/field/drop/:num']		= "admin/form/field/drop";

//admin form do
$route['form/:num/manager']						= "general/form/manager";
$route['form/:num/add']							= "general/form/page/add";
$route['form/:num/edit']						= "general/form/page/edit";

$route['user/:num/profile']						= "general/user/profile";
$route['denied']								= "general/login/denied";




