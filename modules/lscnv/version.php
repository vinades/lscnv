<?php

/**
 * @Project:          123HOST LSCache module for Nukeviet 4.x
 * Module Name:       123HOST LSCache
 * Module URI:        https://123host.vn/nukeviet-hosting.html
 * Description:       Nukeviet module to connect to Caching Web Server at 123HOST
 * Version:           1.0.01
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

$module_version = array(
	'name' => '123HOST LSCache',
	'modfuncs' => 'main,detail,search,info',
	'change_alias' => 'main,detail,search,info',
	'submenu' => 'main,detail,search,info',
	'is_sysmod' => 0,
	'virtual' => 0,
	'version' => '1.0.01',
	'date' => 'Fri, 20 Aug 2017 09:48:43 GMT',
	'author' => '123HOST.VN (tanviet@123host.vn)',
	'uploads_dir' => array($module_name),
	'note' => ''
);