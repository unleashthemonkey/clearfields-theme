<div class="portfolio-overzicht clearfix">	
	<?php $portfolio_query = new WP_Query(array('post_type' => 'portfolios','orderby' => 'menu_order', 'order' => 'ASC'));
	  if ($portfolio_query->have_posts()) {
		while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
		?>		
		<div class="portfolio-item">
			<div class="portfolio-image">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'portfolio-thumb' ); ?>
			</a>
			</div>
			<a href="<?php the_permalink(); ?>">
			<h5><?php the_title(); ?></h5>
			<?php the_excerpt(); ?>
			</a>
			<div class="ster"></div>
		</div>
	<?php endwhile; ?>
	<?php } ?>	
</div>