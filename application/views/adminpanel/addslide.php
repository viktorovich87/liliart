   <?php 
	$this->load->view('adminpanel/adminheader');
?>
    
        
<div class="container">
            <ul class="breadcrumb"><li><a href="#">Главная</a></li>
<li class="active">Добавление слайда</li>
 <a class="add-button" href="<?php echo site_url();?>slider">Все слайды</a>
</ul>            
            
   
                    <div class="banners-index">

    <h1>Добавление слайда</h1>
    
   
    <div id="w0" class="grid-view">


<?php 
	$attributes = array('class' => 'admin-form');
	echo form_open_multipart('slider/addSlideItem/',$attributes); 
?>



    <div class="form-group field-news-title required">

<label class="control-label" for="news-title">Картинка слайда</label>

<input type="file" id="news-title" class="form-control" name="imgSlider" required>



</div>


    
  
  
 <div class="form-group field-news-hidden">



<div class="form-group">

<button type="submit" class="btn btn-success">Добавить Слайд</button>    

</div>
</div>
</form>



        </div>
        </div>
        </div>
        
        
        

   <?php 
	$this->load->view('adminpanel/adminfooter');
?>
     




</body></html>