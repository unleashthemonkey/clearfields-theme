<div class="news">
<h2><?php _e("Gezien?"); ?></h2>
<div class="news-background"> 	
	<?php 
$args = array(
  'posts_per_page' => 1,
  'tax_query' => array(
    array(
      'taxonomy' => 'post_format',
      'field' => 'slug',
      'terms' => 'post-format-video'
    )
  )
);
		$videos_query = new WP_Query($args);
	  if ($videos_query->have_posts()) {
		while ($videos_query->have_posts()) : $videos_query->the_post();?> 
			<h4><?php the_title(); ?></h4>
			<?php the_content();?>
			<!-- <a href="<?php the_permalink(); ?>">lees verder</a> -->
	    <?php endwhile; ?>
	</ul>
	<?php } ?>	
	</div>
</div>