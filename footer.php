
  <footer>
    <div class="container">
        <div class="col-lg-3 col-sm-3 hidden-md hidden-xs footer_wrap">
          <div class="logo_footer">
            <a href="/"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="logo"></a>
          </div>
        </div>
          <div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
            <div class="footer_cat">
              <h3>категории</h3>
              <div class="footer_cat_nav">
                <ul>
                  <?php wp_list_categories(array(
                    'title_li' => ''
                  )); ?>
                </ul>
              </div>
            </div>
          </div>
        <div class="col-lg-2 col-lg-push-0 col-md-2 col-sm-2 col-sm-push-1 col-xs-2 col-md-push-2 hidden-xs" >
          <div class="about_us">
            <h3>о нас</h3>
            <ul>
              <li><a href="<?php bloginfo('template_url'); ?>/o-proekte">О проекте</a></li>
              <li><a href="<?php bloginfo('template_url'); ?>/obratnaya-svyaz">Обратная связь</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-lg-push-0 col-md-pull-0 col-md-3 col-sm-push-2 col-sm-3 col-xs-3 col-xs-pull-1 col-md-push-2">
          <div class="contacts">
            <h3>оставайтесь на связи</h3>
            <div class="social_wrap">
              <?php if(is_active_sidebar('social')) : ?>
                <?php dynamic_sidebar('social'); ?>
              <?php endif; ?>
              <!-- <a href="#" class="soc_icons fb"></a>
              <a href="#" class="soc_icons inst"></a>
              <a href="#" class="soc_icons vk"></a> -->
            </div>
          </div>
        </div>
    </div>
    <div class="col-md-12 footer_c">
      <p>© 2015 itwas.cool. Все права защищены.</p>
    </div>
  </footer>

  <?php wp_footer(); ?>

    
  <!--[if lt IE 9]>
	<script src="<?php bloginfo('template_url'); ?>/lib/html5shiv/es5-shim.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/lib/html5shiv/html5shiv.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/lib/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/lib/respond/respond.min.js"></script>
	<![endif]-->
    
    
    <script src="<?php bloginfo('template_url'); ?>/lib/jquery/jquery-1.12.4.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/common.js"></script>
    <script>
      $(function() {
        var header = $('header');
        var backgrounds = ['url(<?php bloginfo('template_url'); ?>/images/bg_header_1.jpg)', 'url(<?php bloginfo('template_url'); ?>/images/bg_header_2.jpg)', 'url(<?php bloginfo('template_url'); ?>/images/bg_header_3.jpg)', 'url(<?php bloginfo('template_url'); ?>/images/bg_header_4.jpg)'];
        var current = 0;

        function nextBackground() {
          header.css(
           'background-image',
            backgrounds[current = ++current % backgrounds.length]
          );

          setTimeout(nextBackground, 5000);
        }
        setTimeout(nextBackground, 5000);
          header.css('background-image', backgrounds[0]);
        });
    </script>
</body>
</html>