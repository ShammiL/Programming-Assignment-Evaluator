<?php
	$mysqlDatabaseName ='myapp';
	$mysqlUserName ='root';
	$mysqlPassword ='';
	$mysqlHostName ='http://localhost.com';
	$mysqlExportPath ='C:/xampp/htdocs/myapp/backup.sql';

	$command='mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ' .$mysqlExportPath;
	exec($command,$output=array(),$worked);



