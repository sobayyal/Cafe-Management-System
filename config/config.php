<?php
// config/config.php
// Main configuration settings for the application

// Application title
define('APP_NAME', 'Cafe Management System');

// Basic site URL - update this for your environment
define('BASE_URL', '/cafe-management');

// Session configuration
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 0); // Set to 1 if using HTTPS

// Timezone setting
date_default_timezone_set('Asia/Karachi');

// Error reporting settings (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set default currency
define('CURRENCY', 'Rs.');

// Other global settings
define('ITEMS_PER_PAGE', 10);
?>

<?php
// config/database.php
// Database configuration

// Database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'cafe_management');

// PDO Database connection
function getDbConnection() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        return new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
        // Log the error or display a user-friendly message
        die("Database Connection Failed: " . $e->getMessage());
    }
}
?>