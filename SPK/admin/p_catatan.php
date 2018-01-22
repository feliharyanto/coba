<?php

if(empty($_SESSION['LOGIN_username'])){
	exit("<script>location.href='./';</script>");
}

if(!empty($_POST['cmd_new'])){
	session_unregister('ANALISA_KRITERIA');
	exit("<script>location.href='?hal=analisa';</script>");
}


//$q=mysql_query("select * from kriteria");
//while($h=mysql_fetch_array($q)){
//	echo $_SESSION['ANALISA_KRITERIA'][$h['id_kriteria']].'<hr>';
//}

# baca jumlah kriteria
$jumlah_kriteria=mysql_num_rows(mysql_query("select * from kriteria"));
# baca jumlah alternatif
$jumlah_alternatif=mysql_num_rows(mysql_query("select * from alternatif"));

# baca data alternatif
$q=mysql_query("select * from alternatif order by no_kk ");//diurutkan berdasarkan no kk
while($h=mysql_fetch_array($q)){
	$alternatif[]=array($h['id_alternatif'],$h['no_kk'],$h['nama']);
	$title.='<td align="center" width="240">'.strtoupper($h['nama']).'</td>';
}

# baca data kriteria dan nilai bobot dari form input analisa
$q=mysql_query("select * from kriteria  ");
while($h=mysql_fetch_array($q)){
	$nilai=$_SESSION['ANALISA_KRITERIA'][$h['id_kriteria']];
	$kriteria[]=array($h['id_kriteria'],$h['nama'],$h['atribut'],$nilai);
}

$no=0;
$daftar='<td width="40">NO</td><td width="100">No KK</td><td>NAMA</td>';
for($i=0;$i<count($kriteria);$i++){
	$daftar.='<td width="180">C'.($i+1).'</td>';
}
$daftar='<tr>'.$daftar.'</tr>';
for($i=0;$i<count($alternatif);$i++){
	$no++;
	$daftar.='<tr><td>'.$no.'</td><td>'.$alternatif[$i][1].'</td><td>'.$alternatif[$i][2].'</td>';
	for($ii=0;$ii<count($kriteria);$ii++){
		$q=mysql_query("select himpunan.nama from klasifikasi inner join himpunan on 
			klasifikasi.id_himpunan=himpunan.id_himpunan where klasifikasi.id_alternatif='".$alternatif[$i][0]."' 
			and himpunan.id_kriteria='".$kriteria[$ii][0]."'");
		$h=mysql_fetch_array($q);
		$himpunan=$h['nama'];
		$daftar.='<td>'.$himpunan.'</td>';
	}
	$daftar.='</tr>';
}

$no=0;
$daftar_1='<td width="40">NO</td><td width="100">No KK</td><td>NAMA</td>';
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
$daftar_2='<td width="40">NO</td><td width="100">No KK</td><td>NAMA</td>';
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
$daftar_3='<td width="40">NO</td><td width="100">No KK</td><td>NAMA</td><td width="100">NILAI</td>';
$daftar_3='<tr>'.$daftar_3.'</tr>';

for($i=0;$i<count($alternatif);$i++){
$dataku[$i][0]=$alternatif[$i][1];
	$dataku[$i][1]=$alternatif[$i][2];
	$dataku[$i][2]=$hasil_akhir[$alternatif[$i][0]][0];
	$dataku[$i][3]=$hasil_akhir[$alternatif[$i][0]][1];
    $datanew[]=array($dataku[$i][0],$dataku[$i][1],$dataku[$i][2],$dataku[$i][3]);
    
    for($j=0;$j<count($alternatif);$j++){
	    if($datanew[$i][3]<=$datanew[$j][3]){
	    	$temp=$datanew[$i];     
	    	$datanew[$i]=$datanew[$j];
	    	$datanew[$j]=$temp;
	    }
	}
}
for ($i=0; $i < count($alternatif); $i++) {	
	$no++;
	$daftar_3.='<tr><td>'.$no.'</td><td>'.$datanew[$i][0].'</td><td>'.$datanew[$i][1].'</td>
	<td>'.number_format($datanew[$i][2],3).'</td></tr>';

}
?>



<?php   //ini untuk menentukan centeroid dalamm pehitungan k-mean
		for ($i=0; $i < count($alternatif); $i++) {	
			$coeg=number_format($datanew[$i][2],3);
			if($i<count($alternatif)-1){
				if($max>$datanew[$i+1][2]){
					$max=$max;
				}
				else{
					$max=$coeg;
				}
			}
			
		} 
		for ($i=0; $i < count($alternatif); $i++) {	
			$coeg=number_format($datanew[$i][2],3);
			if($i<count($alternatif)-1){
				if($coeg<$datanew[$i+1][2]){
					$min=$min;
				}
				else{
					$min=number_format($datanew[$i+1][2],3);
				}
			}
			
		} 
		for ($i=0; $i < count($alternatif); $i++) {	
			$avg=$avg+number_format($datanew[$i][2],3);
			
		} 
		$average=$avg/count($alternatif);
		$average=number_format($average,3);

//sesion hasil(berisi hasil akhir perhitungan saw)
	for ($i=0; $i < count($alternatif); $i++) 
	{	
		if($i<count($alternatif)-1){
			$separator='-';
		}
		else{
			$separator='';
		}
		$cobain=$cobain.number_format($_SESSION['kmnn'][$i]=$datanew[$i][2],3).$separator;
		$noKKcobain=$noKKcobain.$datanew[$i][0].$separator;
		$namacobain=$namacobain.$datanew[$i][1].$separator;
	} 
		?> 

		
		<!-- ini untuk memanggil file hasil saw -->
		<br /><br />Data Objek<br /><br />
		<div style="overflow:scroll;width:640px">
		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <?php echo $daftar_3;?>
		</table>

		</div>
		<!-- ini untuk memanggil file centeroid k-mean |$min-0.01;? | $max+0.01;?  |-->
		<br /><br />Data Cluster<br /><br />
		<div style="overflow;width:450px">
		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		<td width="200"><strong>Cluster</td><td width="40"><strong>Centeroid Awal</td> 	
		<tr><td width="40">KLUSTER 1 </td><td><input type="text" id="cluster1" width="" value="<?php echo $max;?>" readonly></td></tr>
		<tr><td width="40">KLUSTER 2 </td><td><input type="text" id="cluster2" width="" value="<?php echo $average;?>" readonly></td></tr>
		<tr><td width="40">KLUSTER 3 </td><td><input type="text" id="cluster3" width="" value="<?php echo $min;?>" readonly>
		<input type="hidden" id="dataObject" width="" value="<?php echo $cobain;?>" readonly>
		<input type="hidden" id="dataCount" width="" value="<?php echo count($alternatif);?>" readonly>
		<input type="hidden" id="dataKK" width="" value="<?php echo $noKKcobain;?>" readonly>
		<input type="hidden" id="dataNama" width="" value="<?php echo $namacobain;?>" readonly>

		</td></tr>
		
		</table>
		</div>
		<br /><br />
		<input name="cmd_back" type="button" value="&lt; Kembali" onclick="location.href='?hal=hasil';" />
		<button id="proses" onclick="kmean();">HITUNG</button>
	  	</div>
    	<p style="margin-top: 10px; font-size: 19px;" id="kmeans" >   	</p>
    	<br>


