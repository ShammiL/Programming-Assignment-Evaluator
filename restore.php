<?php
	$mysqlDatabaseName ='myapp';
	$mysqlUserName ='root';
	$mysqlPassword ='';
	$mysqlHostName ='http://localhost.com';
	$mysqlImportFilename ='C:/xampp/htdocs/myapp/backup.sql';


	$command='mysql -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' < ' .$mysqlImportFilename;
	exec($command,$output=array(),$worked);

