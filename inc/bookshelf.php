<div class="bookshelf">
<h2><?php _e("Boekenplank"); ?></h2>
<div class="library-background"> 	
	<?php $book_query = new WP_Query('post_type=books&posts_per_page=5');
	  if ($book_query->have_posts()) {
		$i = 0;
		?><ul><?php
		while ($book_query->have_posts()) : $book_query->the_post(); 
		$i++;
		?>		
		<li<?php if ($i == 5) echo " class='last'"; ?>>
		
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'book-thumb' ); ?>
			</a>
			<h4><?php the_title(); ?></h4>
			<?php the_excerpt(); ?>
			<h2 class="subtitle"><?php echo $bauthor; ?></h2>
			<a href="<?php the_permalink(); ?>">
				<?php echo(types_render_field("book-author", array("raw"=>"true"))); ?>
			</a>
		</li>
	<?php endwhile; ?>
	</ul>
	<?php } ?>	
	</div>
</div>