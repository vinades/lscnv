<?php

/**
 * @Project NUKEVIET 4.x
 * @Author 123host <tanviet@123host.vn>
 * @Copyright (C) 2017 123host. All rights reserved
 * @License: GNU/GPL version 2 or any later version
 * @Createdate Fri, 11 Aug 2017 09:48:43 GMT
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
$xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
$xtpl->assign( 'MODULE_NAME', $module_name );
$xtpl->assign( 'OP', $op );

$action = $nv_Request->get_title('action', 'get');


switch ($action) {
    case "enableCache":
        $firstRun = 0;
        try {
            $query = "SELECT config_value FROM " . NV_PREFIXLANG . "_" . $module_data . "_config WHERE config_name='first_run'";
            $row = $db->query($query)->fetch();
            $firstRun = $row['config_value'];
        } catch( PDOException $e ) {
            trigger_error( $e->getMessage() );
        }
        //$firstRun = 1;
        if ($firstRun == 1) {
            if(!checkRequirement($global_config['version'], $message)) {
                $xtpl->assign( 'MESSAGE',"<div class=\"notice notice-error is-dismissible\"> <p>" . $message . "</p> </div>", $result );
                break;
            }
            removeCookieHandle($message);
            if(addCookieHandle($message)) {
                try {
                    $query = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_config SET config_value='1' WHERE config_name='init_cache'";
                    $row = $db->prepare($query); 
                    $row->execute();
                } catch( PDOException $e ) {
                    trigger_error( $e->getMessage() );
                }
            }
            else {
                $xtpl->assign( 'MESSAGE',"<div class=\"notice notice-error is-dismissible\"> <p>" . $message . "</p> </div>", $result );
                break;
            }
            try {
                    $query = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_config SET config_value='0' WHERE config_name='first_run'";
                    $row = $db->prepare($query); 
                    $row->execute();
                } catch( PDOException $e ) {
                    trigger_error( $e->getMessage() );
            }
            
        }
        
        disableCacheRewrite($message);
        if(enableCacheRewrite($message)) {
            $result = "success"; 
           try {
                $query = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_config SET config_value='1' WHERE config_name='cache_status'";
                $row = $db->prepare($query); 
                $row->execute();
             } catch( PDOException $e ) {
                trigger_error( $e->getMessage() );
            }

        } else
            $result = "error";

        $xtpl->assign( 'MESSAGE',"<div class=\"notice notice-" . $result . " is-dismissible\"> <p>" . $message . "</p> </div>", $result );
        break;

    case "disableCache":
        if(disableCacheRewrite($message)) {
            $result = "success";
            try {
                $query = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_config SET config_value='0' WHERE config_name='cache_status'";
                $row = $db->prepare($query); 
                $row->execute();
             } catch( PDOException $e ) {
                trigger_error( $e->getMessage() );
            }
        }
           
        else
            $result = "error";
        $xtpl->assign( 'MESSAGE',"<div class=\"notice notice-" . $result . " is-dismissible\"> <p>" . $message . "</p> </div>", $result );
        break;

     case "checkRequirement":
        if(checkRequirement($global_config['version'],$message))
            $result = "success";
        else
            $result = "error";
        $xtpl->assign( 'MESSAGE',"<div class=\"notice notice-" . $result . " is-dismissible\"> <p>" . $message . "</p> </div>", $result );
        break;
 

    case "initCache":
        removeCookieHandle($message);
        if(addCookieHandle($message)) {
            $result = "success";
            try {
                $query = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_config SET config_value='1' WHERE config_name='init_cache'";
                $row = $db->prepare($query); 
                $row->execute();
             } catch( PDOException $e ) {
                trigger_error( $e->getMessage() );
            }
        }
        else
            $result = "error";
        $xtpl->assign( 'MESSAGE',"<div class=\"notice notice-" . $result . " is-dismissible\"> <p>" . $message . "</p> </div>", $result );
        break;

    case "purgeFront":
        $url = NV_BASE_SITEURL;
        $urlWithLang = NV_BASE_SITEURL . NV_LANG_DATA . "/";
        if (sendPurge($url, FALSE, $message ) && sendPurge($urlWithLang, FALSE, $message )) {
            $result = "success";
            $xtpl->assign( 'MESSAGE',"<div class=\"notice notice-" . $result . " is-dismissible\"> <p> Xóa cache trang chủ thành công</p> </div>", $result );
        } else {
            $result = "error";
            $xtpl->assign( 'MESSAGE',"<div class=\"notice notice-" . $result . " is-dismissible\"> <p> Xóa cache trang chủ thất bại.</p> </div>", $result );
        }
        break;
    case "purgeAll":
        $url = "*";
        if ( sendPurge($url, FALSE, $message ) ) {
            $result = "success";
            $xtpl->assign( 'MESSAGE',"<div class=\"notice notice-" . $result . " is-dismissible\"> <p> Xóa cache thành công</p> </div>", $result );
        } else {
            $result = "error";
            $xtpl->assign( 'MESSAGE',"<div class=\"notice notice-" . $result . " is-dismissible\"> <p> Xóa cache thất bại.</p> </div>", $result );
        }
        break;
}

try {
    $query = "SELECT config_value FROM " . NV_PREFIXLANG . "_" . $module_data . "_config WHERE config_name='cache_status'";
    $row = $db->query($query)->fetch();
    $status = $row['config_value'];
} catch( PDOException $e ) {
    trigger_error( $e->getMessage() );
}

if ($status == '0') {
     $xtpl->assign( 'CACHE_STATUS',"<h3><em class='fa fa-lg fa-exclamation-triangle text-danger' >&nbsp;</em>ĐANG TẮT</h3>");
     $xtpl->assign( 'CACHE_BUTTON',"<a href='" . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=main' . '&amp;' . 'action=enableCache' . "' class='litespeed-btn litespeed-btn-primary'> Bật Cache </a>");
} else {
    $xtpl->assign( 'CACHE_STATUS',"<h3><em class='fa fa-lg fa-check text-success' >&nbsp;</em>ĐANG BẬT</h3>");
    $xtpl->assign( 'CACHE_BUTTON',"<a href='" . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=main' . '&amp;' . 'action=disableCache' . "' class='litespeed-btn litespeed-btn-warning'> Tắt Cache </a>");
}



$xtpl->assign( 'PURGE_CACHE_FRONT_BUTTON',"<a href='" . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=main' . '&amp;' . 'action=purgeFront' . "' class='litespeed-btn litespeed-btn-success'>". $lang_module['123HOST_MAIN_TL3'] . " </a>");
$xtpl->assign( 'PURGE_CACHE_ALL_BUTTON',"<a href='" . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=main' . '&amp;' . 'action=purgeAll' . "' class='litespeed-btn litespeed-btn-danger'>". $lang_module['123HOST_MAIN_TL6'] . " </a>");

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

$page_title = $lang_module['main'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';
