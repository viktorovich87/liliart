<?php



$session_id = $this->session->userdata('username');

//echo $session_id;

if(!$session_id){

	echo "



				<script language='JavaScript' type='text/javascript'>



				alert('You don not have rules');



						<!-- 



						function GoNah(){ 



						 location='".site_url("main/")."'; 



						} 



						setTimeout( 'GoNah()', 100 ); 



						//--> 



						</script>	



				";die;

}





?>

<!DOCTYPE html>



<html lang="ru-RU"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-param" content="_csrf">

    <meta name="csrf-token" content="V3pnZVJOVlg6Phc8IiQZaWEZPi8EKwQhEE8AKhd5L2wiGAFXYAJmAA==">

    <title>АдминУправление</title>

 <link rel="icon" href="<?php echo site_url();?>resources/img/fav.png" type="image/x-icon">

<link media="all" rel="stylesheet" type="text/css" href="<?php echo site_url();?>adminpanel/css/bootstrap.css" /> 

<link media="all" rel="stylesheet" type="text/css" href="<?php echo site_url();?>adminpanel/css/site.css" /> 

<link media="all" rel="stylesheet" type="text/css" href="<?php echo site_url();?>adminpanel/css/jquery-ui.css" />    

<link media="all" rel="stylesheet" type="text/css" href="<?php echo site_url();?>adminpanel/css/jquery.qtip.css" /> 

<link media="all" rel="stylesheet" type="text/css" href="<?php echo site_url();?>adminpanel/css/animate.css" />   

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<!-- <link media="all" rel="stylesheet" type="text/css" href="<?php echo site_url();?>css/adminka/editor.css" />

<link media="all" rel="stylesheet" type="text/css" href="<?php echo site_url();?>css/adminstyles1.css" />
 -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo site_url();?>adminpanel/js/main.js"></script>
  
<script type="text/javascript" src="<?php echo site_url();?>ckeditor/ckeditor.js"></script>
<script language="javascript">
function CallPrint(strid) {
  var prtContent = document.getElementById(strid);
  var prtCSS = '';
  var WinPrint = window.open('','','left=50,top=50,width=800,height=640,toolbar=0,scrollbars=1,status=0');
  WinPrint.document.write('<div id="print" class="contentpane">');
  WinPrint.document.write(prtCSS);
  WinPrint.document.write(prtContent.innerHTML);
  WinPrint.document.write('</div>');
  WinPrint.document.close();
  WinPrint.focus();
  WinPrint.print();
  WinPrint.close();
  prtContent.innerHTML=strOldOne;
}
</script>


</head>

 

<body>

<div class="wrap">

<?php 

	$this->load->view('adminpanel/menu');

?>

        

        

        

   