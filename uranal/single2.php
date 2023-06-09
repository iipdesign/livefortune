
<?php
get_header();
?>

    <!-- パンクズ出力 -->
    <?php get_template_part("include/breadcrumb"); ?>
    <!-- パンクズ出力 -->
	
    <div class="container">
      <div class="wrap">
        <div class="colum">
      <div class="row">
	        	            
  

        <div class="col-lg-8 col-12">
          <div class="row">
          
          </div>
        </div> 
      </div>

			<div class="single_wrap">
					<section>
						<?php while (have_posts()) : the_post(); ?>
							<p class="title"><?php the_title(); ?></p>
							<p class="colum_day"><?php the_time('Y年m月d日'); ?></p>
							<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post, array( 800,300 )); ?></a>
							<?php the_content(); ?>
						<?php endwhile; ?>
					</section>
			</div>



			
	<!-- 該当タグ出力 -->
			<div class="o-tags"><?php the_tags('',' '); ?></div>
	<!-- 該当タグ出力 -->

<!-- この記事を書いたライター-->
<a href="<?php echo get_bloginfo('url'); ?>/author" style="text-decoration: none;">
<div class="writer">
			<h3>この記事を書いたライター</h3>
			<div class="inner">
				<div class="left">
					<img src="<?php echo get_template_directory_uri(); ?>/img/writer.png" alt="">	
				</div>
				<div class="right">
					<h4>ウラナールブログ編集部</h4>
					<p>ウラナールブログ編集部は、恋愛・人間関係などの悩みにこたえ、今よりもっと幸せになるためのヒントや情報を発信しています。</p>
				</div>
			</div>
</div>
</a>
<!-- この記事を書いたライター-->

<div class="sns">
		<div class="sns-icon fb">
			<img src="<?php echo get_template_directory_uri(); ?>/img/fb.png" alt="">	
		</div>
		<div class="sns-icon tw">
			<img src="<?php echo get_template_directory_uri(); ?>/img/tw.png" alt="">	
		</div>
		<div class="sns-icon line">
			<img src="<?php echo get_template_directory_uri(); ?>/img/line.png" alt="">	
		</div>
</div>

<!-- おすすめ記事 -->
<div class="recommend">
			<h3>こんな記事もおすすめ</h3>
				<?php
			$post_id = get_the_ID(); // 投稿のIDを取得
			$categories = get_the_category($post_id); // 投稿のカテゴリーを取得
			$cat_ids = []; // カテゴリーIDを格納するための空の配列を用意

			foreach ($categories as $category) :
			array_push($cat_ids, $category->term_id); // 用意した空配列にカテゴリーIDを格納
			endforeach;

			$args = [
			'post_type' => 'post', // 投稿タイプを指定
			'posts_per_page' => '3', // 表示する記事数を指定
			'category__in' => $cat_ids, // カテゴリーIDを指定
			'post__not_in' => [$post_id] // 現在の投稿を除外
			];

			$related_cats_query = new WP_Query($args);
			?>

			<div class="related-posts">
			<?php if ($related_cats_query->have_posts()) : ?>
				<ul>
				<?php while ($related_cats_query->have_posts()) : $related_cats_query->the_post(); ?>
					<li>
					<!-- <a href="<?php the_permalink(); ?>"> -->
						<div class="card-leff">
								<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post, array( 800,300 )); ?></a>
						</div>
						<div class="card-right">
									<?php the_title(); ?>
									<div class="inner">
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
					</a>
					</li>
				<?php endwhile; ?>
				
				</ul>
			<?php else : ?>
				<p>関連記事はありません。</p>
			<?php
			endif;
			wp_reset_postdata(); ?>
			</div>
<!-- おすすめ記事 -->
</div>
    </div>

	<?php get_sidebar(); ?>

</div>
    </div>
   
    <section>
    </div>

	

  </div>


    </div><!-- /content__inner -->
  </div>
<?php get_footer(); ?>