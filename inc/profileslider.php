<div class="wrapper">
<div id="ei-slider" class="ei-slider">
    <ul class="ei-slider-large">
    
    <?php $profile_query = new WP_Query(array('post_type' => 'profile','orderby' => 'menu_order', 'order' => 'ASC'));
	if ($profile_query->have_posts()) {
		while ($profile_query->have_posts()) : $profile_query->the_post();	?>
			<li>
				<img src="<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$thumburl = $thumb['0'];			
				echo($thumburl); ?>"
				alt="<?php the_title(); ?>">
				<div class="ei-title">
					<h3><?php the_title(); ?></h3>
					<h2><?php echo(types_render_field("job-title", array("raw"=>"true"))); ?></h2>
				</div>
			</li>
		<?php endwhile; ?>
	<?php } ?>	

    </ul>
    <ul class="ei-slider-thumbs">
    <li class="ei-slider-element">Current</li>
    <?php if ($profile_query->have_posts()) {
		while ($profile_query->have_posts()) : $profile_query->the_post();	?>
			<li>
				<a href="#"><?php the_title(); ?></a>
				<img src="
				<?php echo(types_render_field("profile-thumb-cf", array("raw"=>"true"))); ?>
				" alt="<?php the_title(); ?>" />
			</li>
		<?php endwhile; ?>
	<?php } ?>
    </ul>
</div>
</div>