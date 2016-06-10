<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title>
      <?php bloginfo('name'); ?> |
      <?php is_front_page() ? bloginfo('description') : wp_title(); ?>          
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lib/bootstrap/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
    <?php wp_head(); ?>
</head>
<body>
  <header>
    <div class="container header_contain">
      <div class="row">
        <div class="col-md-12">
          <div class="top_form">
            <?php get_search_form(); ?>

            <?php
              if (is_user_logged_in()) {
                $current_user = wp_get_current_user(); ?>
                <a id="user" class="enter" href="#"><?php echo $current_user->user_login; ?><i class="user_active"></i></a>
                <div class="log_toggle_form">
                  <a class="profile" href="<?php echo get_settings('siteurl'); ?>/wp-admin/profile.php">мой профайл</a>
                  <a class="exit" href="<?php echo wp_logout_url( $redirect ); ?>">выход</a>
                </div>
              <?php } else { ?>
                <a class="enter" href="<?php echo get_settings('siteurl'); ?>/wp-login.php">Вход<i class="padlock"></i></a>
              <?php } ?>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 logo_wrapper">
          <div class="logo">
            <a href="/"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>"></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="slogan_container">
            <h1>Добавьте свой эмоциональный лайфхак!</h1>
            <p>Здесь вы можете найти для себя либо поделиться с другими лайфхаками о том, как получить позитивные эмоции.</p>
            
            <?php
              if (is_user_logged_in()) { ?>
                <a href="<?php bloginfo('template_url'); ?>/otpravka""><button>Добавить пост</button></a>
              <?php } else { ?>
                <a href="<?php echo get_settings('siteurl'); ?>/wp-login.php"><button>Добавить пост</button></a>
              <?php } ?>
          </div>
        </div>
      </div>

      <button class="toggle_mnu">
        <span class="sandwich">
          <span class="sw-topper"></span>
          <span class="sw-bottom"></span>
          <span class="sw-footer"></span>
        </span>
      </button>
      
      <nav class="main_menu">
        <ul>
          <?php wp_list_categories(array(
              'title_li' => ''
          )); ?>
        </ul>
      </nav>
      
    </div>
  </header>