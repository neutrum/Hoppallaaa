<?php /* Smarty version 2.6.26, created on 2010-12-10 14:51:59
         compiled from main.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta name="google-site-verification" content="_lat7y-1Pf_8xqIvvn0N5SKp9WhLKg4wwa01FmWDuyA" />
<title>Hoppallaaa... cafe & bar - Příčna 9, Praha </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name='robots' content='index,follow' />
<meta name='googlebot' content='index,follow,snippet,archive' />
<meta name="keywords" content="Hoppallaaa, Hopala, cafe, bar, Presov, Praha, Prague, Pricna 9 " /> 
<meta neme="description" content="Kavárna s nabídkou alkoholických i nealkoholických nápojů či kávy. Vhodné k pořádání vernisáží.">
<LINK rel="shortcut icon" href="/assets/gfx/favicon.ico" type="image/x-icon">
<link type="text/css" rel="stylesheet" media="all" href="/assets/css/screen.css" />
<link type="text/css" rel="stylesheet" media="all" href="/assets/css/jquery.lightbox.css" />
<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.lightbox.js"></script>
<script type="text/javascript" src="/assets/js/jquery.pngFix.js"></script>
<script type="text/javascript" src="/assets/js/s3Slider.js"></script>
<script type="text/javascript">
<?php echo '

    $(document).ready(function(){ 

        (function ($) {
        if (!$) return;
        $.fn.extend({
            fixPNG: function(sizingMethod, forceBG) {
                    if (!($.browser.msie)) return this;
                    var emptyimg = "/assets/gfx/x.gif"; //Path to empty 1x1px GIF goes here
                    sizingMethod = sizingMethod || "scale"; //sizingMethod, defaults to scale (matches image dimensions)
                    this.each(function() {
                            var isImg = (forceBG) ? false : jQuery.nodeName(this, "img"),
                                    imgname = (isImg) ? this.src : this.currentStyle.backgroundImage,
                                    src = (isImg) ? imgname : imgname.substring(5,imgname.length-2);
                            var currHeight = this.height;
                            var currWidth = this.width;

                            this.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'" + src + "\', sizingMethod=\'" + sizingMethod + "\')";

                            if (isImg) {
                                this.src = emptyimg;
                                this.height = currHeight;
                                this.width = currWidth;
                            }
                            else {
                                this.style.backgroundImage = "url(" + emptyimg + ")";
                            }
                    });
                    return this;
            }
        });
        })(jQuery);
        $(\'.item\').fixPNG(\'scale\',false);
        $(\'.brick\').fixPNG(\'scale\',false);
        $("#content #menu .item").mouseover(function () {
			$(this).animate({opacity: 0.5},\'fast\');
		}).mouseout(function () {
		    $(this).animate({opacity: 1.0}, \'fast\'); 
		});
/*
		$(\'.section-title img\').load(function() {
		    $(this).fadeIn(\'slow\');
		});
		*/
		if ($(\'#homebox\').length) {
            $(\'#homebox\').s3Slider({
                timeOut: 4000
            });
         }
    });
'; ?>
 
</script>
</head>
<body>
		<img id="bg" src="/assets/gfx/paperback3.jpg" />
		<div id="brick_menu"> <img class="brick" src="/assets/gfx/bricks.png" />			</div>
		<div id="content">
			<div id="biomech4"><img src="/assets/gfx/biomech4.png" /></div>
			<div id="biomech3"><img src="/assets/gfx/biomech3.png" /></div>
			<div id="biomech2"><img src="/assets/gfx/biomech2.png" /></div>
			<div id="biomech"><img src="/assets/gfx/header.png" /></div>
			<div id="biomech_bg"><img src="/assets/gfx/header_bg.png" /></div>
			<div id="hopala_label"><img src="/assets/gfx/hop_header2.png" /></div>
			<div id="menu">
				<a href="/"><img  class="item" width="100"  src="/assets/gfx/Home.png" style="margin-left: 20px;"></a>
				<a href="/events"><img  class="item" width="100"  src="/assets/gfx/Akce.png"></a>
				<!-- <a href="/underconstruction"><img  class="item" width="120" src="/assets/gfx/Vernisaze.png" style="margin-left: 10px;"></a> -->
				<a href="/menu"><img class="item"  width="100"  src="/assets/gfx/Menu.png"></a>
                <a href="/gallery"><img  class="item" width="120" src="/assets/gfx/Galerie.png"></a>
				<a href="/contact"><img  class="item" width="110" src="/assets/gfx/Kontakt.png" style="margin-left: 10px;"></a>
			    <iframe src="http://www.facebook.com/plugins/like.php?href=www.hoppallaaa.cz%2F&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>
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
	 <div class="footer">
	 	<img src="/assets/gfx/footer.png">
	 </div>    

			</div>
			
		</div>
</body>
</html>