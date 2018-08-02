<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
	
function addProducts(){

	$this->load->view('adminpanel/addproducts');
	
}

function index(){
	$this->db->from("products");
	$this->db->order_by("id", "asc"); 
	$data['products'] = $this->db->get()->result_array();
	
	$this->load->view('adminpanel/products' ,$data);
	
}

private function resize($image, $w_o = false, $h_o = false) {
    if (($w_o < 0) || ($h_o < 0)) {
      echo "Некорректные входные параметры";
      return false;
    }
    list($w_i, $h_i, $type) = getimagesize($image); // Получаем размеры и тип изображения (число)
    $types = array("", "gif", "jpeg", "png"); // Массив с типами изображений
    $ext = $types[$type]; // Зная "числовой" тип изображения, узнаём название типа
    if ($ext) {
      $func = 'imagecreatefrom'.$ext; // Получаем название функции, соответствующую типу, для создания изображения
      $img_i = $func($image); // Создаём дескриптор для работы с исходным изображением
    } else {
      echo 'Некорректное изображение'; // Выводим ошибку, если формат изображения недопустимый
      return false;
    }
    /* Если указать только 1 параметр, то второй подстроится пропорционально */
    if (!$h_o) $h_o = $w_o / ($w_i / $h_i);
    if (!$w_o) $w_o = $h_o / ($h_i / $w_i);
    $img_o = imagecreatetruecolor($w_o, $h_o); // Создаём дескриптор для выходного изображения
	$black = imagecolorallocate($img_o, 0, 0, 0);
	imagecolortransparent($img_o, $black);
    imagecopyresampled($img_o, $img_i, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i); // Переносим изображение из исходного в выходное, масштабируя его
    $func = 'image'.$ext; // Получаем функция для сохранения результата
    return $func($img_o, $image); // Сохраняем изображение в тот же файл, что и исходное, возвращая результат этой операции
  }
function addProductItem(){
	
		$data['name'] = $_POST['name'];
		$data['subcategory'] = $_POST['subcategory'];
		 



	
		$data['price'] = $_POST['price'];
		
		
		$data['description'] = nl2br($_POST['description']);
		$data['descriptionEN'] = nl2br($_POST['descriptionEN']);

		$data['buybutton'] = $_POST['buybutton'];
		//$data['360button'] = $_POST['360button'];


		$this->db->insert('products',$data);
	
		 $latest_id = mysql_insert_id();
		//die;
		//echo $ID; die;
			
			// создание папки и складывания туда изображени для вывода в 360 градусов

			$config['upload_path'] = './uploads/products/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '0';
			$config['max_width'] = '0';
			$config['max_height'] = '0';
			$config['encrypt_name'] = FALSE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$temp_files = $_FILES;
			$count = count ($_FILES['file']['name']);
			$ORDER = 0;
			if ($count >= 1) {
				
				for ($i=0; $i<=$count-1; $i++)
					{
						$ORDER++;
						$_FILES['file'] = array (
						'name'=>$temp_files['file']['name'][$i],
						'type'=>$temp_files['file']['type'][$i],
						'tmp_name'=>$temp_files['file']['tmp_name'][$i],
						'error'=>$temp_files['file']['error'][$i],
						'size'=>$temp_files['file']['size'][$i]);
						
						 $temp_files['file']['name'][$i]."<br>";
						
						$this->upload->do_upload('file');
						$tmp_data = $this->upload->data();

						if($_POST['optimizator']=="yes"){
							$this->resize("./uploads/products/".$temp_files['file']['name'][$i], 800);
						}
						
						
						$IMG['image_name'] = $tmp_data['file_name'];
						$IMG['product_id'] = $latest_id;
						$IMG['order'] = $ORDER;
						
						$this->db->insert('imagesproducts',$IMG);
						
						$files_data[$i]['data'] = $tmp_data['full_path'];
				}

			}
	$empty="";
		  	$this->db->where('image_name',$empty);
		 	$this->db->delete('imagesproducts');

	echo "
			<script language='JavaScript' type='text/javascript'>
				
						<!-- 
						function GoNah(){ 
						location='".site_url('products')."'; 
						} 
						setTimeout( 'GoNah()', 100 ); 
						//--> 
						</script>	
		";
}

function edit($id){
	$data['id'] = $id;
	$this->load->view('adminpanel/editproducts',$data);
}

