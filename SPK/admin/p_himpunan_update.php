<?php
if(empty($_SESSION['LOGIN_username'])){
	exit("<script>location.href='./';</script>");
}

if(!empty($_POST['cmd_simpan'])){
	$nama=$_POST['txt_nama'];
	$nilai=$_POST['txt_nilai'];
	if(empty($_POST['txt_nama'])){
		echo "<script>window.alert('Kolom bertanda \'harus diisi\' tidak boleh kosong.');</script>";
	}else{
		if($_POST['txt_action']=='new'){
			$q="insert into himpunan(id_kriteria, nama, nilai) values('".$_POST['txt_id2']."', '".$_POST['txt_nama']."', '".$_POST['txt_nilai']."')";
			mysql_query($q);
			$id2=$_POST['txt_id2'];
		}
		if($_POST['txt_action']=='edit'){
			$q="update himpunan set nama='".$_POST['txt_nama']."',nilai='".$_POST['txt_nilai']."' where id_himpunan='".$_POST['txt_id']."'";
			mysql_query($q);
			$id2=$_POST['txt_id2'];
		}
		exit("<script>location.href='?hal=data_himpunan&kriteria=".$id2."';</script>");
	}
}
$id2=$_GET['id2'];
$q=mysql_query("select * from kriteria where id_kriteria='".$id2."'");
if(mysql_num_rows($q)>0){
	$h=mysql_fetch_array($q);
	$kriteria=$h['nama'];
}

$action=$_GET['action'];
if($_GET['action']=='edit' and !empty($_GET['id'])){
	$id=$_GET['id'];
	$q=mysql_query("select * from himpunan where id_himpunan='".$id."'");
	if(mysql_num_rows($q)>0){
		$h=mysql_fetch_array($q);
		$nama=$h['nama'];
		$nilai=$h['nilai'];
		$id2=$h['id_kriteria'];
		$q=mysql_query("select * from kriteria where id_kriteria='".$h['id_kriteria']."'");
		if(mysql_num_rows($q)>0){
			$h=mysql_fetch_array($q);
			$kriteria=$h['nama'];
		}
	}
}
if($_GET['action']=='delete' and !empty($_GET['id'])){
	$id=$_GET['id'];
	$id2=$_GET['id2'];
	mysql_query("delete from himpunan where id_himpunan='".$id."'");
	exit("<script>location.href='?hal=data_himpunan&kriteria=".$id2."';</script>");
}

?>
 
        <div style="font-family:Arial;font-size:12px;padding:3px ">
		<div style="font-size:18px;padding:10px 0 10px 0 ">UPDATE DATA PARAMETER </div>
		<form action="" name="" method="post">
		<input name="txt_action" type="hidden" value="<?php echo $action;?>">
		<input name="txt_id" type="hidden" value="<?php echo $id;?>">
		<input name="txt_id2" type="hidden" value="<?php echo $id2;?>">
		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <tr>
			<td width="120">Nama Kriteria</td>
			<td><strong><?php echo $kriteria;?></strong></td>
		  </tr>
		  <tr>
			<td>Nama Himpunan</td>
			<td><input name="txt_nama" type="text" size="40" value="<?php echo $nama;?>"> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td>Nilai</td>
			<td><input name="txt_nilai" type="text" size="10" value="<?php echo $nilai;?>"> </td>
		  </tr>
		  <tr>
			<td></td>
			<td><input name="cmd_simpan" type="submit" value="Simpan"> 
		<input name="cmd_batal" type="button" onClick="location.href='?hal=data_himpunan&kriteria=<?php echo $id2;?>';" value="Batal"></td>
		  </tr>
		</table>
		</form>


    	</div>
