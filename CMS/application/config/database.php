<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 | -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the "Database Connection"
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the "default" group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = "default";
$active_record = TRUE;

if (strcmp(DEV,'dev')==0){
	$db['default']['hostname'] = "localhost";
	$db['default']['username'] = "root";
	$db['default']['password'] = "root";
	$db['default']['database'] = "cms";
}else if(DEV=='mopaas') {
	$db['default']['hostname'] = getenv("MOPAAS_MYSQL_HOST");
	$db['default']['username'] = getenv("MOPAAS_MYSQL_USERNAME");
	$db['default']['password'] = getenv("MOPAAS_MYSQL_PASSWORD");
	$db['default']['database'] = getenv("MOPAAS_MYSQL_NAME");
	$db['default']['port']     = getenv("MOPAAS_MYSQL_PORT");
}else if(DEV=='openshift') {
	/*
	 $db['default']['hostname'] = getenv('OPENSHIFT_MYSQL_DB_HOST') ;
	$db['default']['port']     = getenv('OPENSHIFT_MYSQL_DB_PORT');
	$db['default']['username'] = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
	$db['default']['password'] = getenv('OPENSHIFT_GEAR_NAME');
	$db['default']['database'] = 'php-cms';

	*/
	$db['default']['hostname'] = '127.12.68.1' ;
	$db['default']['port']     = '3306' ;
	$db['default']['username'] = 'adminUISEb7K' ;
	$db['default']['password'] = '8XatybHpK29f' ;
	$db['default']['database'] = 'cms';
}

$db['default']['dbdriver'] = "mysql";
$db['default']['dbprefix'] = "t_";
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = TRUE;
$db['default']['cachedir'] = "cms";
$db['default']['char_set'] = "utf8";
$db['default']['dbcollat'] = "utf8_general_ci";


/* End of file database.php */
/* Location: ./system/application/config/database.php */