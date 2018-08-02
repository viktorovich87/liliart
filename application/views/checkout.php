<?php  $this->load->view('header'); 
$sessionID = $this->session->userdata('sessionID');
if(!isset($sessionID) or $sessionID=="" or empty($sessionID)){
$chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP"; 
$max=25; 
$size=StrLen($chars)-1; 
$password=null; 

    while($max--) 
    $password.=$chars[rand(0,$size)]; 

$newdata = array(
                   'sessionID'  => $password,
                   'logged_in' => TRUE
               );

    $this->session->set_userdata($newdata);
  
}
$SUMM_PRICE =0;
				$COUNT =0;
if($sessionID){
				$this->db->from("cart");
				$this->db->where("sessionID",$sessionID);
				$getCartProducts['getCartProducts'] = $this->db->get()->result_array();
				foreach ($getCartProducts['getCartProducts'] as $newgetCartProducts):
					$SUMM_PRICE = $newgetCartProducts['price']*$newgetCartProducts['count'] + $SUMM_PRICE;	
					$COUNT++;
				endforeach;
			}
			?>	
<div class="container">
	<div class="check">	 
			 <div class="col-md-3 cart-total">
			 <a class="continue" href="#">Продолжить покупки</a>
			 <div class="price-details">
				 <h3>Детали покупок</h3>
				 <span>Всего</span>
				 <span class="total1"><?php echo $SUMM_PRICE;?></span>
				 <span>Товаров (шт.)</span>
				 <span class="total1"><?php echo $COUNT;?></span>
				 <span>Доставка (7%)</span>
				 <span class="total1"><?php echo $delivery = $SUMM_PRICE*7/100;?></span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>Всего</h4></li>	
			   <li class="last_price"><span><?php echo $delivery+$SUMM_PRICE;?></span></li>
			   <div class="clearfix"> </div>
			 </ul>
			
			 
			 <div class="clearfix"></div>
			 <a class="order" href="#">Оформить заказ и оплатить</a>
			 <div class="total-item">
				
				 <p><a href="<?php echo site_url();?>register">Авторизируйтесь</a> или <a href="<?php echo site_url();?>register">зарегистрируйтесь</a></p>
			 </div>
			</div>
		 <div class="col-md-9 cart-items">
			 <h1>Моя корзина (<?php echo $COUNT;?>)</h1>
				<?php 
					if($sessionID){
				$this->db->from("cart");
				$this->db->where("sessionID",$sessionID);
				$getCartProducts['getCartProducts'] = $this->db->get()->result_array();
				foreach ($getCartProducts['getCartProducts'] as $newgetCartProducts):
					$SUMM_PRICE = $newgetCartProducts['price']*$newgetCartProducts['count'] + $SUMM_PRICE;	
					$COUNT++;
								$this->db->from("products");							
								$this->db->where("id",$newgetCartProducts['tovarid']); 
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
										
										$this->db->from("subcategories"); 									
										$this->db->where("id",$newgetProductItem['subcategory']); 
										$getSubCategoryName['getSubCategoryName'] = $this->db->get()->result_array();
										foreach ($getSubCategoryName['getSubCategoryName'] as $newgetSubCategoryName):
											 $SubCategoryName = $newgetSubCategoryName['name'];
											 
												$this->db->from("categories"); 									
												$this->db->where("id",$newgetSubCategoryName['category']); 
												$getCategoryName['getCategoryName'] = $this->db->get()->result_array();
												foreach ($getCategoryName['getCategoryName'] as $newgetCategoryName):
													 $CategoryName = $newgetCategoryName['name'];
												endforeach; 
										endforeach; 
								endforeach; 
					?>
				 <div class="cart-header" id="<?php echo $newgetProductItem['id'];?>">
					 <div class="close1 delete-checkout-item" tovarid="<?php echo $newgetProductItem['id'];?>"> </div>
					 <div class="cart-sec simpleCart_shelfItem">
							<div class="cart-item cyc">
								 <img src="<?php echo site_url();?>uploads/products/<?php echo $image;?>" class="img-responsive" alt=""/>
							</div>
						   <div class="cart-item-info">
							<h3><a href="#"><?php echo $newgetProductItem['name'];?></a><span><?php echo $CategoryName;?> / <?php echo $SubCategoryName;?></span></h3>
							<ul class="qty">
								<li><p>Кол-во : 5</p></li>
								<li><p>Размер : 1</p></li>
							</ul>
							
								 <div class="delivery">
								 <p>Service Charges : Rs.100.00</p>
								 <span>Delivered in 2-3 bussiness days</span>
								 <div class="clearfix"></div>
							</div>	
						   </div>
						   <div class="clearfix"></div>
												
					  </div>
				 </div>		
					<?php
				endforeach;
			}
				?>
			
				
		 </div>
		 
		
			<div class="clearfix"> </div>
	 </div>
	 </div>
<?php  $this->load->view('footer'); ?>	