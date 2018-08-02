<?php  $this->load->view('header'); ?>	
<!-- content -->
<div class="container">
<div class="main">
	<!-- start registration -->
	<div class="registration">
		<div class="registration_left">
		<h2>Помощь покупателям </span></h2>
		<?php
			$this->db->from("support"); 	 
			$getHelp['getHelp'] = $this->db->get()->result_array();
			foreach ($getHelp['getHelp'] as $newgetHelp):
				 echo $newgetHelp['text'];
			endforeach;
		?>
		
	</div>
	<div class="registration_left">
		
	</div>
	<div class="clearfix"></div>
	</div>
	<!-- end registration -->
</div>
</div>
<?php  $this->load->view('footer'); ?>	