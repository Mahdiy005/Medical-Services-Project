<?php

session_start();

define('BURL', 'http://localhost:8443/medical_services/');
define('BURL_ADMIN', 'http://localhost:8443/medical_services/admin/');
define('BASE_LINK', __DIR__ . '/');
define('BASE_LINK_ADMIN', __DIR__ . '/admin/');


// CONNECT TO DB WITH `PDO`
include_once BASE_LINK . 'functions/db.php';


