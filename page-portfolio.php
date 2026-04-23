<?php
/**
 * Template Name: Aimé Portfolio
 * Full portfolio page — all videos with filters
 */
$t      = get_template_directory_uri();
$email  = get_theme_mod('aime_cta_email', 'aimetineo.social@gmail.com');

// Get CMS videos if available
$cms_videos    = aime_get_videos();
$has_cms_videos = count($cms_videos) > 0;

get_header(); ?>

<!-- PAGE HERO -->
<section class="port-page-hero">
  <div class="port-page-hero-inner">
    <span class="section-tag">Creative Work</span>
    <h1 class="port-page-title">Full Portfolio</h1>
    <p class="port-page-sub">UGC content across beauty, fashion, home tech, and more — scroll, filter, and click to watch.</p>
  </div>
</section>

<!-- FULL VIDEO GALLERY -->
<section class="port-page-gallery">
  <div style="max-width:var(--max);margin:0 auto;padding:0 var(--pad);">

    <div class="port-filters port-filters-full">
      <button class="port-filter active" data-cat="all">All <span class="filter-count" id="fc-all"></span></button>
      <button class="port-filter" data-cat="body-skincare">Body Skincare <span class="filter-count" id="fc-body-skincare"></span></button>
      <button class="port-filter" data-cat="fashion-jewelry">Fashion & Jewelry <span class="filter-count" id="fc-fashion-jewelry"></span></button>
      <button class="port-filter" data-cat="home-tech">Home Tech <span class="filter-count" id="fc-home-tech"></span></button>
      <button class="port-filter" data-cat="in-person">In Person Business <span class="filter-count" id="fc-in-person"></span></button>
    </div>

    <div class="port-lang-filters">
      <span class="port-lang-label" data-i18n="port.lang">Language:</span>
      <button class="port-lang active" data-lang="all" data-i18n="port.all">All</button>
      <button class="port-lang" data-lang="en">English</button>
      <button class="port-lang" data-lang="es">Español</button>
    </div>

    <div class="video-grid video-grid-full" id="video-grid-full"></div>

    <div class="port-show-more" id="port-show-more-wrap">
      <button class="btn-ghost" id="show-more-full">Load More</button>
    </div>
  </div>
</section>

<!-- LIGHTBOX -->
<div id="vid-lightbox">
  <div class="lb-inner">
    <button class="lb-close" id="lb-close">✕</button>
    <div class="lb-frame-wrap">
      <iframe id="lb-iframe" src="" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
  </div>
</div>

<!-- CTA STRIP -->
<section class="port-cta-strip">
  <div style="max-width:var(--max);margin:0 auto;padding:0 var(--pad);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:24px;">
    <div>
      <h2 style="font-family:var(--font-h);font-size:clamp(22px,3vw,36px);color:var(--cream);font-weight:600;line-height:1.2;">Like what you see?</h2>
      <p style="color:rgba(245,240,235,0.6);margin-top:8px;font-size:15px;">Let's create content like this for your brand.</p>
    </div>
    <a href="mailto:<?php echo esc_attr($email); ?>" class="btn-cream">Get In Touch</a>
  </div>
</section>

<style>
/* ── PORTFOLIO PAGE SPECIFIC ── */
.port-page-hero {
  background: var(--cream);
  padding: 140px var(--pad) 80px;
  text-align: center;
}
.port-page-title {
  font-family: var(--font-h);
  font-size: clamp(40px, 6vw, 80px);
  font-weight: 600; color: var(--dark);
  letter-spacing: -1px; line-height: 1.05;
  margin-bottom: 20px;
}
.port-page-sub {
  font-size: clamp(15px, 1.3vw, 18px);
  color: var(--muted); font-weight: 300;
  max-width: 520px; margin: 0 auto; line-height: 1.7;
}
.port-page-gallery {
  padding: 60px 0 100px;
  background: var(--white);
}
.port-filters-full {
  margin-bottom: 40px;
  justify-content: flex-start;
}
.filter-count {
  display: inline-flex; align-items: center; justify-content: center;
  background: rgba(45,42,38,0.1); border-radius: 100px;
  font-size: 10px; font-weight: 600;
  padding: 1px 7px; margin-left: 4px;
  min-width: 22px;
}
.port-filter.active .filter-count { background: rgba(255,255,255,0.2); }

