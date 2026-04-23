<?php
/**
 * footer.php — Shared footer for all pages
 */
$email = esc_html(get_theme_mod('aime_cta_email', 'aimetineo.social@gmail.com'));
$ig    = esc_url(get_theme_mod('aime_instagram', 'https://instagram.com/aimetineo'));
$tt    = esc_url(get_theme_mod('aime_tiktok', 'https://tiktok.com/@aimetineo'));
?>

<footer>
  <div class="footer-logo">Aimé.</div>
  <div class="footer-links">
    <a href="<?php echo home_url('/#portfolio'); ?>">Portfolio</a>
    <a href="<?php echo home_url('/#about'); ?>">About</a>
    <a href="<?php echo home_url('/#services'); ?>">Services</a>
    <a href="<?php echo home_url('/coaching/'); ?>">Coaching</a>
    <?php if ($ig): ?><a href="<?php echo $ig; ?>" target="_blank" rel="noopener">Instagram</a><?php endif; ?>
    <?php if ($tt): ?><a href="<?php echo $tt; ?>" target="_blank" rel="noopener">TikTok</a><?php endif; ?>
  </div>
  <div class="footer-copy">&copy; <?php echo date('Y'); ?> Aimé Tineo. All rights reserved.</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
