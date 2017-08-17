<?php

/**
 * @Project 123HOST LSCache module for Nukeviet 4
 * @Author Tan Viet <tanviet@123host.vn>
 * @Copyright (C) 2017 123HOST. All rights reserved
 * @License: GNU/GPL version 2 or any later version
 * @Createdate Fri, 11 Aug 2017 09:48:43 GMT
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
