<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><? wp_title('&laquo;', true, 'right'); ?> <? bloginfo('name'); ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="<? bloginfo('template_url'); ?>/reset.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<? bloginfo('stylesheet_url'); ?>" />

	<link rel="stylesheet" type="text/css" media="all" href="<? bloginfo('template_url'); ?>/Caviar-Dreams-fontfacekit/stylesheet.css" charset="utf-8"/>

	<!--script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAAaDDZieMAUcVDAHPh2--0NhSXB-9S_gVtDrZNl_HXsJX98kH4GBQLo4OPmdxVDyHGF41khT2p13t-8g"></script-->
	<!--script type="text/javascript" src="<? bloginfo('template_url'); ?>/google_calendar.js"></script-->

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" media="all" href="<? bloginfo('template_url'); ?>/qTip/jquery.qtip.min.css" charset="utf-8"/>
	<script type="text/javascript" src="<? bloginfo('template_url'); ?>/qTip/jquery.qtip.pack.js"></script>

	<script type="text/javascript">
	
	jQuery.noConflict();
	(function($) { 
	  	$(function() {

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
			var qTipShared = {
				position: {
					my: 'top left',
					at: 'center'
				},
				style: {
					/*tip: true,*/
					classes: 'ui-tooltip-shadow ui-tooltip-plain'
				}
			};
			$('.event_title').qtip($.extend({}, qTipShared, {
   				content: 'Mer om hendelsen kan stå her...'
			}));
			

	  	});
	})(jQuery);
	</script>
	<? wp_head(); ?>
</head>
<body>
	                
	<div id="pagewrapper">
	
	<div id="header_wrapper">
		<a href="/wp/visitors" id="link_english">ENGLISH</a>
	 <? wp_nav_menu(array('theme_location' => 'header-menu','container' => 'div','container_id' => 'main_menu')); ?>  
	</div>

	<div id="content_wrapper">
		<div id="sidebar_wrapper">
			<div id="sidebar_wrapper_inner">
				<? get_sidebar(); ?>
			</div>
		</div>
		<div id="main_wrapper">
