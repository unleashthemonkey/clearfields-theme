<div class="news">
<h2><?php _e("Nieuws en archief"); ?></h2>
<div class="news-background"> 	
	<?php $news_query = new WP_Query('post_type=post&category_name=nieuws&posts_per_page=1');
	  if ($news_query->have_posts()) {
		while ($news_query->have_posts()) : $news_query->the_post();?> 
			<h4><?php the_title(); ?></h4>
			<?php the_content();?>
			<a href="<?php the_permalink(); ?>">lees verder</a>
	    <?php endwhile; ?>
	</ul>
	<?php } ?>	
	</div>
</div>