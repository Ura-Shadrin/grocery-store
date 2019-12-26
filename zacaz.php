<?php
$mysqli = new mysqli ("localhost", "root", "", "grocery-store"); 
$mysqli -> query ("SET NAMES 'utf8'");


    session_start();
    if($_SESSION['vhod'] != 1){
    	?>
		 <br/><br/><br/><br/><br/><center><a href="index.php">Вернутся на главную.</a><br/><br/>
		 <?php
		exit("Для того чтобы совершать покупки необходимо авторизоваться"); 
		?>
		</center>
		<?php
    }

    $post_office =  $_SESSION['post_office'];
    $zapros_polizovat= $mysqli -> query ("SELECT * FROM `customers` WHERE `post_office`='$post_office' ");  
    $polzovatel = $zapros_polizovat -> fetch_assoc ();
    $name_polizov =  ($polzovatel['name']);
    $address = $polzovatel['address'];
    $id_polizov = $polzovatel['client_id'];
    $_SESSION['client_id'] = $id_polizov;

    if(isset($_GET['checkbox'])) {
    	$a = $_GET['checkbox'];
    	// echo "string";
    	// $colChec = count($_GET['checkbox'],COUNT_RECURSIVE) ;
    	$arrayChec = $_GET['checkbox'];
    	$colChec = count($arrayChec);	
    	$_SESSION['colTov'] = $colChec;
    	$mas = array();
    	$sum = 0;
    	for ($i=0; $i < $colChec; $i++) { 
    		$zapros_tovara = $mysqli -> query ("SELECT * FROM `product` WHERE `id`='$a[$i]' ");
			$tovar = $zapros_tovara -> fetch_assoc ();
			$price = $tovar['price'];
    		$sum += $price;
    		$mas[] = $a[$i];
    		// $_SESSION[$i] =  $a[$i];
    		$_SESSION['sum'] =  $sum;
    	}
    	$_SESSION['ar'] =  $mas;
    	// echo '++++++++',$_SESSION['0'],'++++++';
    	// $_SESSION['1'] = 'dddddd';
    	// echo $_SESSION['1'];
    	// echo $mas[1];
    	// echo $a;
    	// echo $colChec;  Количество элементов массива
    }else{
    	?>
		 <br/><br/><br/><br/><br/><center><a href="index.php">Вернутся на главную.</a><br/><br/>
		 <?php
		exit("Вы не выбрали товар"); 
		?>
		</center>
		<?php
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

        <script src="js/script.js"></script>

        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        
    </head>
    
    <body>
    	<div class="section section201">
            <div class="section_inner">
                <div class="title_name">Мир-Тир</div>
                <div class="slogon">Добро пожаловать в Мир Товаров и Радости</div>
                <a class="na_glavnyu" href="../index.php">На главную</a>
                <div class="clear"></div>
            </div>
        </div>
        <div class="section section101">
            <div class="section_inner">
            	<div class="sum_pocup">
            		Сумма покупки:
            		<?php
            		echo $sum;
            		?>
            	</div>
				<div class="vash_address">
                    Место доставки: 
                    <?php
                    echo " ", $address;
                    ?>
                </div>
 				<a class="no" href="#" id="switch">
 					Другой адрес
 				</a>
 				<div class="skritBlock" id="skritBlock">
	 				<div>
		 				<p class="lebal_address">  Куда доставить:  </p>
		 				<form action="../pokypka.php" method="get" class="formDobavit" >
						<input type="text" name="address" placeholder=" Адрес..." id="address" class="input_address" /> 
					</div>
				</div>
				 <div class="kypit">
					<input type="submit" name="button_zacazat" value="Заказать" />
				</div>
       		</div>
        </div>
		<div align="center">
			Ваш заказ:
			<?php
				echo ' ', $name_polizov;
			?>
		</div>
		<div class="section section301">
            <div class="cotalog">
			<?php
			for ($i=0; $i < $colChec; $i++) {
				$id_tovara	= $arrayChec[$i];
				$string = $mysqli -> query("SELECT * FROM `product` WHERE `id`= $id_tovara");
				while ( ($row = $string -> fetch_assoc ()) != false) { 

					$id = ($row['id']); 
	                $name = ($row['name']);
	                $manufacturer = ($row['manufacturer']);
	                $unit_of_measurement = ($row['unit_of_measurement']);
	                $volume = ($row['volume']);
	                $commodity_group = ($row['commodity_group']);
	                $product_type = ($row['product_type']);
	                $description= ($row['description']);
	                $picture = ($row['picture']);
	                $alcohol = ($row['alcohol']);
	                $price = ($row['price']);

					echo '<div class="bloc_tovar">';
		            echo '<p class="name_tovar">',$name,'</p>';
		            echo '<img src="',$picture,'" class="picture_tovar">';
		            echo '<p class="proizvoditel_tovar">Производитель: ',$manufacturer,'</p>';
		            echo '<p class="volume_tovar">',$volume,'</p>';
		            echo '<p class="edin_izmer_tovar">',$unit_of_measurement,'</p>';
		            // echo '<div class="clear"></div>';
		            echo '<p class="prise_tovar">',$price,' рублей</p>';
		            echo'</div>';
		        }
            }
            ?>
            </div>
        </div>
    </body>

</html>