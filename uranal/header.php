<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css?<?php echo $timeStamp; ?>">

  <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script>
  <script type='text/javascript' src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap-4.4-1.js"></script>
  <script type='text/javascript' src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-3-4-1.min.js"></script>
  <script type='text/javascript' src="<?php echo get_stylesheet_directory_uri(); ?>/js/popper.min.js"></script>
  <script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/spmenu.js'></script>
  <!-- Bootstrap -->
  <!-- FOT-筑紫A丸ゴシック Std　ADOBE FONT -->
  <script>
    (function (d) {
      var config = {
          kitId: 'wyh8eqk',
          scriptTimeout: 3000,
          async: true
        },
        h = d.documentElement, t = setTimeout(function () {
          h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
        }, config.scriptTimeout), tk = d.createElement("script"), f = false, s = d.getElementsByTagName("script")[0], a;
      h.className += " wf-loading";
      tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
      tk.async = true;
      tk.onload = tk.onreadystatechange = function () {
        a = this.readyState;
        if (f || a && a != "complete" && a != "loaded") return;
        f = true;
        clearTimeout(t);
        try {
          Typekit.load(config)
        } catch (e) {
        }
      };
      s.parentNode.insertBefore(tk, s)
    })(document);
  </script>
  <?php wp_head(); ?>
  <meta name="google-site-verification" content="j1nmRN_tmMsny8TBQ6j6guxbUSov0yDVGmfI402Lxnc" />
</head>
<body>

<div class="main_wrap">

<div class="menu-mobile_wrapper">
  <input type="checkbox" id="menu-btn-check" class="menu-mobile toggle">
  <label for="menu-btn-check" class="menu-btn"><span></span></label>
</div>

<div class="main">
  <div class="header">
    <div class="headerbox">
      <div class="header___left pc">
        <a href="<?php echo get_bloginfo('url'); ?>/"><img class="d-block w-100 pc" src="<?php echo get_template_directory_uri(); ?>/img/pctoplogo.png" alt="うらなーるロゴ"></a>
      </div>
      <div class="header___right pc">
        <div class="btn">
          <button>
            <a href="https://live-fortune.com/" class="button2"><i class="fa fa-fw fa-chevron-right" aria-hidden="true"></i>公式サイト</a>
          </button>
        </div>
      </div>
    </div>
    <!-- -------------menu------------- -->
    <!--pc menu-->
    <div class="pc">
      <div class="menu__box">
        <div class="inner">
          <div class="sp">
            <a href="<?php echo get_bloginfo('url'); ?>/"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/sptoplogo.png" alt="うらなーるロゴ"></a>
            <a href="#" class="menu-mobile"></a>
          </div>
          <?php
            wp_nav_menu(array(
              'theme_location' => 'main-menu',
              'container' => false
            ));
          ?>
        </div>
      </div>
    </div>
    <!--pc menu-->
    <!--sp menu-->
    <div class="sp">
    <div class="menu-spheader">
      <div class="menu-container">
          <div class="sp_head">
              <a href="<?php echo get_bloginfo('url'); ?>/"><img class="d-block w-100_sp" src="<?php echo get_template_directory_uri(); ?>/img/sptoplogo.png"alt="うらなーるロゴ"></a>
          </div>
          <!-- ↓ ハンバーガーメニューアイコンに変更されるところ -->

          <!-- ↓ spmenu.jsがjs_sp_menu以下のULにshow-on-mobileを追加 -->
          <div class="js_sp_menu sp_menu">
            <!-- ↓ WPが生成するULにハンバーガーメニューをクリックすると show-on-mobile のclassが追加される -->
            <?php
              wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => false
              ));
            ?>
   
          </div>

          <!--公式サイトボタン-->
           <!-- <div class="spbtn"> -->
            <div class="btn">
              <button>
                <a href="https://live-fortune.com/" class="button2"><i class="fa fa-fw fa-chevron-right"
                                                                  aria-hidden="true"></i>公式サイト2</a>
              </button>
            </div>
          <!-- </div>  -->
          <!--公式サイトボタン-->

        </div>
    </div>
    <!-- SPサブメニュー -->
    <?php get_template_part("include/spsubmenu"); ?>
    <!-- SPサブメニュー -->
	    <!--sp menu-->

  </div>
</div>

<!-- -------------menu------------- -->
