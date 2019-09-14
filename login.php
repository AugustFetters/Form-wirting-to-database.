<?php
	
	header("Content-Type: text/html;charset=utf-8"); 
	header("Cache-Control:private"); 
	session_start(); 
	function set_token() { 
 		$_SESSION['token'] = md5(microtime(true)); 
	} 
	function valid_token() { 
 		$return = $_REQUEST['token'] === $_SESSION['token'] ? true : false; 
 		set_token(); 
 		return $return; 
	}  
//如果token为空则生成一个token 
	if(!isset($_SESSION['token']) || $_SESSION['token']=='') { 
 		set_token(); 
	} 
	if(isset($_POST['name'])){ 
 		if(!valid_token()){ 
 			echo "token error，请不要重复提交！"; 
		}
		else
		{
			$name = $_POST["name"];
			$xingbie = $_POST["xingbie"];
			$minzu = $_POST["minzu"];
			$dizhi = $_POST["dizhi"];
			$shenfemnumber = $_POST["shenfemnumber"];
			$zhusu = $_POST["zhusu"];
			$zhongkao = $_POST["zhongkao"];
			$yuanxiao = $_POST["yuanxiao"];
			$huji = $_POST["huji"];
			$zhuanye = $_POST["zhuanye"];
			$fuqinxingming = $_POST["fuqinxingming"];
			$fuqinshengri = $_POST["fuqinshengri"];
			$muqinxingming = $_POST["muqinxingming"];
			$muqinshengri = $_POST["muqinshengri"];
			$xueshengshouji = $_POST["xueshengshouji"];
			$fuqinshouji = $_POST["fuqinshouji"];
			$muqinshouji = $_POST["muqinshouji"];
			$servername = "127.0.0.1";
			$username = "root";
			$password = "123456";

			// 创建连接 
			$conn = mysqli_connect($servername, $username, $password);
			mysqli_select_db($conn,"august_in");

			// 检测连接 
			if (!$conn)
			{
			    die("Connection failed: " . mysqli_connect_error());
			}

			mysqli_set_charset($conn,'utf8');
			$query = "select shenfemnumber from server_one where shenfemnumber = '$shenfemnumber'";
			
			// var_dump($query);
			$rs = mysqli_query($conn,$query);
			// var_dump(mysqli_num_rows($rs));
			// var_dump($rs);
			if(mysqli_num_rows($rs) > 0)
			{
				echo "该生已存在";
			}else{
				echo "可以写入";
				$sql = "INSERT into august_in.server_one(name,xingbie,minzu,dizhi,zhusu,zhongkao,yuanxiao,huji,zhuanye,fuqinxingming,fuqinshengri,muqinxingming,muqinshengri,xueshengshouji,fuqinshouji,muqinshouji,shenfemnumber) select '$name','$xingbie','$minzu','$dizhi','$zhusu','$zhongkao','$yuanxiao','$huji','$zhuanye','$fuqinxingming','$fuqinshengri','$muqinxingming','$muqinshengri','$xueshengshouji','$fuqinshouji','$muqinshouji','$shenfemnumber'";
			}
			if($conn -> query($sql) == TRUE)
			{
				
					echo "OK!";
			}
			else
			{
			        echo "Error".$sql."<br>".$conn->error;
			}
			mysqli_close($conn);
		}
	}

?>
