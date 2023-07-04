<?php
require_once __DIR__ .'/../config/config.php';
class Database
{

    private static $pdo;

    public static function getInstance()
    {
        if (is_null(self::$pdo)) {
            self::$pdo = new PDO(DNS,USER,PASSWORD);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        return self::$pdo;
    }

	/**
	 * @return mixed
	 */
	public static function get_pdo() {
		return self::$pdo;
	}
	
	/**
	 * @param mixed $pdo 
	 */
	public static function set_pdo($pdo) {
		self::$pdo = $pdo;
		return;
	}
}


// require_once __DIR__ .'/../config/config.php';
// function connect()
// {
//     $db = new PDO(DNS,USER,PASSWORD);
//     $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
//     return $db;
// }