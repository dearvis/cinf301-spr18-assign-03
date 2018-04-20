<?php
namespace App\Database;

/**
 * Uses the "Singleton" pattern to maintain control of the database
 */
class DB
{
	private static $instance = null;

	private function __construct() {}
	private function __clone() {}

	public static function instance()
	{
		if (self::$instance === null)
		{
			$opt  = array(
					\PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
					\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
					\PDO::ATTR_EMULATE_PREPARES   => FALSE,
			);
			$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';port='.DB_PORT.';charset='.DB_CHAR;
			self::$instance = new \PDO($dsn, DB_USER, DB_PASS, $opt);
		}
		return self::$instance;
	}

	public static function __callStatic($method, $args)
	{
		return call_user_func_array(array(self::instance(), $method), $args);
	}

	public static function run($sql, $args = [])
	{
		$stmt = self::instance()->prepare($sql);
		$stmt->execute($args);
		return $stmt;
	}
}
