   <?php 
  $this->load->view('adminpanel/adminheader');
?>
    
        
<div class="container">
            <ul class="breadcrumb"><li><a href="#">Главная</a></li>
            <li ><a href="<?php echo site_url();?>products">Товары</a></li>
<li class="active">Добавление товаров</li>
 <a class="add-button" href="<?php echo site_url();?>products">Все Товары</a>
</ul>            
            
   
                    <div class="banners-index">

    <h1>Добавление товара</h1>
    
   
    <div id="w0" class="grid-view">


<?php 
  $attributes = array('class' => 'admin-form', 'id' => 'addLeague', 'name' => 'addLeague');
  echo form_open_multipart('products/addProductItem/',$attributes); 
?>


  <div class="form-group field-news-title required">

<label class="control-label" for="news-title">Название товара</label>

<input type="text" id="news-title" class="form-control" name="name" value="" required>



 <div class="form-group field-news-title required">

<label class="control-label" for="news-title">К какой подкатегории будет отновится</label>

<select name="subcategory" class="form-control">
  <?php
    $this->db->from("categories");
        $categories['categories'] = $this->db->get()->result_array();

        foreach ($categories['categories'] as $newcategories): 


?>
    <option disabled style="background:#e3e3e3;"> <?php echo $newcategories["name"];?></option>
  <?php


          $this->db->from("subcategories");
          $this->db->where("category",$newcategories["id"]);
          $subcategories['subcategories'] = $this->db->get()->result_array();

          foreach ($subcategories['subcategories'] as $newsubcategories):

            ?>


    <option style="padding-left:30px;" value="<?php echo $newsubcategories["id"];?>"> <?php echo $newsubcategories["name"];?></option>
  <?php endforeach; 
   endforeach;?>
</select>


</div>





</div>

    <div class="form-group field-news-title required">

<label class="control-label" for="news-title">Фотографии товара </label>

<input type="file"  min="1" max="36" class="form-control" name="file[]" multiple="true">


</div>


<div class="form-group  required">
  <label class="control-label" >Используем  модуль оптимизатора при загрузке фотографий</label>
  <Br>
  <input type="radio" name="optimizator" value="yes" checked>Используем оптимизатор<Br>
   <input type="radio" name="optimizator" value="no" > НЕ используем оптимизатор<Br>
</div>
          



<div class="form-group  required">
  <label class="control-label" >Какую кнопку показываем?</label>
  <Br>
  <input type="radio" name="buybutton" value="buy" checked>Купить<Br>
   <input type="radio" name="buybutton" value="order" >Заказать<Br>
</div>

<!-- <div class="form-group  required">
  <label class="control-label" >Модуль товара в 360 градусов. Показываем?</label>
  <Br>
  <input type="radio" name="360button" value="1" checked>Да<Br>
   <input type="radio" name="360button" value="0" >Нет<Br>
</div> -->




    <div class="form-group field-news-title required">

<label class="control-label" for="news-title">Описание</label>

<textarea name="description" style="min-height:300px;" class="textarea form-control"></textarea> 
</div>


 <div class="form-group field-news-title required">

<label class="control-label" for="news-title">Описание EN</label>

<textarea name="descriptionEN" style="min-height:300px;" class="textarea form-control"></textarea> 
</div>

 <div class="form-group field-news-title required">

<label class="control-label" for="news-title">Цена</label>

<input type="text"  class="form-control" name="price" required>



</div>



 

  
  
  
 <div class="form-group field-news-hidden">



<div class="form-group">

<button type="submit" class="btn btn-success">Добавить товар</button>    

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