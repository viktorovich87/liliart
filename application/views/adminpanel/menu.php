<nav id="w1" class="navbar-default navbar-fixed-top navbar" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w1-collapse"><span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span></button>
<a class="navbar-brand" href="<?php echo site_url();?>admin/controlpanel" style="padding:5px;">
<img src="<?php echo site_url();?>resources/images/logo.png" style="    width: 30px;">
</a></div>

<div id="w1-collapse" class="collapse navbar-collapse">
<ul id="w2" class="navbar-nav navbar-left nav">
<!-- Пункт меню Панель управления -->
<li><a href="<?php echo site_url();?>admin/controlpanel">Панель управления</a></li>


<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Категории / подкатегории <b class="caret"></b></a>
<ul id="w2" class="dropdown-menu">

<li><a href="<?php echo site_url();?>categories" class="top">Категории</a></li>

<li><a href="<?php echo site_url();?>subcategories/item" class="top">Подкатегории</a></li>

<li><a href="<?php echo site_url();?>categories/addCategory" class="top">Добавить категорию</a></li>

<li><a href="<?php echo site_url();?>subcategories/addSubcategory" class="top">Добавить подкатегорию</a></li>


</ul>
</li>





<li class="dropdown">
<a class="dropdown-toggle" href="#" data-toggle="dropdown">Товары<b class="caret"></b></a>
<ul id="w3" class="dropdown-menu">

<li><a href="<?php echo site_url();?>products" class="top">Все товары</a></li>            

<li><a href="<?php echo site_url();?>products/addProducts" class="top">Добавить товар</a></li>

</ul>
</li>



<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Слайдер <b class="caret"></b></a>
<ul id="w2" class="dropdown-menu">

<li><a href="<?php echo site_url();?>slider" class="top">Все слайды</a></li>

<li><a href="<?php echo site_url();?>slider/addSlide" class="top">Добавить слайд</a></li>


</ul>
</li>



<li ><a  href="<?php echo site_url();?>orders" >Заказы </a>

</li>
<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Разное <b class="caret"></b></a>
<ul id="w2" class="dropdown-menu">

<li class="dropdown"><a  href="<?php echo site_url();?>contactsadmin">Контакты </a> </li>
<li class="dropdown"><a  href="<?php echo site_url();?>support" >Помощь </a> </li>
<li class="dropdown"><a  href="<?php echo site_url();?>iurinfo" >Юридическая информация </a> </li>
<li class="dropdown"><a  href="<?php echo site_url();?>delivery" >Доставка и оплата </a> </li>
<li class="dropdown"><a  href="<?php echo site_url();?>prebuy" >Странциа предзаказа </a> </li>



</ul>
</li>


<!-- 
<li class="dropdown">
<a class="dropdown-toggle" href="#" data-toggle="dropdown">Разное<b class="caret"></b></a>
<ul id="w3" class="dropdown-menu">
<li><a href="#">Контакты</a></li>

</li> 
</ul>-->

</li>


<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Настройки <b class="caret"></b></a>
<ul id="w2" class="dropdown-menu">

<li><a href="<?php echo site_url();?>options" class="top">Настройки профиля</a></li>

<li><a href="<?php echo site_url();?>options/visual" class="top">Визуализация</a></li>


</ul>
</li>
<li><a class="#" href="<?php echo site_url();?>admin/exitt/">Выход</a></li>
<li><a href="<?php echo site_url();?>" target="_blank">На сайт</a></li>

</ul></div></div></nav>
        