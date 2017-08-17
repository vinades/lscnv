<?php

/**
 * @Project 123HOST LSCache module for Nukeviet 4
 * @Author Tan Viet <tanviet@123host.vn>
 * @Copyright (C) 2017 123HOST. All rights reserved
 * @License: GNU/GPL version 2 or any later version
 * @Createdate Fri, 11 Aug 2017 09:48:43 GMT
 */

if ( ! defined( 'NV_ADMIN' ) or ! defined( 'NV_MAINFILE' ) or ! defined( 'NV_IS_MODADMIN' ) ) die( 'Stop!!!' );

define( 'NV_IS_FILE_ADMIN', true );


$allow_func = array( 'main', 'config', 'info', 'init' );

/*
    Function kiểm tra tính tương thích của hệ thống:
        - Kiểm tra phiên bản Nukeviet: Phải là Nukeviet 4.0 trở lên
        - Các file cần thiết phải tồn tại và ghi được
*/
function checkRequirement($nvCurrentVersion,&$message) {
    global $lang_module;
    // Nukeviet versions are supported
    $arrayVersion = explode('.', $nvCurrentVersion);
    if ($arrayVersion[0] < 4) {
        $message = $lang_module['123host_version_error'];
        return FALSE;
    }
    // Files must exist and writeable
    $filesNeedToWrite = array (
        NV_ROOTDIR . '/.htaccess',
        NV_ROOTDIR . '/includes/core/admin_login.php',
        NV_ROOTDIR . '/includes/core/admin_logout.php'
    );
    $htaccessFile = NV_ROOTDIR . '/.htaccess';
    $adminLogin = NV_ROOTDIR . '/includes/core/admin_login.php';
    $adminLogout = NV_ROOTDIR . '/includes/core/admin_logout.php';

    foreach ($filesNeedToWrite as $file) {
        if (!is_writable($file)) {
            $message = $message . "<br><i>" . 'File <strong>' . $file . '</strong>' . $lang_module['123host_file_not_exist_or_write'] . '</i>';
        }
    }

    if ($message) {
        $message = $message . $lang_module['123host_system_not_meet'];
        return FALSE;
    } else {
        $message = $lang_module['123host_system_meet'];
        return TRUE;
    }
}

