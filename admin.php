<?php
 session_start();
    if ($_SESSION['vhod'] != 1) {
    	header ("Location: http://grocery-store/entry2.php");
    	exit();
    }

$mysqli = new mysqli ("localhost", "root", "", "grocery-store"); 
$mysqli -> query ("SET NAMES 'utf8'");

$chislo = $mysqli -> query ("SELECT COUNT(`order_id`) FROM `orders`");
	$row = $chislo -> fetch_assoc ();
	$num = ($row['COUNT(`id`)']);



	// $chislo = $mysqli -> query ("SELECT * FROM `orders` INTO OUTFILE '../grocery-store/name_file.csv' FIELDS TERMINATED BY ';' ");

	if(isset($_POST['dobavitSubmit'])) { 
		// Записываем все в переменные 
		$dobavitNameTovar=htmlspecialchars(trim($_POST['dobavitNameTovar'])); 
		$dobavitManufacturer=htmlspecialchars(trim($_POST['dobavitManufacturer']));
		$unit_of_measurement=htmlspecialchars(trim($_POST['unit_of_measurement']));
		$volume=htmlspecialchars(trim($_POST['volume'])); 
		$commodity_group=htmlspecialchars(trim($_POST['commodity_group'])); 
		$product_type=htmlspecialchars(trim($_POST['product_type']));
		$picture=htmlspecialchars(trim($_POST['picture'])); 
		$dobavitPrice=htmlspecialchars(trim($_POST['dobavitPrice']));  

		if($dobavitNameTovar=="" || $dobavitManufacturer=="" || $unit_of_measurement=="" || $volume=="" || $commodity_group=="" || $product_type=="" || $picture=="" || $dobavitPrice==""){
			?>
			 <!-- <br/><br/><br/><br/><br/><center><a href="index.php"> Вернутся на страницу</a><br/><br/> -->
				 <?php
				echo "Заполните все поля!";
				?>
				</center>
				<?php
		}
		else{
			$z = $mysqli -> query ("INSERT INTO `product` ( `name`, `manufacturer`, `unit_of_measurement`, `volume`, `commodity_group`, `product_type`, `picture`, `price`, `description`, `alcohol`) VALUES('$dobavitNameTovar','$dobavitManufacturer','$unit_of_measurement','$volume','$commodity_group','$product_type','$picture','$dobavitPrice', '', 'false') ");  
			if($z)
			{
				$_SESSION['vhod'] = 1;
				header ("Location: http://grocery-store/admin.php");
				exit();
			}
			else
			{
				?>
				 <!-- <br/><br/><br/><br/><br/><center><a href="index.php"> Вернутся к регистрации</a><br/><br/> -->
				 <?php
				echo "Упс... Что то пошло не так!"; 
				?>
				</center>
				<?php
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
        <meta name="robots" content="noindex, nofollow"/>        
        
        <title>«Grocery store»</title>
        <meta name="description" content="Grocery-store"/>        
        <meta name="keywords" content="" />  

        <!-- <script src="js/script.js"></script> -->

        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        
    </head>
    
    <body>
    <div class="section section201">
        <div class="section_inner">
            <div class="title_name">Мир-Тир</div>
            <div class="slogon">Добро пожаловать в Мир Товаров и Радости</div>
            <a class="entry" href="../exit.php">Выход</a>         
            <div class="clear"></div>
        </div>
    </div>
    <div class="bd">
    	<p>Выгрузить БД</p></br>
	    <form action="../export.php" method="get" class="formDobavit" >
			<input type="submit" name="button_zacazat" value="Выгрузить" />
		</form>
	</div>
	<div class="tovar">
		<div class="stroka_tovar">
					<div class="id">№</div>
					<div class="name_tovar">Заказанные товары</div>
					<div class="proizvoditel">Цена</div>
					<div class="date_zacypki">Имя клиента</div>
					<div class="date_polychenia">Адрес доставки</div>
					<div class="date_proizvodstva">Сумма заказа</div>
					<div class="srok_hranenia">Дата</div>
					<div class="ostatok">Время</div>
					<div class="price">Количество товаров</div>
		</div>
		<?php 

		$string = $mysqli -> query("SELECT * FROM `orders`");
		
		while ( ($row = $string -> fetch_assoc ()) != false) {			
		// for ($i=0; $i < $num; $i++) { 
			// $row = $row -> fetch_assoc ([$i]);
			// $string = $mysqli -> query("SELECT * FROM `product`  WHERE `id` = $i");
			// $row = $string -> fetch_assoc ();
				$id = ($row['order_id']); 
				$name = ($row['ordered_goods']);
				$Manufacturer = ($row['price']);
				$Date_of_purchase = ($row['customer_name']);
				$Date_of_receipt = ($row['delivery_address']);
				$Date_of_manufacture = ($row['order_price']);
				$Shelf_life = ($row['date']);
				$Leftovers= ($row['time']);
				$Price = ($row['number_of_goods']);

			echo '<div class="stroka_tovar">';
				echo '<div class="id">', $id  ,"</div>";
				echo '<div class="name_tovar">', $name  ,"</div>";
				echo '<div class="proizvoditel">', $Manufacturer  ,"</div>";
				echo '<div class="date_zacypki">', $Date_of_purchase  ,"</div>";
				echo '<div class="date_polychenia">', $Date_of_receipt ,"</div>";
				echo '<div class="date_proizvodstva">',$Date_of_manufacture,"</div>";
				echo '<div class="srok_hranenia">', $Shelf_life  ,"</div>";
				echo '<div class="ostatok">', $Leftovers  ,"</div>";
				echo '<div class="price">', $Price  ,"</div>";
			echo "</div>";
		// }
		}
		?>
		<details class="dobavit_tovar">
        	<summary>
			Добавить товар
	        </summary>
	            <div class="blockDobavit">
		            <form action="" method="post" class="formDobavit" onsubmit="formDobavit(this);">
		                <p>Название товара</p><input type="text" id="dobavitNameTovar" name="dobavitNameTovar" />
						<br/>

		                <p>Производитель</p><input type="text" id="dobavitManufacturer" name="dobavitManufacturer" />
						
						<br/>
		                <p>Единици измерения</p><input type="text" id="unit_of_measurement" name="unit_of_measurement" />

						<br/>
		                <p>Объем</p><input type="text" id="volume" name="volume" />

						<br/>
		                <p>Товарная группа</p><input type="text" id="commodity_group" name="commodity_group" />

						<br/>
		                <p>Тип товара</p><input type="text" id="product_type" name="product_type" />

						<br/>
		                <p>Картинка</p><input type="text" id="picture" name="picture" />

						<br/>
		                <p>Цена</p><input type="text" id="dobavitPrice" name="dobavitPrice" />

						<br/>
		                <input type="submit" name="dobavitSubmit" value="Добавить" />

		            </form>	            
		        </div>
        </details>
    </body>
</html>