<?php


if(!function_exists('base_url'))
{
    function base_url(){
       return "http://" . $_SERVER['HTTP_HOST'];
    }
}

if (!function_exists('base_path'))
{
   function base_path($path = '')
   {
       return  __DIR__ . "/../{$path}";
   }
}

if (!function_exists('config_path'))
{
   function config_path($path = '')
   {
       return base_path("config/{$path}");
   }
}

if (!function_exists('storage_path'))
{
   function storage_path($path = '')
   {
       return base_path("storage/{$path}");
   }
}

if (!function_exists('public_path'))
{
   function public_path($path = '')
   {
       return base_path("public/{$path}");
   }
}

if (!function_exists('resources_path'))
{
   function resources_path($path = '')
   {
       return base_path("resources/{$path}");
   }
}

if (!function_exists('routes_path'))
{
   function routes_path($path = '')
   {
       return base_path("routes/{$path}");
   }
}

if (!function_exists('app_path'))
{
   function app_path($path = '')
   {
       return base_path("app/{$path}");
   }
}

if (!function_exists('dd'))
{
   function dd()
   {
       array_map(function ($content) {
           echo "<pre>";
           var_dump($content);
           echo "</pre>";
           echo "<hr>";
       }, func_get_args());

       die;
   }
}

if (!function_exists('throw_when'))
{
   function throw_when(bool $fails, string $message, string $exception = Exception::class)
   {
       if (!$fails) return;

       throw new $exception($message);
   }
}


