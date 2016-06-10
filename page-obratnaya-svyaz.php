<?php get_header(); ?>

  <?php if(have_posts() ) : ?>
    <?php while(have_posts()) : the_post(); ?>
        <div class="content_box">
            <h1><?php trim_title_chars(42, '...'); ?></h1>
            <div class="single_text"><?php the_content(); ?></div>
            <input class="back" type="button" onclick="history.back();" value="Назад"/>
        </div>
        <?php setPostViews(get_the_ID()); ?>
    <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>