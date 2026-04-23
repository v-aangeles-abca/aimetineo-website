<?php
/**
 * Template Name: Aimé Homepage
 * Edit content: Appearance → Customize → Aimé Site Content
 */

$hero_line1  = get_theme_mod('aime_hero_line1',  'Content that');
$hero_line2  = get_theme_mod('aime_hero_line2',  'stops the');
$hero_line3  = get_theme_mod('aime_hero_line3',  'scroll.');
$hero_sub    = get_theme_mod('aime_hero_sub',    'I turn ideas into authentic, cinematic content that makes brands feel human — and audiences feel something. 150+ collaborations. 3+ years. 0 filters on the realness.');
$hero_photo  = get_theme_mod('aime_hero_photo',  get_template_directory_uri() . '/assets/img/aime-portrait.webp');
$stat1_num   = get_theme_mod('aime_stat1_num',   '19');
$stat1_suf   = get_theme_mod('aime_stat1_suf',   'k+');
$stat1_label = get_theme_mod('aime_stat1_label', 'Instagram Followers');
$stat2_num   = get_theme_mod('aime_stat2_num',   '11');
$stat2_suf   = get_theme_mod('aime_stat2_suf',   'k+');
$stat2_label = get_theme_mod('aime_stat2_label', 'TikTok Followers');
$stat3_num   = get_theme_mod('aime_stat3_num',   '150');
$stat3_suf   = get_theme_mod('aime_stat3_suf',   '+');
$stat3_label = get_theme_mod('aime_stat3_label', 'Collaborations');
$stat4_num   = get_theme_mod('aime_stat4_num',   '80');
$stat4_suf   = get_theme_mod('aime_stat4_suf',   '+');
$stat4_label = get_theme_mod('aime_stat4_label', 'Brands Worked With');
$about_title = get_theme_mod('aime_about_title', 'Helping brands tell authentic stories & build real connections');
$about_p1    = get_theme_mod('aime_about_p1',    'Bilingual (English & Spanish), proud Latina in the U.S. I use professional gear and bring genuine energy to every project — whether it\'s a voiceover, an unboxing, or a full lifestyle shoot.');
$about_p2    = get_theme_mod('aime_about_p2',    'My content doesn\'t just look good — it performs. I understand what makes people stop scrolling, engage, and take action.');
$about_photo = get_theme_mod('aime_about_photo', get_template_directory_uri() . '/assets/img/about.jpg');
$cta_title   = get_theme_mod('aime_cta_title',   'Ready to elevate your brand\'s story?');
$cta_sub     = get_theme_mod('aime_cta_sub',     'Let\'s team up and create content that captivates your audience on TikTok & Instagram.');
$cta_email   = get_theme_mod('aime_cta_email',   'aimetineo.social@gmail.com');
$cta_loc     = get_theme_mod('aime_cta_loc',     'Based in Rhode Island, USA');
$cta_photo   = get_theme_mod('aime_cta_photo',   get_template_directory_uri() . '/assets/img/cta.webp');
$t           = get_template_directory_uri();

// Brands: pull from CMS (WP Admin → Brand Logos), fallback to theme assets
$cms_brands = aime_get_brands();
$fallback_brands = [
  ['brand-prada.jpg','Prada'],['brand-valentino.png','Valentino'],
  ['brand-rare-beauty.webp','Rare Beauty'],['brand-jergens.jpg','Jergens'],
  ['brand-sol-de-janeiro.webp','Sol de Janeiro'],['brand-shark.png','Shark'],
  ['brand-thayers.png','Thayers'],
];
$has_cms_brands = count($cms_brands) > 0;

// Videos: pull from CMS (WP Admin → Portfolio Videos), fallback to JS hardcoded list
$cms_videos = aime_get_videos();
$has_cms_videos = count($cms_videos) > 0;

// Testimonials: pull from CMS (WP Admin → Testimonials)
$testimonials = aime_get_testimonials();
$has_testimonials = count($testimonials) > 0;

get_header(); ?>

<!-- HERO -->
<section class="hero" id="home">
  <div class="hero-text">
    <span class="hero-eyebrow" data-i18n="hero.badge">✦ UGC Creator · Influencer · Storyteller</span>
    <h1><?php echo esc_html($hero_line1); ?><br><em><?php echo esc_html($hero_line2); ?></em><br><?php echo esc_html($hero_line3); ?></h1>
    <p class="hero-sub"><?php echo esc_html($hero_sub); ?></p>
    <div class="hero-actions">
      <a href="#portfolio" class="btn-filled" data-i18n="hero.seework">See My Work</a>
      <a href="#contact" class="btn-ghost" data-i18n="hero.collab">Let's Collaborate</a>
    </div>
    <div class="hero-pills">
      <span class="pill" data-i18n="hero.pill1">Voiceover Content</span>
      <span class="pill" data-i18n="hero.pill2">Lifestyle & Aesthetic</span>
      <span class="pill" data-i18n="hero.pill3">Product Demos</span>
      <span class="pill" data-i18n="hero.pill4">Bilingual EN/ES</span>
    </div>
  </div>
  <div class="hero-img">
    <img src="<?php echo esc_url($hero_photo); ?>" alt="Aimé Tineo — UGC Creator" loading="eager">
  </div>