.port-lang-filters {
  display: flex; align-items: center; gap: 8px;
  margin-bottom: 40px; padding-bottom: 32px;
  border-bottom: 1px solid rgba(45,42,38,0.08);
  flex-wrap: wrap;
}
.port-lang-label {
  font-size: 11px; text-transform: uppercase; letter-spacing: 2px;
  color: var(--muted); margin-right: 6px;
}
.port-lang {
  padding: 8px 18px; border-radius: 100px;
  background: transparent; border: 1px solid rgba(45,42,38,0.15);
  color: var(--muted); font-size: 13px; font-weight: 500;
  cursor: pointer; transition: all 0.2s; font-family: inherit;
}
.port-lang:hover { border-color: var(--dark); color: var(--dark); }
.port-lang.active { background: var(--lavender); color: var(--white); border-color: var(--lavender); }
.video-grid-full {
  grid-template-columns: repeat(5, 1fr) !important;
}
.port-cta-strip {
  background: var(--dark);
  padding: 60px var(--pad);
}
@media (max-width: 1100px) { .video-grid-full { grid-template-columns: repeat(4, 1fr) !important; } }
@media (max-width: 768px)  { .video-grid-full { grid-template-columns: repeat(2, 1fr) !important; } }
</style>

<?php
// Inject CMS videos if available
if ($has_cms_videos):
  echo '<script>window.AIME_CMS_VIDEOS = ' . json_encode($cms_videos) . ';</script>';
