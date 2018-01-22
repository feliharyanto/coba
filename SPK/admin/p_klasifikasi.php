<?php
if(empty($_SESSION['LOGIN_username'])){
	exit("<script>location.href='./';</script>");
}

if(!empty($_POST['cmd_simpan'])){
	# hapus semua data klasifikasi pada alternatif tertentu
	mysql_query("delete from klasifikasi where id_alternatif='".$_POST['txt_alternatif']."'");
	$q=mysql_query("select * from kriteria");
	if(mysql_num_rows($q) > 0){
		while($h=mysql_fetch_array($q)){
			# insert data klasifikasi
			if(!empty($_POST['himpunan_'.$h['id_kriteria']])){
				mysql_query("insert into klasifikasi(id_alternatif,id_himpunan) values('".$_POST['txt_alternatif']."','".$_POST['himpunan_'.$h['id_kriteria']]."')");
			}
		}
	}	
	
	echo "<script>alert('Data berhasil tersimpan');location.href='?hal=data_klasifikasi';</script>";
}

$q=mysql_query("select * from alternatif order by nama");
if(mysql_num_rows($q) > 0){
	while($h=mysql_fetch_array($q)){
		$daftar_kriteria='';
		$n=0;
		# menampilkan data kriteria untuk tiap alternatif
		$qq=mysql_query("select * from kriteria");
		if(mysql_num_rows($qq) > 0){
			while($hh=mysql_fetch_array($qq)){
				# menampilkan data himpunan untuk dimasukkan ke dalam combobox kriteria
				$list_kriteria='<option value=""></option>';
				$qqq=mysql_query("select * from himpunan where id_kriteria='".$hh['id_kriteria']."'");
				if(mysql_num_rows($qqq) > 0){
					while($hhh=mysql_fetch_array($qqq)){
						if(mysql_num_rows(mysql_query("select * from klasifikasi where id_alternatif='".$h['id_alternatif']."' and id_himpunan='".$hhh['id_himpunan']."'"))>0){
							# merupakan himpunan yg terpilih/ tersimpan
							$s=' selected';
						}else{
							$s='';
						}
						$list_kriteria.='<option value="'.$hhh['id_himpunan'].'"'.$s.'>'.$hhh['nama'].'</option>';
					}
				}
				$n++;
				$input='<select name="himpunan_'.$hh['id_kriteria'].'">'.$list_kriteria.'</select>';

				$daftar_kriteria.='
				<tr>
					<td width="120">'.$hh['nama'].'</td>
					<td>'.$input.'</td>
				</tr>
				';
			}
		}
		
		$no++;
		$daftar.='
		  <tr>
			<td valign="top">'.$no.'</td>
			<td valign="top">'.$h['no_kk'].'</td>
			<td valign="top">'.$h['nama'].'</td>
			<td valign="top">'.$h['rt'].'</td>
			<td valign="top">'.$h['rw'].'</td>
			<td valign="top"><span id="cmd_'.$h['id_alternatif'].'"><strong>Edit Klasifikasi</strong></span></td>
		  </tr>
		  <tr >
			<td valign="top" colspan="5">
			<form action="" name="" method="post" id="kla_'.$h['id_alternatif'].'" style="display:none">
			<input name="txt_alternatif" type="hidden" value="'.$h['id_alternatif'].'" />
			<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
			  <!--<tr>
				<td colspan="2"><strong>'.$no.'. '.strtoupper($h['nama']).'</strong></td>
			  </tr>-->
			  '.$daftar_kriteria.'
			  <tr>
				<td width="140"></td>
				<td><input name="cmd_simpan" type="submit" value="Simpan"></td>
			  </tr>
			</table><br /><br />
			</form>
			</td>
		  </tr>
		';
		$js.="
			$('#cmd_".$h['id_alternatif']."').css( 'cursor', 'pointer' );
			$('#cmd_".$h['id_alternatif']."').click(function() {
			  $('#kla_".$h['id_alternatif']."').toggle('slow', function() {
			  });
			});
		";
	}
}

?>
 
        <div style="font-family:Arial;font-size:12px;padding:3px ">
		<div style="font-size:18px;padding:10px 0 10px 0 ">DATA KRITERIA CALON </div>
		<br />
		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <tr>
			<td align="center" width="40">No</td>
			<td align="center" width="120">NO KK</td>
			<td align="center" width="120">Nama warga</td>
			<td align="center" width="10">RT</td>
			<td align="center" width="10">RW</td>
			<td align="center" width="100"></td>
		  </tr>
		  <?php echo $daftar;?>
		</table>


    	</div>
<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script language="JavaScript" type="text/JavaScript">
<?php echo $js;?>
</script>
