<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//78.109.137.225 - 3128
//CONNEX(spasi)OFF kirim ke 123 atau SMARTPLAN(spasi)OFF kirim ke 123.
//Data R30 - 123
//*123*3*3*30*0
//php sms broadcast - modem
//$format = '%Y-%m-%d';
//$time = time();
//echo mdate($format, $time); 
//sugihartodanny@gmail.com

$route['default_controller'] 					= "frontpage";
$route['404_override'] 							= ""; 

//admin login
$route['admin'] 								= "admin/login/login"; 
$route['admin/verify']							= "admin/login/verify";
$route['admin/logout']							= "admin/login/logout";

//front login
$route['verify']								= "user/verify";
$route['logout']								= "user/logout";

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
$route['form/:num/view']						= "general/form/page";
$route['form/:num/add']							= "general/form/add";
$route['form/:num/:num/edit']					= "general/form/edit";
$route['form/:num/:num/drop']					= "general/form/drop";

$route['user/:num/profile']						= "general/user/profile";
$route['denied']								= "general/login/denied";


//admin - blog
$route['admin/blog']							= "admin/blog/page";
$route['admin/blog/add']						= "admin/blog/add";
$route['admin/blog/edit/:num']					= "admin/blog/edit";
$route['admin/blog/drop/:num']					= "admin/blog/drop";

//admin - blog category
$route['admin/blog/category']					= "admin/blog/category/page";
$route['admin/blog/category/add']				= "admin/blog/category/add";
$route['admin/blog/category/edit/:num']			= "admin/blog/category/edit";
$route['admin/blog/category/drop/:num']			= "admin/blog/category/drop";

//frontpage - blog view
$route['blog']									= "blog/page";
$route['blog/sort/:any']						= "blog/sort";
$route['blog/view/:num/:any']					= "blog/view";
$route['blog/category/:num/:any']				= "blog/category/page";
$route['blog/category/:num/view']				= "blog/category/view";


//shop
$route['admin/shop/product']					= "admin/shop/product/page";
$route['admin/shop/category']					= "admin/shop/category/page";
$route['admin/shop/orders']						= "admin/shop/orders";
$route['admin/shop/cart/:num']					= "admin/shop/cart";

$route['admin/shop/category/add']				= "admin/shop/category/add";
$route['admin/shop/category/edit/:num']			= "admin/shop/category/edit";
$route['admin/shop/category/drop/:num']			= "admin/shop/category/drop";

$route['admin/shop/product/add']				= "admin/shop/product/add";
$route['admin/shop/product/edit/:num']			= "admin/shop/product/edit";
$route['admin/shop/product/drop/:num']			= "admin/shop/product/drop";

$route['admin/shop/cart/:num/approve']			= "admin/shop/task/approve";
$route['admin/shop/cart/:num/pending']			= "admin/shop/task/pending";

//frontpage - shop view
$route['shop']									= "shop/product/page";
$route['shop/product/:any']						= "shop/product/sort";
$route['shop/product/:num/:any']				= "shop/product/view";
$route['shop/category/:num/:any']				= "shop/category/page";
$route['shop/category/:num/view']				= "shop/category/view";

$route['shop/cart/:num']						= "shop/product/cart";
$route['shop/edit/:num']						= "shop/product/edit";
$route['shop/drop/:num']						= "shop/product/drop";
 
$route['shop/carts']							= "shop/carts"; 	//step 1
$route['shop/confirm']							= "shop/confirm"; 	//step 1 
$route['shop/courier']							= "shop/courier"; 	//step 2
$route['shop/checkout']							= "shop/checkout"; 	//step 3
$route['shop/drops']							= "shop/drops"; 	//step 4
$route['shop/thanks']							= "shop/thanks"; 	//step 5

//frontpage - shop - user edit controller 
$route['user/edit/name']						= "user/edit/name";
$route['user/edit/address']						= "user/edit/address";
$route['user/edit/phone']						= "user/edit/phone";
$route['user/edit/email']						= "user/edit/email";

$route['admin/review']							= "admin/review/page";
$route['admin/review/add']						= "admin/review/add";
$route['admin/review/edit/:num']				= "admin/review/edit";
$route['admin/review/drop/:num']				= "admin/review/drop";

$route['admin/review/question/:num']			= "admin/review/question/page";
$route['admin/review/question/:num/add']		= "admin/review/question/add";
$route['admin/review/question/:num/edit/:num']	= "admin/review/question/edit";
$route['admin/review/question/:num/drop/:num']	= "admin/review/question/drop";

$route['review/:num']							= "review/page";
$route['review/:num/add']						= "review/add";

$route['admin/survey']							= "admin/survey/page";
$route['admin/survey/:num/review']				= "admin/survey/review";

