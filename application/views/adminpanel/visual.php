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



    <h1>Настройки отображения</h1>



<!-- <div class="summary">Всего категорий:<b><?php //echo $ALL;?></b>.</div> -->

<div class="site-content" style="padding-top: 0px; ">
 
        <div class="div_second_menu">           
      </div>

      <div class="div_line"></div>
      <div class="clear"></div>     


<div class="container register">
   <?php 
 
    $this->db->from("options");
    $data['enter'] = $this->db->get()->result_array();

    foreach ($data['enter'] as $newenter):
      
    endforeach;
      

               $attributes = array('class' => 'form', 'id' => 'formChangeUserPass');
               echo form_open_multipart('options/changeVisual/', $attributes);
               ?>
              <div class="modal-body">

                  <div class="form-group  required">
                    <label class="control-label" >Логотип</label>
                    <input type="file"  class="form-control" style="width: 94%;" name="logo" >
                   
                    <input type="hidden"  class="form-control" name="Hidelogo"  value="<?php echo $newenter['logo'];?>">
                    <?php
                    if ($newenter['logo']!="") {
                      ?> 
                       <img src="<?php echo site_url();?>uploads/preview/<?php echo $newenter['logo'];?>" style="max-width: 200px;">
                       <a href="#" onclick="delLogo('<?php echo site_url();?>');">Удалить логотип</a><?php
                    }
                    ?>
                   
                  </div>


            <label>Код цвета для фона верхнего меню</label>
                  <input type="text" placeholder="Код цвета для линий меню" name="headerBgColor" value="<?php echo $newenter['headerBgColor'];?>" class="form-control" style="width: 94%;"><br/>

                  <label>Картинка фона для верхнего меню</label>
                 <input type="file"  class="form-control" style="width: 94%;" name="headerBgImage" >

                  <?php
                      if ($newenter['headerBgImage']!="") {
                        ?> 
                        <img src="<?php echo site_url();?>uploads/preview/<?php echo $newenter['headerBgImage'];?>" style="max-width: 200px;">
                    <?php
                      }
                    ?>
                   
                    <input type="hidden"  class="form-control" name="HideheaderBgImage"  value="<?php echo $newenter['headerBgImage'];?>">

                   <div class="form-group  required">
                      <label class="control-label" >Приоритет фона для верхнего меню:</label>
                      <Br>
                <input type="radio" name="headerbg" value="image" <?php  if($newenter['priorityHeader']== "image"){echo "checked";}?>> Картинка<Br>
                <input type="radio" name="headerbg" value="color" <?php  if($newenter['priorityHeader']== "color"){echo "checked";}?>> Цвет<Br>
                </div>


                 <br><br><br>
                 <label>Код цвета описание товара</label>
                  <input type="text" placeholder="Код цвета описание товара" name="productDescriptionColor" value="<?php echo $newenter['productDescriptionColor'];?>" class="form-control" style="width: 94%;"><br/>


                   <label>Код цвета цены товара</label>
                  <input type="text" placeholder="Код цвета цены товара" name="productPriceColor" value="<?php echo $newenter['productPriceColor'];?>" class="form-control" style="width: 94%;"><br/>


                   <label>Код цвета меню категорий</label>
                  <input type="text" placeholder="Код цвета меню категорий" name="menuCategoryColor" value="<?php echo $newenter['menuCategoryColor'];?>" class="form-control" style="width: 94%;"><br/>


                  <label>Код цвета меню подкатегорий</label>
                  <input type="text" placeholder="Код цвета меню подкатегорий" name="menuSubcategoryColor" value="<?php echo $newenter['menuSubcategoryColor'];?>" class="form-control" style="width: 94%;"><br/>

                  <div class="form-group  required">
                    <label class="control-label" >Картинка 360 градусов</label>
                    <input type="file"  class="form-control" style="width: 94%;" name="image360" >
                   
                    <input type="hidden"  class="form-control" name="Hideimage360"  value="<?php echo $newenter['image360'];?>">
                    <?php
                    if ($newenter['image360']!="") {
                      ?> 
                       <img src="<?php echo site_url();?>uploads/preview/<?php echo $newenter['image360'];?>" style="max-width: 200px;">
                     <?php
                    }
                    ?>
                   
                  </div>


                 <br><br><br>

                  <label>Код цвета для меню основных категорий</label>
                  <input type="text" placeholder="Код цвета для меню" name="menuColor" value="<?php echo $newenter['menuColor'];?>" class="form-control" style="width: 94%;"><br/>

                   <label>Код цвета для меню для подкатегорий</label>
                  <input type="text" placeholder="Код цвета для меню" name="secondMenuColor" value="<?php echo $newenter['secondMenuColor'];?>" class="form-control" style="width: 94%;"><br/>
                             
                             
                  <label>Код цвета для линий меню</label>
                  <input type="text" placeholder="Код цвета для линий меню" name="lineColor" value="<?php echo $newenter['lineColor'];?>" class="form-control" style="width: 94%;"><br/>

                  <label>Картинка фона для линий меню</label>
                 <input type="file"  class="form-control" style="width: 94%;" name="lineImage" >

                  <?php
                      if ($newenter['lineImage']!="") {
                        ?> 
                        <img src="<?php echo site_url();?>uploads/preview/<?php echo $newenter['lineImage'];?>" style="max-width: 200px;">
                    <?php
                      }
                    ?>
                   
                    <input type="hidden"  class="form-control" name="HidelineImage"  value="<?php echo $newenter['lineImage'];?>">

                   <div class="form-group  required">
                      <label class="control-label" >Приоритет фона для линий:</label>
                      <Br>
                    <input type="radio" name="line" value="image" <?php  if($newenter['priorityLine']== "image"){echo "checked";}?>> Картинка<Br>
                       <input type="radio" name="line" value="color" <?php  if($newenter['priorityLine']== "color"){echo "checked";}?>> Цвет<Br>
                    </div>

                    

                  <label>Цвет фона сайта</label>
                  <input type="text" placeholder="Цвет фона сайта" name="siteBgColor" value="<?php echo $newenter['siteBgColor'];?>" class="form-control" style="width: 94%;"><br/>

                  

                  <div class="form-group  required">
                    <label>Картинка для фона сайта</label>
                    <input type="file"  class="form-control" style="width: 94%;" name="siteBgImage" >
                    <img src="<?php echo site_url();?>uploads/preview/<?php echo $newenter['siteBgImage'];?>" style="max-width: 200px;">
                    <input type="hidden"  class="form-control" name="HidesiteBgImage"  value="<?php echo $newenter['siteBgImage'];?>">
                    
                  </div>
                  <div class="form-group  required">
                      <label class="control-label" >Приоритет заднего фона</label>
                      <Br>
                    <input type="radio" name="bg" value="image" <?php  if($newenter['priority']== "image"){echo "checked";}?>> Картинка<Br>
                       <input type="radio" name="bg" value="color" <?php  if($newenter['priority']== "color"){echo "checked";}?>> Цвет<Br>
                    </div>


                    <div class="form-group  required">
                      <label class="control-label" >Разрешить изменять кол-во товаров при заказе</label>
                      <Br>
                    <input type="radio" name="cartNumber" value="yes" <?php  if($newenter['cartNumber']== "yes"){echo "checked";}?>> Да<Br>
                       <input type="radio" name="cartNumber" value="no" <?php  if($newenter['cartNumber']== "no"){echo "checked";}?>> Нет<Br>
                    </div>


 <label>Курс доллара ($). </label>
                  <input type="text" placeholder="Курс доллара ($)" name="kurs" value="<?php echo $newenter['kurs'];?>" class="form-control" style="width: 94%;"><br/>

                             
    <button type="submit" class="btn btn-primary"  style="float:none;">Внести изменения</button>


              </div>
              </form>


</div>




</div>

</div>

 </div>

 

 



<?php 

  $this->load->view('adminpanel/adminfooter');

?>

     