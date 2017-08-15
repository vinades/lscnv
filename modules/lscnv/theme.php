<?php

/**
 * @Project NUKEVIET 4.x
 * @Author 123host <tanviet@123host.vn>
 * @Copyright (C) 2017 123host. All rights reserved
 * @License: GNU/GPL version 2 or any later version
 * @Createdate Fri, 11 Aug 2017 09:48:43 GMT
 */

if ( ! defined( 'NV_IS_MOD_LSCNV' ) ) die( 'Stop!!!' );

/**
 * nv_theme_lscnv_main()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_lscnv_main ( $array_data )
{
    global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info, $op;

    $xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file );
    $xtpl->assign( 'LANG', $lang_module );

    

    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}

/**
 * nv_theme_lscnv_detail()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_lscnv_detail ( $array_data )
{
    global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info, $op;

    $xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file );
    $xtpl->assign( 'LANG', $lang_module );

    

    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}

/**
 * nv_theme_lscnv_search()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_lscnv_search ( $array_data )
{
    global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info, $op;

    $xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file );
    $xtpl->assign( 'LANG', $lang_module );

    

    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}

/**
 * nv_theme_lscnv_info()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_lscnv_info ( $array_data )
{
    global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info, $op;

    $xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file );
    $xtpl->assign( 'LANG', $lang_module );

    

    $xtpl->parse( 'info' );
    return $xtpl->text( 'info' );
}