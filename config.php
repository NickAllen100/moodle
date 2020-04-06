<?php  // Moodle configuration file

unset($CFG);
global $CFG;

$db = parse_url(getenv("DATABASE_URL"));
echo $db;
foreach ($db as $key => $val){  
    echo $key."==>".$val."\n";  
} 
$db["path"] = ltrim($db["path"], "/");
foreach ($db as $key => $val){  
    echo $key."==>".$val."\n";  
} 
$CFG = new stdClass();

$CFG->dbtype    = getenv('DATABASE_TYPE');
$CFG->dblibrary = 'pgsql';
$CFG->dbhost    = $db["host"];
$CFG->dbname    = $db["path"];
$CFG->dbuser    = $db["user"];
$CFG->dbpass    = $db["pass"];
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => $db["port"],
  'dbsocket' => '',
);

$CFG->wwwroot   = getenv('WWWROOT');
$CFG->dataroot  = getenv('DATAROOT');
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
