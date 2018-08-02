   <?php 

	$this->load->view('adminpanel/adminheader');

?>

       

        

<div class="container">

	<ul class="breadcrumb">

<ul class="breadcrumb"><li><a href="<?php echo site_url();?>admin/controlpanel">Главная</a></li>
<li> <a class href="<?php echo site_url();?>categories">Категории</a></li>
 
		 <a class="add-button" href="<?php echo site_url();?>categories/addCategory">Добавить категорию</a>

	</ul>            

                   

                    

	  <div class="news-index">



    <h1>Категории</h1>



<!-- <div class="summary">Всего категорий:<b><?php //echo $ALL;?></b>.</div> -->

<table class="table table-striped table-bordered"><thead>

<tr><th>ID</th>
<th>Заголовок</th>
<th>Заголовок (EN)</th>
<th>Порядок</th>
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

 $i=0; 


 $ALL_CATEGORIES=0;
foreach ($categories as $newcategories):
$ALL_CATEGORIES++;
endforeach;

foreach ($categories as $newcategories): $i++;?>



<tr id="news<?php echo $newcategories['id'];?>">

	<td><?php echo $newcategories['id'];?></td>

	<td><?php echo $newcategories['name'];?></td>
	<td><?php echo $newcategories['nameEN'];?></td>

	

<td>
	<?php
		if($i!=1){
			?>
				<a href="<?php echo site_url();?>admin/categoryup/<?php echo $newcategories['id'];?>">
					<span class="glyphicon glyphicon-arrow-up"></span>
				</a>
				
			<?php
		}
	?>

	<?php
		if($i!=$ALL_CATEGORIES){
			?>
				<a href="<?php echo site_url();?>admin/categorydown/<?php echo $newcategories['id'];?>">
					<span class="glyphicon glyphicon-arrow-down"></span>
				</a>
			<?php
		}
	?>
		
			
	</td>



	<td>
		<a href="<?php echo site_url();?>categories/edit/<?php echo $newcategories['id'];?>" title="Редактировать" aria-label="Редактировать" data-pjax="0">

			<span class="glyphicon glyphicon-pencil"></span>

		</a> 

		<span onclick="delCategory('<?php echo $newcategories['id'];?>','<?php echo site_url();?>')" title="Удалить" style="cursor:pointer;">

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

     