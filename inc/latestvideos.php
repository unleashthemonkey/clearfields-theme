<div class="videos">
<h2><?php _e("Gezien?"); ?></h2>
<div class="videos-background"> 	
	<?php 
		$video_query = new WP_Query(array ('post_type' => 'videos','posts_per_page' => 2));
		if ($video_query->have_posts()){
			while ($video_query->have_posts()) : $video_query->the_post();
			$video_type = types_render_field("video-site", array("raw"=>"true"));
					if ($video_type == 2): ?>
						<iframe src="http://player.vimeo.com/video/<?php echo(types_render_field("vimeo-id", array("raw"=>"true"))); ?>?title=1&amp;byline=1&amp;portrait=0&amp;badge=0" width="250" height="166" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					<?php endif;
					if ($video_type == 3): ?>
						<iframe width="250" height="166" src="http://www.youtube.com/embed/<?php echo(types_render_field("youtube-id", array("raw"=>"true"))); ?>?rel=0" frameborder="0" allowfullscreen></iframe>
					<?php endif;
			endwhile;
		}
?>
	</div>

			<!-- Print a link to this archive -->
	<a class="archive-link" href="<?php $videosarchive = get_post_type_archive_link( 'videos' ) ; echo esc_url( $videosarchive ); ?>" title="Nieuws">video archief</a>
</div>