   <?php 
	$this->load->view('adminpanel/adminheader');
?>
    
        
<div class="container">
            <ul class="breadcrumb"><li><a href="#">Главная</a></li>
<li class="active">Добавление Категории</li>
 <a class="add-button" href="<?php echo site_url();?>categories">Все Категории</a>
</ul>            
            
   
                    <div class="banners-index">

    <h1>Добавление Категории</h1>
    
   
    <div id="w0" class="grid-view">


<?php 
	$attributes = array('class' => 'admin-form', 'id' => 'addLeague', 'name' => 'addLeague');
	echo form_open_multipart('categories/addCategoryItem/',$attributes); 
?>


  <div class="form-group field-news-title required">

<label class="control-label" for="news-title">Название категории</label>

<input type="text" id="news-title" class="form-control" name="name" value="" required>

<br>
<label class="control-label" for="news-title">Заголовок (EN)</label>
<input type="text" id="news-title" class="form-control" name="nameEN">

<div class="help-block"></div>

</div>

 
  
  
 <div class="form-group field-news-hidden">



<div class="form-group">

<button type="submit" class="btn btn-success">Добавить Категорию</button>    

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