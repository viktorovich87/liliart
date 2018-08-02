/**
 * Created by happy_yar on 20.12.13.
 */

$(document).ready(function () {

 /*$(document).ready(function() {
    $('.carousel').carousel({
      interval: 6000
    })
  });*/

$(".subcategoryName").keyup(function() {
      subcategoryName = $(this).val();
      //alert(ID);
       $.ajax({
        type: "POST", // Тип запроса
        url: "../admin/subcategoryName/", // Путь к сценарию, обработающему запрос
        data: "subcategoryName=" + subcategoryName,  //Строка POST-запроса
        //dataType : "html",  
        error: function () {  // Обработчик, который будет запущен в случае неудачного запроса
          alert( "При выполнении запроса произошла ошибка :(" );  // Сообщение о неудачном запросе
        },
        success: function (data) {
          $('#search').html(data);
           } 
      });
      
  });



$(".subcategoryParentName").keyup(function() {
      subcategoryParentName = $(this).val();
      //alert(ID);
       $.ajax({
        type: "POST", // Тип запроса
        url: "../admin/subcategoryParentName/", // Путь к сценарию, обработающему запрос
        data: "subcategoryParentName=" + subcategoryParentName,  //Строка POST-запроса
        //dataType : "html",  
        error: function () {  // Обработчик, который будет запущен в случае неудачного запроса
          alert( "При выполнении запроса произошла ошибка :(" );  // Сообщение о неудачном запросе
        },
        success: function (data) {
          $('#search').html(data);
           } 
      });
      
  });




  $(".checkbox").click(function(){
    ID = this.id;
    //alert(ID);

    if ($(this).is(':checked') ) {
        $("#print-Orders tr#order"+ID).css("display","table-row");
      }
      else{
        $("#print-Orders tr#order"+ID).css("display","none");
      }



    if ($(".checkbox").is(':checked') ) {
        $("#print").css("display","block");
        $("#printTable").css("display","block");
        
      }
      else{
        $("#print").css("display","none");
      }

  });


});
function delSubcategories(a,b){

if(confirm("Вы действительно хотите удалить эту подкатегорию? "))
  {

    window.location = b+"admin/delSubcategories/"+a;
  }
else
  {
  return false;
  }
}

function delCategory(a,b){

if(confirm("Вы действительно хотите удалить эту категорию?"))
  {

    window.location = b+"admin/delCategory/"+a;
  }
else
  {
  return false;
  }
}

 function delLogo(a){
  

  if(confirm("Удаляем логотип?"))
  {

  $.ajax({
  
        type: "POST", // Тип запроса
        url: "../options/delLogo/", // Путь к сценарию, обработающему запрос
        data: "asd=asd",  //Строка POST-запроса
        //dataType : "html",  
        error: function () {  // Обработчик, который будет запущен в случае неудачного запроса
          alert( "При выполнении запроса произошла ошибка :(" );  // Сообщение о неудачном запросе
        },
        success: function (data) {
        //  $('#search').html(data);
     window.location = a+"options/visual";
    // alert("прошло");
           } 
      });
  }
else
  {
  return false;
  }


 
 }
function delImageProduct(a,b){

if(confirm("Вы действительно хотите удалить эту картинку?"))
  {

    window.location = b+"admin/delImageProduct/"+a;
  }
else
  {
  return false;
  }
}



function delCategoryImage(a,b){

if(confirm("Вы действительно хотите удалить эту картинку?"))
  {

    window.location = b+"admin/delCategoryImage/"+a;
  }
else
  {
  return false;
  }
}


function delOrder(a,b){

if(confirm("Вы действительно хотите удалить этот заказ?"))
  {

    window.location = b+"admin/delOrder/"+a;
  }
else
  {
  return false;
  }
}

function delImageSlider(a,b){

if(confirm("Вы действительно хотите удалить этот слайд?"))
  {

    window.location = b+"admin/delImageSlider/"+a;
  }
else
  {
  return false;
  }
}


function delProduct(a,b){

if(confirm("Вы действительно хотите удалить этот продукт?"))
  {

    window.location = b+"admin/delProduct/"+a;
  }
else
  {
  return false;
  }
}


function chngeEmail(FORM){

var NEWEMAIL = FORM.newEmail.value;
var PASS = FORM.pass.value;
var HIDDENID = FORM.hiddenId.value;
var HIDDENPASS = FORM.hiddenPass.value;

  jQuery(function () {
       $.ajax({
        type: "POST", 
        url: "admin/chngeEmail/", 
       data: "NEWEMAIL="+NEWEMAIL+"&PASS="+PASS+"&HIDDENID="+HIDDENID+"&HIDDENPASS="+HIDDENPASS, 
        
        error: function () {  
          //
        },
        success: function (dataA) {

      if (dataA=="Верно") {
            document.getElementById("formChangeUserEmail").submit();
            $('#error-box1').text("Email изменен");
      };
      if (dataA=="Данный email занят") {
             $('#error-box1').text("Данный email занят");
      };
      if (dataA=="Введен неверный пароль") {
             $('#error-box1').text("Введен неверный пароль");
      };
      
          } 
       });
     });
}   


function chngePass(FORM){

var NEWPASS = FORM.newPass.value;
var NEWPASS2 = FORM.newPass2.value;
var PASS = FORM.pass.value;
var ID = FORM.hiddenId.value;

  jQuery(function () {
       $.ajax({
        type: "POST", 
        url: "admin/chngePass/", 
       data: "NEWPASS="+NEWPASS+"&NEWPASS2="+NEWPASS2+"&PASS="+PASS+"&ID="+ID, 
        
        error: function () {  
          //
        },
        success: function (dataA) {

      if (dataA=="Верно") {
            document.getElementById("formChangeUserPass").submit();
            $('#error-box2').text("Пароль изменен");
      };
      if (dataA=="Пароли не совпадают") {
             $('#error-box2').text("Пароли не совпадают. Попробуйте снова");
      };
       
          } 
       });
     });
}
