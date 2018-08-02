   <?php 

	$this->load->view('adminpanel/adminheader');

?>     

        <?php  echo $loggedUserID = $this->session->userdata('username'); 
        if(!$loggedUserID){

  echo " <script language='JavaScript' type='text/javascript'> 
            <!-- 
            function GoNah(){ 
             location='".site_url()."'; 
            } 
            setTimeout( 'GoNah()', 100 ); 
            //--> 
            </script> 
        ";die;
}
            ?>




<?php 
  $this->db->from("users");
  $this->db->where("user_id", $loggedUserID);
        $getUser['getUser'] = $this->db->get()->result_array();

        foreach ($getUser['getUser'] as $user): 
           $NAME = $user['user_name'];
           $EMAIL = $user['user_email'];
           $PASS = $user['user_password'];
        endforeach;  
?>



<div class="container">

	<ul class="breadcrumb">

<ul class="breadcrumb"><li><a href="<?php echo site_url();?>admin/controlpanel">Главная</a></li>
<li> <a class href="#">Настройки</a></li>
 
	

	</ul>            

                   

                    

	  <div class="news-index">



    <h1>Настройки</h1>



<!-- <div class="summary">Всего категорий:<b><?php //echo $ALL;?></b>.</div> -->

<div class="site-content" style="padding-top: 0px; ">
 
        <div class="div_second_menu">           
      </div>

      <div class="div_line"></div>
      <div class="clear"></div>     


<div class="container register">
      
    
        <div><h3>Личные данные</h3></div>
        <div class="modal-body">
            <p><label>ФИО:    </label><?php echo " ".$NAME ?></p>
            <p><label>E-mail: </label><?php echo " ".$EMAIL ?></p>

        </div>

    <div><h3>Изменить E-mail</h3></div>
    <?php 
               $attributes = array('class' => 'form', 'id' => 'formChangeUserEmail');
               echo form_open('admin/changeAdminEmail/', $attributes);
               ?>
              <div class="modal-body">
     
                  <div id="error-box1" style='color:#ff0000;margin-left:20px;'></div>

                  <label>Новый email</label>
                             <input type="email" placeholder="Новый email" name="newEmail" class="form-control"><br/>

                  <label>Введите пароль</label>
                             <input type="password" placeholder="Введите пароль" name="pass" class="form-control">
                             <input type="hidden" value="<?php echo $loggedUserID; ?>" name="hiddenId" class="form-control">
                             <input type="hidden" value="<?php echo $PASS; ?>" name="hiddenPass" class="form-control"><br/>

                  <button type="button" class="btn btn-primary" onclick="chngeEmail(this.form);">Изменить</button>
              </div>
    </form>








    <div><h3>Изменить пароль</h3></div>
    <?php 
               $attributes = array('class' => 'form', 'id' => 'formChangeUserPass');
               echo form_open('admin/changeAdminPass/', $attributes);
               ?>
              <div class="modal-body">

                  <div id="error-box2" style='color:#ff0000; margin-left:20px;'></div>

                  
                  <label>Новый пароль</label>
                             <input type="password" placeholder="Ваш пароль" name="newPass" class="form-control"><br/>
                             <p id="result"></p>
                             
                  <label>Повторите новый пароль</label>
                             <input type="password" placeholder="Повторите пароль" name="newPass2" class="form-control"><br/>

                  <label>Старый пароль</label>
                             <input type="password" placeholder="Повторите пароль" name="pass" class="form-control">
                             <input type="hidden" value="<?php echo $loggedUserID; ?>" name="hiddenId" class="form-control"><br/>

                             
    <button type="button" class="btn btn-primary" onclick="chngePass(this.form);">Изменить</button>


              </div>
              </form>


</div>




</div>

</div>

 </div>

 

 



<?php 

	$this->load->view('adminpanel/adminfooter');

?>

     