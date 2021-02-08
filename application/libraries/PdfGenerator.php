<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class PdfGenerator
{
	public function generate($html,$filename)
	{
		define('DOMPDF_ENABLE_AUTOLOAD', false);
		require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");

		$pdfroot  = dirname(__DIR__);
		$s = DIRECTORY_SEPARATOR;
        $pdfroot .= $s.'third_party'.$s.'pdf'.$s.$filename.'.pdf';

		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->render();
		// $dompdf->stream($filename.'.pdf',array("Attachment"=>0));
		$pdf_string = $dompdf->output();
		file_put_contents($pdfroot, $pdf_string); 

		
	}

	public function generate22($html,$filename)
	{
		define('DOMPDF_ENABLE_AUTOLOAD', false);
		require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");

		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream($filename.'.pdf',array("Attachment"=>0));	
	}

}

?>