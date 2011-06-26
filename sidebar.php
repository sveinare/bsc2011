<?php
/**
 * @package WordPress
 */
?>
<!-- begin sidebar -->
<ul id="event_list">
	<?php if ( !function_exists('dynamic_sidebar')
	        || !dynamic_sidebar('sidebar1') ) : ?>
	<li>
		<div class="event_date">Tirsdag 26/4</div>
		<div class="event_item"><span class="event_time">19.00</span><span class="event_title">Lindy Hop - Nybegynner</span></div>
		<div class="event_item"><span class="event_time">19.00</span><span class="event_title">Lindy Hop - Øvet</span></div>
		<div class="event_item"><span class="event_time">20.30</span><span class="event_title">Dans!</span></div>
	</li>
	<li>
		<div class="event_date">Onsdag 27/4</div>
		<div class="event_item"><span class="event_time">19.00</span><span class="event_title">Boogie Woogie - Litt øvet</span></div>
		<div class="event_item"><span class="event_time">20.30</span><span class="event_title">Boogie Woogie - Øvet</span></div>
	</li>
	<?php endif; ?>
	<li><a href="<? bloginfo('url'); ?>/terminliste/" class="calendar_link">Se hele kalenderen</a></li>
	<!--li>
        <div id="footer_rookie_wrapper"><img src="<? bloginfo('template_url'); ?>/images/nybegynnerknappen3.png" id="footer_rookie" /></div>
	</li-->
    <?php if ( !function_exists('dynamic_sidebar')
            || !dynamic_sidebar('sidebar2') ) : ?>
	<?php endif; ?>
</ul>


<!--div id="twitter_message">
    <a href="http://twitter.com/bardarswingclub" target="_blank" class="birdy"></a>
    <ul class="inner" id="twitter_update_list"></ul>
</div-->


<!-- end sidebar -->
