<?php
class connection{
 static private $pdo;
static private $pdostat ;

static function connect()
{
	try {
 self::$pdo=new PDO("mysql:host=127.0.0.1;dbname=my-gym-database",'root') ;
 self::$pdo->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e) {
  echo "ERREUR : ".$e->getMessage() ;
}
}
static function Maj($sql)
{
	self::$pdostat = self::$pdo->query($sql) ;
}
static function Select($sql)
{
	self::$pdostat = self::$pdo->query($sql) ;
 self::$pdostat->setFetchMode(PDO::FETCH_ASSOC) ;
	return self::$pdostat;
}




}
?>