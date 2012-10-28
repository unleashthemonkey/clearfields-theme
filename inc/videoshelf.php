<div class="gezien">
<div class="videos">
	 	
<?php
$video_query = new WP_Query(array ('post_type' => 'videos','posts_per_page' => 0));
  if ($video_query->have_posts()) {
echo "have posts" ;
<?php } ?>


</div>
</div>