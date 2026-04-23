<?php
/**
 * header.php — Shared nav for all pages
 */

// Get the actual front page URL regardless of Settings → Reading
$front = get_option('page_on_front')
    ? get_permalink(get_option('page_on_front'))
    : home_url('/');

// Get coaching page URL by slug
$coaching_page = get_page_by_path('coaching');
$coaching_url  = $coaching_page ? get_permalink($coaching_page->ID) : home_url('/coaching/');

// Get portfolio page URL
$portfolio_page = get_page_by_path('portfolio');
$portfolio_url  = $portfolio_page ? get_permalink($portfolio_page->ID) : home_url('/portfolio/');
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav id="main-nav">
  <a href="<?php echo esc_url($front); ?>" class="nav-logo">Aimé<span>.</span></a>
  <div class="nav-links" id="nav-links">
    <a href="<?php echo esc_url($portfolio_url); ?>" data-i18n="nav.portfolio">Portfolio</a>
    <a href="<?php echo esc_url($front . '#about'); ?>" data-i18n="nav.about">About</a>
    <a href="<?php echo esc_url($front . '#services'); ?>" data-i18n="nav.services">Services</a>
    <a href="<?php echo esc_url($coaching_url); ?>" class="nav-coaching" data-i18n="nav.coaching">Coaching ✦</a>
    <a href="<?php echo esc_url($front . '#contact'); ?>" class="nav-cta" data-i18n="nav.contact">Work With Me</a>
    <button class="lang-toggle" id="lang-toggle" aria-label="Language">
      <span class="lang-opt" data-lang="en">EN</span>
      <span class="lang-sep">|</span>
      <span class="lang-opt" data-lang="es">ES</span>
    </button>
  </div>
  <button class="hamburger" id="hamburger" aria-label="Open menu">
    <span></span><span></span><span></span>
  </button>
</nav>
