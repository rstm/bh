<?php
	
/*
interface 
$conn=mysql_connect("127.0.0.1","root","510311");
mysql_set_charset('utf8',$conn);
if (!$conn) {
    die('Ошибка соединения: ' . mysql_error());
}
mysql_select_db("auto",$conn);*/

define('DB_SERVER', 'localhost');       // IP адрес сервера БД или если локальный ПК localhost
define('DB_USERNAME', 'root');         // Имя пользователя
define('DB_PASSWORD', '510311'); // Пароль пользователя
define('DB_DATABASE', 'mystuff');  

class DataBase
{
    public static $mConnect;	// Хранит результат соединения с базой данных
    public static $mSelectDB;	// Хранит результат выбора базы данных

    // Метод создает соединение с базой данных
    public static function Connect($host, $user, $pass, $name)
    {
        // Пробуем создать соединение с базой данных
        self::$mConnect = mysql_connect($host, $user, $pass);
		mysql_set_charset('utf8',self::$mConnect);
        // Если подключение не прошло, вывести сообщение об ошибке..
        if(!self::$mConnect)
        {
            echo "<p><b>К сожалению, не удалось подключиться к серверу MySQL</b></p>";
            exit();
            return false;
        }

        // Пробуем выбрать базу данных
        self::$mSelectDB = mysql_select_db($name, self::$mConnect);

        // Если база данных не выбрана, вывести сообщение об ошибке..
        if(!self::$mSelectDB)
        {
            echo "<p><b>".mysql_error()."</b></p>";
            exit();
            return false;
        }

        // Возвращаем результат
        return self::$mConnect;
    }

    // Метод закрывает соединение с базой данных
    public static function Close()
    {
        // Возвращает результат
        return mysql_close(self::$mConnect);
    }

}

DataBase::Connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

?>
