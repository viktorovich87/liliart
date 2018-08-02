   <?php 

	$this->load->view('adminpanel/adminheader');

?>

       

        

<div class="container">



<!----   Print ---->

<img src="<?php echo site_url();?>/resources/img/print.png" id="print"  
onClick="javascript:CallPrint('print-Orders');"
style="margin:20px;float: right;width: 50px;display:none;cursor:pointer;">


 <div id="print-Orders" style="display:none;">

 <p> <img src="<?php echo site_url();?>resources/img/logo.png" style="    float: left;
    margin: 3px;
    width: 61px;"></p>
<br>
<h1 style="    text-align: center;
    line-height: 30px;
    margin-bottom: 60px;">Jan Ditor / Распечатка Заказов <small style="font-size:10px;">(<?php echo date("F j, Y"); ?>)</small></h1>
 <table class="table table-striped table-bordered" id="printTable" border="1" style="width:100%;"><thead>

<tr>
<th>№</th>
<th>Имя покупателя</th>
<th>ID Товара</th>
<th>Цена</th>
<th>Кол-во</th>
<th>Телефон</th>
<th>Email</th>
<th>Адресс</th>
<th>Почтовый Индекс</th>
<th>Примечание</th>

<th>Дата</th>
<th>№ трекинга</th>


</tr>


</thead>


<tbody >





<?php

 $i=0; foreach ($orders as $newproducts): $i++;?>



<tr id="order<?php echo $newproducts['id'];?>" style="display:none;">

	<td><?php echo $i;?></td>

	<td><?php 
		$this->db->from("users");
		$this->db->where("user_id",$newproducts['user_id']);
        $getCatName['getCatName'] = $this->db->get()->result_array();

        foreach ($getCatName['getCatName'] as $newgetCatName): 
        	echo $NAME = $newgetCatName['user_name'];
        endforeach;  ?>
    </td>
	<td><?php 
		$this->db->from("products");
		$this->db->where("id",$newproducts['product_id']);
        $getProdName['getProdName'] = $this->db->get()->result_array();

        foreach ($getProdName['getProdName'] as $newgetProdName): 
        	$ProdName = $newgetProdName['name'];
        endforeach;


		$this->db->from("subcategories");
		$this->db->where("id",$newgetProdName['subcategory']);
        $getSubCatName['getSubCatName'] = $this->db->get()->result_array();

        foreach ($getSubCatName['getSubCatName'] as $newgetSubCatName): 

        		$SUB_CAT_NAME = $newgetSubCatName['name'];

        $this->db->from("categories");
		$this->db->where("id",$newgetSubCatName['category']);
        $getCatName['getCatName'] = $this->db->get()->result_array();

        foreach ($getCatName['getCatName'] as $newgetCatName): 
        	$CAT_NAME = $newgetCatName['name'];
        endforeach;

			echo $newgetProdName['productid'];
		 endforeach;  ?></td>
	<td> 
		<?php echo $newproducts['price'];?>
	</td>
    <td> 
        <?php echo $newproducts['count'];?>
    </td>



<td>
	<?php echo $newproducts['yourPhone'];?>
</td>
<td>
	<?php echo $newproducts['yourEmail'];?>
</td>
<td>
<?php echo $newproducts['yourAdres'];?>
</td>
<td>
<?php echo $newproducts['yourPochta'];?>
</td>
<td>
<?php echo $newproducts['yourNote'];?>
</td>


<td>
<?php echo $newproducts['date'];?>
</td>

<td>
<?php echo $newproducts['transportNumber'];?>
</td>

</tr>





<?php endforeach;?>





</tbody></table>
 </div>
<!----  End  Print ---->



	<ul class="breadcrumb">

<ul class="breadcrumb"><li><a href="<?php echo site_url();?>admin/controlpanel">Главная</a></li>
<li> <a class href="<?php echo site_url();?>products">Заказы</a></li>
 
	

	</ul>            

                   

                    

	  <div class="news-index">



    <h1>Заказы</h1>



<!-- <div class="summary">Всего категорий:<b><?php //echo $ALL;?></b>.</div> -->

<table class="table table-striped table-bordered" style="    font-size: 12px;"><thead>

