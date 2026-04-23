<?php
/**
 * Aimé Tineo Theme — functions.php
 */

// ── THEME SETUP ──
add_action('after_setup_theme', function() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption']);
    add_theme_support('custom-logo');
    register_nav_menus(['primary' => 'Primary Menu']);
});

// ── ENQUEUE SHARED CSS + FONTS ──
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('aime-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Inter:wght@300;400;500;600&display=swap',
        [], null);
    wp_enqueue_style('aime-main',
        get_template_directory_uri() . '/assets/css/main.css',
        ['aime-fonts'], '2.0.0');
    wp_enqueue_script('aime-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [], '2.0.0', true);
});

// ── REMOVE ADMIN BAR OFFSET ──
add_action('wp_head', function() {
    echo '<style>html{margin-top:0!important}#wpadminbar{position:fixed}</style>';
}, 99);

// ── CUSTOMIZER ──
add_action('customize_register', function($wp_customize) {
    $wp_customize->add_panel('aime_panel', ['title' => 'Aimé Site Content', 'priority' => 30]);

    // Hero
    $wp_customize->add_section('aime_hero', ['title' => 'Hero Section', 'panel' => 'aime_panel']);
    aime_text($wp_customize, 'aime_hero_line1',  'aime_hero', 'Hero Line 1', 'Content that');
    aime_text($wp_customize, 'aime_hero_line2',  'aime_hero', 'Hero Line 2 (italic)', 'stops the');
    aime_text($wp_customize, 'aime_hero_line3',  'aime_hero', 'Hero Line 3', 'scroll.');
    aime_text($wp_customize, 'aime_hero_sub',    'aime_hero', 'Hero Subtext', 'I turn ideas into authentic, cinematic content that makes brands feel human — and audiences feel something. 150+ collaborations. 3+ years. 0 filters on the realness.');
    aime_image($wp_customize, 'aime_hero_photo', 'aime_hero', 'Hero Portrait Photo');

    // Stats
    $wp_customize->add_section('aime_stats', ['title' => 'Stats Bar', 'panel' => 'aime_panel']);
    foreach ([
        ['aime_stat1_num','Stat 1 Number','19'],['aime_stat1_suf','Stat 1 Suffix','k+'],['aime_stat1_label','Stat 1 Label','Instagram Followers'],
        ['aime_stat2_num','Stat 2 Number','11'],['aime_stat2_suf','Stat 2 Suffix','k+'],['aime_stat2_label','Stat 2 Label','TikTok Followers'],
        ['aime_stat3_num','Stat 3 Number','150'],['aime_stat3_suf','Stat 3 Suffix','+'],['aime_stat3_label','Stat 3 Label','Collaborations'],
        ['aime_stat4_num','Stat 4 Number','80'],['aime_stat4_suf','Stat 4 Suffix','+'],['aime_stat4_label','Stat 4 Label','Brands Worked With'],
    ] as [$id, $label, $default]) {
        aime_text($wp_customize, $id, 'aime_stats', $label, $default);
    }

    // About
    $wp_customize->add_section('aime_about', ['title' => 'About Section', 'panel' => 'aime_panel']);
    aime_text($wp_customize,  'aime_about_title', 'aime_about', 'Heading', 'Helping brands tell authentic stories & build real connections');
    aime_text($wp_customize,  'aime_about_p1',    'aime_about', 'Paragraph 1', 'Bilingual (English & Spanish), proud Latina in the U.S. I use professional gear and bring genuine energy to every project — whether it\'s a voiceover, an unboxing, or a full lifestyle shoot.');
    aime_text($wp_customize,  'aime_about_p2',    'aime_about', 'Paragraph 2', 'My content doesn\'t just look good — it performs. I understand what makes people stop scrolling, engage, and take action.');
    aime_image($wp_customize, 'aime_about_photo', 'aime_about', 'About Photo');

    // CTA
    $wp_customize->add_section('aime_cta', ['title' => 'Contact Section', 'panel' => 'aime_panel']);
    aime_text($wp_customize,  'aime_cta_title', 'aime_cta', 'Heading',  'Ready to elevate your brand\'s story?');
    aime_text($wp_customize,  'aime_cta_sub',   'aime_cta', 'Subtext',  'Let\'s team up and create content that captivates your audience on TikTok & Instagram.');
    aime_text($wp_customize,  'aime_cta_email', 'aime_cta', 'Email',    'aimetineo.social@gmail.com');
    aime_text($wp_customize,  'aime_cta_loc',   'aime_cta', 'Location', 'Based in Rhode Island, USA');
    aime_image($wp_customize, 'aime_cta_photo', 'aime_cta', 'CTA Photo');

    // Social
    $wp_customize->add_section('aime_social', ['title' => 'Social Links', 'panel' => 'aime_panel']);
    aime_text($wp_customize, 'aime_instagram', 'aime_social', 'Instagram URL', 'https://instagram.com/aimetineo');
    aime_text($wp_customize, 'aime_tiktok',   'aime_social', 'TikTok URL',    'https://tiktok.com/@aimetineo');
});

