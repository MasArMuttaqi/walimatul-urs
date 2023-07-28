<?php
		if (isset($_GET['view'])) {
			$view = $_GET['view'];
			if ($view=='agenda') {
				require 'agenda.php';
			}elseif ($view=='tamu') {
				require 'tamu-2.php';
			}
			elseif ($view=='usr') {
				require 'akun.php';
			}
			else{
				require 'view/404.html';
			}
		}else{
			require 'view/404.html';
		}
			
?>