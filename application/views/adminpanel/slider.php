   <?php 

	$this->load->view('adminpanel/adminheader');

?>

       

        

<div class="container">

	<ul class="breadcrumb">

<ul class="breadcrumb"><li><a href="<?php echo site_url();?>admin/controlpanel">Главная</a></li>
<li> <a class href="<?php echo site_url();?>slider">Все слайды</a></li>
 
		 <a class="add-button" href="<?php echo site_url();?>slider/addSlide">Добавить слайд</a>

	</ul>            

                   

                    

	  <div class="news-index">



    <h1>Категории</h1>



<!-- <div class="summary">Всего категорий:<b><?php //echo $ALL;?></b>.</div> -->

<table class="table table-striped table-bordered"><thead>

<tr><th>ID</th><th>Картинка </th>

<th>Порядок </th>
<th class="action-column">Действия</th>
</tr>


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

  $ALL_SLIDERS=0;
foreach ($slider as $newcategories):
$ALL_SLIDERS++;
endforeach;

foreach ($slider as $newcategories): $i++;?>



<tr id="news<?php echo $newcategories['id'];?>">

	<td><?php echo $i;?></td>

	

	<td> 
		<img style="max-width:50px;" src="<?php echo site_url();?>uploads/slider/<?php echo $newcategories['image'];?>">
	</td>

<td>
	<?php
		if($i!=1){
			?>
				<a href="<?php echo site_url();?>admin/slideryup/<?php echo $newcategories['id'];?>">
					<span class="glyphicon glyphicon-arrow-up"></span>
				</a>
				
			<?php
		}
	?>

	<?php
		if($i!=$ALL_SLIDERS){
			?>
				<a href="<?php echo site_url();?>admin/sliderdown/<?php echo $newcategories['id'];?>">
					<span class="glyphicon glyphicon-arrow-down"></span>
				</a>
			<?php
		}
	?>
		
			
	</td>

	<td>
		
		<span onclick="delImageSlider('<?php echo $newcategories['id'];?>','<?php echo site_url();?>')" title="Удалить" style="cursor:pointer;">

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

     