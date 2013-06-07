<?php include 'header.php'; ?>
<table class=<?php echo $nowtable[5]?>>
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
<table class="showtable <?php echo $nowtable[0]?>">
	<tr>
		<td><strong>欢迎您使用UCenter Home</strong><br> 通过 UCenter
			Home，作为建站者的您，可以轻松构建一个以好友关系为核心的交流网络，让站点用户可以用一句话记录生活中的点点滴滴；方便快捷地发布日志、上传图片；更可以十分方便的与其好友们一起分享信息、讨论感兴趣的话题；轻松快捷的了解好友最新动态。
			<br> <a href="javascript:;" onclick="readme()"><strong>请先认真阅读我们的软件使用授权协议</strong>
		</a>
		</td>
	</tr>
</table>
<form id="theform" method="post"
	action="<?php echo  site_url('setup').'/'.$step?>"
	class="<?php echo $nowtable[0]?>">
	<table class="<?php echo $nowtable[0]?>">
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
			<td><input type="submit" id="uc2submit" name="uc2submit"
				value="进入下一步">
			</td>
		</tr>

	</table>
</form>

<form id="theform" method="post" action="<?php echo  site_url('setup').'/'.$step?>"
	class="<?php echo $nowtable[2]?>">

	<table class="showtable ">
		<tr>
			<td><strong># 设置UCenter Home数据库信息</strong></td>
		</tr>
		<tr>
			<td id="msg1">这里设置UCenter Home的数据库信息</td>
		</tr>
	</table>
	<table class="datatable ">
		<tr>
			<td width="25%">数据库服务器本地地址:</td>
			<td><input type="text" name="db[dbhost]" size="20" value="localhost">
			</td>
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
			<td><input type="text" name="db[tablepre]" size="20" value="uchome_">
			</td>
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



<?php include 'footer.php'; ?>