/*
    Build rewrite rule và Bật rewrite cache tại file .htaccess
*/
function enableCacheRewrite($publicCacheTTL, $frontPageCacheTTL, $cacheLoginPage, $cacheFavicon ,&$message) {
    global $lang_module;
    $htaccessFile = NV_ROOTDIR . '/.htaccess';

    if ($cacheLoginPage == 1) {
        $cacheLoginPageBlock = "";
    } else {
        $cacheLoginPageBlock = "\n  ### 123HOST LSCache - LOGIN LOCATION\n  RewriteCond %{ORG_REQ_URI} !/admin|/users [NC]\n  ### 123HOST LSCache - LOGIN LOCATION
    ";
    }

    if ($cacheFavicon == 1) {
        $cacheFaviconBlock = "";
    } else {
        $cacheFaviconBlock = "### 123HOST LSCache - FAVICON\n  RewriteCond %{REQUEST_URI} !/favicon\.ico$ [NC]\n  ### 123HOST LSCache - FAVICON
    ";
    }


    // Create rewrite content for handle caching
    $rewriteContent = "########## Begin 123HOST LSCache
## This content generated by 123HOST LSCache - Do not edit the contents of this block! ##
<IfModule LiteSpeed>
  RewriteEngine On
  CacheDisable public /

  ### 123HOST LSCache - HTTP METHOD
  RewriteCond %{REQUEST_METHOD} ^HEAD|GET|PURGE$
  ### 123HOST - HTTP METHOD

  ### 123HOST LSCache - MOBILE
  RewriteCond %{HTTP_USER_AGENT} \"android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge\ |maemo|midp|mmp|opera\ m(ob|in)i|palm(\ os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows\ (ce|phone)|xda|xiino\" [NC]
  RewriteRule .* - [E=Cache-Control:vary=ismobile]
  ### 123HOST LSCache - MOBILE
  " . $cacheLoginPageBlock . "
  " . $cacheFaviconBlock . "
  ### 123HOST LSCache - LOGIN COOKIE
  RewriteCond %{HTTP_COOKIE} !nvloginhash|adlogin [NC]
  ### 123HOST LSCache - LOGIN COOKIE

  ### 123HOST LSCache - MAX AGE
  RewriteRule .* - [E=Cache-Control:max-age=" . $publicCacheTTL . "] [NC]
  ### 123HOST LSCache - MAX AGE

</IfModule>
########## End - 123HOST LSCache\n";

    $oldRewriteContent = file_get_contents($htaccessFile);
    $newRewriteContent = $rewriteContent . $oldRewriteContent;

    // Append content to .htaccess file
    if (file_put_contents($htaccessFile, $newRewriteContent, LOCK_EX)) {
        $message =  $lang_module['123host_enable_cache_success'];
        return TRUE;
    } 
    else {
        $message = $lang_module['123host_enable_cache_failure'];
        return FALSE;
    }

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


/*
    Fix các file admin_login.php và admin_logout.php để hỗ trợ cache cho Nukeviet
*/
function addCookieHandle(&$message) {
    global $lang_module;

    $adminLogin = NV_ROOTDIR . '/includes/core/admin_login.php';
    $adminLogout = NV_ROOTDIR . '/includes/core/admin_logout.php';

    $adminLoginPatternNv34To40 = "/admin\_lev\ \=\ intval/";
    $adminLoginPatternNv42 = "/row\[\'admin\_lev\'\]\ \=\ intval/";
    
    $adminLogoutPattern = "/unset\_request\(\'admin\,online/";

    $setCookie = array("//123HOST LSCache begin add cookie\n\$nv_Request->set_Cookie('adlogin', '1');\n//123HOST LSCache end add cookie\n");

    $removeCookie = array("//123HOST LSCache begin remove cookie\n\$nv_Request->unset_request('adlogin', 'cookie');\n//123HOST LSCache end remove cookie\n");

    /* Insert code to create cookie after admin login */
    $contentByLine = file($adminLogin);

    foreach ( $contentByLine as $lineNum => $lineContent ) {
        if (preg_match($adminLoginPatternNv34To40, $lineContent) || preg_match($adminLoginPatternNv42, $lineContent )) {
            $insertLineNum = $lineNum + 1;
        }
    }

    array_splice( $contentByLine, $insertLineNum, 0, $setCookie ); 

    file_put_contents($adminLogin, implode("", $contentByLine), LOCK_EX);  

    /* Insert code to remove cookie after admin logout */
    $contentByLine = file($adminLogout);

    $i = 0;
    foreach ( $contentByLine as $lineNum => $lineContent ) {
        if ( preg_match($adminLogoutPattern, $lineContent) ) {
            $insertLineNum = $lineNum + 1;
            array_splice( $contentByLine, $insertLineNum + $i, 0, $removeCookie );
            $i++;
        }
    }

    
    if(file_put_contents($adminLogout, implode("", $contentByLine), LOCK_EX)) {
        $message = $lang_module['123host_init_cache_success'];
        return TRUE;
    } else {
        $message = $lang_module['123host_init_cache_failure'];
        return FALSE;
    }
    
}

/*
    Xóa các file đã thêm vào admin_login.php và admin_logout.php
    Run lúc uninstall module để gỡ bỏ module
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

/*
    Fix file vendor/vinades/nukeviet/Cache/Files.php để hỗ trợ call đến purge cache lúc có sự thay đổi trên hệ thống (như đăng bài, sửa bài, sửa module)
*/
function addPurgeCacheHandle(&$message) {
    global $lang_module;
    
    $cacheFile = NV_ROOTDIR . '/vendor/vinades/nukeviet/Cache/Files.php';

    $patternForAddFunction = "/}/";
    $patternForCallFunction = "/delAll|delMod/";
    
    $contentFunction = array("//123HOST LSCache begin mofidy\npublic function sendPurgeLSCache() {\n        @Header('X-LiteSpeed-Purge: *');
}\n//123HOST LSCache end mofidy\n");
    $contentCallFunction = "//123HOST LSCache begin mofidy\n        \$this->sendPurgeLSCache();\n//123HOST LSCache end mofidy\n";
    
    // Thêm function sendPurgeLSCache vào cuối file Files.php
    $contentByLine = file($cacheFile);

    foreach ( $contentByLine as $lineNum => $lineContent ) {
        if (preg_match($patternForAddFunction, $lineContent) ) {
            $insertLineNum = $lineNum;
        }
    }
        
    array_splice( $contentByLine, $insertLineNum, 0, $contentFunction ); 
        
    if(!file_put_contents($cacheFile, implode("", $contentByLine), LOCK_EX)){
        $message = $lang_module['123host_edit_file_failure'] . $cacheFile;
        return FALSE;
    }
      
    /* Insert code to remove cookie after admin logout */
    $contentByLine = file($cacheFile);
    
    $i = 0;
    foreach ( $contentByLine as $lineNum => $lineContent ) {
        if ( preg_match($patternForCallFunction, $lineContent) ) {
            $insertLineNum = $lineNum + 2;
            array_splice( $contentByLine, $insertLineNum + $i, 0, $contentCallFunction );
            $i++;
        }
    }

    if(file_put_contents($cacheFile, implode("", $contentByLine), LOCK_EX)) {
        $message = $lang_module['123host_edit_file'] . $cacheFile . $lang_module['123host_success'];
        return TRUE;
    } else {
        $message = $lang_module['123host_edit_file_failure'] . $cacheFile;
        return FALSE;
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
   Build header và Gởi thông tin xóa cache đến web server
   Lưu ý: Chỉ hỗ trợ web server của 123HOST
*/
function sendPurge($url, $debug = FALSE, &$message) {
        
    $fp = fsockopen(NV_SERVER_NAME, 80, $errno, $errstr, 2);
    if (!$fp) {
        $message = "$errstr ($errno)\n";
        return FALSE;
    } else {
        $out = "PURGE ". $url ." HTTP/1.0\r\n"
        . "Host: " . NV_SERVER_NAME . "\r\n"
        . "Connection: Close\r\n\r\n";
        fwrite($fp, $out);
        if ($debug) {
            $message = $out;
            while (!feof($fp)) {
                $message = $message . "<br>" . fgets($fp, 128);
            }
        }
        fclose($fp);
        return TRUE;
    }
}