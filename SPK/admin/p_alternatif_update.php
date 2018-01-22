<?php


if(empty($_SESSION['LOGIN_username'])){
	exit("<script>location.href='./';</script>");
}

if(!empty($_POST['cmd_simpan'])){
	$kk=$_POST['txt_kk'];
	$nama=$_POST['txt_nama'];
	$rt=$_POST['txt_rt'];
	$rw=$_POST['txt_rw'];

	if(empty($_POST['txt_kk']) or empty($_POST['txt_nama']) or empty($_POST['txt_rt'])or empty($_POST['txt_rw'])){
		echo "<script>window.alert('Kolom bertanda \'harus diisi\' tidak boleh kosong.');</script>";
	}else{
		if($_POST['txt_action']=='new'){
			if(mysql_num_rows(mysql_query("select * from alternatif where no_kk='".$_POST['txt_kk']."'"))>0){
				echo "<script>window.alert('Nomor KK yang anda masukan sudah terdaftar sebelumnya. Silahkan gunakan Nomor KK yang lain.');</script>";
			}else{
				$q="insert into alternatif(no_kk, nama,rt,rw) values('".$_POST['txt_kk']."','".$_POST['txt_nama']."',
				 '".$_POST['txt_rt']."','".$_POST['txt_rw']."')";
				mysql_query($q);
				exit("<script>location.href='?hal=data_alternatif';</script>");
			}
		}
		if($_POST['txt_action']=='edit'){
			$q=mysql_query("select no_kk from alternatif where id_alternatif='".$_POST['txt_id']."'");
			$h=mysql_fetch_array($q);
			$nim_tmp=$h['no_kk'];
			if(mysql_num_rows(mysql_query("select * from alternatif where no_kk='".$_POST['txt_kk']."' and no_kk<>'".$nim_tmp."'"))>0){
				echo "<script>window.alert('Nomor KK yang anda masukan sudah terdaftar sebelumnya. Silahkan gunakan Nomor KK yang lain.');</script>";
			}else{
				$q="update alternatif set no_kk='".$_POST['txt_kk']."', nama='".$_POST['txt_nama']."',rt='".$_POST['txt_rt']."',rw='".$_POST['txt_rw']."' where id_alternatif='".$_POST['txt_id']."'";
				mysql_query($q);
				exit("<script>location.href='?hal=data_alternatif';</script>");
			}
		}
		
	}
}

$action=$_GET['action'];

if($_GET['action']=='edit' and !empty($_GET['id'])){
	$id=$_GET['id'];
	$q=mysql_query("select * from alternatif where id_alternatif='".$id."'");
	if(mysql_num_rows($q)>0){
		$h=mysql_fetch_array($q);
		$kk=$h['no_kk'];
		$nama=$h['nama'];
		$rt=$h['rt'];
		$rw=$h['rw'];
	}
}

if($_GET['action']=='delete' and !empty($_GET['id'])){
	$id=$_GET['id'];
	mysql_query("delete from alternatif where id_alternatif='".$id."'");
	exit("<script>location.href='?hal=data_alternatif';</script>");
}

?>
 
        <div style="font-family:Arial;font-size:12px;padding:3px ">
		<div style="font-size:18px;padding:10px 0 10px 0 ">UPDATE DATA WARGA </div>
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
			<td width="120">No KK</td>
			<td><input name="txt_kk" type="text" size="40" value="<?php echo $nim;?>"> <em>harus diisi</em></td>
		  </tr>
		  <tr>
		  <tr>
			<td>Nama KK</td>
			<td><input name="txt_nama" type="text" size="40" value="<?php echo $nama;?>"> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td>RT</td>
			<td><input name="txt_rt" type="text" size="40" value="<?php echo $jurusan;?>"> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td>RW</td>
			<td><input name="txt_rw" type="text" size="40" value="<?php echo $jurusan;?>"> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td></td>
			<td><input name="cmd_simpan" type="submit" value="Simpan"> <input name="cmd_batal" type="button" onClick="location.href='?hal=data_alternatif&kriteria=<?php echo $id2;?>';" value="Batal"></td>
		  </tr>
		</table>
		</form>
    	</div>