<?php

define('BASE_PATH', __DIR__ . '/../');
define('APP_PATH', __DIR__ . '/../app/');
define('SRC_PATH', __DIR__ . '/../src/');
define('CONFIG_PATH', __DIR__ . '/');
define('CACHE_PATH', __DIR__ . '/../var/cache/');
define('LOG_PATH', __DIR__ . '/../var/logs/');

define('DEVELOPMENT_ENV', 'development');
define('PRODUCTION_ENV', 'production');
define('STAGING_ENV', 'staging');
define('TESTING_ENV', 'testing');

defined('APPLICATION_ENV') ||
define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : PRODUCTION_ENV));
