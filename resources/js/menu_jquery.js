$( document ).ready(function() {
	
	
$('.delete-checkout-item').click(function() {
	if (confirm("Вы действительно хотите удалить из корзины товар?")) { 
		var TOVAR_ID = $(this).attr('tovarid'); 
		jQuery(function () {
									$.ajax({
										type: "POST",	
										url: "../main/delItemInToCart",	
										data: "TOVAR_ID=" + TOVAR_ID ,	 
										
										error: function () {	
											alert( "Что-то пошло не так :(" );
										},
										success: function (dataA) {
											//alert(a);
											$(".cart-header#"+TOVAR_ID).fadeOut("slow");
											$('#cart').html(dataA);
											 } 
									});
							});
		
	} 
	
});	
	
$('#cssmenu > ul > li > a').click(function() {
  $('#cssmenu li').removeClass('active');
  $(this).closest('li').addClass('active');	
  var checkElement = $(this).next();
  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
    $(this).closest('li').removeClass('active');
    checkElement.slideUp('normal');
  }
  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
    $('#cssmenu ul ul:visible').slideUp('normal');
    checkElement.slideDown('normal');
  }
  if($(this).closest('li').find('ul').children().length == 0) {
    return true;
  } else {
    return false;	
  }		
});


$(".add-to-cart").click(function() {
	        var PRICE = $(this).attr("price");
			var PROD_ID = $(this).attr("prod_id");
			//alert("Добавлено в корзину" + PRICE + " / " +PROD_ID);
			
			jQuery(function () {
									$.ajax({
										type: "POST",	
										url: "../../main/addtocart",	
										data: "PRICE=" + PRICE + "&PROD_ID=" + PROD_ID,	 
										
										error: function () {	
											alert( "Что-то пошло не так :(" );
										},
										success: function (dataA) {
											//alert(a);
											$('#cart').html(dataA);

											 } 
									});
							});

$(this).css("display","none");
$("#added"+PROD_ID).addClass("added");
		 })
		 
		 
$('#login').click(function() {
	
	var email = $( "#email" ).val();
	var password = $( "#password" ).val();
			
			$.ajax({
				type: "POST",	
				url: "http://cristina.ssv-design.ru/main/enterCab/",	
				data: "email=" + email+"&password="+password,	
				//dataType : "html",	
				error: function () {	
					alert( "При выполнении запроса произошла ошибка :(" );	
				},
				success: function (data) {
					//$('#loadPlayersBody').html(data);
					$('#spinner').addClass('show-spinner');
					$('#error-box').text('');
					function func() {
					  if(data == "login"){
						  location.reload();
						}else{
							$('#error-box').text('Логин и/или пароль не верные');
						}
						$('#spinner').removeClass('show-spinner');
					}

					setTimeout(func, 1500);
					
					 } 
			});
			
			
});

});


// Login Form
$(function() {
    var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButton').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});