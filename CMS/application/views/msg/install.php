<!DOCTYPE HTML>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UCenter Home 程序安装</title>
<style type="text/css">
* {
	font-size: 12px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	line-height: 1.5em;
	word-break: break-all;
}

body {
	text-align: center;
	margin: 0;
	padding: 0;
	background: #F5FBFF;
}

.bodydiv {
	margin: 40px auto 0;
	width: 720px;
	text-align: left;
	border: solid #86B9D6;
	border-width: 5px 1px 1px;
	background: #FFF;
}

h1 {
	font-size: 18px;
	margin: 1px 0 0;
	line-height: 50px;
	height: 50px;
	background: #E8F7FC;
	color: #5086A5;
	padding-left: 10px;
}

#menu {
	width: 100%;
	margin: 10px auto;
	text-align: center;
}

#menu td {
	height: 30px;
	line-height: 30px;
	color: #999;
	border-bottom: 3px solid #EEE;
}

.current {
	font-weight: bold;
	color: #090 !important;
	border-bottom-color: #F90 !important;
}

.showtable {
	width: 100%;
	border: solid;
	border-color: #86B9D6 #B2C9D3 #B2C9D3;
	border-width: 3px 1px 1px;
	margin: 10px auto;
	background: #F5FCFF;
}

.showtable td {
	padding: 3px;
}

.showtable strong {
	color: #5086A5;
}

.datatable {
	width: 100%;
	margin: 10px auto 25px;
}

.datatable td {
	padding: 5px 0;
	border-bottom: 1px solid #EEE;
}

input {
	border: 1px solid #B2C9D3;
	padding: 5px;
	background: #F5FCFF;
}

.button {
	margin: 10px auto 20px;
	width: 100%;
}

.button td {
	text-align: center;
}

.button input,.button button {
	border: solid;
	border-color: #F90;
	border-width: 1px 1px 3px;
	padding: 5px 10px;
	color: #090;
	background: #FFFAF0;
	cursor: pointer;
}

#footer {
	font-size: 10px;
	line-height: 40px;
	background: #E8F7FC;
	text-align: center;
	height: 38px;
	overflow: hidden;
	color: #5086A5;
	margin-top: 20px;
}
</style>
<script type="text/javascript">
	function $(id) {
		return document.getElementById(id);
	}
	//添加Select选项
	function addoption(obj) {
		if (obj.value=='addoption') {
			var newOption=prompt('请输入:','');
			if (newOption!=null && newOption!='') {
				var newOptionTag=document.createElement('option');
				newOptionTag.text=newOption;
				newOptionTag.value=newOption;
				try {
					obj.add(newOptionTag, obj.options[0]); // doesn't work in IE
				}
				catch(ex) {
					obj.add(newOptionTag, obj.selecedIndex); // IE only
				}
				obj.value=newOption;
			} else {
				obj.value=obj.options[0].value;
			}
		}
	}
	</script>
</head>
<body id="append_parent">
	<div class="bodydiv">
		<h1>UCenter Home程序安装</h1>
		<div style="width: 90%; margin: 0 auto;">
			<table id="menu">
				<tr>
					<td class="current">1.安装开始</td>
					<td class="current">2.设置UCenter信息</td>
					<td class="current">3.设置数据库连接信息</td>
					<td class="current">4.创建数据库结构</td>
					<td class="current">5.添加默认数据</td>
					<td class="current">6.安装完成</td>
				</tr>
			</table>

			<table>
				<tr>
					<td><?php echo $message;?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><?php echo $backstr;?> <?php echo $nextstr;?></td>
				</tr>
			</table>

		</div>
		<iframe id="phpframe" name="phpframe" width="0" height="0"
			marginwidth="0" frameborder="0" src="about:blank"></iframe>
		<div id="footer">&copy; Comsenz Inc. 2001-2009 u.discuz.net</div>
	</div>
	<br>
</body>
</html>
