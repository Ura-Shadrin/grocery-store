<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" />
	<title>Добро пожаловать</title>
</head>
<body bgcolor="EDEEF0">
	<br/><br/><br/><br/><br/><br/>
	<center>
	
	<table cellspacing="0" >
		<form name="entry" action="entry2.php" method="POST">
			<tr><font size="7" color="#0a0a0a" face="Calibri"><strong>Вход на сайт</strong></font>	<br/>
			</tr>
			<tr>
				<td bgcolor="FFFFFF" rowspan="1" >	
					<font size="5" color="#0a0a0a" face="Calibri">
					<strong>
						<label for="post_office">&nbsp  Почта: &nbsp &nbsp</label>
				</td>
				<td bgcolor="FFFFFF" rowspan="1" >
						<input type="text" name="post_office" placeholder="Почта..." id="post_office" />&nbsp
					</strong>
					</font>
				</td>
				<br/>
			</tr>
			
			<tr>
				<td bgcolor="FFFFFF" rowspan="1" >	</td>
				<td bgcolor="FFFFFF" rowspan="1" > &nbsp </td>
			</tr>
			
			<tr>
				<td bgcolor="FFFFFF" rowspan="1" >	
					<font size="5" color="#0a0a0a" face="Calibri">
					<strong>
						<label for="password">&nbsp  Пароль:  &nbsp</label>
				</td>
				<td bgcolor="FFFFFF" rowspan="1" >
						<input type="password" name="password" placeholder="Пароль..." id="password" />&nbsp
					</strong>
					</font>
				</td>
			</tr>
			
			<tr>
				<td bgcolor="FFFFFF" rowspan="1" >	</td>
				<td bgcolor="FFFFFF" rowspan="1" > &nbsp </td>
			</tr>
			
			<tr>
				<td bgcolor="FFFFFF" rowspan="1" >	
				</td>
				<td bgcolor="FFFFFF" rowspan="1" >
				&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					<input type="submit" name="entry" value="Войти" style="color:black; background-color:#FBC668" />
				</td>
			</tr>
		</form>
		
		<tr>
			<td bgcolor="FFFFFF" rowspan="1" >	</td>
			<td bgcolor="FFFFFF" rowspan="1" > &nbsp </td>
		</tr>
	</table>
	<br/> <br/>
	<table>	
		<tr >
			<td bgcolor="FFFFFF" colspan="2" align="" > 
			<font size="5" color="#0a0a0a" face="Calibri"><strong>
				<details>
				<summary>&nbsp &nbsp &nbspЗарегистрироваться&nbsp &nbsp &nbsp</summary>
				<p>
					<form action="entry2.php" method="POST"> 
						<label for="post_office1">&nbsp  Почта: &nbsp &nbsp</label> &nbsp &nbsp
						<input type="text" name="post_office1" placeholder="Почта..." id="post_office1" > 
						<br> 
						<label for="password1">&nbsp  Пароль:  &nbsp</label> &nbsp &nbsp
						<input type="password" name="password1" placeholder="Пароль..." id="password1" > 
						<br> 
						<label for="name">&nbsp  Имя:  &nbsp</label>&nbsp &nbsp &nbsp  &nbsp  &nbsp 
						<input type="text" name="name" placeholder="Имя..." id="name" > 
						<br> 
						<label for="phone">&nbsp  Телефон:  &nbsp</label>  
						<input type="text" name="phone" placeholder="Телефон..." id="phone" > 
						<br> 
						<label for="address">&nbsp  Адрес:  &nbsp</label> &nbsp &nbsp  &nbsp
						<input type="text" name="address" placeholder="Адрес..." id="address" > 
						<br> &nbsp &nbsp &nbsp  &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp 
						<input type="submit" value="Зарегистрироваться" name="submit1" style="color:black;  background-color:#FBC668"> 
					</form> 
				</p>
				</details>
			</strong></font>
			</td>
		</tr>
		
	</table>
	</center>	
</body>
</html>