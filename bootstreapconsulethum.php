
<?php

/*
4 image pare change 

*/	
$args = array( 'post_type' => 'storie','posts_per_page' => '20');
$the_query = new WP_Query($args);
if ($the_query->have_posts()) :
$counter = 0;
$c =0;
while ($the_query->have_posts()) : $the_query->the_post();
if($counter == 4 ){$class = ' active';}else{ $class='';}
if ($counter % 4 == 0) :
echo $counter > 0 ? "</div></div>" : ""; // close div if it's not the first
echo "<div class='item".$class."'><div class='row'>";
endif;
?>
<div class="col-sm-3">
<?php if ( has_post_thumbnail() ) : ?>
<a class="thumsiz" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
<?php the_post_thumbnail(medium); ?>
</a>
<?php endif; ?>

</div>
<?php
$counter++;
$c++;

endwhile;
endif;
wp_reset_postdata();
?>