function aime_text($c, $id, $section, $label, $default = '') {
    $c->add_setting($id, ['default' => $default, 'sanitize_callback' => 'wp_kses_post', 'transport' => 'refresh']);
    $c->add_control($id, ['label' => $label, 'section' => $section, 'type' => 'textarea']);
}
function aime_image($c, $id, $section, $label) {
    $c->add_setting($id, ['default' => '', 'sanitize_callback' => 'esc_url_raw', 'transport' => 'refresh']);
    $c->add_control(new WP_Customize_Image_Control($c, $id, ['label' => $label, 'section' => $section]));
}
function aime_mod($key, $default = '') {
    return esc_html(get_theme_mod($key, $default) ?: $default);
}
function aime_url($key, $default = '') {
    return esc_url(get_theme_mod($key, $default) ?: $default);
}


// ═══════════════════════════════════════════════
// CUSTOM POST TYPES — editable via WP Admin menu
// ═══════════════════════════════════════════════

add_action('init', function() {

  // ── TESTIMONIALS ──
  register_post_type('aime_testimonial', [
    'labels' => [
      'name'          => 'Testimonials',
      'singular_name' => 'Testimonial',
      'add_new_item'  => 'Add New Testimonial',
      'edit_item'     => 'Edit Testimonial',
    ],
    'public'       => false,
    'show_ui'      => true,
    'show_in_menu' => true,
    'menu_icon'    => 'dashicons-format-quote',
    'supports'     => ['title', 'editor'], // title = author name, editor = quote text
    'menu_position' => 25,
  ]);

  // ── BRAND LOGOS ──
  register_post_type('aime_brand', [
    'labels' => [
      'name'          => 'Brand Logos',
      'singular_name' => 'Brand Logo',
      'add_new_item'  => 'Add New Brand',
      'edit_item'     => 'Edit Brand',
    ],
    'public'       => false,
    'show_ui'      => true,
    'show_in_menu' => true,
    'menu_icon'    => 'dashicons-awards',
    'supports'     => ['title', 'thumbnail'], // title = brand name, thumbnail = logo image
    'menu_position' => 26,
  ]);

  // ── PORTFOLIO VIDEOS ──
  register_post_type('aime_video', [
    'labels' => [
      'name'          => 'Portfolio Videos',
      'singular_name' => 'Portfolio Video',
      'add_new_item'  => 'Add New Video',
      'edit_item'     => 'Edit Video',
    ],
    'public'       => false,
    'show_ui'      => true,
    'show_in_menu' => true,
    'menu_icon'    => 'dashicons-video-alt3',
    'supports'     => ['title'], // title = YouTube URL or ID
    'menu_position' => 27,
  ]);
});

// ── Add custom fields to Testimonial edit screen ──
add_action('add_meta_boxes', function() {
  add_meta_box('aime_testi_meta', 'Testimonial Details', function($post) {
    $role = get_post_meta($post->ID, 'aime_testi_role', true);
    echo '<p><label><strong>Role / Company</strong><br>';
    echo '<input type="text" name="aime_testi_role" value="' . esc_attr($role) . '" style="width:100%;margin-top:4px"></label></p>';
    echo '<p style="color:#666;font-size:12px">• <strong>Title</strong> (above) = client name<br>• <strong>Content</strong> (below) = the quote text<br>• <strong>Role/Company</strong> = shown under their name</p>';
    wp_nonce_field('aime_testi_save', 'aime_testi_nonce');
  }, 'aime_testimonial', 'side');

  add_meta_box('aime_video_meta', 'Video Details', function($post) {
    $yt_id  = get_post_meta($post->ID, 'aime_video_id', true);
    $cat    = get_post_meta($post->ID, 'aime_video_cat', true);
    $lang   = get_post_meta($post->ID, 'aime_video_lang', true) ?: 'both';

    echo '<p><label><strong>YouTube Video ID</strong><br>';
    echo '<input type="text" name="aime_video_id" value="' . esc_attr($yt_id) . '" placeholder="e.g. B9gIAE_9gHY" style="width:100%;margin-top:4px"></label></p>';
    echo '<p style="font-size:11px;color:#888">Paste the part after youtu.be/ or ?v=</p>';

    echo '<p><label><strong>Category</strong><br>';
    echo '<select name="aime_video_cat" style="width:100%;margin-top:4px">';
    $cats = ['body-skincare' => 'Body Skincare', 'fashion-jewelry' => 'Fashion & Jewelry', 'home-tech' => 'Home Tech', 'in-person' => 'In Person Business'];
    foreach ($cats as $val => $label) {
      echo '<option value="' . $val . '"' . selected($cat, $val, false) . '>' . $label . '</option>';
    }
    echo '</select></label></p>';

    echo '<p><label><strong>Language / Idioma</strong><br>';
    echo '<select name="aime_video_lang" style="width:100%;margin-top:4px">';
    $langs = ['both' => '🌐 English + Español', 'en' => '🇺🇸 English only', 'es' => '🇩🇴 Español only'];
    foreach ($langs as $val => $label) {
      echo '<option value="' . $val . '"' . selected($lang, $val, false) . '>' . $label . '</option>';
    }
    echo '</select></label></p>';
    echo '<p style="font-size:11px;color:#888">Used for EN/ES filter on the portfolio page</p>';

    wp_nonce_field('aime_video_save', 'aime_video_nonce');
  }, 'aime_video', 'side');
});