function editProduct(){
	
		$ID = $_POST['hiddenId'];
		$data['name'] = $_POST['name'];
		//$data['show_type'] = $_POST['show_type'];
		$data['subcategory'] = $_POST['subcategory'];
		
		$arr[]="";
			$this->db->from("imagesproducts");
			$this->db->where("product_id",$_POST['hiddenId']);
		    $result['resultMax'] = $this->db->get()->result_array();
		     foreach ($result['resultMax'] as $newresultMax):
		     		$arr[]=$newresultMax['order'];
		     endforeach;
	
		    //var_dump($result);
		    $MAX =  max($arr);
			


	


	
		$data['price'] = $_POST['price'];
		//$data['productid'] = $_POST['productid'];
		
		$data['description'] = nl2br($_POST['description']);
		$data['descriptionEN'] = nl2br($_POST['descriptionEN']);
		
		
		$data['buybutton'] = $_POST['buybutton'];
		//$data['360button'] = $_POST['360button'];




		$this->db->where('id', $ID);
		$this->db->update('products',$data);
	
			
		/*загрузка фотографий товара для 360*/

			$config['upload_path'] = './uploads/products/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '0';
			$config['max_width'] = '0';
			$config['max_height'] = '0';
			$config['encrypt_name'] = FALSE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$temp_files = $_FILES;
			$count = count ($_FILES['file']['name']);
			//$ORDER = 0;
			for ($i=0; $i<=$count-1; $i++)
				{
					//$ORDER++;
					$_FILES['file'] = array (
					'name'=>$temp_files['file']['name'][$i],
					'type'=>$temp_files['file']['type'][$i],
					'tmp_name'=>$temp_files['file']['tmp_name'][$i],
					'error'=>$temp_files['file']['error'][$i],
					'size'=>$temp_files['file']['size'][$i]);
					
					 $temp_files['file']['name'][$i]."<br>";
					
					$this->upload->do_upload('file');
					$tmp_data = $this->upload->data();
					
					$IMG['image_name'] = $tmp_data['file_name'];
					$IMG['product_id'] = $ID;
					$IMG['order'] = $MAX+1;
					$IMG['type'] = "360";
					$this->db->insert('imagesproducts',$IMG); 
					$files_data[$i]['data'] = $tmp_data['full_path'];
			}

			$empty="";
		  	$this->db->where('image_name',$empty);
		 	$this->db->delete('imagesproducts');
	/*конец загрузка фотографий товара для 360*/


	echo "
			<script language='JavaScript' type='text/javascript'>
				
						<!-- 
						function GoNah(){ 
						location='".$_SERVER['HTTP_REFERER']."'; 
						} 
						setTimeout( 'GoNah()', 100 ); 
						//--> 
						</script>	
		";
}


function addFilesToCarousel(){
		$ID = $_POST['hiddenId'];
		
		$arr[]="";
			$this->db->from("imagesproducts");
			$this->db->where("product_id",$_POST['hiddenId']);
		    $result['resultMax'] = $this->db->get()->result_array();
		     foreach ($result['resultMax'] as $newresultMax):
		     		$arr[]=$newresultMax['order'];
		     endforeach;
	
		    //var_dump($result);
		    $MAX =  max($arr);
	
	

	/*загрузка фотографий товара для слайдера*/

			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '0';
			$config['max_width'] = '0';
			$config['max_height'] = '0';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$temp_files = $_FILES;
			$count = count ($_FILES['file_carousel']['name']);
			//$ORDER = 0;
			for ($i=0; $i<=$count-1; $i++)
				{
					//$ORDER++;
					$_FILES['file_carousel'] = array (
					'name'=>$temp_files['file_carousel']['name'][$i],
					'type'=>$temp_files['file_carousel']['type'][$i],
					'tmp_name'=>$temp_files['file_carousel']['tmp_name'][$i],
					'error'=>$temp_files['file_carousel']['error'][$i],
					'size'=>$temp_files['file_carousel']['size'][$i]);
					
					 $temp_files['file_carousel']['name'][$i]."<br>";
					
					$this->upload->do_upload('file_carousel');
					$tmp_data = $this->upload->data();
					
					$IMG_carousel['image_name'] = $tmp_data['file_name'];
					$IMG_carousel['product_id'] = $ID;
					$IMG_carousel['order'] = $MAX+1;
					$IMG_carousel['type'] = "carousel";
					$this->db->insert('imagesproducts',$IMG_carousel); 
					$files_data[$i]['data'] = $tmp_data['full_path'];
			}

			$empty="";
		  	$this->db->where('image_name',$empty);
		 	$this->db->delete('imagesproducts');
	/*конец загрузка фотографий товара для слайдера*/

	echo "
			<script language='JavaScript' type='text/javascript'>
				
						<!-- 
						function GoNah(){ 
						location='".$_SERVER['HTTP_REFERER']."'; 
						} 
						setTimeout( 'GoNah()', 100 ); 
						//--> 
						</script>	
		";
}

