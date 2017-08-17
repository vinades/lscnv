<?php

/**
 * @Project 123HOST LSCache module for Nukeviet 4
 * @Author Tan Viet <tanviet@123host.vn>
 * @Copyright (C) 2017 123HOST. All rights reserved
 * @License: GNU/GPL version 2 or any later version
 * @Createdate Fri, 11 Aug 2017 09:48:43 GMT
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );
/*
$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
$xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
$xtpl->assign( 'MODULE_NAME', $module_name );
$xtpl->assign( 'OP', $op );


$xtpl->parse( 'init' );
$contents = $xtpl->text( 'init' );

$page_title = $lang_module['init'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';
*/

//echo "kaka";

//$a = checkRequirement($global_config['version']);

//enableCacheRewrite($htaccessFile);
//disableCacheRewrite($htaccessFile);
//$b = checkRequirement($global_config['version']);
//var_dump($b);

//$c = addCookieHandle();
//$c = removeCookieHandle();
//$c = $nv_Request->get_title('action1', 'get'); 
/*
try {
    $query = "SELECT config_value FROM " . NV_PREFIXLANG . "_" . $module_data . "_config WHERE config_name='first_run'";
    $row = $db->query($query)->fetch();
    var_dump($row);
} catch( PDOException $e ) {
    trigger_error( $e->getMessage() );
}

*/



// /admin
// echo NV_BASE_ADMINURL;

// echo vi
//echo NV_LANG_DATA;

// nv
//echo NV_NAME_VARIABLE;

// op
// echo NV_OP_VARIABLE;

// nv4_vi
// echo NV_PREFIXLANG;

// lscnv
//echo $module_data;

//echo NV_LANG_VARIABLE;
/*

$url = "index.php?language=vi&nv=lscnv&op=main&action=enableCache";

$url = "index.php?language=vi&nv=lscnv&op=main&action=enableCache";

echo NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=main' . '&amp;' . 'action=enableCache' ;

*/

addPurgeCacheHandle($message);
//removePurgeCacheHandle($message);
//echo $message;
/* if($nv_Cache->sendPurgeLSCache())
    echo "ok";
else
   echo "not";
   */
//echo $message;
//@Header('X-LiteSpeed-Purge: *');