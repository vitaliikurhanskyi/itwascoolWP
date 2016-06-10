<?php get_header(); ?>
  <div class="mein_wrapper">
    <div class="container">
      <div class="row">
        <div class="artical_grid">
        
        <?php if(have_posts()) : ?>
          <?php while(have_posts()) : the_post(); ?>  
          <div class="loop">
            <div class="col-md-4 col-sm-6">
              <div class="box_wrapper">
                <div class="artical_box post">
                  <?php if(has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('360px','360px',true); ?>
                  <?php else : ?>
                    <img src="<?php bloginfo('template_url'); ?>/images/nophoto.jpg" alt="нет фотографии">
                  <?php endif; ?>
                  <div class="hover_box">
                    <a href="<?php the_permalink(); ?>">читать</a>
                  </div>
                </div>
                <div class="category">
                  <?php the_category(' '); ?>
                </div>
                <h2><?php trim_title_chars(42, '...'); ?></h2>
                <p class="author">от <span><a href="#"><?php the_author(); ?></a></span></p>
                <?php the_excerpt(); ?>
                <div class="info_block">
                  <span class="date"><?php echo get_the_date(); ?></span>
                  <span class="view"><?php echo getPostViews(get_the_ID()); ?></span>
                  <span class="like">15</span>
                </div>
              </div>
            </div><!-- col -->
            </div><!-- loop -->
            <?php endwhile; ?>

        <?php endif; ?>

      </div><!-- artical_grid -->
    </div>

      <div class="row ajax_container">
        <div class="show_more_btn_container">
          <?php the_posts_pagination(); ?>
        </div>
      </div>

    </div>
  </div><!-- mein_wrapper -->
        
<?php get_footer(); ?>
        
