   <?php 
	$this->load->view('adminpanel/adminheader');
?>
       
        
 <div class="container">
 
<h3 align="center">Добро пожаловать в панель управления "Jan Ditor"</h3>

 
 
<ul class="breadcrumb"><li><a href="<?php echo site_url();?>admin/controlpanel">Главная</a></li>

</ul>            
            
         
    <div class="row">
     
    
     
     <a href="<?php echo site_url();?>categories" >
     <div class="col-sm-3">
      <div class="thumbnail" style="text-align:center; border:none;">
         <img src="<?php echo site_url();?>resources/images/logo.png"  >
          <div class="caption">
           <h3>Категории</h3>
            <p>просмотр всех категорий, их добавление и редактирование</p>
          </div>
     </div>
    </div>
     </a>  
  

  <a href="<?php echo site_url();?>subcategories/item" >
     <div class="col-sm-3">
      <div class="thumbnail" style="text-align:center; border:none;">
         <img src="<?php echo site_url();?>resources/images/logo.png"  >
          <div class="caption">
           <h3>Подкатегории</h3>
            <p>просмотр всех подкатегорий, их добавление и редактирование</p>
          </div>
     </div>
    </div>
     </a>


     <a href="<?php echo site_url();?>products" >
     <div class="col-sm-3">
      <div class="thumbnail" style="text-align:center; border:none;">
         <img src="<?php echo site_url();?>resources/images/logo.png"  >
          <div class="caption">
           <h3>Товары</h3>
            <p>просмотр всех товаров, их добавление и редактирование</p>
          </div>
     </div>
    </div>
     </a>


     <a href="<?php echo site_url();?>slider" >
     <div class="col-sm-3">
      <div class="thumbnail" style="text-align:center; border:none;">
         <img src="<?php echo site_url();?>resources/images/logo.png"  >
          <div class="caption">
           <h3>Слайдер</h3>
            <p>просмотр всех слайдеров, их добавление и редактирование</p>
          </div>
     </div>
    </div>
     </a>


     <a href="<?php echo site_url();?>orders" >
     <div class="col-sm-3">
      <div class="thumbnail" style="text-align:center; border:none;">
         <img src="<?php echo site_url();?>resources/images/logo.png"  >
          <div class="caption">
           <h3>Заказы</h3>
            <p>просмотр всех заказов и их статусы</p>
          </div>
     </div>
    </div>
     </a>

  </div>              
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
 
        </div>
 
 

<?php 
	$this->load->view('adminpanel/adminfooter');
?>
     