// ── Save custom fields ──
add_action('save_post', function($post_id) {
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (isset($_POST['aime_testi_nonce']) && wp_verify_nonce($_POST['aime_testi_nonce'], 'aime_testi_save')) {
    update_post_meta($post_id, 'aime_testi_role', sanitize_text_field($_POST['aime_testi_role'] ?? ''));
  }
  if (isset($_POST['aime_video_nonce']) && wp_verify_nonce($_POST['aime_video_nonce'], 'aime_video_save')) {
    update_post_meta($post_id, 'aime_video_id',  sanitize_text_field($_POST['aime_video_id'] ?? ''));
    update_post_meta($post_id, 'aime_video_cat', sanitize_text_field($_POST['aime_video_cat'] ?? ''));
    update_post_meta($post_id, 'aime_video_lang', sanitize_text_field($_POST['aime_video_lang'] ?? 'both'));
  }
});

// ── Helper: get all testimonials ──
function aime_get_testimonials() {
  $posts = get_posts(['post_type' => 'aime_testimonial', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC']);
  $out = [];
  foreach ($posts as $p) {
    $out[] = [
      'quote'  => apply_filters('the_content', $p->post_content),
      'author' => get_the_title($p),
      'role'   => get_post_meta($p->ID, 'aime_testi_role', true),
    ];
  }
  return $out;
}

// ── Helper: get all brand logos ──
function aime_get_brands() {
  $posts = get_posts(['post_type' => 'aime_brand', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC']);
  $out = [];
  foreach ($posts as $p) {
    $thumb = get_the_post_thumbnail_url($p->ID, 'medium');
    if ($thumb) $out[] = ['url' => $thumb, 'name' => get_the_title($p)];
  }
  return $out;
}

// ── Helper: get all portfolio videos ──
function aime_get_videos() {
  $posts = get_posts(['post_type' => 'aime_video', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC']);
  $out = [];
  foreach ($posts as $p) {
    $id  = get_post_meta($p->ID, 'aime_video_id', true);
    $cat = get_post_meta($p->ID, 'aime_video_cat', true);
    $lang = get_post_meta($p->ID, 'aime_video_lang', true) ?: 'both';
    if ($id) $out[] = ['id' => $id, 'cat' => $cat ?: 'body-skincare', 'lang' => $lang, 'label' => get_the_title($p)];
  }
  return $out;
}


// ═══════════════════════════════════════════════
// ADMIN: ONE-CLICK VIDEO SEEDER
// Appears under Portfolio Videos → Import All Videos
// ═══════════════════════════════════════════════

add_action('admin_menu', function() {
  add_submenu_page(
    'edit.php?post_type=aime_video',
    'Import All Videos',
    '⬇ Import All Videos',
    'manage_options',
    'aime-seed-videos',
    'aime_seed_videos_page'
  );
});

function aime_seed_videos_page() {
  $message = '';

  if (isset($_POST['aime_do_seed']) && wp_verify_nonce($_POST['_wpnonce'], 'aime_seed')) {
    $videos = [
      // Body Skincare
      ['B9gIAE_9gHY', 'body-skincare', 'Body Skincare Video 1'],
      ['seza0-f9hZk',  'body-skincare', 'Body Skincare Video 2'],
      ['Xoca4_ycyuY',  'body-skincare', 'Body Skincare Video 3'],
      ['fksnHahW-BI',  'body-skincare', 'Body Skincare Video 4'],
      ['aN5qCWWE7Wk',  'body-skincare', 'Body Skincare Video 5'],
      ['Zl1bxHqxhgw',  'body-skincare', 'Body Skincare Video 6'],
      ['00cOfnRUtKE',  'body-skincare', 'Body Skincare Video 7'],
      ['RPx-MnVq30o',  'body-skincare', 'Body Skincare Video 8'],
      ['ugQBRBYjuVE',  'body-skincare', 'Body Skincare Video 9'],
      ['VJ9eCKQykvY',  'body-skincare', 'Body Skincare Video 10'],
      ['Fs-7kOxIWLw',  'body-skincare', 'Body Skincare Video 11'],
      ['gl753Q9SRuM',  'body-skincare', 'Body Skincare Video 12'],
      ['wQWC3yWc_TE',  'body-skincare', 'Body Skincare Video 13'],
      ['QF2h0iZAi3Y',  'body-skincare', 'Body Skincare Video 14'],
      ['0ymtSxPXzm0',  'body-skincare', 'Body Skincare Video 15'],
      ['4NLh2azYFkk',  'body-skincare', 'Body Skincare Video 16'],
      ['VaiROtbHBkc',  'body-skincare', 'Body Skincare Video 17'],
      ['n8e4YvXR1f0',  'body-skincare', 'Body Skincare Video 18'],
      ['m0fz-6xAp-w',  'body-skincare', 'Body Skincare Video 19'],
      ['_0ZMJVRLIMs',  'body-skincare', 'Body Skincare Video 20'],
      // Fashion & Jewelry
      ['Ruhw2tqrUwA',  'fashion-jewelry', 'Fashion & Jewelry Video 1'],
      ['iNv-N3c04Ig',  'fashion-jewelry', 'Fashion & Jewelry Video 2'],
      ['2Hzowq07RPY',  'fashion-jewelry', 'Fashion & Jewelry Video 3'],
      ['lWvrNfUW8Uc',  'fashion-jewelry', 'Fashion & Jewelry Video 4'],
      ['SlG5YxIIChg',  'fashion-jewelry', 'Fashion & Jewelry Video 5'],
      ['1u6fKVuD8Bs',  'fashion-jewelry', 'Fashion & Jewelry Video 6'],
      ['tv7biMf4-I0',  'fashion-jewelry', 'Fashion & Jewelry Video 7'],
      // Home Tech
      ['XELbRexFh1o',  'home-tech', 'Home Tech Video 1'],
      ['ahkFU-btnHo',  'home-tech', 'Home Tech Video 2'],
      ['ZEu10cIQZFA',  'home-tech', 'Home Tech Video 3'],
      ['wiYfv2RBJX8',  'home-tech', 'Home Tech Video 4'],
      // In Person Business
      ['BSd75iqGte8',  'in-person', 'In Person Business Video 1'],
      ['kNWwjJz5Q5g',  'in-person', 'In Person Business Video 2'],
    ];

    $created = 0; $skipped = 0;
    foreach ($videos as [$yt_id, $cat, $title]) {
      // Check if already exists
      $existing = get_posts(['post_type' => 'aime_video', 'meta_key' => 'aime_video_id', 'meta_value' => $yt_id, 'posts_per_page' => 1]);
      if ($existing) { $skipped++; continue; }

      $post_id = wp_insert_post([
        'post_title'  => $title,
        'post_type'   => 'aime_video',
        'post_status' => 'publish',
        'menu_order'  => $created,
      ]);
      if ($post_id && !is_wp_error($post_id)) {
        update_post_meta($post_id, 'aime_video_id',  $yt_id);
        update_post_meta($post_id, 'aime_video_cat', $cat);
        update_post_meta($post_id, 'aime_video_lang', 'both');
        $created++;
      }
    }
    $message = "<div class='notice notice-success'><p>✅ Created <strong>{$created}</strong> videos. Skipped <strong>{$skipped}</strong> (already existed). <a href='edit.php?post_type=aime_video'>View all videos →</a></p></div>";
  }

  echo '<div class="wrap">';
  echo '<h1>Import All Portfolio Videos</h1>';
  echo $message;
  echo '<p>This will create all 33 videos as Portfolio Video posts, pre-filled with their YouTube IDs and categories. Language defaults to <strong>Both</strong> — edit each video to set EN or ES.</p>';
  echo '<p style="margin-top:12px;color:#666">Already-existing videos will be skipped (safe to run multiple times).</p>';
  echo '<form method="post" style="margin-top:24px">';
  wp_nonce_field('aime_seed');
  echo '<input type="hidden" name="aime_do_seed" value="1">';
  echo '<button type="submit" class="button button-primary button-large">⬇ Import All 33 Videos</button>';
  echo '</form>';
  echo '</div>';
}
