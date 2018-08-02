   <?php 

	$this->load->view('adminpanel/adminheader');

?>

       

        

<div class="container">

	<ul class="breadcrumb">

<ul class="breadcrumb"><li><a href="<?php echo site_url();?>admin/controlpanel">Главная</a></li>
<li> <a class href="#">Доставка</a></li>
 
	

	</ul>    
	  <div class="news-index">

    <h1>Страница Доставки</h1>
   <?php 
    $sl=0;
        $this->db->from("delivery");
        $data['support'] = $this->db->get()->result_array();

        foreach ($data['support'] as $newsupport):
       
?>

    <?php 
      	 echo form_open('admin/addDeliveryText/');
    ?>
    <label>Описание RU</label>
<textarea id="support" name="text" style="min-height:500px;"><?php echo $newsupport['text'];?></textarea>
<script type="text/javascript">
	CKEDITOR.replace("support");
</script>

<label>Описание EN</label>
<textarea id="supportEN" name="textEN" style="min-height:500px;"><?php echo $newsupport['textEN'];?></textarea>
<script type="text/javascript">
  CKEDITOR.replace("textEN");
</script>
</div>
<button type="submit" class="btn btn-success" style="margin:20px 0px 20px 20px;">Изменить информацию</button>    
</form>

<?php  endforeach; ?>
<div class="clear"></div>
</div>

</div>

 </div>


<?php 

	$this->load->view('adminpanel/adminfooter');

?>

     