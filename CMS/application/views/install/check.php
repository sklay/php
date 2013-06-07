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
					<td>2.设置UCenter信息</td>
					<td>3.设置数据库连接信息</td>
					<td>4.创建数据库结构</td>
					<td>5.添加默认数据</td>
					<td>6.安装完成</td>
				</tr>
			</table>
			<script type="text/javascript">
	function readme() {
		var tbl_readme = document.getElementById('tbl_readme');
		if(tbl_readme.style.display == '') {
			tbl_readme.style.display = 'none';
		} else {
			tbl_readme.style.display = '';
		}
	}
	</script>
			<table class="showtable">
				<tr>
					<td><strong>欢迎您使用UCenter Home</strong><br> 通过 UCenter
						Home，作为建站者的您，可以轻松构建一个以好友关系为核心的交流网络，让站点用户可以用一句话记录生活中的点点滴滴；方便快捷地发布日志、上传图片；更可以十分方便的与其好友们一起分享信息、讨论感兴趣的话题；轻松快捷的了解好友最新动态。
						<br> <a href="javascript:;" onclick="readme()"><strong>请先认真阅读我们的软件使用授权协议</strong>
					</a>
					</td>
				</tr>
			</table>

			<table>
				<tr>
					<td><strong>文件/目录权限设置</strong><br>
						在您执行安装文件进行安装之前，先要设置相关的目录属性，以便数据文件可以被程序正确读/写/删/创建子目录。<br> 推荐您这样做：<br>使用
						FTP
						软件登录您的服务器，将服务器上以下目录、以及该目录下面的所有文件的属性设置为777，win主机请设置internet来宾帐户可读写属性<br>
						<table class="datatable">
							<tr style="font-weight: bold;">
								<td>名称</td>
								<td>所需权限属性</td>
								<td>说明</td>
								<td>检测结果</td>
							</tr>
							<tr>
								<td><strong>./config/database.php</strong></td>
								<td>读/写</td>
								<td>系统配置文件</td>
								<td>OK</td>
							</tr>
							<tr>
								<td><strong>./install/data</strong> (包括本目录、子目录和文件)</td>
								<td>读/写/删</td>
								<td>附件目录</td>
								<td>OK</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr>
					<td><input type="hidden" name="uc[key]"
						value="F35037I4rekcZdtck3D8u8A6w6ldEbW0q9TfX4kd95cbS3284eJ254K5M01470r8" /><input
						type="hidden" name="uc[appid]" value="2" /><input type="hidden"
						name="uc[dbhost]" value="localhost" /><input type="hidden"
						name="uc[dbname]" value="ucenter" /><input type="hidden"
						name="uc[dbuser]" value="root" /><input type="hidden"
						name="uc[dbpw]" value="root" /><input type="hidden"
						name="uc[dbcharset]" value="utf8" /><input type="hidden"
						name="uc[dbtablepre]" value="`ucenter`.uc_" /><input type="hidden"
						name="uc[charset]" value="utf-8" /><input type="hidden"
						name="uc[connect]" value="mysql" /><input type="hidden"
						name="uc[api]" value="http://ucenter.jiaoyu365.net" /><input
						type="hidden" name="uc[ip]" value="127.0.0.1" /> <input
						type="submit" id="uc2submit" name="uc2submit" value="进入下一步"></td>
				</tr>

			</table>
			<form id="theform" method="post" action="index.php?step=1">
				<table class=button>
					<tr>
						<td><input type="submit" id="startsubmit" name="startsubmit"
							value="接受授权协议，开始安装UCenter Home"></td>
					</tr>
				</table>
				<input type="hidden" name="ucapi" value="/" /> <input type="hidden"
					name="ucfounderpw" value="" /> <input type="hidden" name="formhash"
					value="78489296">
			</form>


			<form id="theform" method="post" action="index.php">

				<table class="showtable">
					<tr>
						<td><strong># 设置UCenter Home数据库信息</strong></td>
					</tr>
					<tr>
						<td id="msg1">这里设置UCenter Home的数据库信息</td>
					</tr>
				</table>
				<table class=datatable>
					<tr>
						<td width="25%">数据库服务器本地地址:</td>
						<td><input type="text" name="db[dbhost]" size="20"
							value="localhost"></td>
						<td width="30%">一般为localhost</td>
					</tr>
					<tr>
						<td>数据库用户名:</td>
						<td><input type="text" name="db[dbuser]" size="20" value=""></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>数据库密码:</td>
						<td><input type="password" name="db[dbpw]" size="20" value=""></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>数据库字符集:</td>
						<td><select name="db[dbcharset]" onchange="addoption(this)">
								<option value="utf8">utf8</option>
								<option value="addoption" class="addoption">+自定义</option>
						</select>
						</td>
						<td>MySQL版本>4.1有效</td>
					</tr>
					<tr>
						<td>数据库名:</td>
						<td><input type="text" name="db[dbname]" size="20" value=""></td>
						<td>如果不存在，则会尝试自动创建</td>
					</tr>
					<tr>
						<td>表名前缀:</td>
						<td><input type="text" name="db[tablepre]" size="20"
							value="uchome_"></td>
						<td>不能为空，默认为uchome_</td>
					</tr>
				</table>

				<table class=button>
					<tr>
						<td><input type="submit" id="sqlsubmit" name="sqlsubmit"
							value="设置完毕,检测我的数据库配置"></td>
					</tr>
				</table>
				<input type="hidden" name="formhash" value="78489296">
			</form>
		</div>
		<iframe id="phpframe" name="phpframe" width="0" height="0"
			marginwidth="0" frameborder="0" src="about:blank"></iframe>
		<div id="footer">&copy; Comsenz Inc. 2001-2009 u.discuz.net</div>
	</div>
	<br>
</body>
</html>
