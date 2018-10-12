<?php //start of DATABASE CONN CREDINTIALS
if($_SERVER['REMOTE_ADDR']=="127.0.0.1"){
	define('DB_NAME', 'jagdamba_jc');
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PASSWORD','');
	// define('URL_PATH','http://localhost/jagdammba/');
	// define('ADMIN_PATH','http://localhost/jagdammba/');
	// define('URL_PATH','http://localhost/current-project/jagdambacement.com/');
	// define('ADMIN_PATH','http://localhost/current-project/jagdambacement.com/admin/');
}else{
	define('DB_NAME', 'jagdamba_jc');
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PASSWORD','');
	// define('DB_USER','jagdamba_imagine');
	// define('DB_PASSWORD','6KT_OP1GwsEk');
	// define('URL_PATH',"http://".$_SERVER['SERVER_NAME']."/");
	// define('ADMIN_PATH',"http://".$_SERVER['SERVER_NAME']."/admin/");
}
//end of DATABASE CONN CREDINTIALS

//COMPANY DETAILS
define ('COMPANY_NAME', 'Jagdamba Cement');
define ('COMPANY_EMAIL', '');
define ('COMPANY_LOGO', 'images/logo01.png');


//WEB MASTER DETAILS
define ('WEB_MASTER', 'Kamal Pandey');