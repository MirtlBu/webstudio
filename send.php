<?	
	$admintopmail="iralsob@gmail.com"; 
	$date=date("d.m.y");  
	$time=date("H:i");
	$a = array();
	 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name=$_POST['name'];  
		$email=$_POST['email'];  
		$phone=$_POST['phone'];
		$text=$_POST['text'];
	
		if (!preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is", 
		strtolower($email))) { 
			$a['success'] = false;
			header('Location: index.html');
			echo json_encode($a);
		} else {  
			$msg="Новая заявка
			Имя: $name 
			E-mail: $email 
			Телефон: $phone
			Сообщение: $text"; 
			
			mail("$admintopmail", "$date $time Сообщение 
			от $name", "$msg","Content-type: text/plain; charset=utf-8");
			
			$a['success'] = true;
			header('Location: index.html');
			echo json_encode($a);
		}
	} 
?>