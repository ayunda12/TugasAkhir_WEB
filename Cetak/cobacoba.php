<?php
require_once('../dompdf/dompdf_config.inc.php');

$html = 
	'<html><body>'.
	'Terimakasih'.
	'</body></html>';

$dompdf = new dompdf();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->$stream('Data.pdf', array("Attachment"=>0));

?>