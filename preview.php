<?php include_once('common.php');
include('FPDF/fpdf.php'); 
include('FPDI/fpdi.php'); 
ob_end_clean();// will solve output header issue caused echo on top. FDI need blank canvas. NOTE: echo above this code will not work.
header("Content-Encoding: None", true);// will solve output header issue caused echo on top. FDI need blank canvas. NOTE: echo above this code will not work.

if(isset($_GET['entry_id']) && !empty($_GET['entry_id']) ):
// Get data of requested id
$id = $_GET['entry_id'];
 $get_data = execute_query("SELECT * FROM ".USERS." WHERE id=".$id);
 if(num_rows($get_data) > 0){
	$get_user = fetch_assoc($get_data);
 }
 endif;


// initiate FPDI
$pdf = new FPDI();
// add a page
$pdf->AddPage('L');
// set the source file
$file_name = "new.pdf";
$pdf->setSourceFile($file_name);
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx);

// now write some text above the imported page
$pdf->SetFont('Helvetica','B',18);
//$pdf->SetTextColor(209, 35, 42);

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(110, 83);
//$pdf->Write(0, $get_user['first_name']);
//$pdf->SetXY(139, 83); // Left, Top
//$pdf->Write(0, $get_user['last_name']);
$pdf->Write(0, $get_user['first_name'].' '.$get_user['last_name']);
$pdf->SetXY(103, 95.5); // Left, Top
$pdf->Write(0, $get_user['have_pet']);
$pdf->SetXY(125, 106); // Left, Top
$pdf->Write(0, $get_user['pet_name']);
$pdf->SetXY(100, 130); // Left, Top
$pdf->Write(0, $get_user['pet_name']);
$pdf->SetXY(138, 120.6); // Left, Top
$date = date('m/d/Y', strtotime($get_user['created_at']));

$pdf->Write(0, $date);
$pdf->SetXY(153, 140); // Left, Top
$pdf->Write(0, $get_user['first_name']);
$pdf->SetXY(120, 153); // Left, Top
$pdf->Write(0, $get_user['city'].'/'.$get_user['state']);




//save new pdf
$pdf->Output('Certificates/'.$file_name,'F');

//preview new xxx pdf
$pdf->Output('Certificates/'.$file_name,'I');
?>
<script type="text/javascript">
setTimeout(function () { window.print(); }, 500);
        window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
</script>