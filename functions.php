<?php 
	function renderTemplate($templatePath, $dataArray) {
		if(file_exists($templatePath)) {
        ob_start();
        require($templatePath);
        $html = ob_get_clean();
        return $html;
    }
	    return '';
	}
?>