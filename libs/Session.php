<?php
//Session Object
class Session{
    public static function init(){
    @session_start();
}

/**
 * 
 * @param string $key Key in the session associated array
 * @param string $value Value stored in the session associated array
 */
public static function set($key, $value){
    $_SESSION[$key] = $value;
}
/**
 * 
 * @param string $key Key in the session associated array
 * @return string 
 */
public static function get($key){
    if (isset($_SESSION[$key]))
    return $_SESSION[$key];
}

public static function destroy(){

    session_destroy();
}
}