<tr>
<th>№</th>
<th>Имя покупателя</th>
<th>ID Товара</th>
<th>Цена</th>
<th>Кол-во</th>
<th>Телефон</th>
<th>Email</th>
<th>Адресс</th>
<th>Почтовый Индекс</th>
<th>Примечание</th>
<th>Оплата</th>
<th>Дата</th>
<th>№ трекинга</th>
<th>Статус</th>
<th>Действия</th>
<th></th>
</tr>


</thead>


<tbody >





<?php



function getUrl() {

  $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];

  $url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";

  $url .= $_SERVER["REQUEST_URI"];

  return $url;

} 

 $i=0; foreach ($orders as $newproducts): $i++;?>


<?php   echo form_open('orders/transportNumber/'); ?>

<tr id="order<?php echo $newproducts['id'];?>">

	<td><?php echo $i;?><input type="hidden" name="HiddenID" value="<?php echo $newproducts['id'];?>"></td>

	<td><?php 
		$this->db->from("users");
		$this->db->where("user_id",$newproducts['user_id']);
        $getCatName['getCatName'] = $this->db->get()->result_array();

        foreach ($getCatName['getCatName'] as $newgetCatName): 
        	echo $NAME = $newgetCatName['user_name'];
        endforeach;  ?>
    </td>
	<td><?php 
		$this->db->from("products");
		$this->db->where("id",$newproducts['product_id']);
        $getProdName['getProdName'] = $this->db->get()->result_array();

        foreach ($getProdName['getProdName'] as $newgetProdName): 
        	$ProdName = $newgetProdName['name'];
        endforeach;


		$this->db->from("subcategories");
		$this->db->where("id",$newgetProdName['subcategory']);
        $getSubCatName['getSubCatName'] = $this->db->get()->result_array();

        foreach ($getSubCatName['getSubCatName'] as $newgetSubCatName): 

        		$SUB_CAT_NAME = $newgetSubCatName['name'];

        $this->db->from("categories");
		$this->db->where("id",$newgetSubCatName['category']);
        $getCatName['getCatName'] = $this->db->get()->result_array();

        foreach ($getCatName['getCatName'] as $newgetCatName): 
        	$CAT_NAME = $newgetCatName['name'];
        endforeach;

//			echo "ID товара - <b>".$newgetProdName['productid']."</b><br>(".$ProdName." / ".$SUB_CAT_NAME." / ".$CAT_NAME.")";
echo $newgetProdName['productid'];
		 endforeach;  ?></td>
	<td> 
		<?php echo $newproducts['price'];?>
	</td>

 <td> 
        <?php echo $newproducts['count'];?>
    </td>

<td>
	<?php echo $newproducts['yourPhone'];?>
</td>
<td style="    max-width: 60px;
    word-wrap: break-word;">
	<?php echo $newproducts['yourEmail'];?>
</td>
<td>
<?php echo $newproducts['yourAdres'];?>
</td>
<td>
<?php echo $newproducts['yourPochta'];?>
</td>
<td>
<?php echo $newproducts['yourNote'];?>
</td>

<td>
<?php echo $newproducts['oplata'];?>
</td>

<td>
<?php echo $newproducts['date'];?>
</td>

<td>
<input type="text" class="form-control" name="number" style="font-size: 11px;" value="<?php echo $newproducts['transportNumber'];?>" >

</td>

<td>
<?php echo $newproducts['status'];?>
</td>

	<td>
		<input type="submit" class="form-control" value="Save" style="float: left;
    width: 75%;"> 

		<span onclick="delOrder('<?php echo $newproducts['id'];?>','<?php echo site_url();?>')" title="Удалить" 
		style="    cursor: pointer;
    float: right;
    line-height: 36px;">

			<span class="glyphicon glyphicon-trash"></span>

		</span>

	</td>
<th>
	<input type="checkbox" class="checkbox" id="<?php echo $newproducts['id'];?>" style="width: 30px;height: 30px;">
</th>
</form>
</tr>





<?php endforeach;?>





</tbody></table>







</div>

</div>

 </div>

 

 



<?php 

	$this->load->view('adminpanel/adminfooter');

?>

     