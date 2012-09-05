<div id="login">
<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Basecamp' ) ) ); ?>">login</a>
</div>
<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<input type="text" size="20" name="s" id="s" value="Write your search and hit Enter" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
<input type="submit" id="searchsubmit" value="zoek"/>
</form>