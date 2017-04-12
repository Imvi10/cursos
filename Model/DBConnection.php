<?php
namespace DB;

class DBConnection{
    
    private static $connection=null;
    private static $host='localhost'; 
    private static $user='cursos';
    private static $pass='cursos808';
    private static $bd='cursos808';
    
    public static function getConnection(){
        if(self::$connection==null){
            self::$connection=mysqli_connect(self::$host, self::$user, self::$pass, self::$bd);
        }
        return self::$connection;
    }
    
    
}