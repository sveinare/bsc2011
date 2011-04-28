<?php
/**
 * @package WordPress
 */
?>
<!-- begin sidebar -->
<div id="menu">

<ul>
 <li id="search">
   <form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
	<div style="position:relative;height:30px;">
		<input type="text" name="s" id="s" style="position:absolute;width:90px;" value="<?= $_GET['s'] ?>"/>
		<input type="image" src="<? bloginfo('template_url'); ?>/images/knapp_sok.png" value="<?php _e('Search'); ?>" style="position:absolute;left:105px;top:1px;"/>
	</div>
	</form>
 </li>

 <li>
 	<ul id="event_list">
 		<li>
 			<span class="event_date">Tirsdag 26/04</span><br/>
 			<span class="event_time">19:00</span><span class="event_title">Lindy Hop - Nybegynner</span><br/>
 			<span class="event_time">19:00</span><span class="event_title">Lindy Hop - Øvet</span><br/>
 			<span class="event_time">20:30</span><span class="event_title">Dans!</span><br/>
 		</li>
 		<li>
 			<span class="event_date">Onsdag 27/04</span><br/>
 			<span class="event_time">19:00</span><span class="event_title">Boogie Woogie - Litt øvet</span><br/>
 			<span class="event_time">20:30</span><span class="event_title">Boogie Woogie - Øvet</span><br/>
 		</li>
 	</ul>
 </li>
</ul>

</div>
<!-- end sidebar -->