endif;
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const VIDEOS = (window.AIME_CMS_VIDEOS && window.AIME_CMS_VIDEOS.length > 0) ? window.AIME_CMS_VIDEOS : [
    { id: 'B9gIAE_9gHY', cat: 'body-skincare', label: 'Body Skincare' },
    { id: 'seza0-f9hZk', cat: 'body-skincare', label: 'Body Skincare' },
    { id: 'Xoca4_ycyuY', cat: 'body-skincare', label: 'Body Skincare' },
    { id: 'fksnHahW-BI', cat: 'body-skincare', label: 'Body Skincare' },
    { id: 'aN5qCWWE7Wk', cat: 'body-skincare', label: 'Body Skincare' },
    { id: 'Zl1bxHqxhgw', cat: 'body-skincare', label: 'Body Skincare' },
    { id: '00cOfnRUtKE', cat: 'body-skincare', label: 'Body Skincare' },
    { id: 'RPx-MnVq30o', cat: 'body-skincare', label: 'Body Skincare' },
    { id: 'ugQBRBYjuVE', cat: 'body-skincare', label: 'Body Skincare' },
    { id: 'VJ9eCKQykvY', cat: 'body-skincare', label: 'Body Skincare' },
    { id: 'Fs-7kOxIWLw', cat: 'body-skincare', label: 'Body Skincare' },
    { id: 'gl753Q9SRuM', cat: 'body-skincare', label: 'Body Skincare' },
    { id: 'wQWC3yWc_TE', cat: 'body-skincare', label: 'Body Skincare' },
    { id: 'QF2h0iZAi3Y', cat: 'body-skincare', label: 'Body Skincare' },
    { id: '0ymtSxPXzm0', cat: 'body-skincare', label: 'Body Skincare' },
    { id: '4NLh2azYFkk', cat: 'body-skincare', label: 'Body Skincare' },
    { id: 'VaiROtbHBkc', cat: 'body-skincare', label: 'Body Skincare' },
    { id: 'n8e4YvXR1f0', cat: 'body-skincare', label: 'Body Skincare' },
    { id: 'm0fz-6xAp-w', cat: 'body-skincare', label: 'Body Skincare' },
    { id: '_0ZMJVRLIMs', cat: 'body-skincare', label: 'Body Skincare' },
    { id: 'Ruhw2tqrUwA', cat: 'fashion-jewelry', label: 'Fashion & Jewelry' },
    { id: 'iNv-N3c04Ig', cat: 'fashion-jewelry', label: 'Fashion & Jewelry' },
    { id: '2Hzowq07RPY', cat: 'fashion-jewelry', label: 'Fashion & Jewelry' },
    { id: 'lWvrNfUW8Uc', cat: 'fashion-jewelry', label: 'Fashion & Jewelry' },
    { id: 'SlG5YxIIChg', cat: 'fashion-jewelry', label: 'Fashion & Jewelry' },
    { id: '1u6fKVuD8Bs', cat: 'fashion-jewelry', label: 'Fashion & Jewelry' },
    { id: 'tv7biMf4-I0', cat: 'fashion-jewelry', label: 'Fashion & Jewelry' },
    { id: 'XELbRexFh1o', cat: 'home-tech', label: 'Home Tech' },
    { id: 'ahkFU-btnHo', cat: 'home-tech', label: 'Home Tech' },
    { id: 'ZEu10cIQZFA', cat: 'home-tech', label: 'Home Tech' },
    { id: 'wiYfv2RBJX8', cat: 'home-tech', label: 'Home Tech' },
    { id: 'BSd75iqGte8', cat: 'in-person', label: 'In Person Business' },
    { id: 'kNWwjJz5Q5g', cat: 'in-person', label: 'In Person Business' },
  ];

  const grid        = document.getElementById('video-grid-full');
  const showMoreBtn = document.getElementById('show-more-full');
  const lightbox    = document.getElementById('vid-lightbox');
  const lbIframe    = document.getElementById('lb-iframe');
  const lbClose     = document.getElementById('lb-close');

  let activeCat    = 'all';
  let activeLang   = 'all';
  let visibleCount = 20;

  // Populate filter counts
  const cats = ['all','body-skincare','fashion-jewelry','home-tech','in-person'];
  cats.forEach(cat => {
    const el = document.getElementById('fc-' + cat);
    if (el) el.textContent = cat === 'all' ? VIDEOS.length : VIDEOS.filter(v => v.cat === cat).length;
  });

  function filterVideos() {
    return VIDEOS.filter(v => {
      const catMatch = activeCat === 'all' || v.cat === activeCat;
      const langMatch = activeLang === 'all' || !v.lang || v.lang === activeLang || v.lang === 'both';
      return catMatch && langMatch;
    });
  }

  function renderGrid() {
    const filtered = filterVideos();
    grid.innerHTML = '';
    filtered.slice(0, visibleCount).forEach((v, i) => {
      const card = document.createElement('div');
      card.className = 'vid-card';
      card.innerHTML = `
        <img class="vid-thumb" src="https://img.youtube.com/vi/${v.id}/maxresdefault.jpg"
             alt="${v.label}" loading="lazy"
             onerror="this.src='https://img.youtube.com/vi/${v.id}/hqdefault.jpg'">
        <div class="vid-overlay"><span class="vid-cat">${v.label}</span></div>
        <div class="vid-play">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="#2D2A26"><path d="M6 3.5l7 4.5-7 4.5V3.5z"/></svg>
        </div>`;
      card.addEventListener('click', () => openLightbox(v.id));
      grid.appendChild(card);
      setTimeout(() => { card.style.opacity='1'; card.style.transform='translateY(0)'; }, i * 30);
    });
    if (showMoreBtn) {
      document.getElementById('port-show-more-wrap').style.display =
        filtered.length > visibleCount ? 'block' : 'none';
    }
  }

  function openLightbox(id) {
    lbIframe.src = `https://www.youtube.com/embed/${id}?autoplay=1&rel=0`;
    lightbox.classList.add('open');
    document.body.style.overflow = 'hidden';
  }
  function closeLightbox() {
    lightbox.classList.remove('open');
    lbIframe.src = '';
    document.body.style.overflow = '';
  }

  if (lbClose) lbClose.addEventListener('click', closeLightbox);
  if (lightbox) lightbox.addEventListener('click', e => { if (e.target === lightbox) closeLightbox(); });
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox(); });
  if (showMoreBtn) showMoreBtn.addEventListener('click', () => { visibleCount += 20; renderGrid(); });

  document.querySelectorAll('.port-filter').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.port-filter').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      activeCat = btn.dataset.cat;
      visibleCount = 20;
      renderGrid();
    });
  });

  document.querySelectorAll('.port-lang').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.port-lang').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      activeLang = btn.dataset.lang;
      visibleCount = 20;
      renderGrid();
    });
  });

  renderGrid();
});
</script>

<?php get_footer(); ?>
