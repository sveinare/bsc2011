<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><? wp_title('&laquo;', true, 'right'); ?> <? bloginfo('name'); ?></title>

    <!-- Loading fonts early -->
    <!--link href="http://fonts.googleapis.com/css?family=Cantarell:regular,italic,bold,bolditalic|Pacifico:regular" rel="stylesheet" type="text/css" /-->
    <!--link rel="stylesheet" href="http://f.fontdeck.com/s/css/uH5+KWQnibDTJRYggGJ9XZLTAgw/gronsund.com/6931.css" type="text/css" /-->
	<link rel="stylesheet" type="text/css" media="all" href="<? bloginfo('template_url'); ?>/Caviar-Dreams-fontfacekit/stylesheet.css" charset="utf-8"/>

	<link rel="stylesheet" type="text/css" media="all" href="<? bloginfo('template_url'); ?>/reset.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<? bloginfo('stylesheet_url'); ?>" />

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

	<!--
	<link rel="stylesheet" type="text/css" media="all" href="<? bloginfo('template_url'); ?>/qTip/jquery.qtip.min.css" charset="utf-8"/>
	<script type="text/javascript" src="<? bloginfo('template_url'); ?>/qTip/jquery.qtip.pack.js"></script>
	-->

	<!--script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAAaDDZieMAUcVDAHPh2--0NhSXB-9S_gVtDrZNl_HXsJX98kH4GBQLo4OPmdxVDyHGF41khT2p13t-8g"></script-->
	<!--script type="text/javascript" src="<? bloginfo('template_url'); ?>/google_calendar.js"></script-->

	<script type="text/javascript">

		WebFontConfig = {
        	google: { families: [ 'Cantarell:regular,italic,bold,bolditalic', 'Pacifico:regular' ] },
        	active: function() {
		    	// Do some adjustments
		    	adjustMenues();
  			},
      	};
      	(function() {
	        var wf = document.createElement('script');
	        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
	            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	        wf.type = 'text/javascript';
	        wf.async = 'true';
	        var s = document.getElementsByTagName('script')[0];
	        s.parentNode.insertBefore(wf, s);
      	})();
      

	function adjustMenues() {

	}

	jQuery.noConflict();
	(function($) { 
	  	$(function() {

			//return false;
			/*$("#header_wrapper li").hover(
			function () {
				if (!$(this).hasClass("current_page_ancestor") && !$(this).hasClass("current_page_item")) {
					$(this).children("ul").show();
				}
			},function () {
				if (!$(this).hasClass("current_page_ancestor") && !$(this).hasClass("current_page_item")) {
					$(this).children("ul").hide();
				}
			});*/
			
			var menu_1st_level = false;
			var menu_1st_level_padding = 8;
			var menu_1st_level_width = 0;
			$("#header_wrapper #main_menu > ul > li").each(function (i) {
				if ($(this).hasClass("current_page_ancestor") || $(this).hasClass("current_page_item")) {
					if ($(this).children("ul").size()) {
						menu_1st_level = true;
					}
				}
				menu_1st_level_width = Math.max(menu_1st_level_width, $(this).width());
			});
			if (menu_1st_level) {
				$("#header_wrapper #main_menu > ul > li").each(function (i) {
					if (!$(this).hasClass("current_page_ancestor") && !$(this).hasClass("current_page_item")) {
						$(this).addClass("menu_normal");
					} else {
						$(this).addClass("menu_selected");
						$(this).children("ul").first().addClass("active").css("left", (menu_1st_level_width + 4*menu_1st_level_padding)+"px").show();
					}
				});
			}
			
			var menu_2nd_level = false;
			var menu_2nd_level_width = 0;
			$("#header_wrapper #main_menu > ul > li > ul > li").each(function (i) {
				if ($(this).hasClass("current_page_ancestor") || $(this).hasClass("current_page_item")) {
					if ($(this).children("ul").size()) {
						menu_2nd_level = true;
					}
				}
				menu_2nd_level_width = Math.max(menu_2nd_level_width, $(this).width());
			});
			if (menu_2nd_level) {
				$("#header_wrapper #main_menu > ul > li > ul > li").each(function (i) {
					$(this).width(menu_2nd_level_width + menu_1st_level_padding);
					if (!$(this).hasClass("current_page_ancestor") && !$(this).hasClass("current_page_item")) {
						$(this).addClass("menu_normal");
					} else {
						$(this).addClass("menu_selected");
						$(this).children("ul").first().addClass("active").css("left", (menu_2nd_level_width + 4*menu_1st_level_padding)+"px").show();
					}
				});
			}
			
			// qTip tests
			/*var qTipShared = {
				position: {
					my: 'top left',
					at: 'center'
				},
				style: {
					//tip: true,
					classes: 'ui-tooltip-shadow ui-tooltip-plain'
				}
			};
			$('.event_title').qtip($.extend({}, qTipShared, {
   				content: 'Mer om hendelsen kan stå her...'
			}));*/
			

            // Let all PDF-links have some styling
            jQuery("a[href$=.pdf]").addClass("pdf");			
            
            
            function preloadImage(i, left, top, url) {
                // Insert preloaded image after it finishes loading
                $('<img />')
                    .attr('class', 'bubble')
                    .attr('src', '<? bloginfo('template_url'); ?>/images/boble'+i+'.png')
                    .attr('style', 'left:'+left+'px;top:'+top+'px;')
                    .load(function(){
                        $(this).appendTo('#footer_rookie_wrapper').wrap('<a href="'+url+'"/>').hide();
                    });            
            }
            
            preloadImage(1, -94, -64, "http://gronsund.com/wp/kursaktiviteter/kurs/nybegynnerkurs/#1");
            preloadImage(2, 45, -68, "http://gronsund.com/wp/kursaktiviteter/kurs/nybegynnerkurs/#2");
            preloadImage(3, -64, 32, "http://gronsund.com/wp/kursaktiviteter/kurs/nybegynnerkurs/#3");
            
            $("#footer_rookie").click(function(){
                jQuery("#footer_rookie_wrapper img.bubble").toggle();
            });
            
            // Weekday-fix // SUPER HACK!!!
            $(".gce-list-title").each(function(){
                var dateStr = $(this).html();
                dateStr = dateStr.replace(/Monday/, "Mandag");
                dateStr = dateStr.replace(/Tuesday/, "Tirsdag");
                dateStr = dateStr.replace(/Wednesday/, "Onsdag");
                dateStr = dateStr.replace(/Thursday/, "Torsdag");
                dateStr = dateStr.replace(/Friday/, "Fredag");
                dateStr = dateStr.replace(/Saturday/, "Lørdag");
                dateStr = dateStr.replace(/Sunday/, "Søndag");
                $(this).html(dateStr);
            });

	  	});
	})(jQuery);
	</script>
	<? wp_head(); ?>

    <!-- script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script -->

</head>
<body>
	                
	<div id="pagewrapper">
	
	<div id="header_wrapper">
		<a href="/wp/visitors" id="link_english">ENGLISH</a>
		<div id="searchform_wrapper">
		    <form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
		        <div style="position:relative;height:30px;">
		        	<input type="text" name="s" id="s" style="position:absolute;width:90px;" value="<?php the_search_query(); ?>"/>
		        	<input type="image" src="<? bloginfo('template_url'); ?>/images/knapp_sok.png" value="<?php _e('Search'); ?>" style="position:absolute;left:105px;top:1px;"/>
		        </div>
		    </form>
		</div>
		
	 <? wp_nav_menu(array('theme_location' => 'header-menu','container' => 'div','container_id' => 'main_menu')); ?>  
	</div>

	<div id="content_wrapper">
		<div id="sidebar_wrapper">
		    <!--div id="sidebar_wrapper_p1"></div-->
			<div id="sidebar_wrapper_inner">
				<? get_sidebar(); ?>
			</div>
		    <!--div id="sidebar_wrapper_p2"></div-->
		</div>
		<div id="right_decal"></div>
		<div id="main_wrapper">
