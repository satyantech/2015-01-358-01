<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * This file keeps all the constants
 * Date: 20-04-2015
 * Time: 16:36
 */

//The hard coded org id this has to be taken from the DB in future
define('ORG_ID','1');

//Page Title Constant
define('APP_TITLE','gotasku');

//COMMUNICATION TO THE API
define('API_URL','http://localhost/gotasku/api.tasku.com/V1.1/');

//Site Path
define('SITE_PATH','http://'.$_SERVER['HTTP_HOST'].'/gotasku/gotasku.com/');

//PATHS
define('IMG_PATH','http://'.$_SERVER['HTTP_HOST'].'/gotasku/gotasku.com/img/');
define('CSS_PATH','http://'.$_SERVER['HTTP_HOST'].'/gotasku/gotasku.com/css/');
define('JS_PATH','http://'.$_SERVER['HTTP_HOST'].'/gotasku/gotasku.com/js/');
define('THIRD_PARTY_PATH','http://'.$_SERVER['HTTP_HOST'].'/gotasku/gotasku.com/thirdparty/');


//USER TYPES Should Sync with API/account/auth
define('SUPER_ADMIN',1);
define('EMPLOYEE',2);
define('EMPLOYER',3);

//FILE UPLOAD PATHS
define('PROFILE_PIC_PATH','/img/profile/');
define('PROFILE_DOCS','/files/profile_docs/');
define('EMPLOYER_LOGO','public/img/logos/');
