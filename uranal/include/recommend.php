
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
			'posts_per_page' => '5', // 表示する記事数を指定
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
								<!-- <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post, array( 800,300 )); ?></a> -->						
								<!-- <?php if ( has_post_thumbnail() ): ?> -->

								<p><?php echo get_the_post_thumbnail( $post, array( 1200,300 )); ?></p> 
								<?php else: ?>
								<img src="<?php echo get_template_directory_uri(); ?>/img/image.jpg" alt="Default Images">
								<?php endif; ?>
						</div>
						<div class="card-right">
									<p class="title"><?php the_title(); ?></p>
									<div class="inner">
									<div class="categorybx">
											<p class="category_recommend"><?php
											$categories = get_the_category();
											if ( $categories ): ?>
											<?php foreach ( $categories as $category ): ?>
												<a href="<?php echo get_tag_link($category->term_id);?>" class="btn btn-primary"><?php echo $category->name;?></a>
											<?php endforeach; ?>
											<?php endif; ?></p>
												<p class="colum_day"><?php the_time('Y年m月d日'); ?></p>
									</div>
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