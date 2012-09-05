<div id="login">
<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Basecamp' ) ) ); ?>">login</a>
</div>
<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<input type="text" size="20" name="s" id="s" value="Write your search and hit Enter" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
<input type="submit" id="searchsubmit" value="zoek"/>
</form>
<div id="twithome">
<a href="http://twitter.com/clearfields">
<img alt="twitter" src="<?php bloginfo('template_url'); ?>/images/<?php twitpic(); ?>" style="height:18px; width:18px;">
</a>
<?php
function twitpic(){
	if ( is_front_page() ) {
		echo "twit.png";
	} else {
		echo "twit-black.png";
	}
}
?>
</div>