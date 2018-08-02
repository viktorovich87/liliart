<?php  $this->load->view('header'); ?>	
<div class="arriv">
	<div class="container">
	
	<?php
				$countProductsItem = 0;
				$boxStyle="";
				$this->db->from("categories"); 
				$this->db->order_by("priority","asc");   
				$getCategories['getCategories'] = $this->db->get()->result_array();
				//var_dump($getCategories['getCategories']);
				foreach ($getCategories['getCategories'] as $newgetCategories):
						
						$countProductsItem++;
						switch ($countProductsItem) {
						  case '1': $boxStyle="margin-left:0px;";  break;
						  case '2': $boxStyle=""; break;
						  case '3': $boxStyle="margin-right:0px;"; break;
						  
						  //default: $countProductsItem=0; break;
						}
						$this->db->from("subcategories"); 
						$this->db->where("category",$newgetCategories['id']); 
						$this->db->order_by('rand()');	
						$this->db->limit(1);
						$getSubCategories['getSubCategories'] = $this->db->get()->result_array();
						 foreach ($getSubCategories['getSubCategories'] as $newgetSubCategories):
								
								$this->db->from("products");
								$this->db->order_by('rand()');	
								$this->db->limit(1);							
								$this->db->where("subcategory",$newgetSubCategories['id']); 
								$getProductItem['getProductItem'] = $this->db->get()->result_array();
									foreach ($getProductItem['getProductItem'] as $newgetProductItem):
										$image="";
										$this->db->from("imagesproducts"); 
										$this->db->order_by('rand()');										
										$this->db->where("product_id",$newgetProductItem['id']); 
										$this->db->limit(1);
										$getProductItemImage['getProductItemImage'] = $this->db->get()->result_array();
										foreach ($getProductItemImage['getProductItemImage'] as $newgetProductItemImage):
											$image = $newgetProductItemImage['image_name'];
										endforeach; 
								
						?>
									<div class="col-md-4 " 
												style="background:url('<?php echo site_url();?>uploads/products/<?php echo $image;?>');    
												min-height: 400px;
												<?php echo $boxStyle;?>
												background-size: cover;">
										
										<div class="arriv-info">
											<h3><?php echo $newgetCategories['name'];?></h3>
											<p>Описание</p>
											<div class="crt-btn">
												<a href="<?php echo site_url();?>category/item/<?php echo $newgetCategories['id'];?>">Посмотреть</a>
											</div>
										</div>
									</div>
				<?php 				endforeach; 
						endforeach;
						if($countProductsItem>=3){$countProductsItem=0;}
				endforeach;?>
			
		
	</div>
</div>
<div class="special">
	<div class="container">
		<h3>Специальные предложения</h3>
		<div class="specia-top">
			<ul class="grid_2">
		<li>
				<a href="details.html"><img src="<?php echo site_url();?>resources/images/8.jpg" class="img-responsive" alt=""></a>
				<div class="special-info grid_1 simpleCart_shelfItem">
					<h5>Lorem ipsum dolor</h5>
					<div class="item_add"><span class="item_price"><h6>ONLY $40.00</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
				</div>
		</li>
		<li>
				<a href="details.html"><img src="<?php echo site_url();?>resources/images/9.jpg" class="img-responsive" alt=""></a>
				<div class="special-info grid_1 simpleCart_shelfItem">
					<h5>Consectetur adipis</h5>
					<div class="item_add"><span class="item_price"><h6>ONLY $60.00</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
			</div>
		</li>
		<li>
				<a href="details.html"><img src="<?php echo site_url();?>resources/images/10.jpg" class="img-responsive" alt=""></a>
				<div class="special-info grid_1 simpleCart_shelfItem">
					<h5>Commodo consequat</h5>
					<div class="item_add"><span class="item_price"><h6>ONLY $14.00</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
			</div>
		</li>
		<li>
				<a href="details.html"><img src="<?php echo site_url();?>resources/images/11.jpg" class="img-responsive" alt=""></a>
				<div class="special-info grid_1 simpleCart_shelfItem">
					<h5>Voluptate velit</h5>
					<div class="item_add"><span class="item_price"><h6>ONLY $37.00</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
				</div>
		</li>
		<div class="clearfix"> </div>
	</ul>
		</div>
	</div>
</div>
<?php  $this->load->view('footer'); ?>	