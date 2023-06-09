<p class="thumbnail_img"><?php
  $pid = get_the_ID();
  // アイキャッチ画像
  if (has_post_thumbnail()) {
    $thumbnail_url = get_the_post_thumbnail_url($pid, 'full');
  } else {
    $thumbnail_url = get_template_directory_uri(). "/img/image.jpg";
  }
?></p>
<div class="col-sm-6 col-12">
  <div class="card">
    <div class="card-img-top">
      <a href="<?php the_permalink(); ?>">
              <!-- <div class="imgWrap">
             <?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?> 
                 -->
                       <div class="imgWrap">
                          <!-- <img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>" >  -->
                            <p class="thumbnail_img"><?php echo get_the_post_thumbnail( $post, array( 1200,300 )); ?></p>
                            
                       </div>           
            <!-- </div>  -->
      </a>
    </div>
    <div class="card-body">
      <div class="inner">
          <h5 class="card-title"><span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></h5>
          <p class="card-text"><span><?php echo get_the_excerpt(); ?></span></p>
      </div>
      <div class="card-bottom">
        <?php
          $categories = get_the_category();
          if ( $categories ): ?>
          <?php foreach ( $categories as $category ): ?>
              <a href="<?php echo get_tag_link($category->term_id);?>" class="btn btn-primary"><?php echo $category->name;?></a>
          <?php endforeach; ?>
        <?php endif; ?>
        <p class="colum_day"><?php the_time('Y.m.d'); ?></p>
      </div>
    </div>
  </div>
</div>