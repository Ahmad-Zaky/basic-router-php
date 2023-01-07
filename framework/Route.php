<?php

class Route {
    
    protected static $root = "/routes";
    
    protected static $uri = "/";

    protected static $pattern = "#^%s%s$#siD";

    public static function get($path = "/", $page = NULL)
    {
        return static::handle($path, $page, "GET");
    }

    public static function post($path = "/", $page = NULL)
    {
        return static::handle($path, $page, "POST");
    }

    public static function put($path = "/", $page = NULL)
    {
        return static::handle($path, $page, "PUT");
    }

    public static function delete($path = "/", $page = NULL)
    {
        return static::handle($path, $page, "DELETE");
    }

    protected static function handle($path = "/", $page = "", $action = "")
    {
        $path = static::processPath($path);
        
        static::$uri = $_SERVER['REQUEST_URI'];
        
        if ($_SERVER["REQUEST_METHOD"] !== $action) {
            // TODO: Throw exception
            return false;
        }
        
        $pattern = sprintf(static::$pattern, static::$root, $path);
        if (preg_match($pattern, static::$uri)) {
            static::execute($page ?? $path);
        }

        return false;
    }

    protected static function execute($page) 
    {
        require_once "./pages/". $page . ".php";
        exit();
    }

    protected static function processPath($path) 
    {
        if (! $path) return "/";
        
        return str_replace("//", "/", "/".$path);
    }
}