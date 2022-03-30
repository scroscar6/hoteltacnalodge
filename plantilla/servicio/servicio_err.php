<?php defined('SS_NYAA') or die;?>
<div id="noResults">
	<?php
    switch($Error){
        case 4:
            echo '<p>#4: *No se encontró el registro.</p>';
        break;
    
        case 5:
            echo '<p>#5: *Error al consultar.</p>';
        break;
    }
    ?>
    <a href="javascript:history.back()">&laquo; Regresar</a>
</div>