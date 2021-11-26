<?php
define('servername', 'localhost');
define('username', getenv('CLOUDSQL_USER'));
define('password', getenv('CLOUDSQL_PASSWORD'));
define('database', getenv('CLOUDSQL_DB'));
define('instance', getenv('CLOUDSQL_DSN'));