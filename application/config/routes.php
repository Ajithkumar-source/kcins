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
$route['dashboard'] = 'Main';
$route['send'] = 'Main/send';
$route['sendmail'] = 'Main/sendmail';
$route['sendsms'] = 'Main/sendsms';
$route['careof'] = 'Main/careof';
$route['clients'] = 'Main/clients';
$route['clientdocs/(:any)'] = 'Main/clientdocs/$1';
$route['policydocs/(:any)'] = 'Main/policydocs/$1';
$route['policies'] = 'Main/policies';
$route['claims'] = 'Main/claims';
$route['profile'] = 'Main/profile';
$route['addcareof'] = 'Main/addcareof';
$route['addclient'] = 'Main/addclient';
$route['addpolicy'] = 'Main/addpolicy';
$route['addclaims'] = 'Main/addclaims';
$route['viewcareof/(:any)'] = 'Main/viewcareof/$1';
$route['viewclient/(:any)'] = 'Main/viewclient/$1';
$route['viewpolicy/(:any)'] = 'Main/viewpolicy/$1';
$route['viewclaims/(:any)'] = 'Main/viewclaims/$1';
$route['viewclientdocs/(:any)'] = 'Main/viewclientdocs/$1';
$route['editclient/(:any)'] = 'Main/editclient/$1';
$route['editcareof/(:any)'] = 'Main/editcareof/$1';
$route['editpolicy/(:any)'] = 'Main/editpolicy/$1';
$route['renewal_policy/(:any)'] = 'Main/renewal_policy/$1';
$route['send_renewalpolicy']='Main/send_renewalpolicy';
$route['multiple_renewalpolicy']='Main/multiple_renewalpolicy';
$route['addnew_renewalpolicy'] = 'Main/addnew_renewalpolicy';
$route['editclaims/(:any)'] = 'Main/editclaims/$1';
$route['editrep/(:any)'] = 'Main/editrep/$1';
$route['editinscompany/(:any)'] = 'Main/editinscompany/$1';
$route['editpytype/(:any)'] = 'Main/editpytype/$1';
$route['editstype/(:any)'] = 'Main/editstype/$1';
$route['edit_ctype/(:any)'] = 'Main/edit_ctype/$1';
$route['edit_cstype/(:any)'] = 'Main/edit_cstype/$1';
$route['editvcompany/(:any)'] = 'Main/editvcompany/$1';
$route['editdoctype/(:any)'] = 'Main/editdoctype/$1';
$route['editnmtype/(:any)'] = 'Main/editnmtype/$1';
$route['edituser/(:any)'] = 'Main/edituser/$1';
$route['deluser/(:any)'] = 'Main/deluser/$1';
$route['delrep/(:any)'] = 'Main/delrep/$1';
$route['delinscompany/(:any)'] = 'Main/delinscompany/$1';
$route['delpytype/(:any)'] = 'Main/delpytype/$1';
$route['delstype/(:any)'] = 'Main/delstype/$1';
$route['del_ctype/(:any)'] = 'Main/del_ctype/$1';
$route['del_cstype/(:any)'] = 'Main/del_cstype/$1';
$route['delvcompany/(:any)'] = 'Main/delvcompany/$1';
$route['deldoctype/(:any)'] = 'Main/deldoctype/$1';
$route['del_nmtype/(:any)'] = 'Main/del_nmtype/$1';
$route['delcareof/(:any)'] = 'Main/delcareof/$1';
$route['delclient/(:any)'] = 'Main/delclient/$1';
$route['delpolicy/(:any)'] = 'Main/delpolicy/$1';
$route['delclaims/(:any)'] = 'Main/delclaims/$1';
$route['del_cfile/(:any)'] = 'Main/del_cfile/$1';
$route['view_cfile/(:any)'] = 'Main/view_cfile/$1';
$route['del_pfile/(:any)'] = 'Main/del_pfile/$1';
$route['view_pfile/(:any)'] = 'Main/view_pfile/$1';
$route['addclientdocs'] = 'Main/addclientdocs';
$route['addpolicydocs'] = 'Main/addpolicydocs';
$route['addnewcareof'] = 'Main/addnewcareof';
$route['addnewclient'] = 'Main/addnewclient';
$route['addnewpolicy'] = 'Main/addnewpolicy';
$route['addnewclaims'] = 'Main/addnewclaims';
$route['addnewrep'] = 'Main/addnewrep';
$route['addnewuser'] = 'Main/addnewuser';
$route['addnew_inscompany'] = 'Main/addnew_inscompany';
$route['addnew_pytype'] = 'Main/addnew_pytype';
$route['addnew_stype'] = 'Main/addnew_stype';
$route['addnew_ctype'] = 'Main/addnew_ctype';
$route['addnew_cstype'] = 'Main/addnew_cstype';
$route['addnew_vcompany'] = 'Main/addnew_vcompany';
$route['addnew_doctype'] = 'Main/addnew_doctype';
$route['addnew_nmtype'] = 'Main/addnew_nmtype';    
$route['addquote'] = 'Main/addquote';
$route['updatecareof'] = 'Main/updatecareof';
$route['updateclient'] = 'Main/updateclient';
$route['updatepolicy'] = 'Main/updatepolicy';
$route['updateclaims'] = 'Main/updateclaims';
$route['updateuser'] = 'Main/updateuser';
$route['updateprofile'] = 'Main/updateprofile';
$route['updaterep'] = 'Main/updaterep';
$route['update_inscompany'] = 'Main/update_inscompany';
$route['update_pytype'] = 'Main/update_pytype';
$route['update_ctype'] = 'Main/update_ctype';
$route['update_cstype'] = 'Main/update_cstype';
$route['update_stype'] = 'Main/update_stype';
$route['update_vcompany'] = 'Main/update_vcompany';
$route['update_doctype'] = 'Main/update_doctype';
$route['update_nmtype'] = 'Main/update_nmtype';
$route['rep'] = 'Main/rep';
$route['email'] = 'Main/email';
$route['sms'] = 'Main/sms';
$route['quote'] = 'Main/quote';
$route['renewal']='Main/renewal';
$route['renewalList'] = 'Main/renewalList';
$route['leading']='Main/leading';
$route['leadingList'] = 'Main/leadingList';
$route['inscompany'] = 'Main/inscompany';
$route['pytype'] = 'Main/pytype';
$route['stype'] = 'Main/stype';
$route['ctype'] = 'Main/ctype';
$route['cstype'] = 'Main/cstype';
$route['vcompany'] = 'Main/vcompany';
$route['nmtype'] = 'Main/nmtype';
$route['doctype'] = 'Main/doctype';
$route['users'] = 'Main/users';
$route['addrep'] = 'Main/addrep';
$route['addinscompany'] = 'Main/addinscompany';
$route['addpytype'] = 'Main/addpytype';
$route['addstype'] = 'Main/addstype';
$route['addctype'] = 'Main/addctype';
$route['addcstype'] = 'Main/addcstype';
$route['addvcompany'] = 'Main/addvcompany';
$route['adddoctype'] = 'Main/adddoctype';
$route['add_nmtype'] = 'Main/add_nmtype';
$route['adduser'] = 'Main/adduser';
$route['fetch_model'] = 'Main/fetch_model';
$route['fetch_stype'] = 'Main/fetch_stype';
$route['fetch_cstype'] = 'Main/fetch_cstype';
$route['fetch_client'] = 'Main/fetch_client';
$route['fetch_policy'] = 'Main/fetch_policy';
$route['clientdocsList'] = 'Main/clientdocsList';
$route['policydocsList'] = 'Main/policydocsList';
$route['careofList'] = 'Main/careofList';
$route['clientList'] = 'Main/clientList';
$route['policyList'] = 'Main/policyList';
$route['claimsList'] = 'Main/claimsList';
$route['default_controller'] = 'auth';
$route['404_override'] = 'auth/blocked';
$route['translate_uri_dashes'] = FALSE;

// custom routes
$route['login'] = 'auth';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';


$route['api_login'] = 'User/login';
$route['api_logout'] = 'User/logout';


$route['test'] = 'Main/test';
?>