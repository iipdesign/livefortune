<!-- サイドバー -->
<div class="sidebar">
  <div class="col-lg-５ col-12">
    <div class="row mx-0">
      <div class="col-12 card bg-light mx-auto">
        <h3 class="text-center card-header">ランキング</h3>
        <form class="card___body">
          <div class="col-lg-8 col-12">
            <div class="row">
              <?php
                $ranking_num = 1;
                $args = array(
                  'post_type' => 'post', //投稿タイプ
                  'range' => 'last30days', //時間範囲 "last24hours", "last7days", "last30days", "all", "custom"
                  'order_by' => 'views',  //並べ替え "comments", "views", "avg"
                  'limit' => 5, //取得最大数
                );
                $wpp_query = new \WordPressPopularPosts\Query($args);
                $wpp_posts = $wpp_query->get_posts();
                if (is_array($wpp_posts)):
                  foreach ($wpp_posts as $wpp_post):
                    $post_id = $wpp_post->id; // 投稿 ID
                    ?>
                    <?php
                    // アイキャッチ画像
                    if (has_post_thumbnail($post_id)) {
                      $thumbnail_url = get_the_post_thumbnail_url($post_id, 'eyecatch-thumbnails');
                    } else {
                      $thumbnail_url = get_template_directory_uri() . "/img/image.jpg";
                    }
                    ?>
                    <div class="col-sm-6 col-12">
                      <div class="card">
                        <div class="card___left">
                          <span class="flag_new">0<?php echo $ranking_num; ?></span>
                          <a href="<?php echo get_the_permalink($post_id); ?>">
                            <!-- <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo get_the_title($post_id); ?>"> -->
                            <div class="imgWrap">
                            <img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>" >
                            </div>
                          </a>
                        </div>
                        <div class="card___right">
                          <h5 class="card___title"><span><a
                              href="<?php echo get_the_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a></span></h5>
                          <div class="card___bottom">
                            <?php
                              $categories = get_the_category($post_id);
                              if ($categories): ?>
                                <?php foreach ($categories as $category): ?>
                                  <!-- <a href="<?php echo get_tag_link($category->term_id); ?>"
                                     class="btn btn-primary"><?php echo $category->name; ?></a>
                                <?php endforeach; ?>
                              <?php endif; ?>
                            <p class="colum_day"><?php echo get_the_time('Y年m月d日', $post_id); ?></p> -->
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php $ranking_num += 1; ?>
                  <?php endforeach; endif;
                wp_reset_query(); ?>
            </div>
          </div>
        </form>
      </div>
      <div class="col-12">
        <h3 class="text-center tag">タグ</h3>
        <div class="tag_all">
          <?php
            $tags = get_tags();
            foreach ($tags as $tag):
              $tag_name = $tag->name;
              $tag_url = get_tag_link($tag->term_id);
              ?>
              <a href="<?php echo $tag_url; ?>"><?php echo $tag_name; ?></a>
            <?php endforeach; ?>
        </div>
      </div>
<!-- 
      <?php
      $string = wp_get_archives(array(
      'show_post_count' => 1,
      'type' =>  'monthly',
      'echo' => 0
      ));
      echo preg_replace('/<\/a>&nbsp;(\([0-9]*\))/', '</a>', $string);
      ?> -->

      <div class="bnr">
      <a href="https://live-fortune.com//campaign_01"><img class="bnr_img01" src="<?php echo get_template_directory_uri(); ?>/img/bnr01.png" alt="banner"></a>
      <a href="https://live-fortune.com/"><img class="bnr_img02" src="<?php echo get_template_directory_uri(); ?>/img/bnr02.png" alt="banner"></a>
      </div>

    </div>
  </div>
</div>

    <!-- サイドバー -->