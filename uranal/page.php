<?php 
get_header(); ?>

  <!-- パンクズリスト -->
  <div class="header_title">
    <?php if(function_exists('bcn_display')) { bcn_display(); }?>
  </div>
  <!-- パンクズリスト -->
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>



<?php
get_footer();
