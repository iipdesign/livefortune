<?php get_header(); ?>
<div class="wrapbox" style="overflow:hidden;">
  <div class="container">
     <!-- パンクズ出力 -->
     <?php get_template_part("include/breadcrumb"); ?>
    <!-- パンクズ出力 -->

    <h3 class="category_ttl">カテゴリー：『<?php echo get_the_date("Y年n月"); ?>』の記事一覧</h3>
    <div class="wrap">
      <div class="colum">
        <div class="row">
          <div class="col-lg-8 col-12">
            <div class="row">
              <?php
                // 1件目取得用
                $i = 0;
                // 1ページ目取得用

                $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                $get_year = get_query_var( 'year' );
                $get_month = get_query_var('monthnum');

                echo "日付". $get_year ." / " . $get_month;

                $posts = get_posts(array(
                  'date_query' => array(
                    array(
                      'year'  => '2023',
                      'month' => '1',
                    ),
                  ),
                  'posts_per_page' => 5, // 表示する件数
                  'orderby' => 'date', // 日付でソート
                  'order' => 'DESC', // DESCで最新から表示、ASCで最古から表示
                  'post_type' => array('post', 'animal'),
                  'paged' => $paged,
                ));
                if ($posts) :
                  foreach ($posts as $post) : ?>
                      <?php
                      $pid = get_the_ID();
                      // アイキャッチ画像
                      if (has_post_thumbnail()) {
                        $thumbnail_url = get_the_post_thumbnail_url($pid, 'middle');
                      } else {
                        $thumbnail_url = get_template_directory_uri(). "/img/image.jpg";
                      }
                      ?>
                      <!-- ↓ sponlyに横幅いっぱいにしたり、角丸をやめるstyleがあたっているので必要かどうか判断 -->
                      <div class="col-12 sponly">

                        <div class="card">
                          <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>">
                          </a>
                          <div class="card-body">
                            <div class="card-bottom___02">
                              <?php
                                $categories = get_the_category();
                                if ($categories): ?>
                                  <?php foreach ($categories as $category): ?>
                                    <a href="<?php echo get_tag_link($category->term_id); ?>"
                                       class="btn btn-primary"><?php echo $category->name; ?></a>
                                  <?php endforeach; ?>
                                <?php endif; ?>
                              <p class="colum_day"><?php the_time('Y年m月d日'); ?></p>
                            </div>
                            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                          </div>
                        </div>
                      </div>
      
                      <?php get_template_part("include/postlist"); // 投稿一覧用パネル ?>
              
                    <?php
                  endforeach;
                endif;
                wp_reset_postdata();
              ?>
            </div>

            <!-- ページネーション -->
            <?php get_template_part("include/pagination"); ?>
            　<!-- ページネーション -->
          </div>
        </div>
      </div>
      <?php get_sidebar(); ?>
    </div><!-- /content__inner -->
  </div>
<?php get_footer(); ?>

