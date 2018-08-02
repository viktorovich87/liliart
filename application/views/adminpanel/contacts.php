   <?php 

	$this->load->view('adminpanel/adminheader');

?>

       

        

<div class="container">

	<ul class="breadcrumb">

<ul class="breadcrumb"><li><a href="<?php echo site_url();?>admin/controlpanel">Главная</a></li>
<li> <a class href="<?php echo site_url();?>slider">Контакты</a></li>
 
	   <?php 
    $sl=0;
        $this->db->from("contacts");
        $contacts['contacts'] = $this->db->get()->result_array();

        foreach ($contacts['contacts'] as $newContacts):
        	$hoursBudni = $newContacts['hoursBudni'];
	        $hoursVih = $newContacts['hoursVih'];
	        $tel1 = $newContacts['tel1'];
	        $tel2 = $newContacts['tel2'];
	        $adres = $newContacts['adres'];
	        $email = $newContacts['email'];
	        $vk = $newContacts['vk'];
	        $pin = $newContacts['pin'];
	        $inst = $newContacts['inst'];
	        $fb = $newContacts['fb'];
        endforeach;

    ?>

	</ul>    
	  <div class="news-index">

    <h1>Страница контактов</h1>
<?php 
	
	echo form_open('contacts/changeInfoContacts/'); 
?>

<div class="form-group field-news-title ">
	<label class="control-label" for="news-title">Часы по будням</label>
	<input type="text" id="news-title" class="form-control" name="hoursBudni" value="<?php echo $hoursBudni; ?>" >
</div>

<div class="form-group field-news-title ">
	<label class="control-label" for="news-title">Часы по выходным</label>
	<input type="text" id="news-title" class="form-control" name="hoursVih" value="<?php echo $hoursVih; ?>" >
</div>


<div class="form-group field-news-title ">
	<label class="control-label" for="news-title">Первый телефон</label>
	<input type="text" id="news-title" class="form-control" name="tel1" value="<?php echo $tel1; ?>" >
</div>
<div class="form-group field-news-title ">
	<label class="control-label" for="news-title">Второй телефон</label>
	<input type="text" id="news-title" class="form-control" name="tel2" value="<?php echo $tel2; ?>" >
</div>


<div class="form-group field-news-title ">
	<label class="control-label" for="news-title">Адрес</label>
	<input type="text" id="news-title" class="form-control" name="adres" value="<?php echo $adres; ?>" >
</div>


<div class="form-group field-news-title ">
	<label class="control-label" for="news-title">Email</label>
	<input type="text" id="news-title" class="form-control" name="email" value="<?php echo $email; ?>" >
</div>




<div class="form-group field-news-title ">
	<label class="control-label" for="news-title">VK</label>
	<input type="text" id="news-title" class="form-control" name="vk" value="<?php echo $vk; ?>" >
</div>
<div class="form-group field-news-title ">
	<label class="control-label" for="news-title">Pinterest</label>
	<input type="text" id="news-title" class="form-control" name="pin" value="<?php echo $pin; ?>" >
</div>
<div class="form-group field-news-title ">
	<label class="control-label" for="news-title">Instagramm</label>
	<input type="text" id="news-title" class="form-control" name="inst" value="<?php echo $inst; ?>" >
</div>
<div class="form-group field-news-title ">
	<label class="control-label" for="news-title">Facebook</label>
	<input type="text" id="news-title" class="form-control" name="fb" value="<?php echo $fb; ?>" >
</div>

<button type="submit" class="btn btn-success">Изменить информацию</button>    

</form>
</div>

</div>

 </div>


<?php 

	$this->load->view('adminpanel/adminfooter');

?>

     