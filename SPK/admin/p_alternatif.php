<?php


if(empty($_SESSION['LOGIN_username'])){
	exit("<script>location.href='./';</script>");
}

$nav_link='hal=data_alternatif';
$edit_link='hal=update_alternatif';

$q="select * from alternatif order by no_kk";
$sql=mysql_query($q);
if(mysql_num_rows($sql) > 0){
	while($h=mysql_fetch_array($sql)){
		$no++;
		$daftar.='
		  <tr>
			<td valign="top">'.$no.'</td>
			<td valign="top">'.$h['no_kk'].'</td>
			<td valign="top">'.$h['nama'].'</td>
			<td valign="top">'.$h['rt'].'</td>
			<td valign="top">'.$h['rw'].'</td>
			<td align="center" valign="top"><a href="#" onclick="DeleteConfirm(\'?'.$edit_link.'&id='.$h['id_alternatif'].'&action=delete\');return(false);"><img src="images/delete.png"></a> <a href="?'.$edit_link.'&amp;id='.$h['id_alternatif'].'&amp;action=edit"><img src="images/edit.png"></a></td>
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
		<div style="font-size:18px;padding:10px 0 10px 0 ">DATA WARGA</div>
		<div align="right"><a href="?hal=update_alternatif&amp;action=new">Tambah Data</a></div><br>
		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <tr>
			<td align="center" width="20">No</td>
			<td align="center" width="80"><div align="left">Nomor kk </div></td>
			<td align="center" width="140"><div align="left">Nama kk</div></td>
			<td align="center" width="40"><div align="left">RT</div></td>
			<td align="center" width="40"><div align="left">RW</div></td>
			<td align="center" width="40">Action</td>
		  </tr>
		  <?php echo $daftar;?>
		</table>

		

    	</div>
