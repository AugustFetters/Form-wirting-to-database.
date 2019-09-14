<?php
	session_start(); 
	// 新生入学信息录入系统
	// 开发者：陈凌煜（学生）
	// 功  能：学生信息的录入与导出
?>
<script type="text/javascript">
	// 变量列表

	// 姓名  性别     民族    家庭住址  身份证号       是否寄宿
    // name  xingbie  minzu  dizhi    shenfemnumber  zhusu

    // 中考分数   原毕业校    户籍性质    专业       父亲姓名        父亲生日
    // zhongkao  yuanxiao    huji       zhuanye   fuqinxingming  fuqinshengri

    // 母亲姓名         母亲生日       学生手机         父亲手机      母亲手机
    // muqinxingming   muqinshengri   xueshengshouji  fuqinshouji  muqinshouji
    
	function beforeSubmit(form)
	{
		if(form.name.value=="")
		{
			alert('学生姓名不能为空！');
			form.name.focus();
			return false;
		}
		if(form.xingbie.value=="1")
		{
			alert('学生性别未选择！');
			form.xingbie.focus();
			return false;
		}
		if(form.minzu.value=="")
		{
			alert('请填写民族！');
			form.minzu.focus();
			return false;
		}
		if(form.dizhi.value=="")
		{
			alert('请填写家庭地址！');
			form.dizhi.focus();
			return false;
		}
		if(form.shenfemnumber.value=="")
		{
			alert('请填写身份证号');
			form.shenfemnumber.focus();
			return false;
		}
		if(form.zhusu.value=="1")
		{
			alert('请选择是否住宿！');
			form.zhusu.focus();
			return false;
		}
		if(form.zhongkao.value=="")
		{
			alert('请填写中考成绩！');
			form.zhongkao.focus();
			return false;
		}
		if(form.zhuanye.value=="1")
		{
			alert('请选择报读专业！');
			form.zhuanye.focus();
			return false;
		}
		if(form.fuqinxingming.value=="")
		{
			alert('请填写父亲姓名！');
			form.fuqinxingming.focus();
			return false;
		}
		if(form.fuqinshengri.value=="")
		{
			alert('请填写父亲生日！');
			form.fuqinshengri.focus();
			return false;
		}
		if(form.muqinxingming.value=="")
		{
			alert('请填写母亲姓名！');
			form.muqinxingming.focus();
			return false;
		}
		if(form.muqinshengri.value=="")
		{
			alert('请填写母亲生日！');
			form.muqinshengri.focus();
			return false;
		}
		if(form.xueshengshouji.value=="")
		{
			alert('请填写学生手机号码！');
			form.xueshengshouji.focus();
			return false;
		}
		if(form.fuqinshouji.value=="")
		{
			alert('请填写父亲手机号码！');
			form.fuqinshouji.focus();
			return false;
		}
		if(form.muqinshouji.value=="")
		{
			alert('请填写母亲手机号码！');
			form.muqinshouji.focus();
			return false;
		}
	}
</script>
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
			margin: 2px;
			text-align: right;
			width: 27%;
		}
		.table_tdone p{
			width: 100%;
			font-size: 15px;
		}
		.table_tdtwo{
			margin: 2px;
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
		<div class="servername">某某职业技术学校<br/>新生入学信息录入系统</div>
		<!--表单-->
			<form name="form" action="login.php" method="post" onSubmit="return beforeSubmit(this)">
				<input type="hidden" name="token" value="<?php echo $_SESSION['token']?>"> 
				<table class="table">
					<!--姓名-->
					<tr>
						<td class="table_tdone" ><p>姓名：</p></td>
						<td class="table_tdtwo"><input type="text" placeholder="请输入学生姓名" name="name"></td>
					</tr>
					<!--性别-->
					<tr>
						<td class="table_tdone"><p>性别：</p></td>
						<td class="table_tdtwo">
							<select name="xingbie">
								<option value="1">--请选择--</option>
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
								<option value="1">--请选择--</option>
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
					<!--户籍性质-->
					<tr>
						<td class="table_tdone"><p>户籍性质</p></td>
						<td class="table_tdtwo">
							<select name="huji">
								<option value="1">--请选择--</option>
								<option value="是">农业户口</option>
								<option value="否">非农业户口</option>
							</select>
						</td>
					</tr>
					<!--专业-->
					<tr>
						<td class="table_tdone"><p>专业：</p></td>
						<td class="table_tdtwo">
							<select name="zhuanye">
								<optgroup label="请选择">
									<option value="1">---请选择---</option>
								</optgroup>
								<optgroup label="机械专业群">
									<option value="机械设计与制造(五年专)">机械设计与制造(五年专)</option>
									<option value="机械加工技术">机械加工技术</option>
									<option value="机械制造技术">机械制造技术</option>
									<option value="数控应用技术">数控应用技术</option>
								</optgroup>
								<optgroup label="电子信息专业群">
									<option value="电子技术应用(五年专)">电子技术应用(五年专)</option>
									<option value="计算机应用技术(五年专)">计算机应用技术(五年专)</option>
									<option value="电子技术应用">电子技术应用</option>
									<option value="计算机网络技术">计算机网络技术</option>
									<option value="供用电技术">供用电技术</option>
								</optgroup>
								<optgroup label="旅游专业群">
									<option value="旅游服务与管理(五年专)">旅游服务与管理(五年专)</option>
									<option value="旅游服务与管理">旅游服务与管理</option>
									<option value="康养休闲旅游">康养休闲旅游</option>
								</optgroup>
								<optgroup label="医学专业群">
									<option value="护理">护理</option>
									<option value="药剂">药剂</option>
									<option value="助产">助产</option>
									<option value="康复技术">康复技术</option>
									<option value="医疗设备安装与维护">医疗设备安装与维护</option>
								</optgroup>
								<optgroup label="建筑专业群">
									<option value="市政工程技术(五年专)">市政工程技术(五年专)</option>
									<option value="建筑工程施工">建筑工程施工</option>
								</optgroup>
								<optgroup label="其他热门专业">
									<option value="乐器修造">乐器修造</option>
									<option value="学前教育(保育员)">学前教育(保育员)</option>
									<option value="会计电算化">会计电算化</option>
								</optgroup>
							</select>
						</td>
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
