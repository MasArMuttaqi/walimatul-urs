<?php
	session_start();
	session_destroy(); // menghapus seluruh session yang berjalan pada aplikasi
	header('location:../index.html');
?>