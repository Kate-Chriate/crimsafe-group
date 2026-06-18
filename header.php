<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php
  if (function_exists('wp_body_open')) {
    wp_body_open();
  }
  ?>

<?php 
  $header_logo = get_field('header_logo', 'option'); 
  $nav_hover = get_field('navigation_hover_colour', 'option');
?>
  <header class="site-header hover-<?php echo $nav_hover; ?>">
    <div class="container site-header__inner">

      <a href="<?php echo esc_url(home_url('/')); ?>" class="site-header__logo">
        <?php if ($header_logo): ?>
          <img src="<?php echo $header_logo['url']; ?>" alt="<?php echo $header_logo['alt']; ?>"> 
        <?php else: ?>
          <h4 class="m-0"><?php bloginfo('name'); ?></h4>
        <?php endif; ?>
      </a>

      <?php wp_nav_menu(array(
        'theme_location'  => 'header',
        'container'       => 'nav',
        'container_class' => 'main-nav',
        'container_id'    => 'main-nav',
        'menu_class'      => 'main-nav__list',
        'walker'          => new Crimsafe_Nav_Walker(),
      )); ?>

      <?php $button = get_field('header_button', 'option'); ?>
      <?php if ($button): ?>
        <a href="<?php echo esc_url($button['url']); ?>" target="<?php echo esc_attr($button['target'] ?: '_self'); ?>" class="d-none d-xl-inline-block btn btn--primary header"><?php echo esc_html($button['title']); ?></a>
      <?php endif; ?>

      <button class="nav-hamburger" aria-label="Open menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>

    </div>
    
  </header>
  <div class="nav-overlay"></div>
