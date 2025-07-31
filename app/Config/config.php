<?php
// Global application configuration

define('APP_NAME', 'Servium');
define('APP_VERSION', '1.0.0');
define('APP_URL', 'http://localhost/SERVIUM');

define('BASE_PATH', dirname(__DIR__));
define('CONTROLLERS_PATH', BASE_PATH . '/Controllers');
define('MODELS_PATH', BASE_PATH . '/Models');
define('VIEWS_PATH', BASE_PATH . '/Views');
define('ASSETS_PATH', BASE_PATH . '/Public/assets');

define('DB_HOST', 'localhost');
define('DB_NAME', 'servium_db');
define('DB_USER', 'root');
define('DB_PASS', '');

define('CONTACT_EMAIL', 'contact@servium.com');
define('ADMIN_EMAIL', 'admin@servium.com');

define('CSRF_TOKEN_NAME', 'servium_csrf_token');
define('SESSION_NAME', 'servium_session');

define('UPLOAD_PATH', BASE_PATH . '/uploads');
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif', 'pdf']);

define('CACHE_ENABLED', true);
define('CACHE_PATH', BASE_PATH . '/cache');
define('CACHE_DURATION', 3600); // 1 hour
define('LOG_ENABLED', true);
define('LOG_PATH', BASE_PATH . '/logs');
define('LOG_LEVEL', 'INFO');
define('ENVIRONMENT', 'development');

function asset($path) {
    return APP_URL . '/app/Public/assets/' . ltrim($path, '/');
}

function url($page = '', $params = []) {
    $url = APP_URL . '/app/Public/index.php';
    if ($page) {
        $params['page'] = $page;
    }
    if (!empty($params)) {
        $url .= '?' . http_build_query($params);
    }
    return $url;
}

function redirect($page = '', $params = []) {
    header('Location: ' . url($page, $params));
    exit;
}

function isCurrentPage($page) {
    return isset($_GET['page']) && $_GET['page'] === $page;
}

if (ENVIRONMENT === 'production') {
    error_reporting(0);
    ini_set('display_errors', 0);
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

if (session_status() === PHP_SESSION_NONE) {
    session_name(SESSION_NAME);
    session_start();
}

function generateCSRFToken() {
    if (!isset($_SESSION[CSRF_TOKEN_NAME])) {
        $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(32));
    }
    return $_SESSION[CSRF_TOKEN_NAME];
}

function verifyCSRFToken($token) {
    return isset($_SESSION[CSRF_TOKEN_NAME]) && hash_equals($_SESSION[CSRF_TOKEN_NAME], $token);
}
?> 