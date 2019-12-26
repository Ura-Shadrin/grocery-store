<?php
$mysqli = new mysqli ("localhost", "root", "", "grocery-store"); 
$mysqli -> query ("SET NAMES 'utf8'");

session_start();
$colTov = $_SESSION['colTov'];
$mas = $_SESSION['ar'];

$client_id = $_SESSION['client_id'];
$res= $mysqli -> query ("SELECT * FROM `customers` WHERE `client_id`='$client_id' ");
$row = $res -> fetch_assoc ();
$customer_name = $row["name"];
$delivery_address = $row["address"];


if ($_GET['address'] != '') {
	$delivery_address = htmlspecialchars(trim($_GET['address']));
}


$post_office=htmlspecialchars(trim($_POST['post_office1']));

for ($i=0; $i < $colTov; $i++) { 
	$id_tovara = $mas[$i];

	$res= $mysqli -> query ("SELECT * FROM `product` WHERE `id`='$id_tovara' ");
	$row = $res -> fetch_assoc ();

	$listTovar .= $row["name"] . "/";
	$listPrice .= $row["price"] . "/";
	//echo $listTovar;  Строка вида Товар/Товар/...
}
$ordered_goods = $listTovar;
$price = $listPrice;
$order_price = $_SESSION['sum'];
$date = date("d/m/Y");
$time = date("H:i:s");
$number_of_goods = $_SESSION['colTov'];
$check = $mysqli -> query ("INSERT INTO `orders` ( `ordered_goods`, `price`, `customer_name`, `delivery_address`, `order_price`, `date`, `time`, `number_of_goods`) VALUES('$ordered_goods','$price','$customer_name','$delivery_address','$order_price', '$date', '$time', '$number_of_goods') ");   // Заказанные товары. Цена. Имя клиента. Адрес доставки. Сумма заказа. Дата. Время. Количество товаров.

// header ("Location: http://grocery-store");
?>