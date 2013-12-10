<?php
set_error_handler('handleerror', E_ALL);
function handleerror($num,$text,$theFile, $theLine){
if(ob_get_length()) ob_clean();
$em='Error: '.$num . chr(10).
    'Message:'.$text. chr(10).
	'file:'.$theFile. chr(10).
'line:'.$theLine. chr(10);
echo $em;
exit;


}

?>
