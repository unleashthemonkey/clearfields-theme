<div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
    
    <?php $profile_query = new WP_Query(array('post_type' => 'profile','orderby' => 'menu_order', 'order' => 'ASC'));
	if ($profile_query->have_posts()) {
		$slideCount = 1;
		while ($profile_query->have_posts()) : $profile_query->the_post();?>
        
        <img src="<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); $thumburl = $thumb['0']; echo($thumburl); ?>"
			data-thumb="<?php echo(types_render_field("profile-thumb-cf", array("raw"=>"true"))); ?>"
			alt="<?php the_title(); ?>"
			title="#htmlcaption<?php echo($slideCount); $slideCount++;?>" />
		<?php endwhile; ?>
	<?php } ?>
	
    </div>
    
	<?php if ($profile_query->have_posts()) {
			$slideCount = 1;
			while ($profile_query->have_posts()) : $profile_query->the_post();?>

	<div id="htmlcaption<?php echo($slideCount); $slideCount++;?>" class="nivo-html-caption">		
        <?php the_content(); ?>
    </div>
    
   <?php endwhile; ?>
   <?php } ?>
</div>