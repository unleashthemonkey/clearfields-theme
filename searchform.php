<div id="login">
	<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Basecamp' ) ) ); ?>">log in</a>
</div>
<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
	<input type="text" size="20" name="s" id="s" value=""/>
	<input type="submit" id="searchsubmit" value="zoek"/>
</form>
<div id="twithome">
	<a href="http://twitter.com/clearfields">
	<img alt="twitter" src="<?php bloginfo('template_url'); ?>/images/<?php twitpic(); ?>" style="height:18px; width:18px;">
	</a>
</div>