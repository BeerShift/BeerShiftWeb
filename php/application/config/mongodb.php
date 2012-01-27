<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Generally will be localhost if you're querying from the machine that Mongo is installed on
$config['mongo_host'] = getenv('OPENSHIFT_DB_HOST');

// Generally will be 27017 unless you've configured Mongo otherwise
$config['mongo_port'] = getenv('OPENSHIFT_DB_PORT');

// The database you want to work from (required)
$config['mongo_db'] = "appcelerator";

// Leave blank if Mongo is not running in auth mode
$config['mongo_user'] = getenv('OPENSHIFT_DB_USERNAME');
$config['mongo_pass'] = getevn('OPENSHIFT_DB_PASSWORD');

// Persistant connections
$config['mongo_persist'] = TRUE;
$config['mongo_persist_key'] = 'ci_mongo_persist';

// Get results as an object instead of an array
$config['mongo_return'] = 'array'; // Set to object

// When you run an insert/update/delete how sure do you want to be that the database has received the query?
// safe = the database has receieved and executed the query
// fysnc = as above + the change has been committed to harddisk <- NOTE: will introduce a performance penalty
$config['mongo_query_safety'] = 'safe';

// Supress connection error password display
$config['mongo_supress_connect_error'] = TRUE;

// If you are having problems connecting try changing this to TRUE
$config['host_db_flag'] = FALSE;