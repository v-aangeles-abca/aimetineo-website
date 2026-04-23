document.addEventListener('DOMContentLoaded', function() {

// ── NAV SCROLL ──
const nav = document.getElementById('main-nav');
if (nav) {
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 40);
  });
}

// ── HAMBURGER ──
const hamburger = document.getElementById('hamburger');
if (hamburger) {
  hamburger.addEventListener('click', () => {
    const links = document.querySelector('.nav-links');
    if (!links) return;
    links.classList.toggle('mobile-open');
  });
}

// ── STATS COUNT-UP ──
function animateStat(el) {
  if (el.dataset.done) return;
  el.dataset.done = '1';
  const target = +el.dataset.target;
  const suffix = el.dataset.suffix || '';
  let cur = 0;
  const step = Math.max(target / 60, 0.5);
  const timer = setInterval(() => {
    cur = Math.min(cur + step, target);
    el.textContent = Math.round(cur) + suffix;
    if (cur >= target) clearInterval(timer);
  }, 25);
}

const counters = document.querySelectorAll('.stat-num[data-target]');
if (counters.length) {
  const statObs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) animateStat(e.target); });
  }, { threshold: 0.2 });
  counters.forEach(c => {
    // If already visible (page loaded scrolled down), animate immediately
    const rect = c.getBoundingClientRect();
    if (rect.top < window.innerHeight) {
      animateStat(c);
    } else {
      statObs.observe(c);
    }
  });
}

// ── FADE-IN ──
const fadeEls = document.querySelectorAll('.service-card, .testi-card, .stat-item, .fw-card, .off-card, .curr-item');
if (fadeEls.length) {
  const fadeObs = new IntersectionObserver(entries => {
    entries.forEach(el => {
      if (el.isIntersecting) { el.target.style.opacity='1'; el.target.style.transform='translateY(0)'; }
    });
  }, { threshold: 0.08 });
  fadeEls.forEach((el, i) => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = `opacity 0.55s ${i*0.06}s ease, transform 0.55s ${i*0.06}s ease`;
    const rect = el.getBoundingClientRect();
    if (rect.top < window.innerHeight) {
      el.style.opacity = '1'; el.style.transform = 'translateY(0)';
    } else {
      fadeObs.observe(el);
    }
  });
}

// ── FAQ ACCORDION ──
document.querySelectorAll('.faq-q').forEach(btn => {
  btn.addEventListener('click', () => {
    const item = btn.closest('.faq-item');
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
    if (!isOpen) item.classList.add('open');
  });
});

// ── VIDEO PORTFOLIO ──
const grid = document.getElementById('video-grid');
const showMoreBtn = document.getElementById('show-more-btn');
const lightbox = document.getElementById('vid-lightbox');
const lbIframe = document.getElementById('lb-iframe');
const lbClose = document.getElementById('lb-close');

if (grid) {
  // Use CMS videos if injected by PHP, otherwise fall back to hardcoded list
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

  let activeCat = 'all';
  let visibleCount = 8;

  function renderGrid() {
    const filtered = activeCat === 'all' ? VIDEOS : VIDEOS.filter(v => v.cat === activeCat);
    grid.innerHTML = '';
    filtered.forEach((v, i) => {
      if (i >= visibleCount) return;
      const card = document.createElement('div');
      card.className = 'vid-card';
      card.innerHTML = `
        <img class="vid-thumb" src="https://img.youtube.com/vi/${v.id}/maxresdefault.jpg" alt="${v.label}" loading="lazy" onerror="this.src='https://img.youtube.com/vi/${v.id}/hqdefault.jpg'">
        <div class="vid-overlay"><span class="vid-cat">${v.label}</span></div>
        <div class="vid-play">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="#2D2A26"><path d="M6 3.5l7 4.5-7 4.5V3.5z"/></svg>
        </div>`;
      card.addEventListener('click', () => openLightbox(v.id));
      grid.appendChild(card);
    });
    if (showMoreBtn) {
      showMoreBtn.style.display = filtered.length > visibleCount ? 'inline-flex' : 'none';
    }
    // Fade in new cards
    grid.querySelectorAll('.vid-card').forEach((el, i) => {
      el.style.opacity = '0'; el.style.transform = 'translateY(16px)';
      el.style.transition = `opacity 0.4s ${i*0.04}s ease, transform 0.4s ${i*0.04}s ease`;
      setTimeout(() => { el.style.opacity='1'; el.style.transform='translateY(0)'; }, 50);
    });
  }

  function openLightbox(id) {
    if (!lightbox || !lbIframe) return;
    lbIframe.src = `https://www.youtube.com/embed/${id}?autoplay=1&rel=0`;
    lightbox.classList.add('open');
    document.body.style.overflow = 'hidden';
  }
  function closeLightbox() {
    if (!lightbox || !lbIframe) return;
    lightbox.classList.remove('open');
    lbIframe.src = '';
    document.body.style.overflow = '';
  }

  if (lbClose) lbClose.addEventListener('click', closeLightbox);
  if (lightbox) lightbox.addEventListener('click', e => { if (e.target === lightbox) closeLightbox(); });
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox(); });

  if (showMoreBtn) {
    showMoreBtn.addEventListener('click', () => { visibleCount += 8; renderGrid(); });
  }

  document.querySelectorAll('.port-filter').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.port-filter').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      activeCat = btn.dataset.cat;
      visibleCount = 8;
      renderGrid();
    });
  });

  renderGrid();
}

}); // end DOMContentLoaded
