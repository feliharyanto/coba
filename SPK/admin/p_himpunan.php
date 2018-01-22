<?php


if(empty($_SESSION['LOGIN_username'])){
	exit("<script>location.href='./';</script>");
}
if(!empty($_POST['cmd_show'])){
	$id_kriteria=$_POST['txt_kriteria'];
}else{
	$id_kriteria=$_GET['kriteria'];
}

$nav_link='hal=data_himpunan';
$edit_link='hal=update_himpunan';

$sql=mysql_query("select * from himpunan where id_kriteria='".$id_kriteria."'");
if(mysql_num_rows($sql) > 0){
	while($h=mysql_fetch_array($sql)){
		$no++;
		$daftar.='
		  <tr>
			<td valign="top">'.$no.'</td>
			<td valign="top">'.$h['nama'].'</td>
			<td valign="top" align="center">'.$h['nilai'].'</td>
			<td align="center" valign="top"><a href="#" onclick="DeleteConfirm(\'?'.$edit_link.'&id='.$h['id_himpunan'].'&action=delete&id2='.$h['id_kriteria'].'\');return(false);"><img src="images/delete.png"></a> <a href="?'.$edit_link.'&amp;id='.$h['id_himpunan'].'&amp;action=edit"><img src="images/edit.png"></a></td>
		  </tr>
		';
	}
}
# menampilkan data kriteria yang bertipe combo
$list_kriteria='<option value="">Pilih --</option>';
$q=mysql_query("select * from kriteria");
if(mysql_num_rows($q)>0){
	while($h=mysql_fetch_array($q)){
		if($id_kriteria==$h['id_kriteria']){$s='selected';}else{$s='';}
		$list_kriteria.='<option value="'.$h['id_kriteria'].'" '.$s.'>'.$h['nama'].'</option>';
	}
}


?>
<script language="javascript">
function DeleteConfirm(url){
	if (confirm("Apakah anda yakin ingin menghapus ?")){
		window.location.href=url;
	}
}
</script>

        <div style="font-family:Arial;font-size:12px;padding:3px ">
		<div style="font-size:18px;padding:10px 0 10px 0 ">DATA HIMPUNAN</div>
		<form action="" method="post">
		<input name="cmd_show" type="hidden" value="true" />
		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <tr>
			<td width="120">Nama Kriteria</td>
			<td><select name="txt_kriteria" onchange="submit()"><?php echo $list_kriteria;?></select></td>
		  </tr>
		</table>
		</form>
		<br>
		<div align="right"><?php if($id_kriteria>0){?><a href="?hal=update_himpunan&amp;action=new&id2=<?php echo $id_kriteria;?>">Tambah Data</a><?php } ?></div><br>
		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <tr>
			<td align="center" width="40">No.</td>
			<td align="center">Nama</td>
			<td align="center" width="140">Nilai</td>
			<td align="center" width="40">Action</td>
		  </tr>
		  <?php echo $daftar;?>
		</table>


    	</div>
