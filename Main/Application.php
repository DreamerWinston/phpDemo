<?php

//命名空间
namespace Main;

use vendor\input;

class Application
{

    public static $config;
    public static $rawGET;
    public static $rawPOST;

    public static function run(){

//        开启Session
        self::_startSession();

//        设置字符集
        self::_initCharset();

//        设置PHP报错级别
        self::_setPHPErrorDisplayAndErrorReport();

//        定义目录常量
        self::_defineDirConst();

//        加载配置文件
        self::_loadConfigFile();

//        解析Url参数
        self::_parserUrlParams();

//        注册自动加载
        self::_registerAutoload();

//        过滤$_Get和$_Post全局参数
        self::_filterGlobalVariable();

//        分发路由;
        self::_dispatchRoute();
    }



//开启session
    public static function _startSession(){
        session_start();
    }

//    初始化字符集
    public static function _initCharset(){
        header('Content-Type:text/html;charset=utf-8');
    }

    public static function _setPHPErrorDisplayAndErrorReport(){
        ini_set('display_errors','on');
        error_reporting(E_ALL);
    }

    public static function _defineDirConst(){

        define('DS',DIRECTORY_SEPARATOR);

        define('ROOT_PATH',dirname(__DIR__));

        define('APP_PATH',ROOT_PATH . DS .'AppDelegate');

        define('VIEW_PATH',APP_PATH . DS .'view');

        define('CONFIG_PATH',APP_PATH . DS .'config');

    }

    public static function _loadConfigFile(){
        require CONFIG_PATH . DS .'config.php';
        self::$config = $config;
    }

    public static function _parserUrlParams(){
        $p =isset($_GET['p']) ? $_GET['p'] : self::$config['defaultPlatform'];
        $a =isset($_GET['a']) ? $_GET['a'] : self::$config['defaultAction'];
        $c =isset($_GET['c']) ? $_GET['c'] : self::$config['defaultController'];

        define('PLATFORM',$p);
        define('ACTION',$a);
        define('CONTROLLER',$c);
    }

    public static function _registerAutoload(){
        require CONFIG_PATH . DS . 'vendor'.DS.'autoload.php';
    }

    public static function _filterGlobalVariable(){
        self::$rawGET =$_GET;
        self::$rawPOST =$_POST;
        $_GET =Input::addslashes($_GET);
        $_POST =Input::addslashes($_POST);

    }

    public static function _dispatchRoute(){
        $a =ACTION;

        $c ='\\AppDelegate\\controller\\'.PLATFORM .'\\'.CONTROLLER.'Controller';

        $ctrl =new $c();

        $ctrl->$a();
    }




}

