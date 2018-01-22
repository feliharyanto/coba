<?php 
======================================================================================
# menampilkan data hasil pencarian
/*$q=mysql_query("select * from kriteria");
if(mysql_num_rows($q) > 0){
	while($h=mysql_fetch_array($q)){
		$no++;
		$tmp='<td valign="top"><strong>C'.$no.'</strong>. '.$h['nama'].'</td>';
		for($i=0;$i<count($id_alternatif);$i++){
			$qqq=mysql_query("select klasifikasi.* from klasifikasi inner join himpunan on klasifikasi.id_himpunan=himpunan.id_himpunan where klasifikasi.id_alternatif='".$id_alternatif[$i]."' and himpunan.id_kriteria='".$h['id_kriteria']."'");
			if(mysql_num_rows($qqq) > 0){
				$hhh=mysql_fetch_array($qqq);
				$id_himpunan=$hhh['id_himpunan'];
			}else{
				$id_himpunan='';
			}
			
			$qqq=mysql_query("select * from himpunan where id_himpunan='".$id_himpunan."'");
			if(mysql_num_rows($qqq) > 0){
				$hhh=mysql_fetch_array($qqq);
				$himpunan=$hhh['nama'];
			}else{
				$himpunan='';
			}
			$tmp.='<td valign="top">'.$himpunan.'</td>';
		}
		$daftar.='<tr>'.$tmp.'</tr>';
	}
}*/

/*$no=0;
$title_1='<td width="100">NIM</td><td width="200">NAMA</td>';
$q=mysql_query("select * from kriteria");
if(mysql_num_rows($q) > 0){
	while($h=mysql_fetch_array($q)){
		$no++;
		$title_1.='<td align="center" width="200"><strong>C'.$no.'</strong></td>';
		# catat atribut kriteria masing2 kriteria
		$kriteria_atribut[]=$h['atribut'];
	}
}*/


======================================================================================
# membaca nilai himpunan
/*for($i=0;$i<count($id_alternatif);$i++){
	$ii=0;
	$tmp_1='<td valign="top" width="100">'.$nama_arr[$i].'</td><td valign="top" width="200">'.$nama_arr[$i].'</td>';
	$qq=mysql_query("select * from kriteria");
	if(mysql_num_rows($qq) > 0){
		while($hh=mysql_fetch_array($qq)){
			$ii++;
			$qqq=mysql_query("select klasifikasi.* from klasifikasi inner join himpunan on klasifikasi.id_himpunan=himpunan.id_himpunan where klasifikasi.id_alternatif='".$id_alternatif[$i]."' and himpunan.id_kriteria='".$hh['id_kriteria']."'");
			if(mysql_num_rows($qqq) > 0){
				$hhh=mysql_fetch_array($qqq);
				$id_himpunan=$hhh['id_himpunan'];
			}else{
				$id_himpunan='';
			}
			
			$qqq=mysql_query("select * from himpunan where id_himpunan='".$id_himpunan."'");
			if(mysql_num_rows($qqq) > 0){
				$hhh=mysql_fetch_array($qqq);
				$himpunan_nilai=$hhh['nilai'];
			}else{
				$himpunan_nilai=0;
			}
			$tmp_1.='<td valign="top" width="100" align="center">'.$himpunan_nilai.'</td>';
			# catat nilai himpunan ke dalam matriks
			$matriks_x[$i+1][$ii]=$himpunan_nilai;
		}
	}
	$daftar_1.='<tr>'.$tmp_1.'</tr>';
}*/
=======================================================================================
/*for($i=1;$i<=$no;$i++){ # alternatif
	$tmp='';
	for($ii=1;$ii<=$no_1;$ii++){ # kriteria
		
		$arr='';
		for($j=1;$j<=$no;$j++){ # alternatif
			$arr[]=$matriks_x[$j][$ii];
		}
		if($kriteria_atribut[$ii-1]=='benefit'){
			if($matriks_x[$i][$ii]>0){$jml=$matriks_x[$i][$ii]/max($arr);}else{$jml=0;}
		}else{
			if(min($arr)>0){$jml=min($arr)/$matriks_x[$i][$ii];}else{$jml=0;}
		}
		$matriks_1[$i][$ii]=round($jml,3);
		$tmp.='<td align="center" width="80">'.round($jml,3).'</td>';
	}
	
	$normalisasi.='<tr>'.$tmp.'</tr>';
}*/
=======================================================================================
/*for($i=1;$i<=$no;$i++){ # alternatif
	$jml=0;
	for($ii=1;$ii<=$no_1;$ii++){ # kriteria
		$jml=$jml + ($kriteria_bobot[$ii-1]*$matriks_1[$i][$ii]);
	}
	$hasil[]=array(round($jml,3),$id_alternatif[$i-1]);
}
if($no>0){sort($hasil);}*/
/*$ii=0;
for($i=($no-1);$i>=0;$i--){ # alternatif
	$ii++;
	$q=mysql_query("select * from alternatif where id_alternatif='".$hasil[$i][1]."'");
	$h=mysql_fetch_array($q);
	$nama=$h['nama'];
	$hasil.='
	  <tr>
		<td valign="top">'.$ii.'</td>
		<td valign="top"><a href="?hal=detail&id='.$h['id_alternatif'].'">'.$nama.'</a></td>
		<td valign="top" align="center">'.$hasil[$i][0].'</td>
	  </tr>
		';
	# catat data kacamata pada urutan pertama
	if(empty($best_alternatif)){
		$best_alternatif=$nama;
	}
}*/
 ?>