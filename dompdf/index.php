<?php
require_once("dompdf_config.inc.php");

$html = 
  '<html><body>'.
  '<p>Put your html here, or generate it with your favourite '.
  'templating system.</p>'.
  '</body></html>';
$file = file("index.html");
$file = implode($file);

$dompdf = new DOMPDF();
//$dompdf->load_html_file('http://localhost/dompdf/index.html');
$dompdf->load_html($file);
$dompdf->render();
$output = $dompdf->output();
file_put_contents('Brochure.pdf', $output);
header('location:Brochure.pdf');

?>