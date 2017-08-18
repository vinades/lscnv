<?php

/**
 * @Project:          123HOST LSCache module for Nukeviet 4.x
 * Module Name:       123HOST LSCache
 * Module URI:        https://123host.vn/nukeviet-hosting.html
 * Description:       Nukeviet module to connect to Caching Web Server at 123HOST
 * Version:           1.0.00
 * Author:            Digital Storage Company Limited
 * Author URI:        https://123host.vn/
 * License:           GPLv3
 * License URI:       http://www.gnu.org/licenses/gpl.html
 * Text Domain:       lscnv
 * @Createdate:       Fri, 11 Aug 2017 09:48:43 GMT
 *
 * @Copyright (C) 2017 Digital Storage Company Limited. All rights reserved
 *
 * This program is distributed by 123HOST in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

if ( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_config";


$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_config (
  lang varchar(3)  COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sys',
  module varchar(50)  COLLATE utf8_unicode_ci NOT NULL DEFAULT 'global',
  config_name varchar(30)  COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  config_value text  COLLATE utf8_unicode_ci,
  UNIQUE KEY lang (lang,module,config_name)
) ENGINE=MyISAM;";

$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config VALUES ('sys','global','cache_status','0'),('sys','global','first_run','0'),('sys','global','public_cache_ttl','604800'),('sys','global','front_page_cache_ttl','604800'),('sys','global','cache_login_page','0'),('sys','global','cache_favicon','1'),('sys','global','fix_purge_cache','0'),('sys','global','fix_cookie','0')";

$sql_create_module[] = "UPDATE " . NV_MODULES_TABLE . " SET custom_title='123HOST LSCache' WHERE title='".$module_name."'";

/*
    Các function để xóa các phần được chèn vào trong file của Nukeviet trước khi gỡ module
*/
function removeCookieHandle(&$message) {
    global $lang_module;

    /* Remove Cookie Handle in admin LOGIN file */
    $adminLoginFile = NV_ROOTDIR . '/includes/core/admin_login.php';

    $beginAdminLoginPattern = "/123HOST LSCache begin add cookie/";
    $endAdminLoginPattern = "/123HOST LSCache end add cookie/";

    $contentByLine = file($adminLoginFile);

    $matches  = preg_grep ($beginAdminLoginPattern, $contentByLine);
    $numberOfBlock = count($matches);

    for ($i=0; $i < $numberOfBlock; $i++) {

        /* Find Begin and End lines 123HOST LSCache rewrite of Admin LOGIN */
        $contentByLine = file($adminLoginFile);
        foreach ( $contentByLine as $lineNum => $lineContent ) {
            if (preg_match($beginAdminLoginPattern, $lineContent)) {
                $beginLineNum = $lineNum;
            }

            if (preg_match($endAdminLoginPattern, $lineContent))
                $endLineNum = $lineNum;

        }

        // Detroy lines
        if (isset($beginLineNum) && isset($endLineNum)) {
            foreach ( $contentByLine as $lineNum => $lineContent ) {
                if ( $lineNum >= $beginLineNum && $lineNum <= $endLineNum ) {
                    $contentByLine[$lineNum] = "";
                }
            }
            file_put_contents($adminLoginFile, implode("", $contentByLine), LOCK_EX);
        }

    }

     /* Remove Cookie Handle in admin LOGOUT File */
    $adminLogoutFile = NV_ROOTDIR . '/includes/core/admin_logout.php';
    $beginAdminLogoutPattern = "/123HOST LSCache begin remove cookie/";
    $endAdminLogoutPattern = "/123HOST LSCache end remove cookie/";

    $contentByLine = file($adminLogoutFile);
    $matches  = preg_grep ($beginAdminLogoutPattern, $contentByLine);
    $numberOfBlock = count($matches);

    for ($i=0; $i < $numberOfBlock; $i++) {

        // Find Begin and End 123HOST LSCache rewrite of Admin LOGOUT
        $contentByLine = file($adminLogoutFile);
        foreach ( $contentByLine as $lineNum => $lineContent ) {
            if (preg_match($beginAdminLogoutPattern, $lineContent))
                $beginLineNum = $lineNum;

            if (preg_match($endAdminLogoutPattern, $lineContent))
                $endLineNum = $lineNum;
        }

        // Detroy lines
        if (isset($beginLineNum) && isset($endLineNum)) {
            foreach ( $contentByLine as $lineNum => $lineContent ) {
                if ( $lineNum >= $beginLineNum && $lineNum <= $endLineNum ) {
                    $contentByLine[$lineNum] = "";
                }
            }
            file_put_contents($adminLogoutFile, implode("", $contentByLine), LOCK_EX);
        }
    }


}


