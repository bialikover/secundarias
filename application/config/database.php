<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


switch (ENVIRONMENT) {
    case 'production':
        $active_group = 'production';
    break;
 
    // add additional cases for more environments
 
    default:
        $active_group = 'development';
    break;
}
$active_group = 'development';
$active_record = TRUE;


$db['production']['hostname'] = 'tunnel.pagodabox.com:3306';
$db['production']['username'] = 'tarah';
$db['production']['password'] = '9vFjHLyh';
$db['production']['database'] = 'secundaria';
$db['production']['dbdriver'] = 'mysql';
//$db['production']['port']     = '3306';
$db['production']['dbprefix'] = '';
$db['production']['pconnect'] = TRUE;
$db['production']['db_debug'] = TRUE;
$db['production']['cache_on'] = FALSE;
$db['production']['cachedir'] = '';
$db['production']['char_set'] = 'utf8';
$db['production']['dbcollat'] = 'utf8_general_ci';
$db['production']['swap_pre'] = '';
$db['production']['autoinit'] = TRUE;
$db['production']['stricton'] = FALSE;

$db['development']['hostname'] = '192.168.40.240';
$db['development']['port']     = '3306';
$db['development']['username'] = 'root';
$db['development']['password'] = 'moises';
$db['development']['database'] = 'secundaria';
$db['development']['dbdriver'] = 'mysql';
$db['development']['dbprefix'] = '';
$db['development']['pconnect'] = TRUE;
$db['development']['db_debug'] = TRUE;
$db['development']['cache_on'] = FALSE;
$db['development']['cachedir'] = '';
$db['development']['char_set'] = 'utf8';
$db['development']['dbcollat'] = 'utf8_general_ci';
$db['development']['swap_pre'] = '';
$db['development']['autoinit'] = TRUE;
$db['development']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */