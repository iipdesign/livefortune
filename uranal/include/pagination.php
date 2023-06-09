   <!-- ページネーション -->
   <div class="paginavi">
          <?php the_posts_pagination(
            array(
              'mid_size' => 2, // 現在ページの左右に表示するページ番号の数
              'prev_next' => true,
              'prev_text' => '<img src="https://live-fortune.com/blog/wp-content/uploads/2023/04/page_arrow.png" alt="前のニュースへ"/>',
              'next_text' => '<img src="https://live-fortune.com/blog/wp-content/uploads/2023/04/page_arrow.png" alt="前のニュースへ"/>', 
              'type' => 'list', // 戻り値の指定 (plain/list)
            )
          ); ?>
    </div>
        <!-- ページネーション -->


