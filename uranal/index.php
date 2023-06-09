<?php
  get_header("top");
?>
<title>オンラインzoom専門占い【LIVEフォーチュンブログ】｜恋愛、人間関係などの悩みを解決する占い好きな方のためのメディア</title>
<div class="wrapbox" style="overflow:hidden;">
  <div class="container">
    <div class="wrap">
      <div class="colum">
        <div class="row">
          <?php
            // 1件目取得用
            $i = 0;
            // 1ページ目取得用
            $current_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $posts = get_posts(array(
              'posts_per_page' => 8, // 表示する件数
              'orderby' => 'date', // 日付でソート
              'order' => 'DESC', // DESCで最新から表示、ASCで最古から表示
              'post_type' => array('post', 'animal'),
              'paged' => $paged,
            ));
            if ($posts) :
              foreach ($posts as $post) : ?>
                <?php if (($i == 0) && (!(strpos($current_url, 'page',)))): // 最初の１件目 ?>
                  <?php
                  $pid = get_the_ID();
                  // アイキャッチ画像
                  if (has_post_thumbnail()) {
                    $thumbnail_url = get_the_post_thumbnail_url($pid, 'middle');
                  } else {
                    $thumbnail_url = get_template_directory_uri() . "/img/image.jpg";
                  }
                  ?>
                  <div class="col-12 sponly first">
                    <span class="flag_new">NEW</span>
                    <div class="card">
                      <div class="card-img-top">
                        <a href="<?php the_permalink(); ?>">
                          <div class="bgback">
                            <div class="imgWrap">
                              <img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>"
                                   style="border-radius: 15px 15px 15px 15px;">
                            </div>
                          </div>
                        </a>
                        <div class="card-body firstgrid">
                          <div class="inner">
                            <h5 class="card-title"><span><a
                                  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></h5>
                            <!-- <p class="card-text"><span><?php echo get_the_excerpt() ?></span></p> -->
                          </div>
                          <div class="card-bottom___02">
                            <?php
                              $categories = get_the_category();
                              if ($categories): ?>
                                <?php foreach ($categories as $category): ?>
                                  <a href="<?php echo get_tag_link($category->term_id); ?>"
                                     class="btn btn-primary"><?php echo $category->name; ?></a>
                                <?php endforeach; ?>
                              <?php endif; ?>
                            <p class="colum_day"><?php the_time('Y.m.d'); ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php else: // 2件目以降 ?>
                  <?php get_template_part("include/postlist"); // 投稿一覧用パネル ?>
                <?php endif; ?>
                <?php
                $i++;
              endforeach;
            endif;
            wp_reset_postdata();
          ?>
        </div>
        <!-- ページネーション出力 -->
        <?php get_template_part("include/pagination"); ?>
        <!-- ページネーション出力 -->
      </div>
      <!-- サイドバー -->
      <?php get_sidebar(); ?>
      <!-- サイドバー -->
    </div>
  </div>

  <?php get_footer(); ?>

  <style>
      .firstgrid {
          width: 100%;
      }

      .menu-mobile_wrapper{
      display: none;
  }

      @media only screen and ( max-width: 700px ) {
          .scroll-nav {
              margin-bottom: 20px;
          }

          .container {
              margin-top: -20px;
          }


          .wrap {
              padding: 30px 0 0px;
          }

      }

      @media only screen and ( max-width:500px ) {
          .scroll-nav {
              margin-bottom: 0px;
          }
        }

  </style>