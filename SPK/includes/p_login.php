
 		
		<?php echo $str->pesan;?>
		
        <div style="font-family:Arial;font-size:12px;padding:3px ">
		<?php
		if(!empty($_SESSION['LOGIN_username'])){
		?>
		<div style="font-size:18px;padding:10px 0 10px 0 ">LOGIN ADMIN</div>
		Anda dalam status login.
		<?php
		}else{
		?>
		<div style="font-size:18px;padding:10px 0 10px 0 ">LOGIN ADMIN</div>
		<form action="login.php" name="form_login" method="post">
		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <tr>
			<td width="120">Username </td>
			<td><input name="txt_username" type="text" size="40" value="admin"></td>
		  </tr>
		  <tr>
			<td>Password</td>
			<td><input name="txt_password" type="password" size="40" value="admin"></td>
		  </tr>
		  <tr>
			<td></td>
			<td><input name="cmd_login" type="submit" value="Login"> </td>
		  </tr>
		</table>
		</form>
		
		<?php } ?>

    	</div>
