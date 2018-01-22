<?php 
$c1 = $_POST['cluster1'];
$c2 = $_POST['cluster2'];
$c3 = $_POST['cluster3'];
$dO = $_POST['dataObject'];
$dKK = $_POST['dataKK'];
$dNama = $_POST['dataNama'];
$count = $_POST['dataCount'];
$C1Array = array();
$C2Array = array();
$C3Array = array();
$ArrayAll = array();
$explode = explode('-', $dO);
$explodeKK = explode('-', $dKK);
$explodeNama = explode('-', $dNama);
$dataObject=NULL;
$c1countbefore=0;
$c2countbefore=0;
$c3countbefore=0;
$c1countafter=0;
$c2countafter=0;
$c3countafter=0;
$minCluster=0;
$minCluster2=0;
$hasilCluster='';
$helperWhile = 0;
$ket='';

$end = array();

while($helperWhile==0) {
$C1Array = array();
$C2Array = array();
$C3Array = array();	
$ArrayAll = array();
$dataTable='';
$dataTable2='';
$c1tampil = '';
$c1sum = 0;
$c2tampil = '';
$c2sum = 0;
$c3tampil = '';
$c3sum = 0;

$tableKampre2 = '</tbody>
	</table>';
$tableKampret ='<table width="100%"  border="1" cellspacing="0" cellpadding="0" style="margin-top: 10px; text-align:center;" class="tabel_reg">
		<thead><tr>
		<td>X</td>
		<td>Cluster 1 ( '.$c1.' )</td>
		<td>Cluster 2 ( '.$c2.' )</td>
		<td>Cluster 3 ( '.$c3.' )</td>
		<td>Cluster</td>
		</tr></thead>
		<tbody>';
for ($i=0; $i < $count; $i++) { 
	if($c1>$explode[$i]){
		$h1 = $c1-$explode[$i];
	}
	else{
		$h1 = $explode[$i]-$c1;
	}

	if($c2>$explode[$i]){
		$h2 = $c2-$explode[$i];
	}
	else{
		$h2 = $explode[$i]-$c2;
	}

	if($c3>$explode[$i]){
		$h3 = $c3-$explode[$i];
	}
	else{
		$h3 = $explode[$i]-$c3;
	}

	if($h1<$h2){
		$minCluster=$h1;
		$hasilCluster='C1';
		array_push($C1Array, $explode[$i]);
	}
	else{ 	
		if($minCluster<$h3){
			$minCluster=$h2;
			$hasilCluster='C2';
			array_push($C2Array, $explode[$i]);
		}
		else {
			$minCluster2=$h3;
			$hasilCluster='C3';
			array_push($C3Array, $explode[$i]);
		}
	}

	$dataTable = $dataTable.'
		<tr>
		<td>'.$explode[$i].'</td>
		<td>'.number_format((double)$h1,3).'</td>
		<td>'.number_format((double)$h2,3).'</td>
		<td>'.number_format((double)$h3,3).'</td>
		<td>'.$hasilCluster.'</td>
		</tr>
		';


array_push($ArrayAll, $hasilCluster);
}

echo    'Clenteroid 1 : '.$c1.'<br>'.
		'Clenteroid 2 : '.$c2.'<br>'.
		'Clenteroid 3 : '.$c3.'<br>';
echo $tableKampret.$dataTable.$tableKampre2;


foreach ($C1Array as &$value) {
	$c1tampil=$c1tampil." ".$value;
	$valueDouble = (double) $value;
	$c1sum = $c1sum+$valueDouble;
}

foreach ($C2Array as &$value) {
	$c2tampil=$c2tampil." ".$value;
	$valueDouble = (double) $value;
	$c2sum = $c2sum+$valueDouble;
}

foreach ($C3Array as &$value) {
	$c3tampil=$c3tampil." ".$value;
	$valueDouble = (double) $value;
	$c3sum = $c3sum+$valueDouble;
}

$c1count = count($C1Array);
$c2count = count($C2Array);
$c3count = count($C3Array);

$c1result = number_format($c1sum/$c1count,3);
$c2result = number_format($c2sum/$c2count,3);
$c3result = number_format($c3sum/$c3count,3);

echo "Diperoleh : <br>";
echo "Cluster 1 : [ ".$c1tampil." ] = ".$c1sum."/".$c1count." = ".$c1result."<br>";
echo "Cluster 2 : [ ".$c2tampil." ] = ".$c2sum."/".$c2count." = ".$c2result."<br>";
echo "Cluster 3 : [ ".$c3tampil." ] = ".$c3sum."/".$c3count." = ".$c3result."<br>";

if($c1countbefore==0&&$c2countbefore==0&&$c3countbefore==0){
	$c1countbefore=$c1count;
	$c2countbefore=$c2count;
	$c3countbefore=$c3count;
} else {
	$c1countafter=$c1count;
	$c2countafter=$c2count;
	$c3countafter=$c3count;
	if($c1countbefore==$c1countafter&&$c2countbefore==$c2countafter&&$c3countbefore==$c3countafter){
		$helperWhile=1;
	} else {
		$c1countbefore=$c1countafter;
		$c2countbefore=$c2countafter;
		$c3countbefore=$c3countafter;
	}

}
	
$c1 = $c1result;
$c2 = $c2result;
$c3 = $c3result;

}



if($helperWhile==1){
	$dataTableNama='';
	$tableKampret ='<table width="100%"  border="1" cellspacing="0" cellpadding="0" style="margin-top: 10px; text-align:center;" class="tabel_reg">
		<thead><tr>
		<td>No</td>
		<td>No KK</td>
		<td>Nama</td>
		<td>Cluster</td>
		</tr></thead>
		<tbody>';
	for($i=1; $i<=$count; $i++){
		$dataTableNama = $dataTableNama.'
		<tr>
		<td>'.$i.'</td>
		<td>'.$explodeKK[$i-1].'</td>
		<td>'.$explodeNama[$i-1].'</td>
		<td>'.$ArrayAll[$i-1].'</td>
		</tr>';
	}

 	?> <br><br> <?php echo "HASIL AKHIReee : ";

	echo $tableKampret.$dataTableNama.$tableKampre2;

}

 ?>
 <script >window.print()</script>