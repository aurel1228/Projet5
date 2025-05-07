<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    http_response_code(404);
    die();
}

class Router
{
    protected static bool $Return_404 = true;
    protected static function Return_404(): void
    {
        (file_exists("./view/404.php")) ?  require_once "./view/404.php" : http_response_code(404);
    }
    protected static function File(string $file): string
    {
        if (!empty($file)) {
            (str_contains($file, "?")) ? $file = strtok($file, '?') : $file;
            ($file[strlen($file) - 1] === "/") ? $file = rtrim($file, "/") : $file;
        }
        return $file;
    }

    public static function Run(): void
    {
        $requested_file = self::File($_SERVER["REQUEST_URI"]);
        foreach (Routes::$Route as $request => $file) {
            if ($requested_file === $request) {
                if (file_exists($file)) {
                    self::$Return_404 = false;
                    require $file;
                } else echo "Error";
            }
        }
        if (self::$Return_404) self::Return_404();
    }
}
class Routes
{
    public static array $Route = array(
        "" => "./view/accueil.php",
    );
}

$Route->run();
