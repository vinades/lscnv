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