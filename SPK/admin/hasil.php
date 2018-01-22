<?php


if(empty($_SESSION['LOGIN_username'])){
	exit("<script>location.href='./';</script>");
}

if(!empty($_POST['cmd_new'])){
	session_unregister('ANALISA_KRITERIA');
	exit("<script>location.href='?hal=analisa';</script>");
}



# baca jumlah kriteria
$jumlah_kriteria=mysql_num_rows(mysql_query("select * from kriteria"));
# baca jumlah alternatif
$jumlah_alternatif=mysql_num_rows(mysql_query("select * from alternatif"));

# baca data alternatif
$q=mysql_query("select * from alternatif order by nama");
while($h=mysql_fetch_array($q)){
	$alternatif[]=array($h['id_alternatif'],$h['nim'],$h['nama']);
	$title.='<td align="center" width="240">'.strtoupper($h['nama']).'</td>';
}

# baca data kriteria dan nilai bobot dari form input analisa
$q=mysql_query("select * from kriteria");
while($h=mysql_fetch_array($q)){
	$nilai=$_SESSION['ANALISA_KRITERIA'][$h['id_kriteria']];
	$kriteria[]=array($h['id_kriteria'],$h['nama'],$h['atribut'],$nilai);
}

$no=0;
$daftar='<td width="40">NO</td><td width="100">NIM</td><td>NAMA</td>';
for($i=0;$i<count($kriteria);$i++){
	$daftar.='<td width="180">C'.($i+1).'</td>';
}
$daftar='<tr>'.$daftar.'</tr>';
for($i=0;$i<count($alternatif);$i++){
	$no++;
	$daftar.='<tr><td>'.$no.'</td><td>'.$alternatif[$i][1].'</td><td>'.$alternatif[$i][2].'</td>';
	for($ii=0;$ii<count($kriteria);$ii++){
		$q=mysql_query("select himpunan.nama from klasifikasi inner join himpunan on klasifikasi.id_himpunan=himpunan.id_himpunan where klasifikasi.id_alternatif='".$alternatif[$i][0]."' and himpunan.id_kriteria='".$kriteria[$ii][0]."'");
		$h=mysql_fetch_array($q);
		$himpunan=$h['nama'];
		$daftar.='<td>'.$himpunan.'</td>';
	}
	$daftar.='</tr>';
}

$no=0;
$daftar_1='<td width="40">NO</td><td width="100">NIM</td><td>NAMA</td>';
for($i=0;$i<count($kriteria);$i++){
	$daftar_1.='<td width="60">C'.($i+1).'</td>';
}
$daftar_1='<tr>'.$daftar_1.'</tr>';
for($i=0;$i<count($alternatif);$i++){
	$no++;
	$daftar_1.='<tr><td>'.$no.'</td><td>'.$alternatif[$i][1].'</td><td>'.$alternatif[$i][2].'</td>';
	for($ii=0;$ii<count($kriteria);$ii++){
		$q=mysql_query("select himpunan.nilai from klasifikasi inner join himpunan on klasifikasi.id_himpunan=himpunan.id_himpunan where klasifikasi.id_alternatif='".$alternatif[$i][0]."' and himpunan.id_kriteria='".$kriteria[$ii][0]."'");
		$h=mysql_fetch_array($q);
		$nilai=$h['nilai'];
		# catat nilai himpunan ke dalam matriks
		$matriks_x[$i+1][$ii+1]=$nilai;
		$daftar_1.='<td>'.$nilai.'</td>';
	}
	$daftar_1.='</tr>';
}

