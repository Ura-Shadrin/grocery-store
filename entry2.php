<?php
		// Регистрация
	$mysqli = new mysqli ("localhost", "root", "", "grocery-store"); 
	$mysqli -> query ("SET NAMES 'utf8'");
		
		if(isset($_POST['post_office1']) && isset($_POST['password1'])) 
		{ 
			//Записываем все в переменные 
			$post_office=htmlspecialchars(trim($_POST['post_office1'])); 
			$password=htmlspecialchars(trim($_POST['password1'])); 
			$name=htmlspecialchars(trim($_POST['name'])); 
			$phone=htmlspecialchars(trim($_POST['phone'])); 
			$address=htmlspecialchars(trim($_POST['address'])); 
			if($post_office=="" || $password=="" || $name=="" || $phone=="" || $address=="") 
			{ 
				?>
				 <br/><br/><br/><br/><br/><center><a href="entry.php"> Вернутся к регистрации</a><br/><br/>
				 <?php
				exit("Заполните все поля!");
				?>
				</center>
				<?php
			}
			$res= $mysqli -> query ("SELECT `post_office` FROM `customers` WHERE `post_office`='$post_office' ");  
			$row = $res -> fetch_assoc ();
			if(!empty($row['post_office'])) 
			{ 
				?>
				 <br/><br/><br/><br/><br/><center><a href="entry.php"> Вернутся к регистрации</a><br/><br/>
				 <?php
				exit("Такой логин уже существует!"); 
				?>
				</center>
				<?php
			}
			if(strlen($password)<7) 
			{ 	
				?>
				<br/><br/><br/><br/><br/><center><a href="entry.php"> Вернутся к регистрации</a><br/><br/>
				<?php
				exit("Длина пароля не может быть меньше 7 символов!"); 
				?>
				</center>
				<?php
			} 
			// Занести данные в базу!!!!!
			$check=$mysqli -> query ("INSERT INTO `customers` ( `post_office`, `password`, `name`, `phone`, `address`) VALUES('$post_office','$password','$name','$phone','$address') ");  
			if($check)
			{	
				session_start();
				$_SESSION['vhod'] = 1;
				$_SESSION['post_office'] = $post_office;
				header ("Location: http://grocery-store");  // перенаправление на нужную страницу
				exit();
			}
			else
			{
				?>
				 <br/><br/><br/><br/><br/><center><a href="entry.php"> Вернутся к регистрации</a><br/><br/>
				 <?php
				exit("Упс... Что то пошло не так!"); 
				?>
				</center>
				<?php
			}
		}
		else
		{
			if(isset($_POST['post_office']) && isset($_POST['password']))
			{
				$post_office=htmlspecialchars(trim($_POST['post_office'])); 
				$password=htmlspecialchars(trim($_POST['password']));
				if($post_office=="" || $password=="") 
				{ 
					?>
					 <br/><br/><br/><br/><br/><center><a href="entry.php"> Вернутся ко входу</a><br/><br/>
					 <?php
					exit("Заполните все поля!");
					?>
					</center>
					<?php
				}
				
				$res= $mysqli -> query ("SELECT `post_office` FROM `customers` WHERE `post_office`='$post_office' ");  
				$row = $res -> fetch_assoc ();
				//echo $row. "---dffsdfsf----";
				//print_r ($res);
				if(!empty($row['post_office'])) 
				{ 
					$quantity = $mysqli -> query("SELECT * FROM `customers`  WHERE `post_office` = '$post_office' ");
					$bdquantity = $quantity -> fetch_assoc ();
					$bdpassword = ($bdquantity['password']);

					if($bdpassword == $password)
					{
						if ($post_office == 'admin') {
							session_start();
							$_SESSION['vhod'] = 1;
							header ("Location: http://grocery-store/admin.php");
							exit();
						}
						session_start();
						$_SESSION['vhod'] = 1;
						$_SESSION['post_office'] = $post_office;
						header ("Location: http://grocery-store");  // перенаправление на нужную страницу
						exit();
					}
					else
					{
					?>
					 <br/><br/><br/><br/><br/><center><a href="entry.php"> Вернутся ко входу</a><br/><br/>
					 <?php
					exit("Неверный пароль!");
					?>
					</center>
					<?php
					}	
				}
				else
				{
					?>
					 <br/><br/><br/><br/><br/><center><a href="entry.php"> Вернутся ко входу</a><br/><br/>
					 <?php
					exit("Такого логина не существует!");
					?>
					</center>
					<?php	
				}
			}
		}
		
	$mysqli -> close(); 		
		
?>
