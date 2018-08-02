<ul class="megamenu skyblue">
<?php 	 $active_menu = $this->session->userdata('active_menu'); ?>

			<li class="<?php if($active_menu=="home"){ ?>active<?php } ?> grid"><a class="color1" href="<?php echo site_url();?>">Главная</a></li>
			
			<?php
				$this->db->from("categories"); 
				$this->db->order_by("priority","asc");   
				$getCategories['getCategories'] = $this->db->get()->result_array();
				 foreach ($getCategories['getCategories'] as $newgetCategories):
						
				?>
			<li class="<?php if($active_menu==$newgetCategories['id']){ ?>active<?php } ?> grid"><a class="color2" href="<?php echo site_url();?>category/item/<?php echo $newgetCategories['id'];?>"><?php echo $newgetCategories['name'];?></a>
				<div class="megapanel">
					<div class="row">
						
						<div class="col1">
							<div class="h_nav">
								<h4><?php echo $newgetCategories['name'];?></h4>
								<ul>
								<?php
				$this->db->from("subcategories"); 
				$this->db->where("category",$newgetCategories['id']); 
				$getSubCategories['getSubCategories'] = $this->db->get()->result_array();
				 foreach ($getSubCategories['getSubCategories'] as $newgetSubCategories):
						
				?>
									<li><a href="<?php echo site_url();?>subcategory/item/<?php echo $newgetSubCategories['id'];?>"><?php echo $newgetSubCategories['name'];?></a></li>
				<?php endforeach; ?>		
									
								</ul>	
							</div>							
						</div>
						
					</div>
					
    				</div>
			</li>
			
				
	<?php endforeach; ?>				
								
			
							
			
				
		 </ul> 