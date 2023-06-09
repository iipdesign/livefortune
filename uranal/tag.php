<?php get_header(); ?>
<div class="wrapbox" style="overflow:hidden;">
  <div class="container">
    <!-- パンクズ出力 -->
    <?php get_template_part("include/breadcrumb"); ?>
    <!-- パンクズ出力 -->

    <h3 class="category_ttl">タグ：<?php single_cat_title(); ?>に関する記事一覧</h3>
    <div class="wrap">
      <div class="colum">
        <div class="row">
          <div class="col-lg-8 col-12">
            <div class="row">
              <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;


                $categories= get_the_category();
                $category_id= $categories[0]->cat_ID;

                $posts = get_posts(array(
                  'category'		=> $category_id,
                  'posts_per_page' => 5, // 表示する件数
                  'orderby' => 'date', // 日付でソート
                  'order' => 'DESC', // DESCで最新から表示、ASCで最古から表示
                  'post_type' => array('post', 'animal'),
                  'paged' => $paged,
                ));
                if ($posts) :
                  foreach ($posts as $post) : ?>
             
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