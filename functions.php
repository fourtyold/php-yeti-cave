<?php 
	//отрисовка шаблона
	function renderTemplate($templatePath, $dataArray) {
		if(file_exists($templatePath)) {
        ob_start();
        require($templatePath);
        $html = ob_get_clean();
        return $html;
    }
	    return '';
	}

	//поиск email при аутентификации
	function searchUserByEmail($email, $users) {
		$result = null;
		foreach ($users as $user) {
			if ($user['email'] == $email) {
				$result = $user;
				break;
			}
		}
		return $result;
	}

	//расчет времени ставки
	function getBetTime($betTime) {
    $HOUR = 60;
    $DAY = 1440;

    $timePast = strtotime('now') - $betTime;
    if ($timePast/60 < $HOUR) {
        return floor($timePast/60).' минут назад';
    } elseif ($timePast/60 < $DAY) {
        return floor($timePast/3600).' часов назад';
    } else {
        $bTime = getdate($betTime);
        return str_pad($bTime['mday'], 2, '0', STR_PAD_LEFT).'.'.str_pad($bTime['mon'], 2, '0', STR_PAD_LEFT).'.'.substr_replace($bTime['year'], null, 0, 2).' в '.str_pad($bTime['hours'], 2, '0', STR_PAD_LEFT).':'.str_pad($bTime['minutes'], 2, '0', STR_PAD_LEFT);
    	}
	}
?>