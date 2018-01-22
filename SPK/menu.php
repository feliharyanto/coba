
		<?php if(!empty($_SESSION['LOGIN_username'])){?>
		
		<div id="slider_menu"><h2 class="title" id="menu_utama"> Menu Admin </h2>
		<ul id="menu_utama_ul">
		<li><a href="./">Halaman Depan</a></li>
		<li><a href="?hal=data_kriteria">Data Kriteria</a></li>
		<li><a href="?hal=data_himpunan">Data Himpunan Kriteria</a></li>
		<li><a href="?hal=data_alternatif">Data Warga</a></li>
		<li><a href="?hal=data_klasifikasi">Klasifikasi</a></li>
		<li><a href="logout.php">Logout</a></li>
		</ul>
        </div>
		<div id="slider_menu">
		<ul id="menu_pencarian_ul">
		<li><a href="?hal=analisa"><strong>Analisa Penerima Raskin</strong></a></li>
		</ul>
        </div>
		<?php }else{?>
		<div id="slider_menu"><h2 class="title" id="menu_utama"> Menu Utama </h2>
		<ul id="menu_utama_ul">
		<li><a href="./">Halaman Depan</a></li>
		<li><a href="?hal=login">Login Admin</a></li>
		</ul>
        </div>
		<?php }?>
		
        <div class="spacer_float"></div>