function removePurgeCacheHandle(&$message) {
    global $lang_module;

    $cacheFile = NV_ROOTDIR . '/vendor/vinades/nukeviet/Cache/Files.php';

    $beginModifyPattern = "/123HOST LSCache begin mofidy/";
    $endModifyPattern = "/123HOST LSCache end mofidy/";

    $contentByLine = file($cacheFile);


    $matches  = preg_grep ($beginModifyPattern, $contentByLine);
    $numberOfBlock = count($matches);

    for ($i=0; $i < $numberOfBlock; $i++) {

        // Find Begin and End 123HOST modify
        $contentByLine = file($cacheFile);
        foreach ( $contentByLine as $lineNum => $lineContent ) {
            if (preg_match($beginModifyPattern, $lineContent))
                $beginLineNum = $lineNum;

            if (preg_match($endModifyPattern, $lineContent))
                $endLineNum = $lineNum;
        }

        // Detroy lines
        if (isset($beginLineNum) && isset($endLineNum)) {
            foreach ( $contentByLine as $lineNum => $lineContent ) {
                if ( $lineNum >= $beginLineNum && $lineNum <= $endLineNum ) {
                    $contentByLine[$lineNum] = "";
                }
            }
            if(!file_put_contents($cacheFile, implode("", $contentByLine), LOCK_EX)){
                $message = $lang_module['123host_edit_file_failure'] . $cacheFile;
                return FALSE;
            }
        }
    }
    $message = $lang_module['123host_edit_file'] . $cacheFile . $lang_module['123host_success'];
    return TRUE;
}

/*
    Tắt rewrite cache tại .htaccess
        Xóa tất cả các rewrite rule cache
*/
function disableCacheRewrite(&$message) {
    global $lang_module;
    $htaccessFile = NV_ROOTDIR . '/.htaccess';

    /** Try to delete 123HOST LSCache content from .htaccess file **/
    $contentByLine = file($htaccessFile);
    $beginPattern = "/########## Begin 123HOST LSCache/";
    $endPattern = "/########## End - 123HOST LSCache/";

    // Find first and end 123HOST LSCache rewrite
    foreach ( $contentByLine as $lineNum => $lineContent ) {
        if (preg_match($beginPattern, $lineContent))
            $beginLineNum = $lineNum;

        if (preg_match($endPattern, $lineContent))
            $endLineNum = $lineNum;

    }

    if (isset($beginLineNum) && isset($endLineNum)) {
        foreach ( $contentByLine as $lineNum => $lineContent ) {
            if ( $lineNum >= $beginLineNum && $lineNum <= $endLineNum ) {
                $contentByLine[$lineNum] = "";
            }
        }
        if(file_put_contents($htaccessFile, implode("", $contentByLine), LOCK_EX)) {
            $message = $lang_module['123host_disable_cache_success'];
            return TRUE;
        }
        else {
            $message = $lang_module['123host_disable_cache_failure'] . " <a href='" . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=lscnv&amp;' . NV_OP_VARIABLE . '=main' . '&amp;' . 'action=checkRequirement' . "'>"  . $lang_module['123host_check_check_req']  . "</a>";
            return FALSE;
        }
    } else {
            $message = $lang_module['123host_disable_cache_failure'] . "<a href='" . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=lscnv&amp;' . NV_OP_VARIABLE . '=main' . '&amp;' . 'action=checkRequirement' . "'>"  . $lang_module['123host_check_check_req']  . " </a>";
            return FALSE;
    }
}

/* Thực hiện xóa các dòng đã thêm vào các file của Nukeviet + Reset table config của module nếu người dùng thực hiện xóa module hoặc Cài lại module */
global  $op;
if ($op == 'del' || $op == 'recreate_mod') {
    removeCookieHandle($message);
    removePurgeCacheHandle($message);
    disableCacheRewrite($message);
  
    $query = "TRUNCATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_config";
    $row = $db->prepare($query); 
    $row->execute();

    $query = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config VALUES ('sys','global','cache_status','0'),('sys','global','first_run','0'),('sys','global','public_cache_ttl','604800'),('sys','global','front_page_cache_ttl','604800'),('sys','global','cache_login_page','0'),('sys','global','cache_favicon','1'),('sys','global','fix_purge_cache','0'),('sys','global','fix_cookie','0')";
    $row = $db->prepare($query); 
    $row->execute();
}