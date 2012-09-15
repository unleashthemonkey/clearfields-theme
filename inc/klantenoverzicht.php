<div class="klanten-overzicht">	
	<?php $klanten_query = new WP_Query(array('post_type' => 'klanten','orderby' => 'menu_order', 'order' => 'ASC'));
	  if ($klanten_query->have_posts()) {
		while ($klanten_query->have_posts()) : $klanten_query->the_post();
		?>		
		<div class="klant clearfix">
		<div class="klant-thumb">
			<a href="<?php echo(types_render_field("klant-url", array("raw"=>"true"))); ?>">
				<?php the_post_thumbnail( 'klant-thumb' ); ?>
			</a>
		</div>
		<div class="klant-content">
			<a href="<?php echo(types_render_field("klant-url", array("raw"=>"true"))); ?>">
			<?php the_title(); ?>
			</a>
			<?php the_content(); ?>
		</div>
		</div>
	<?php endwhile; ?>
	<?php } ?>	
</div>