<?
	$admintopmail="team@epicsell.ru"; 
	$date=date("d.m.y");  
	$time=date("H:i");
	$a = false;

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$name=htmlspecialchars(trim($_POST['name']));  
			$email=htmlspecialchars(trim($_POST['email']));  
			$phone=htmlspecialchars(trim($_POST['phone']));
			$text=htmlspecialchars($_POST['text']);

			$msg="Новая заявка
				Имя: $name 
				E-mail: $email 
				Телефон: $phone
				Сообщение: $text"; 

			if(mail("$admintopmail", "$date $time Сообщение от $name", "$msg","Content-type: text/plain; charset=utf-8")) {
				$a = true;
			} 

			header('Location: index.html');
			echo json_encode($a);
		}
	}
?>