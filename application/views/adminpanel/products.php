   <?php 

	$this->load->view('adminpanel/adminheader');

?>

       

        

<div class="container">

	<ul class="breadcrumb">

<ul class="breadcrumb"><li><a href="<?php echo site_url();?>admin/controlpanel">Главная</a></li>
<li> <a class href="<?php echo site_url();?>products">Товары</a></li>
 
	<a class="add-button" href="<?php echo site_url();?>products/addProducts">Добавить товар</a>

	</ul>            

                   

                    

	  <div class="news-index">



    <h1>Товары</h1>



<!-- <div class="summary">Всего категорий:<b><?php //echo $ALL;?></b>.</div> -->

<table class="table table-striped table-bordered"><thead>

<tr>
<th>№</th>
<th>Наименование</th>
<th>Подкатегория</th>
<th>Краткое описание</th>
<th>Краткое описание EN</th>
<th>Цена</th>
<th>ID товара</th>
<th>Статус</th>
<th class="action-column">Действия</th></tr>


</thead>



<tbody id="search" style="    background: #8fffc1;">







</tbody>

<tbody >





<?php



function getUrl() {

  $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];

  $url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";

  $url .= $_SERVER["REQUEST_URI"];

  return $url;

} 

 $i=0; foreach ($products as $newproducts): $i++;?>



<tr id="news<?php echo $newproducts['id'];?>">

	<td><?php echo $newproducts['id'];?></td>

	<td><?php echo $newproducts['name'];?></td>
	<td><?php 

		$this->db->from("subcategories");
		$this->db->where("id",$newproducts['subcategory']);
        $getSubCatName['getSubCatName'] = $this->db->get()->result_array();

        foreach ($getSubCatName['getSubCatName'] as $newgetSubCatName): 



        $this->db->from("categories");
		$this->db->where("id",$newgetSubCatName['category']);
        $getCatName['getCatName'] = $this->db->get()->result_array();

        foreach ($getCatName['getCatName'] as $newgetCatName): 
        	$CAT_NAME = $newgetCatName['name'];
        endforeach;

			echo $newgetSubCatName['name']." / ".$CAT_NAME;
		 endforeach;  ?></td>
	<td> 
		<?php echo $newproducts['description'];?>
	</td>

<td> 
		<?php echo $newproducts['descriptionEN'];?>
	</td>

<td>
	<?php echo $newproducts['price'];?>
</td>
<td>
	<?php echo $newproducts['productid'];?>
</td>
<td>
	<?php 
		if ($newproducts['visible']==1) {
			echo "<b style='color:#09a510;;'>Имеется в наличии</b>";
		}else{
			echo "<b style='color:#ff0000;'>Отсутствует</b>";
		}
	?>
</td>

	<td>
		<a href="<?php echo site_url();?>products/edit/<?php echo $newproducts['id'];?>" title="Редактировать" aria-label="Редактировать" data-pjax="0">

			<span class="glyphicon glyphicon-pencil"></span>

		</a> 

		<span onclick="delProduct('<?php echo $newproducts['id'];?>','<?php echo site_url();?>')" title="Удалить" style="cursor:pointer;">

			<span class="glyphicon glyphicon-trash"></span>

		</span>

	</td>

</tr>





<?php endforeach;?>





</tbody></table>







</div>

</div>

 </div>

 

 



<?php 

	$this->load->view('adminpanel/adminfooter');

?>

     