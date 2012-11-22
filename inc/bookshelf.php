<div class="bookshelf">
<?php if ( !is_single()&!is_archive()){ $maxbooks = 4;?>
<h2><?php _e("Boekenplank"); ?></h2>
<?php } ?>
<div class="library-background" >
	 	
	<?php
	if ( is_single()){
		$maxbooks = 0;
	}
	$book_query = new WP_Query(array ('post_type' => 'books','posts_per_page' => $maxbooks));
	  if ($book_query->have_posts()) {
		$i = 0;
		?><ul><?php
		while ($book_query->have_posts()) : $book_query->the_post(); 
		$i++;
		?>		
		<li<?php if (($i == 4)|($i == 8)) echo " class='last'"; ?>>
		
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'book-thumb' ); ?>
			</a>
			<h4><?php the_title(); ?></h4>
			<?php if ( is_page_template('prikbord.php')){
			 the_excerpt(); 
			}?>
			<a href="<?php the_permalink(); ?>">
				<?php echo(types_render_field("book-author", array("raw"=>"true"))); ?>
			</a>
		</li>
	<?php endwhile; ?>
	</ul>
	<?php } ?>	
	</div>
	<!-- Print a link to this category -->
	<a class="archive-link" href="<?php $booksarchive = get_post_type_archive_link( 'books' ) ; echo esc_url( $booksarchive ); ?>" title="Nieuws">boeken archief</a>
</div>