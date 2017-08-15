<?php

/**
 * @Project NUKEVIET 4.x
 * @Author 123host <tanviet@123host.vn>
 * @Copyright (C) 2017 123host. All rights reserved
 * @License: GNU/GPL version 2 or any later version
 * @Createdate Fri, 11 Aug 2017 09:48:43 GMT
 */

if ( ! defined( 'NV_IS_MOD_LSCNV' ) ) die( 'Stop!!!' );

$page_title = $module_info['site_title'];
$key_words = $module_info['keywords'];

$array_data = array();


$contents = nv_theme_lscnv_info( $array_data );

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';