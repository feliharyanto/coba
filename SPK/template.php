<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>DESA PURWASARI</title>
	<meta name="description" content="sistem pendukung keputusan menggunakan metode SAW (Simple Additive Weighting)" />
	<meta name="keywords" content="spk, metode saw, spk metode saw, simple additive weighting" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<link href="images/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="images/footer.css" rel="stylesheet" type="text/css" media="all" />
    <link href="images/home.css" rel="stylesheet" type="text/css" media="all" /> 
    <script type="text/javascript" src="js/jquery-3.2.0.js"></script>        
<style type="text/css">

body {
	background-image: url(images/bg1.jpg);
}
</style>

	<script>

		function kmean() {
			var cluster1 = $("#cluster1").val();
			var cluster2 = $("#cluster2").val();
			var cluster3 = $("#cluster3").val();
			var dataObject = $("#dataObject").val();
			var dataCount = $("#dataCount").val();
			var dataKK = $("#dataKK").val();
			var dataNama = $("#dataNama").val();
			var dataCluster = {'cluster1':cluster1,'cluster2':cluster2,'cluster3':cluster3,'dataObject':dataObject,'dataCount':dataCount,'dataKK':dataKK,'dataNama':dataNama};
		$.ajax({

			type 		: "POST",
			data 		: dataCluster,
			url  		: "admin/baru.php",
			success: function(dataa){
				$('#kmeans').html(dataa).fadeIn();
			},
			error: function(dataa){
			alert(dataa);
			}
		});

}

	</script>

</head>



<body class="home">
    <div id="bg">
	<div id="page">
	<img src="images/logo.png"/>
    <div id="body_content">
		<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="margin-left:-11px">
		  <tr>
			<td valign="top"><?php include 'menu.php';?></td>
			<td valign="top" width="660"><?php eval($CONTENT_["main"]);?></td>
		  </tr>
		</table>		
    </div>
    
<div id="body_footer">
    <?php include 'footer.php';?>
</div>
   </div>
   </div>
</body>
</html>