</section>

<!-- BRAND MARQUEE -->
<div class="marquee-wrap" aria-hidden="true">
  <div class="marquee-track">
    <?php
    $marquee_brands = $has_cms_brands ? array_merge($cms_brands, $cms_brands) : array_merge(
      array_map(fn($b) => ['url' => "$t/assets/img/{$b[0]}", 'name' => $b[1]], $fallback_brands),
      array_map(fn($b) => ['url' => "$t/assets/img/{$b[0]}", 'name' => $b[1]], $fallback_brands)
    );
    foreach ($marquee_brands as $b): ?>
    <div class="marquee-item"><img src="<?php echo esc_url($b['url']); ?>" alt="<?php echo esc_attr($b['name']); ?>"></div>
    <span class="marquee-dot"></span>
    <?php endforeach; ?>
  </div>
</div>

<!-- SERVICES -->
<section class="services" id="services">
  <div style="max-width:var(--max);margin:0 auto;">
    <span class="section-tag" data-i18n="services.tag">What I Create</span>
    <h2 class="section-h2" data-i18n="services.h2">Content that connects,<br>converts & captivates</h2>
    <div class="services-grid">
      <div class="service-card"><div class="service-num">01</div><div class="service-line"></div><div class="service-title" data-i18n="services.ugc.title">Voiceover Content</div><div class="service-desc" data-i18n="services.ugc.desc">Authentic narrated videos that tell your product's story with warmth and trust — the kind that audiences remember.</div></div>
      <div class="service-card"><div class="service-num">02</div><div class="service-line"></div><div class="service-title" data-i18n="services.brand.title">Aesthetic & Lifestyle</div><div class="service-desc" data-i18n="services.brand.desc">Beautifully styled, cinematic content with a luxury editorial feel — perfect for fashion, beauty, and home brands.</div></div>
      <div class="service-card"><div class="service-num">03</div><div class="service-line"></div><div class="service-title" data-i18n="services.coach.title">Product Demos & Reviews</div><div class="service-desc" data-i18n="services.coach.desc">Hands-on unboxings, try-ons, and honest reviews that highlight benefits and drive real purchase decisions.</div></div>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section class="about" id="about">
  <div class="about-img"><img src="<?php echo esc_url($about_photo); ?>" alt="Aimé Tineo" loading="lazy"></div>
  <div class="about-text">
    <span class="section-tag" data-i18n="about.tag">About Aimé</span>
    <h2><?php echo esc_html($about_title); ?></h2>
    <p><?php echo esc_html($about_p1); ?></p>
    <p><?php echo esc_html($about_p2); ?></p>
    <a href="#contact" class="btn-filled" data-i18n="about.cta">Work With Me</a>
  </div>
</section>

<!-- STATS -->
<section class="stats">
  <div style="max-width:var(--max);margin:0 auto;">
    <div class="stats-grid">
      <div class="stat-item"><div class="stat-num" data-target="<?php echo esc_attr($stat1_num); ?>" data-suffix="<?php echo esc_attr($stat1_suf); ?>">0</div><div class="stat-label"><?php echo esc_html($stat1_label); ?></div></div>
      <div class="stat-item"><div class="stat-num" data-target="<?php echo esc_attr($stat2_num); ?>" data-suffix="<?php echo esc_attr($stat2_suf); ?>">0</div><div class="stat-label"><?php echo esc_html($stat2_label); ?></div></div>
      <div class="stat-item"><div class="stat-num" data-target="<?php echo esc_attr($stat3_num); ?>" data-suffix="<?php echo esc_attr($stat3_suf); ?>">0</div><div class="stat-label"><?php echo esc_html($stat3_label); ?></div></div>
      <div class="stat-item"><div class="stat-num" data-target="<?php echo esc_attr($stat4_num); ?>" data-suffix="<?php echo esc_attr($stat4_suf); ?>">0</div><div class="stat-label"><?php echo esc_html($stat4_label); ?></div></div>
    </div>
  </div>
</section>

