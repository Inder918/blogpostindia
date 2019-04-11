<?php
require('../config/config.php');
require('../app/http/Auth/fileHandler.php');
require('../app/http/Auth/setEnvironment.php');
require('../app/http/Auth/dbConnector.php');
require('../app/dbtable/sqlProperty.php');
require('../app/dbtable/tableController.php');

$table= new app\dbtable\table();

