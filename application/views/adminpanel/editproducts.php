   <?php 

	$this->load->view('adminpanel/adminheader');


		$this->db->from("products");

		$this->db->where("id", $id); 

		$data['products'] = $this->db->get()->result_array();

			foreach ($data['products'] as $newproducts):
					$ID = $newproducts["id"];
					$NAME = $newproducts["name"];
					$DESCRIPTION = $newproducts["description"];
          $EN_DESCRIPTION = $newproducts["descriptionEN"];
					$PRICE = $newproducts["price"];
					$PRODUCT_ID = $newproducts["productid"];
					$GAB_CERTEJ = $newproducts["gab_chertej"];
					$VISIBLE = $newproducts["visible"];
					$CAT = $newproducts["subcategory"];
					
					$BUTTON360 = $newproducts["360button"];
					$BUYBUTTON = $newproducts["buybutton"];

          $SHOW_TYPE = $newproducts["show_type"];
				
			endforeach;

		

		

?>





        

<div class="container">

<ul class="breadcrumb"><li><a href="<?php echo site_url();?>admin/controlpanel">Главная</a></li>

<li><a href="<?php echo site_url();?>products">Товары</a></li>

<li class="active">Редактировать товар</li>
 <a class="add-button" href="<?php echo site_url();?>products/addProducts">Добавить товар</a>
</ul>            

            


<div class="news-create">



    <h1>Редактировать Товар</h1>



    <div class="news-form">



<?php  
	$attributes = array('class' => 'admin-form', 'id' => 'admin-form', 'name' => 'admin-form'); 
	echo form_open_multipart('products/editProduct/',$attributes);  
?>

<input type="hidden" value="<?php echo $ID;?>" name="hiddenId">



    
  <div class="form-group field-news-title required">

<label class="control-label" for="news-title">Название товара</label>

<input type="text" id="news-title" class="form-control" name="name" value="<?php echo $NAME;?>" required>



 <div class="form-group field-news-title required">

<label class="control-label" for="news-title">К какой подкатегории относится</label>

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


    <option style="padding-left:30px;" <?php if($CAT==$newsubcategories["id"]){echo "selected";}?> value="<?php echo $newsubcategories["id"];?>"> <?php echo $newsubcategories["name"];?></option>
  <?php endforeach; 
   endforeach;?>
</select>


</div>





</div>

<div class="form-group field-news-title required">
<label class="control-label" for="news-title">Добавить ещё фотографии товара </label>

<input type="file"  min="1" max="36" class="form-control" name="file[]" multiple="true" >

</div>




<div class="form-group  required">
  <label class="control-label" >Какую кнопку показываем?</label>
  <Br>
  <input type="radio" name="buybutton" value="buy" <?php if($BUYBUTTON=="buy"){echo "checked";}?> >Купить<Br>
   <input type="radio" name="buybutton" value="order" <?php if($BUYBUTTON=="order"){echo "checked";}?>>Заказать<Br>
</div>


    <div class="form-group field-news-title required">

<label class="control-label" for="news-title">Описание</label>

<textarea name="description" style="min-height:300px;" class="textarea form-control"><?php echo $DESCRIPTION;?></textarea>
</div>


    <div class="form-group field-news-title required">

<label class="control-label" for="news-title">Описание (EN)</label>

<textarea name="descriptionEN" style="min-height:300px;" class="textarea form-control"><?php echo $EN_DESCRIPTION;?></textarea>
</div>



 <div class="form-group field-news-title required">

<label class="control-label" for="news-title">Цена</label>

<input type="text"  class="form-control" name="price"  value="<?php echo $PRICE;?>">



</div>



 

  
  
  
 <div class="form-group field-news-hidden">




</div>

  

  Фотографии товара 
<br>
 <?php 
$img=0;

  $ALL_IMAGES=0;
  $this->db->from("imagesproducts");
  $this->db->where("product_id",$ID);
  $this->db->where("type !=","carousel");
  $imagesproducts['imagesproducts'] = $this->db->get()->result_array();
foreach ($imagesproducts['imagesproducts'] as $newimagesproducts):
$ALL_IMAGES++;
endforeach;


        $this->db->from("imagesproducts");
        $this->db->where("product_id",$ID);
        $this->db->order_by("order", "asc"); 
        $this->db->where("type !=","carousel");
        $data['imagesproducts'] = $this->db->get()->result_array();

        foreach ($data['imagesproducts'] as $newimagesproducts):
            ?>
<div class="imgdiv">
<b style="    min-width: 30px;
    display: block;
    float: left;
    text-align: center;">(<?php echo ++$img;?>)</b>
 <img style="max-width:100px;"  
 src="<?php echo site_url();?>uploads/products/<?php echo $newimagesproducts['image_name'];?>" 
 class="img-portfolio">
<a onclick="delImageProduct('<?php echo $newimagesproducts['id'];?>','<?php echo site_url();?>')" style="cursor:pointer;">(Удалить)</a> 
(<?php
    if($img!=1){
      ?>
        <a href="<?php echo site_url();?>products/image360up/<?php echo $newimagesproducts['id'];?>">
          <span class="glyphicon glyphicon-arrow-up"></span>
        </a>
        
      <?php
    }
  ?>

  <?php
    if($img!=$ALL_IMAGES){
      ?>
        <a href="<?php echo site_url();?>products/image360down/<?php echo $newimagesproducts['id'];?>">
          <span class="glyphicon glyphicon-arrow-down"></span>
        </a>
      <?php
    }
  ?>)
</div>

            <?php
        endforeach;

    ?>

<div class="clear"></div>



 <div class="form-group field-news-hidden">



<br>

<div class="form-group">

<button type="submit" class="btn btn-success">Изменить данные о товаре</button>    

</form>

</div>


</div>

</div>

</div>

</div>

    <?php 
	$this->load->view('adminpanel/adminfooter');
?>