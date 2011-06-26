<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Oslo Blues Weekend
*/
?>

<!-- start header -->

<HTML>
<HEAD>
<LINK rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<TITLE>Oslo Blues Helg 22.-24. oktober 2010</TITLE>
<!--link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" /-->
<style>

body {
   background-image: url(<? bloginfo('template_url'); ?>/images/BluesHelg1.png);
   color: #FFFFFF;
   background-color: #000000;
   background-repeat: no-repeat;
}

.bodyText {
   position:absolute;
   left:120px;
   top:120px;
   font-family: "Arial", Arial, Sans-serif;
   width:800px;
}

.rightSideImage {
   /*float:right;*/
   margin-right:50px;
   margin-left:50px;
   text-align: center;
}

#footer {
    font-family: "Arial", Arial, Sans-serif;
	font-size:10px;
	color:#DDD;
	text-align:center;
	padding-top:30px;
	padding-bottom:30px;
}

/* Begin Images */
p img {
	padding: 0;
	max-width: 100%;
	}

/*	Using 'class="alignright"' on an image will (who would've
	thought?!) align the image to the right. And using 'class="centered',
	will of course center the image. This is much better than using
	align="center", being much more futureproof (and valid) */

img.centered {
	display: block;
	margin-left: auto;
	margin-right: auto;
	}

img.alignright {
	padding: 4px;
	margin: 0 0 4px 14px;
	display: inline;
	}

img.alignleft {
	padding: 4px;
	margin: 0 14px 4px 0;
	display: inline;
	}

.alignright {
	float: right;
	margin: 0 0 4px 14px;
	}

.alignleft {
	float: left;
	margin: 0 0 4px 14px;
	}
/* End Images */

</style>
</HEAD>
<BODY bgcolor=Black text=White vlink="#DD3300" link="#FF3322">
<DIV class="bodyText">
	<!--DIV class="rightSideImage">
		<img src="img/CathrineOgPC_lite.jpg" alt="Cathrine Og Per-Christian">
	</DIV-->

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<!--h2><?php the_title(); ?></h2-->
	<div class="entry">
		<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	</div>
	<?php endwhile; endif; ?>

	<div id="footer">Arranged by <a href="/">Bårdar Swing Club</a></div>
</DIV>

</BODY>
</HTML>
