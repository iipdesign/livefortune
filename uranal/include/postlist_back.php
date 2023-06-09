<?php
  $pid = get_the_ID();
  // アイキャッチ画像
  if (has_post_thumbnail()) {
    $thumbnail_url = get_the_post_thumbnail_url($pid, 'middle');
  } else {
    $thumbnail_url = get_template_directory_uri(). "/img/image.jpg";
  }
?>
<div class="col-sm-6 col-12">
  <div class="card">
    <div class="card-img-top">
      <a href="<?php the_permalink(); ?>">
        <img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>">
      </a>
    </div>
    <div class="card-body">
      <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
      <p class="card-text"><?php echo get_the_excerpt(); ?></p>
      <div class="card-bottom">
        <?php
          $categories = get_the_category();
          if ( $categories ): ?>
          <?php foreach ( $categories as $category ): ?>
              <a href="<?php echo get_tag_link($category->term_id);?>" class="btn btn-primary"><?php echo $category->name;?></a>
          <?php endforeach; ?>
        <?php endif; ?>
        <p class="colum_day"><?php the_time('Y年m月d日'); ?></p>
      </div>
    </div>
  </div>
</div>