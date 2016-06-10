<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title>
      <?php bloginfo('name'); ?> |
      <?php is_front_page() ? bloginfo('description') : wp_title(); ?>          
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lib/bootstrap/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
    <?php wp_head(); ?>
</head>

<body style="background-color: #000">
	<div class="no_page_wrapper">
		<p class="no_page">нет такой страницы</p>
		<a href="<?php echo get_home_url(); ?>">на главную >></a>
	</div>
</body>
</html>