<div id="slider-gallery">

<div id="menu" class="clearfix">
<ul>
<?php $profile_query = new WP_Query(array('post_type' => 'profile','orderby' => 'menu_order', 'order' => 'ASC'));
	if ($profile_query->have_posts()) {
		while ($profile_query->have_posts()) : $profile_query->the_post();	?>
			<li class="menuItem"><a href="">
			<img src="<?php echo(types_render_field("profile-thumb-cf", array("raw"=>"true"))); ?>"
			alt="<?php the_title(); ?>">
			<h5><?php the_title(); ?></h5>
			<h6><?php echo(types_render_field("job-title", array("raw"=>"true"))); ?></h6>
			</a></li>
		<?php endwhile; ?>
	<?php } ?>	
</ul>

</div>

<div id="slides">
	<?php if ($profile_query->have_posts()) {
		while ($profile_query->have_posts()) : $profile_query->the_post();	?>
			<div class="slide clearfix" style="background: url(
			<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
			$thumburl = $thumb['0'];			
			echo($thumburl); ?>
			) no-repeat;" alt="<?php the_title(); ?>">
				<div class="profile-quote"><?php the_content(); ?></div>
				<div class="namecaption"><h5><?php the_title(); ?></h5></div>
			</div>
		<?php endwhile; ?>
	<?php } ?>
</div>

</div>