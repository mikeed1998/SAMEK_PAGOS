<?php

	function telefono_separado_244($tel) {
			preg_match('/(\d{2})(\d{4})(\d{4})/', $tel, $xx);
			$tel = $xx[1].' '.$xx[2].' '.$xx[3];
			return  $tel;
	}

	function telefono_separado_guion($tel) {
			preg_match('/(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/', $tel, $xx);
			$tel = $xx[1].'-'.$xx[2].'-'.$xx[3].'-'.$xx[4].'-'.$xx[5];
			return  $tel;
	}
?>