function image360up($ID){

		$this->db->from("imagesproducts");
		$this->db->where("id", $ID); 
		$data['seasons'] = $this->db->get()->result_array();
			foreach ($data['seasons'] as $newseasons):

				 $THIS_LEAGUE_PRIORITY = $newseasons['order'];
				$PRODUCT_ID = $newseasons['product_id'];
				$PRODUCT_NAME = $newseasons['image_name'];


			endforeach;

			//echo $PRODUCT_ID;die;
			$findLeague=0;
			$nextLeaguePriority=0;
			for($i=$THIS_LEAGUE_PRIORITY;$i>=0;$i--){
					$nextPR = $i-1;
					$this->db->from("imagesproducts");
					$this->db->where("order", $nextPR); 
					$this->db->where("product_id", $PRODUCT_ID); 
					$data['seasons'] = $this->db->get()->result_array();
						foreach ($data['seasons'] as $newseasons):
							$nextLeaguePriority = $newseasons['order'];
							$nextLeagueId = $newseasons['id'];
							$nextLeagueName = $newseasons['image_name'];
							$findLeague++;

						endforeach;
						if($findLeague!=0){break;}
			}

			//$THIS_LEAGUE['order'] = $nextLeaguePriority;
			$THIS_LEAGUE['image_name'] = $nextLeagueName;
			$this->db->where('id', $ID);
			$this->db->where("product_id", $PRODUCT_ID); 
			$this->db->update('imagesproducts',$THIS_LEAGUE);
			
			
			//$UP_LEAGUE['order'] = $THIS_LEAGUE_PRIORITY;
			$UP_LEAGUE['image_name'] = $PRODUCT_NAME;
			$this->db->where('id', $nextLeagueId);
			$this->db->where("product_id", $PRODUCT_ID); 
			$this->db->update('imagesproducts',$UP_LEAGUE);
			
			echo "
			<script language='JavaScript' type='text/javascript'>
				
						<!-- 
						function GoNah(){ 
						 location='".site_url("/products/edit/".$PRODUCT_ID)."'; 
						} 
						setTimeout( 'GoNah()', 100 ); 
						//--> 
						</script>	
		";
			
	}


	function image360down($ID){

		$this->db->from("imagesproducts");
		$this->db->where("id", $ID); 
		$data['seasons'] = $this->db->get()->result_array();
			foreach ($data['seasons'] as $newseasons):

				 $THIS_LEAGUE_PRIORITY = $newseasons['order'];
				 $PRODUCT_ID = $newseasons['product_id'];
				 $PRODUCT_NAME = $newseasons['image_name'];

			endforeach;
			$findLeague=0;
			$nextLeaguePriority=0;
			for($i=$THIS_LEAGUE_PRIORITY;$i<=999999;$i++){
					$nextPR = $i+1;
					$this->db->from("imagesproducts");
					$this->db->where("order", $nextPR); 
					$this->db->where("product_id", $PRODUCT_ID); 
					
					$data['seasons'] = $this->db->get()->result_array();
						foreach ($data['seasons'] as $newseasons):
							$nextLeaguePriority = $newseasons['order'];
							$nextLeagueId = $newseasons['id'];
							$nextLeagueName = $newseasons['image_name'];
							$findLeague++;

						endforeach;
						if($findLeague!=0){break;}
			}
			//$THIS_LEAGUE['order'] = $nextLeaguePriority;
			$THIS_LEAGUE['image_name'] = $nextLeagueName;
			$this->db->where('id', $ID);
			$this->db->where("product_id", $PRODUCT_ID); 
			$this->db->update('imagesproducts',$THIS_LEAGUE);
			
			
			//$UP_LEAGUE['order'] = $THIS_LEAGUE_PRIORITY;
			$UP_LEAGUE['image_name'] = $PRODUCT_NAME;
			$this->db->where('id', $nextLeagueId);
			$this->db->where("product_id", $PRODUCT_ID); 
			$this->db->update('imagesproducts',$UP_LEAGUE);
			
			echo "
			<script language='JavaScript' type='text/javascript'>
				
						<!-- 
						function GoNah(){ 
						 location='".site_url("/products/edit/".$PRODUCT_ID)."'; 
						} 
						setTimeout( 'GoNah()', 100 ); 
						//--> 
						</script>	
		";
			
	}



}