<!-- PORTFOLIO -->
<section class="portfolio" id="portfolio">
  <div style="max-width:var(--max);margin:0 auto;">
    <div class="portfolio-header">
      <div><span class="section-tag" data-i18n="portfolio.tag">Recent Work</span><h2 class="section-h2" data-i18n="portfolio.h2">A glimpse into my<br>latest UGC content</h2></div>
      <?php
      $port_page = get_page_by_path('portfolio');
      $port_url  = $port_page ? get_permalink($port_page->ID) : home_url('/portfolio/');
      ?>
      <a href="<?php echo esc_url($port_url); ?>" class="btn-ghost" style="white-space:nowrap;flex-shrink:0" data-i18n="portfolio.viewfull">View Full Portfolio →</a>
    </div>
    <div class="port-filters">
      <button class="port-filter active" data-cat="all" data-i18n="portfolio.all">All</button>
      <button class="port-filter" data-cat="body-skincare" data-i18n="portfolio.body">Body Skincare</button>
      <button class="port-filter" data-cat="fashion-jewelry" data-i18n="portfolio.fashion">Fashion & Jewelry</button>
      <button class="port-filter" data-cat="home-tech" data-i18n="portfolio.home">Home Tech</button>
      <button class="port-filter" data-cat="in-person" data-i18n="portfolio.inperson">In Person Business</button>
    </div>
    <div class="video-grid" id="video-grid"></div>
    <div class="port-show-more" id="port-home-more">
      <button class="btn-ghost" id="show-more-btn" data-i18n="portfolio.showmore">Load More</button>
    </div>
  </div>
</section>
<div id="vid-lightbox"><div class="lb-inner"><button class="lb-close" id="lb-close">✕</button><div class="lb-frame-wrap"><iframe id="lb-iframe" src="" allow="autoplay; encrypted-media" allowfullscreen></iframe></div></div></div>

<!-- BRANDS -->
<section class="brands">
  <div style="max-width:var(--max);margin:0 auto;">
    <span class="section-tag" data-i18n="brands.tag">Trusted By</span>
    <h2 class="section-h2" data-i18n="brands.h2">80+ Brands Worldwide</h2>
    <div class="brand-grid">
      <?php if ($has_cms_brands): ?>
        <?php foreach ($cms_brands as $b): ?>
        <img src="<?php echo esc_url($b['url']); ?>" alt="<?php echo esc_attr($b['name']); ?>">
        <?php endforeach; ?>
      <?php else: ?>
        <?php foreach ($fallback_brands as [$file, $name]): ?>
        <img src="<?php echo esc_url("$t/assets/img/$file"); ?>" alt="<?php echo esc_attr($name); ?>">
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials">
  <div style="max-width:var(--max);margin:0 auto;">
    <span class="section-tag">Kind Words</span>
    <h2 class="section-h2">What clients say</h2>
    <div class="testi-grid">
      <?php if ($has_testimonials): ?>
        <?php foreach ($testimonials as $t_item): ?>
        <div class="testi-card">
          <span class="testi-quote-mark">&ldquo;</span>
          <div class="testi-text"><?php echo wp_kses_post($t_item['quote']); ?></div>
          <div class="testi-author"><?php echo esc_html($t_item['author']); ?></div>
          <?php if ($t_item['role']): ?><div class="testi-role"><?php echo esc_html($t_item['role']); ?></div><?php endif; ?>
        </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="testi-card"><span class="testi-quote-mark">&ldquo;</span><div class="testi-text">Working with Aimé was incredible. Her content felt authentic and drove real engagement for our campaign.</div><div class="testi-author">Brand Partner</div><div class="testi-role">Beauty Industry</div></div>
        <div class="testi-card"><span class="testi-quote-mark">&ldquo;</span><div class="testi-text">Aimé brings creativity and professionalism to every project. Her UGC consistently outperforms our expectations.</div><div class="testi-author">Marketing Director</div><div class="testi-role">Fashion Brand</div></div>
        <div class="testi-card"><span class="testi-quote-mark">&ldquo;</span><div class="testi-text">The quality of Aimé's work is outstanding. She truly understands how to connect with audiences authentically.</div><div class="testi-author">Creative Agency</div><div class="testi-role">Content Strategy</div></div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta" id="contact">
  <div class="cta-text">
    <span class="section-tag" style="color:var(--gold)" data-i18n="contact.tag">Let's Work Together</span>
    <h2><?php echo esc_html($cta_title); ?></h2>
    <p><?php echo esc_html($cta_sub); ?></p>
    <div class="cta-email"><?php echo esc_html($cta_email); ?></div>
    <div class="cta-location"><?php echo esc_html($cta_loc); ?></div>
    <div class="cta-btns">
      <a href="mailto:<?php echo esc_attr($cta_email); ?>" class="btn-cream" data-i18n="contact.btn">Get In Touch</a>
      <a href="<?php echo home_url('/coaching/'); ?>" class="btn-gold-outline" data-i18n="contact.coaching">Explore Coaching ✦</a>
    </div>
  </div>
  <div class="cta-img"><img src="<?php echo esc_url($cta_photo); ?>" alt="Aimé Tineo" loading="lazy"></div>
</section>

<?php
// Pass CMS videos to JS if available
if ($has_cms_videos):
  $video_json = json_encode($cms_videos);
  echo "<script>window.AIME_CMS_VIDEOS = {$video_json};</script>";
endif;
?>
<?php get_footer(); ?>
