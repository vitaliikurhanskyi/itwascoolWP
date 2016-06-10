<?php get_header(); ?>

  <?php if(have_posts() ) : ?>
    <?php while(have_posts()) : the_post(); ?>
        <div class="content_box">
            <h1><?php trim_title_chars(42, '...'); ?></h1>
            <?php if(has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('360px','360px',true); ?>
            <?php else : ?>
                <img src="<?php bloginfo('template_url'); ?>/images/nophoto.jpg" alt="нет фотографии">
            <?php endif; ?>
            <div class="single_text"><?php the_content(); ?></div>
            <input class="back" type="button" onclick="history.back();" value="Назад"/>
        </div>
        <?php setPostViews(get_the_ID()); ?>
    <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>
