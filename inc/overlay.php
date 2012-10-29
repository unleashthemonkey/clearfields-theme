<div class="thumb-gallery clearfix">
    <?php
    if (is_page('Dit zijn wij')) {
    $overlay_category = 'ditzijnwij';
    } elseif (is_page('Alumni')) {
	$overlay_category = 'alumni';
    }
    $profile_query = new WP_Query(array('post_type' => 'profile','profile-category' => $overlay_category,'orderby' => 'menu_order', 'order' => 'ASC'));
	if ($profile_query->have_posts()) {
		$slideCount = 1;
		while ($profile_query->have_posts()) : $profile_query->the_post();?>
        <div id="thumb-<?php echo($slideCount); ?>" class="profile-item" rel="#profile-<?php echo($slideCount); $slideCount++;?>">
        <img
        	src="<?php echo(types_render_field("profile-thumb-cf", array("raw"=>"true"))); ?>"
        	alt="<?php the_title(); ?>"
        />
        <h5><?php the_title(); ?></h5>
        <h6><?php echo(types_render_field("job-title", array("raw"=>"true"))); ?></h6>
        </div>
		<?php endwhile; ?>
	<?php } ?>
</div>
    
<?php if ($profile_query->have_posts()) {
	$slideCount = 1;
	while ($profile_query->have_posts()) : $profile_query->the_post();?>

	<div id="profile-<?php echo($slideCount); $slideCount++;?>" class="overlay" style="background-image:url(<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); $thumburl = $thumb['0']; echo($thumburl); ?>);">	
    <a class="close"></a>
    <p><?php echo(types_render_field("profile-quote", array("raw"=>"true"))); ?></p>
    <h6><?php the_title(); ?></h6>
    <div class="social">
	    <p>
	    <a href="<?php echo(types_render_field("profile-twitter", array("raw"=>"true"))); ?>" target="_blank"><img src="<?php bloginfo('template_url') ?>/images/twit.png" width="18" height="18" alt="Twitter"/></a>
	    <a href="<?php echo(types_render_field("profile-linkedin", array("raw"=>"true"))); ?>" target="_blank"><img src="<?php bloginfo('template_url') ?>/images/linkedin.png" width="18" height="18" alt="LinkedIn"/></a>
	    <p>
    </div>
    </div>
   <?php endwhile; ?>
   <?php } ?>