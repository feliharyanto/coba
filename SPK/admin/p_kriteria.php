<?php

if(empty($_SESSION['LOGIN_username'])){
	exit("<script>location.href='./';</script>");
}
$nav_link='hal=data_kriteria';
$edit_link='hal=update_kriteria';

$q=mysql_query("select * from kriteria");
if(mysql_num_rows($q) > 0){
	while($h=mysql_fetch_array($q)){
		$no++;
		$daftar.='
		  <tr>
			<td valign="top">'.$no.'</td>
			<td valign="top">'.$h['nama'].'</td>
			<td valign="top" align="center">'.$h['atribut'].'</td>
			<td align="center" valign="top"><a href="#" onclick="DeleteConfirm(\'?'.$edit_link.'&id='.$h['id_kriteria'].'&action=delete\');return(false);"><img src="images/delete.png"></a> <a href="?'.$edit_link.'&amp;id='.$h['id_kriteria'].'&amp;action=edit"><img src="images/edit.png"></a></td>
		  </tr>
		';
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
		<div style="font-size:18px;padding:10px 0 10px 0 ">DATA KRITERIA</div>
		<div align="right"><a href="?hal=update_kriteria&amp;action=new">Tambah Data</a></div><br>
		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <tr>
			<td align="center" width="40">No</td>
			<td align="center">Nama Kriteria</td>
			<td align="center" width="120">Atribut</td>
			<td align="center" width="40">Action</td>
		  </tr>
		  <?php echo $daftar;?>
		</table>

		
    	</div>
