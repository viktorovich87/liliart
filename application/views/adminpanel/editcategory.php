   <?php 

	$this->load->view('adminpanel/adminheader');


		$this->db->from("categories");

		$this->db->where("id", $id); 

		$data['category'] = $this->db->get()->result_array();

			foreach ($data['category'] as $newcategory):
					$ID = $newcategory["id"];
					$NAME = $newcategory["name"];
					$EN_NAME = $newcategory["nameEN"];
					$IMG_ONLOAD = $newcategory["img-onload"];
					$IMG_HOVER = $newcategory["img-hover"];
				
			endforeach;

		

		

?>





        

<div class="container">

<ul class="breadcrumb"><li><a href="<?php echo site_url();?>admin/controlpanel">Главная</a></li>

<li><a href="<?php echo site_url();?>categories">Категории</a></li>

<li class="active">Редактировать Категорию</li>
 <a class="add-button" href="<?php echo site_url();?>categories/addCategory">Добавить категорию</a>
</ul>            

            


<div class="news-create">



    <h1>Редактировать Категорию</h1>



    <div class="news-form">



<?php 



	$attributes = array('class' => 'admin-form', 'id' => 'admin-form', 'name' => 'admin-form');

	echo form_open_multipart('categories/editCategory/',$attributes); 



?>

    <div class="form-group field-news-title required">

<label class="control-label" for="news-title">Заголовок</label>

<input type="text" id="news-title" class="form-control" name="name" value="<?php echo $NAME; ?>">
<br>
<label class="control-label" for="news-title">Заголовок (EN)</label>
<input type="text" id="news-title" class="form-control" name="nameEN" value="<?php echo $EN_NAME; ?>">


<div class="help-block"></div>

</div>
<input type="hidden" value="<?php echo $ID;?>" name="hiddenId">



<br>










 








  
  
  
 <div class="form-group field-news-hidden">



<br>

<div class="form-group">

<button type="submit" class="btn btn-success">Изменить категорию</button>    


</form>
</div>

<div class="help-block"></div>

</div>

</div>

</div>

</div>

    <?php 
	$this->load->view('adminpanel/adminfooter');
?>