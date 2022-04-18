<?php
/* Основные настройки */
$DB_HOST = "localhost";
$DB_LOGIN = "root"; 	
$DB_PASSWORD = "";
$DB_NAME = "gbook";

$dbc=mysqli_connect($DB_HOST, $DB_LOGIN, $DB_PASSWORD, $DB_NAME) or die('Ошибка соединения с MySQL-сервером');
mysqli_set_charset($dbc, "utf8");
/* Основные настройки */

/* Сохранение записи в БД */
$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['msg'];

$query="INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')";
$addBD=mysqli_query($dbc, $query) or die("Запрос не может быть выполнен!");
/* Сохранение записи в БД */

/* Вывод записей из БД */
$result = "SELECT id, name, email, msg, UNIX_TIMESTAMP(datetime) as
dt
FROM msgs
ORDER BY id DESC";

$sum = mysqli_query($dbc, "SELECT COUNT(*) FROM msgs;");
$row= mysqli_fetch_array($sum);
$count = $row[0];
mysqli_close($dbc);
/* Вывод записей из БД */

/* Удаление записи из БД */

/* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="POST" action="<?= $_POST['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" value="Отправить!" />


<p>Всего записей в гостевой книге: <?=$count?></p>
</form>
<?php
/* Вывод записей из БД */

/* Вывод записей из БД */
?>