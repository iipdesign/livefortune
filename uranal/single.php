
<?php
get_header();
?>
<div class="wrapbox" style="overflow:hidden;">
   <div class="container">
    <!-- パンクズ出力 -->
    <?php get_template_part("include/breadcrumb"); ?>
    <!-- パンクズ出力 -->

      <div class="wrap">
        <div class="colum">
      <div class="row">
        <div class="col-lg-8 col-12">
          <div class="row">
          
          </div>
        </div> 
      </div>
	<!-- 記事出力 -->
			<div class="single_wrap">
					<section>
						<?php while (have_posts()) : the_post(); ?>
							<p class="title"><?php the_title(); ?></p>
							<p class="colum_day"><?php the_time('Y.m.d'); ?></p>
							<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post, array( 800,300 )); ?></a>
							<!-- <p class="card-text"><?php echo get_the_excerpt() ?></p> -->
							 <?php the_content(); ?> 
						<?php endwhile; ?>
					</section>
	<!-- 記事出力 -->

	<!-- 新規登録限定出力 -->
	<?php get_template_part("include/single_post"); ?>
    <!-- 新規登録限定出力 -->

			</div>


	<!-- 該当タグ出力 -->
			<div class="o-tags"><?php the_tags('',' '); ?></div>
	<!-- 該当タグ出力 -->

	<!-- 新規登録限定出力 -->
	<?php get_template_part("include/writer"); ?>
    <!-- 新規登録限定出力 -->


	<!-- SNSアイコン -->
	<div class="sns">
			<div class="sns-icon fb">
			<a class="sns__facebook" href="http://www.facebook.com/share.php?u=<?php echo get_the_permalink(); ?>" target="_blank" rel="nofollow noopener"><img src="<?php echo get_template_directory_uri(); ?>/img/fb.png" alt=""></a>		
			</div>
			<div class="sns-icon tw">
			<a class="sns__twitter" href="https://twitter.com/share?url=<?php echo get_the_permalink();?>&text=<?php echo get_the_title();?>" target="_blank" rel="nofollow noopener"><img src="<?php echo get_template_directory_uri(); ?>/img/tw.png" alt=""></a>	
			</div>
			<div class="sns-icon line">
			<a class="sns__line" href="https://social-plugins.line.me/lineit/share?url=<?php echo get_the_permalink(); ?>" target="_blank" rel="nofollow noopener"><img src="<?php echo get_template_directory_uri(); ?>/img/line.png" alt=""></a>	
			</div>
	</div>
	<!-- SNSアイコン -->

    <!-- おすすめ記事出力 -->
    <?php get_template_part("include/recommend"); ?>
    <!-- おすすめ記事出力 -->

</div>
    </div>

	<?php get_sidebar(); ?>

</div>
    </div>
   
  
<?php get_footer(); ?>

<style>
.wrap{
	margin-top:-20px;
}
.card-text{
	margin-top:20px;
}


/* a:hover {
	  text-decoration: none;
      pointer-events: none;
} */

ul{
	list-style-type: disc;
	margin-left: 20px;
}

ul .li{
	list-style-type: disc;
	margin-left: 20px;
}

ol{
	list-style-type: decimal;
	margin-left: 20px;
}

ol .li{
	list-style-type: decimal;
	margin-left: 20px;
}


@media only screen and ( max-width :500px ) {
.wrap .colum {
    padding-top: 0px;
}
}
</style>