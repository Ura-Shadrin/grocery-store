<?php
    $mysqli = new mysqli ("localhost", "root", "", "grocery-store"); 
    $mysqli -> query ("SET NAMES 'utf8'");

    $chislo = $mysqli -> query ("SELECT COUNT(`id`) FROM `product`");
    $row = $chislo -> fetch_assoc ();
    $num = ($row['COUNT(`id`)']);

    session_start();
    if ($_SESSION['vhod'] == 1) {
        $post_office =  $_SESSION['post_office'];
        $_SESSION['vhod'] = 1;
        $_SESSION['post_office'] = $post_office;

        $zapros_polizovat= $mysqli -> query ("SELECT * FROM `customers` WHERE `post_office`='$post_office' ");  
        $polzovatel = $zapros_polizovat -> fetch_assoc ();
        $name_polizov =  ($polzovatel['name']);

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
                <?php
                if ($name_polizov != "") {
                    echo '<a class="entry" href="../exit.php">Выход</a>';
                    echo '<p class="name_entry">',$name_polizov,'</p>';
                }
                else{
                    echo '<a class="entry" href="../entry.php">Вход</a>';
                }
                ?>               
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div> 
        <div class="section section101">
            <div class="section_inner">
                <div class="kak_kypit">
                    Для покупки отметь товар, выбери количество и нажми кнопку купить.
                </div>
                <div class="kypit">
                    <form action="../<?php if($_GET['vhod'] == 1){echo'zacaz.php';}else{echo 'zacaz.php';}?>" method="get" class="formDobavit" >
                            <input type="submit" name="button_zacazat" value="Заказать" />
                    
                </div>
            </div>
        </div>
        <div class="section section301">
            <div class="cotalog">
                <?php 
                $string = $mysqli -> query("SELECT * FROM `product`");
                
                while ( ($row = $string -> fetch_assoc ()) != false) { 
                    // echo "string";
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
                    echo '<input type="checkbox" value="',$id,'" class="checkbox" name="checkbox[]"/>';
                    echo'</div>';
                    
                }
                ?>
                </form>
            </div>
        </div>
    </body>

</html>