<footer class="text-center footer">
  <!-- fotter menu -->
  <section id="footer">
    <div class="inner">
      <div class="content_f">
        <div class="footer_logo">
          <div class="logo_f">
            <h1><a href="<?php echo get_bloginfo('url'); ?>/"><img
                  src="<?php echo get_template_directory_uri(); ?>/img/sptoplogo.png"></a></h1>
          </div>
        </div>

        <?php wp_nav_menu( array('theme_location' => 'footer-menu')); ?>


        <!-- <ul class="footer-nav">
          <li><a href="<?php echo get_bloginfo('url'); ?>/profile">恋愛</a></li>
          <li><a href="<?php echo get_bloginfo('url'); ?>/counseling/">夫婦関係</a></li>
          <li><a href="<?php echo get_bloginfo('url'); ?>/training_page/">人間関係</a></li>
          <li><a href="<?php echo get_bloginfo('url'); ?>/corporate_services/">将来</a></li>
          <li><a href="<?php echo get_bloginfo('url'); ?>/media/">その他</a></li>
          <li><a href="<?php echo get_bloginfo('url'); ?>/category/news">今週の占い</a></li>
          <li><a href="<?php echo get_bloginfo('url'); ?>/contact">当たるオンラインZOOM占い【ウラナール】　</a></li>
          <li><a href="<?php echo get_bloginfo('url'); ?>/media/">運営会社</a></li>
          <li><a href="<?php echo get_bloginfo('url'); ?>/category/news">プライバシーポリシー</a></li>
          <li><a href="<?php echo get_bloginfo('url'); ?>/contact">問い合わせ</a></li>
        </ul> -->
      </div>
    </div>
    <!-- fotter menu -->
    <div class="row">
      <div class="col-12">
        <p class="copyright">Copyright © 2023株式会社IIP All Rights Reserved.</p>
      </div>
    </div>

  </section>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>