# NORMALISASI 1
$no=0;
$daftar_2='<td width="40">NO</td><td width="100">NIM</td><td>NAMA</td>';
for($i=0;$i<count($kriteria);$i++){
	$daftar_2.='<td width="60">C'.($i+1).'</td>';
}
$daftar_2='<tr>'.$daftar_2.'</tr>';
for($i=0;$i<count($alternatif);$i++){
	$no++;
	$daftar_2.='<tr><td>'.$no.'</td><td>'.$alternatif[$i][1].'</td><td>'.$alternatif[$i][2].'</td>';
	for($ii=0;$ii<count($kriteria);$ii++){
		$arr='';
		for($j=0;$j<count($alternatif);$j++){ # alternatif
			$arr[]=$matriks_x[$j+1][$ii+1];
		}
		if($kriteria[$ii][2]=='benefit'){
			if($matriks_x[$i+1][$ii+1]>0){$jml=$matriks_x[$i+1][$ii+1]/max($arr);}else{$jml=0;}
		}else{
			if(min($arr)>0){$jml=min($arr)/$matriks_x[$i+1][$ii+1];}else{$jml=0;}
		}
		$matriks_1[$i+1][$ii+1]=round($jml,3);
		$daftar_2.='<td>'.round($jml,3).'</td>';
	}
	$daftar_2.='</tr>';
}



// NORMALISASI 2
for($i=0;$i<count($alternatif);$i++){
	$jml=0;
	for($ii=0;$ii<count($kriteria);$ii++){
		$jml=$jml + ($kriteria[$ii][3]*$matriks_1[$i+1][$ii+1]);
	}
	$hasil[]=array(round($jml,3),$alternatif[$i][0]);
}
sort($hasil);
//for($i=0;$i<count($hasil);$i++){
for($i=count($hasil)-1;$i>=0;$i--){
	$rank=count($hasil)-$i;
	$hasil_akhir[$hasil[$i][1]]=array($hasil[$i][0],$rank);
	if(empty($best_alternatif)){
		$q=mysql_query("select * from alternatif where id_alternatif='".$hasil[$i][1]."'");
		$h=mysql_fetch_array($q);
		$nama=$h['nama'];
		$best_alternatif=$nama;
	}
}

$no=0;
$daftar_3='<td width="40">NO</td><td width="100">NIM</td><td>NAMA</td><td width="100">NILAI</td><td width="100">RANK</td>';
$daftar_3='<tr>'.$daftar_3.'</tr>';
for($i=0;$i<count($alternatif);$i++){
	$no++;
	$daftar_3.='<tr><td>'.$no.'</td><td>'.$alternatif[$i][1].'</td><td>'.$alternatif[$i][2].'</td><td>'.$hasil_akhir[$alternatif[$i][0]][0].'</td><td>'.$hasil_akhir[$alternatif[$i][0]][1].'</td></tr>';
	//$daftar_3.='<tr><td>'.$no.'</td></tr>';
}



?>

        <div style="font-family:Arial;font-size:12px;padding:3px ">
		<div style="font-size:18px;padding:10px 0 10px 0 ">HASIL ANALISA</div>
		<br>
		<!--<div style="overflow:scroll;height:520px;">-->
		<div style="overflow:scroll;width:640px">
		<table width="<?php echo (340+($jumlah_kriteria*180));?>" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <?php echo $daftar;?>
		</table>
		</div>
		<br /><br />
		<div style="overflow:scroll;width:640px">
		<table width="<?php echo (340+($jumlah_kriteria*60));?>" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <?php echo $daftar_1;?>
		</table>
		</div>
		<br /><br />NORMALISASI<br /><br />
		<div style="overflow:scroll;width:640px">
		<table width="<?php echo (340+($jumlah_kriteria*60));?>" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <?php echo $daftar_2;?>
		</table>
		</div>
		<br /><br />
		<div style="overflow:scroll;width:640px">
		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <?php echo $daftar_3;?>
		</table>
		</div>
		<br /><br />
		Alternatif yang disarankan adalah <strong><?php echo $best_alternatif;?></strong>
		<br /><br />
		<form action="" method="post">
		<input name="cmd_back" type="button" value="&lt; Kembali" onclick="location.href='?hal=analisa';" /> 
		<input name="cmd_new" type="submit" value="Ulangi / Baru" />
		<input name="cmd_new" type="submit" value="&lt; Simpan Ke Excel" target="_blank" onclick="hasil.php';" />
		</form>
		</div>
