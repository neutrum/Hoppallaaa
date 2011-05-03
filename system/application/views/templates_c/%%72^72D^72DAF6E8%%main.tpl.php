<?php /* Smarty version 2.6.26, created on 2010-10-27 16:27:43
         compiled from main.tpl */ ?>
<html>
<head>
<title>[ Hoppallaaa... ]</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link type="text/css" rel="stylesheet" media="all" href="assets/css/screen.css" /> 
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.pngFix.js"></script>
<script type="text/javascript">
<?php echo ' 
    $(document).ready(function(){ 
        $(document).pngFix(); 
        $("#content #menu .item").mouseover(function () {
			$(this).animate({opacity: 0.5},\'fast\');
		}).mouseout(function () {
		    $(this).animate({opacity: 1.0}, \'fast\'); 
		});
    });
'; ?>
 
</script>
</head>
<body>
		<img id="bg" src="assets/gfx/paperback.jpg" />
		<div id="brick_menu"> <img src="assets/gfx/bricks.png" />			</div>
		<div id="content">
			<div id="biomech"><img src="assets/gfx/header.png" /></div>
			<div id="biomech_bg"><img src="assets/gfx/header_bg.png" /></div>
			<div id="hopala_label"><img src="assets/gfx/hop_header.png" /></div>
			<div id="menu">
				<a href="/"><img  class="item" width="100"  src="assets/gfx/Home.png" style="margin-left: 20px;"></a>
				<img  class="item" width="100"  src="assets/gfx/Akce.png">  
				<img  class="item" width="120" src="assets/gfx/Vernisaze.png" style="margin-left: 10px;">
				<img  class="item" width="100"  src="assets/gfx/Menu.png">
                <img  class="item" width="120" src="assets/gfx/Galerie.png">
				<a href="/contact"><img  class="item" width="110" src="assets/gfx/Kontakt.png" style="margin-left: 10px;"></a>
			</div>	 
			<div id="inner_content">
				<div class="top-left-corner">
<div class="top-left-inside">&bull;</div>

</div>


<div class="top-right-corner">
<div class="top-right-inside">&bull;</div>

</div>

<div class="box-contents">
	 <div id="strongalpha">
				<?php echo $this->_tpl_vars['content']; ?>

		  </div>    
</div>
			</div>
			
		</div>
</body>
</html>