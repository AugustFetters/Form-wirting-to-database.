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
			$zhuanye = $_POST["zhuanye"];
			$fuqinxingming = $_POST["fuqinxingming"];
			$fuqinshengri = $_POST["fuqinshengri"];
			$muqinxingming = $_POST["muqinxingming"];
			$muqinshengri = $_POST["muqinshengri"];
			$xueshengshouji = $_POST["xueshengshouji"];
			$fuqinshouji = $_POST["fuqinshouji"];
			$muqinshouji = $_POST["muqinshouji"];

			$servername = "qdm17238596.my3w.com";
			$username = "qdm17238596";
			$password = "Wdsrs20010418@";

			// 创建连接 
			$conn = mysqli_connect($servername, $username, $password);

			// 检测连接 
			if (!$conn)
			{
			    die("Connection failed: " . mysqli_connect_error());
			}
			mysqli_set_charset($conn,'utf8');

			$sql = "INSERT into qdm17238596_db.server_one(name,xingbie,minzu,dizhi,zhusu,zhongkao,yuanxiao,zhuanye,fuqinxingming,fuqinshengri,muqinxingming,muqinshengri,xueshengshouji,fuqinshouji,muqinshouji,shenfemnumber) select '$name','$xingbie','$minzu','$dizhi','$zhusu','$zhongkao','$yuanxiao','$zhuanye','$fuqinxingming','$fuqinshengri','$muqinxingming','$muqinshengri','$xueshengshouji','$fuqinshouji','$muqinshouji','$shenfemnumber' from dual where not exists(select * from qdm17238596_db.server_one where shenfemnumber=$shenfemnumber)";
			$query = "select * from qdm17238596_db.server_one where shenfemnumber = $shenfemnumber";
			$rs = mysqli_query($conn,$query);
			if($conn -> query($sql) ===TRUE)
			{
				if(count($rs))
				{
					echo "已存在，不能插入";
				}
				else
				{
					echo "插入成功";
				}
					
			}
			else
			{
			        echo "Error".$sql."<br>".$conn->error;
			}
			mysqli_close($conn);

			
		}
	}else
		// html表单↓
	{?>
	
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
			<title>新生报名信息录入系统</title>
			<style type="text/css">
				body{
					width: 100%;
				}
				.servername{
					font-family: "微软雅黑";
					text-align: center;
					color: #6b7692;
					font-size: 175%;
				}
				.table{
					width: 100%;
				}
				.table_tdone{
					text-align: right;
					width: 27%;
				}
				.table_tdone p{
					width: 100%;
					font-size: 15px;
				}
				.table_tdtwo{
					text-align: left;
					width: 73%;
				}
				.table_tdtwo input,select{
					width:80%;
					height:30px;
					font-size: 15px;
				}
				.table_tdtwo_BIG textarea{
					width:80%;
					height:60px;
					font-size: 15px;
				}
				.table_tdthree input{
					width: 100px;
					height: 30px;
				}
			</style>
		</head>
		<body>

			<div class="zhengti">
				<!--标题-->
				<div class="servername">南靖第一职业技术学校<br/>新生入学信息录入系统</div>
				<!--表单-->
				<div>
					<form action="" method="post">
						<input type="hidden" name="token" value="<?php echo $_SESSION['token']?>"> 
						<table class="table">
							<!--姓名-->
							<tr>
								<td class="table_tdone"><p>姓名：</p></td>
								<td class="table_tdtwo"><input type="text" placeholder="请输入学生姓名" name="name"></td>
							</tr>

							<!--性别-->
							<tr>
								<td class="table_tdone"><p>性别：</p></td>
								<td class="table_tdtwo">
									<select name="xingbie">
										<option>--请选择--</option>
										<option value="男">男</option>
										<option value="女">女</option>
									</select>
								</td>
							</tr>

							<!--民族-->
							<tr>
								<td class="table_tdone"><p>民族：</p></td>
								<td class="table_tdtwo"><input type="text" placeholder="请输入民族(如汉族,输入“汉族”)" name="minzu"></td>
							</tr>

							<!--家庭住址-->
							<tr>
								<td class="table_tdone"><p>家庭住址：</p></td>
								<td class="table_tdtwo_BIG" ><textarea placeholder="请输入家庭住址" name="dizhi"></textarea></td>
							</tr>

							<!--身份证号-->
							<tr>
								<td class="table_tdone"><p>身份证号：</p></td>
								<td class="table_tdtwo"><input type="text" placeholder="请输入学生身份证号" name="shenfemnumber"></td>
							</tr>

							<!--是否寄宿-->
							<tr>
								<td class="table_tdone"><p>是否寄宿：</p></td>
								<td class="table_tdtwo">
									<select name="zhusu">
										<option >--请选择--</option>
										<option value="是">是</option>
										<option value="否">否</option>
									</select>
								</td>
							</tr>

							<!--中考分数-->
							<tr>
								<td class="table_tdone"><p>中考分数：</p></td>
								<td class="table_tdtwo"><input type="text" placeholder="请输入学生中考分数" name="zhongkao"></td>
							</tr>

							<!--原毕业学校-->
							<tr>
								<td class="table_tdone"><p>原毕业校：</p></td>
								<td class="table_tdtwo"><input type="text" placeholder="请输入学生原毕业学校" name="yuanxiao"></td>
							</tr>

							<!--专业-->
							<tr>
								<td class="table_tdone"><p>专业：</p></td>
								<td class="table_tdtwo"><input type="text" placeholder="请输入就读专业" name="zhuanye"></td>
							</tr>

							<!--父亲姓名-->
							<tr>
								<td class="table_tdone"><p>父亲姓名：</p></td>
								<td class="table_tdtwo"><input type="text" placeholder="请输入学生父亲的姓名" name="fuqinxingming"></td>
							</tr>

							<!--父亲生日-->
							<tr>
								<td class="table_tdone"><p>父亲生日：</p></td>
								<td class="table_tdtwo"><input type="text" placeholder="例:1981年8月10日填19810810" name="fuqinshengri"></td>
							</tr>

							<!--母亲姓名-->
							<tr>
								<td class="table_tdone"><p>母亲姓名：</p></td>
								<td class="table_tdtwo"><input type="text" placeholder="请输入学生母亲的姓名" name="muqinxingming"></td>
							</tr>

							<!--母亲生日-->
							<tr>
								<td class="table_tdone"><p>母亲生日：</p></td>
								<td class="table_tdtwo"><input type="text" placeholder="例:1981年8月10日填19810810" name="muqinshengri"></td>
							</tr>

							<!--手机号-->
							<tr>
								<!-- 学生 -->
								<td class="table_tdone"><p>学生手机：</p></td>
								<td class="table_tdtwo"><input type="text" placeholder="请输入学生手机号码" name="xueshengshouji"></td>
							</tr>
							<tr>
								<!-- 父亲 -->
								<td class="table_tdone"><p>父亲手机：</p></td>
								<td class="table_tdtwo"><input type="text" placeholder="请输入父亲手机号码" name="fuqinshouji"></td>
							</tr>
							<tr>
								<!-- 母亲 -->
								<td class="table_tdone"><p>母亲手机：</p></td>
								<td class="table_tdtwo"><input type="text" placeholder="请输入母亲手机号码" name="muqinshouji"></td>
							</tr>
							<!-- 距离加宽 -->
							</tr>
							<tr>
								<td><br/></td>
								<td><br/></td>
							</tr>
							<tr>
								<!-- 按钮 -->
								<td class="table_tdthree" colspan="2" align="center"><input type="submit" name=""></td>
							</tr>
							<!-- 距离加宽 -->
							<tr>
								<td><br/></td>
								<td><br/></td>
							</tr>
					</table>
						
						

					</form>
				</div>
				
			</div>
		</body>
		</html>

	<?php	
	}
	
	
?>
