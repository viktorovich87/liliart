<?php  $this->load->view('header');

$this->db->from("subcategories"); 
$this->db->where("id",$id); 
$getSubCategoryName['getSubCategoryName'] = $this->db->get()->result_array();
 foreach ($getSubCategoryName['getSubCategoryName'] as $newgetSubCategoryName):
	$subCatName = $newgetSubCategoryName['name'];
 endforeach;
 $count=0;
$this->db->from("products");							
$this->db->where("subcategory",$id); 
$getProductItemCount['getProductItemCount'] = $this->db->get()->result_array();
	foreach ($getProductItemCount['getProductItemCount'] as $newgetProductItemCount):
	$count++;
	 endforeach;
						 ?>	
<div class="container">
<div class="women_main">
	<!-- start sidebar -->
	<?php  $this->load->view('filter_by'); ?>
	<!-- start content -->
	<div class="col-md-9 w_content">
		<div class="women">
			<a href="#"><h4><?php echo $subCatName;?> - <span style="font-size:15px;"><?php echo $count;?> шт</span> </h4></a>
			
		     <div class="clearfix"></div>	
		</div>
		<div class="grids_of_4">
		<!-- grids_of_4 -->
		<?php
		
		
				$countProductsItem = 0;
				$i="";
				
								$this->db->from("products");							
								$this->db->where("subcategory",$id); 
								$getProductItem['getProductItem'] = $this->db->get()->result_array();
									foreach ($getProductItem['getProductItem'] as $newgetProductItem):
										$image="";
										$this->db->from("imagesproducts"); 									
										$this->db->where("product_id",$newgetProductItem['id']);
										$this->db->limit(1);
										$getProductItemImage['getProductItemImage'] = $this->db->get()->result_array();
										foreach ($getProductItemImage['getProductItemImage'] as $newgetProductItemImage):
											 $image = $newgetProductItemImage['image_name'];
										endforeach; 
										$i++
								
						?>
		
		
		  <div class="grid1_of_4">
					<div class="content_box"><a href="<?php echo site_url();?>product/item/<?php echo $newgetProductItem['id'];?>">
						 <img src="<?php echo site_url();?>uploads/products/<?php echo $image;?>" class="img-responsive" alt=""/>
						  </a>
						<h4><a href="<?php echo site_url();?>product/item/<?php echo $newgetProductItem['id'];?>"> <?php echo $newgetProductItem['name'];?></a></h4>
						
						 <div class="grid_1 simpleCart_shelfItem">
						
						 <div class="item_add"><span class="item_price price"><h6><?php echo $newgetProductItem['price'];?> лей</h6></span></div>
						<div class="item_add_to_cart " id="added<?php echo $newgetProductItem['id'];?>">
						<a href="#" class="add-to-cart" price="<?php echo $newgetProductItem['price'];?>" prod_id="<?php echo $newgetProductItem['id'];?>">В корзину</a>
						<a href="#" class="added-to-cart" >Добавлено</a>
						</div>
						 </div>
					</div>
			</div>
			
			<?php 				endforeach; 
			
						if (($i % 4) == 0)
						{ ?>
					<div class="clearfix"></div>
						</div>
					<?php } ?>
			
		<div class="clearfix"></div>
		</div>
		
		
		
		
		
		
		<!-- end grids_of_4 -->
		
		
	</div>
	<div class="clearfix"></div>
	
	<!-- end content -->
</div>
</div>
<?php  $this->load->view('footer'); ?>	