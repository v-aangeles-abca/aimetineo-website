document.addEventListener('DOMContentLoaded', function() {

// ── BILINGUAL SYSTEM ──
const I18N = {
  en: {
    'nav.portfolio': 'Portfolio',
    'nav.about': 'About',
    'nav.services': 'Services',
    'nav.coaching': 'Coaching ✦',
    'nav.contact': 'Work With Me',
    // Homepage
    'hero.badge': '✦ UGC Creator · Influencer · Storyteller',
    'hero.seework': 'See My Work',
    'hero.collab': "Let's Collaborate",
    'hero.pill1': 'Voiceover Content',
    'hero.pill2': 'Lifestyle & Aesthetic',
    'hero.pill3': 'Product Demos',
    'hero.pill4': 'Bilingual EN/ES',
    'hero.badgelbl': 'Brand Collabs',
    'brands.tag': 'Trusted By',
    'brands.h2': '80+ Brands Worldwide',
    'contact.coaching': 'Explore Coaching ✦',
    'hero.scroll': 'Scroll',
    'brands.title': 'Trusted by leading beauty & lifestyle brands',
    'services.tag': 'What I Do',
    'services.h2': 'Content that <em>moves</em> people',
    'services.sub': 'I create scroll-stopping UGC, brand campaigns, and content strategies that turn viewers into buyers.',
    'services.ugc.title': 'UGC Content',
    'services.ugc.desc': 'Authentic, scroll-stopping user-generated content for brands in beauty, lifestyle, and wellness.',
    'services.brand.title': 'Brand Partnerships',
    'services.brand.desc': 'Long-form collaborations with storytelling that drives real conversion — not just reach.',
    'services.coach.title': 'Creator Coaching',
    'services.coach.desc': '1-on-1 sessions teaching aspiring creators how to build a career in social media.',
    'about.tag': 'About',
    'about.h2': 'Bilingual storyteller. Strategic creator.',
    'about.p1': "I'm Aimé — a Dominican-born content creator based between NYC and Miami. I specialize in beauty, lifestyle, and wellness content in both English and Spanish.",
    'about.p2': 'With over 80+ brand collaborations under my belt, I help brands reach Latina audiences authentically — and I coach the next generation of creators along the way.',
    'about.cta': 'Work with me →',
    'stats.collabs': 'Brand Collaborations',
    'stats.tiktok': 'TikTok Followers',
    'stats.instagram': 'Instagram Followers',
    'stats.students': 'Coaching Students',
    'portfolio.tag': 'Recent Work',
    'portfolio.h2': 'Selected brand collaborations',
    'portfolio.sub': 'A glimpse of my recent partnerships. Click any video to watch.',
    'portfolio.all': 'All',
    'portfolio.body': 'Body Skincare',
    'portfolio.fashion': 'Fashion & Jewelry',
    'portfolio.home': 'Home Tech',
    'portfolio.inperson': 'In-Person',
    'portfolio.viewfull': 'View Full Portfolio →',
    'portfolio.showmore': 'Show more',
    'testi.tag': 'Kind Words',
    'testi.h2': 'What brands & students say',
    'contact.tag': "Let's Connect",
    'contact.h2': "Let's create something memorable.",
    'contact.sub': 'Whether you want to partner on a campaign, book a coaching session, or just say hi — I respond to every email.',
    'contact.btn': 'Get in Touch',
    // Coaching page
    'coaching.hero.badge': '✦ 1-on-1 Creator Coaching',
    'coaching.hero.h1': 'Build your creator <em>career</em>',
    'coaching.hero.sub': 'Strategy, brand outreach, content systems — everything I wish I knew when I started. Taught 1-on-1 by a creator who actually does this for a living.',
    'coaching.cta.reserve': 'Reserve Your Session ✦',
    'coaching.cta.learn': 'Learn More',
    'c.hero.cta': 'Book a Free Intro Call',
    'c.hero.cta2': 'See Programs',
    'c.fw.tag': 'Is This For You?',
    'c.fw.h2': 'Made for creators at every stage',
    'c.off.tag': 'Programs & Pricing',
    'c.off.h2': 'Choose your path',
    'c.off.sub': 'Every session is personalized to your situation, goals, and content niche.',
    'c.off.book1': 'Book Review',
    'c.off.book2': 'Book Session',
    'c.off.book3': 'Book Assessment',
    'c.curr.tag': 'What We Cover',
    'c.curr.h2': 'Everything you need to build a creator business',
    'c.testi.tag': 'Student Results',
    'c.testi.h2': 'Real results, real creators',
    'c.about.tag': 'Your Coach',
    'c.about.h2': "Hi, I'm Aimé — and I've been where you are.",
    'c.faq.tag': 'Questions',
    'c.faq.h2': 'Frequently asked',
    'c.cta.tag': 'Ready to Start?',
    // Footer
    'footer.copy': '© 2026 Aimé Tineo. All rights reserved.',
    'footer.tagline': 'Content creator · Brand partnerships · Creator coaching',
  },
  es: {
    'nav.portfolio': 'Portafolio',
    'nav.about': 'Sobre Mí',
    'nav.services': 'Servicios',
    'nav.coaching': 'Coaching ✦',
    'nav.contact': 'Trabajemos Juntas',
    'hero.badge': '✦ Creadora UGC · Influencer · Narradora',
    'hero.seework': 'Ver Mi Trabajo',
    'hero.collab': 'Colaboremos',
    'hero.pill1': 'Contenido con Voz',
    'hero.pill2': 'Estilo de Vida & Estética',
    'hero.pill3': 'Demos de Productos',
    'hero.pill4': 'Bilingüe EN/ES',
    'hero.badgelbl': 'Colabs de Marcas',
    'brands.tag': 'Confían en Mí',
    'brands.h2': '80+ Marcas Mundialmente',
    'contact.coaching': 'Explorar Coaching ✦',
    'hero.scroll': 'Desliza',
    'brands.title': 'Marcas que han confiado en mí',
    'services.tag': 'Lo Que Hago',
    'services.h2': 'Contenido que <em>conecta</em>',
    'services.sub': 'Creo UGC auténtico, campañas de marca y estrategia de contenido que convierten espectadores en compradores.',
    'services.ugc.title': 'Contenido UGC',
    'services.ugc.desc': 'Contenido auténtico generado por usuarios para marcas de belleza, estilo de vida y bienestar.',
    'services.brand.title': 'Colaboraciones con Marcas',
    'services.brand.desc': 'Colaboraciones de formato largo con storytelling que impulsa conversiones reales — no solo alcance.',
    'services.coach.title': 'Coaching para Creadoras',
    'services.coach.desc': 'Sesiones 1 a 1 enseñando a creadoras aspirantes cómo construir una carrera en redes sociales.',
    'about.tag': 'Sobre Mí',
    'about.h2': 'Narradora bilingüe. Creadora estratégica.',
    'about.p1': 'Soy Aimé — una creadora de contenido dominicana basada entre NYC y Miami. Me especializo en contenido de belleza, estilo de vida y bienestar en inglés y español.',
    'about.p2': 'Con más de 80+ colaboraciones con marcas, ayudo a las marcas a conectar auténticamente con audiencias latinas — y entreno a la próxima generación de creadoras en el proceso.',
    'about.cta': 'Trabaja conmigo →',
    'stats.collabs': 'Colaboraciones con Marcas',
    'stats.tiktok': 'Seguidores en TikTok',
    'stats.instagram': 'Seguidores en Instagram',
    'stats.students': 'Estudiantes de Coaching',
    'portfolio.tag': 'Trabajos Recientes',
    'portfolio.h2': 'Colaboraciones seleccionadas',
    'portfolio.sub': 'Una muestra de mis colaboraciones recientes. Haz clic en cualquier video para verlo.',
    'portfolio.all': 'Todos',
    'portfolio.body': 'Cuidado Corporal',
    'portfolio.fashion': 'Moda y Joyería',
    'portfolio.home': 'Tecnología del Hogar',
    'portfolio.inperson': 'En Persona',
    'portfolio.viewfull': 'Ver Portafolio Completo →',
    'portfolio.showmore': 'Ver más',
    'testi.tag': 'Palabras Amables',
    'testi.h2': 'Lo que dicen marcas y estudiantes',
    'contact.tag': 'Conectemos',
    'contact.h2': 'Creemos algo memorable.',
    'contact.sub': 'Ya sea para colaborar en una campaña, agendar una sesión de coaching, o simplemente saludar — respondo a cada correo.',
    'contact.btn': 'Contáctame',
    'coaching.hero.badge': '✦ Coaching 1 a 1 para Creadoras',
    'coaching.hero.h1': 'Construye tu <em>carrera</em> de creadora',
    'coaching.hero.sub': 'Estrategia, contacto con marcas, sistemas de contenido — todo lo que me hubiera gustado saber cuando empecé. Enseñado 1 a 1 por una creadora que hace esto para vivir.',
    'coaching.cta.reserve': 'Reserva Tu Sesión ✦',
    'coaching.cta.learn': 'Saber Más',
    'c.hero.cta': 'Reserva una Llamada Gratis',
    'c.hero.cta2': 'Ver Programas',
    'c.fw.tag': '¿Es Para Ti?',
    'c.fw.h2': 'Hecho para creadoras en cada etapa',
    'c.off.tag': 'Programas & Precios',
    'c.off.h2': 'Elige tu camino',
    'c.off.sub': 'Cada sesión es personalizada a tu situación, metas y nicho de contenido.',
    'c.off.book1': 'Reservar Review',
    'c.off.book2': 'Reservar Sesión',
    'c.off.book3': 'Reservar Evaluación',
    'c.curr.tag': 'Lo Que Cubrimos',
    'c.curr.h2': 'Todo lo que necesitas para construir tu negocio de creadora',
    'c.testi.tag': 'Resultados de Estudiantes',
    'c.testi.h2': 'Resultados reales, creadoras reales',
    'c.about.tag': 'Tu Coach',
    'c.about.h2': 'Hola, soy Aimé — y he estado donde tú estás.',
    'c.faq.tag': 'Preguntas',
    'c.faq.h2': 'Preguntas frecuentes',
    'c.cta.tag': '¿Lista para empezar?',
    'footer.copy': '© 2026 Aimé Tineo. Todos los derechos reservados.',
    'footer.tagline': 'Creadora de contenido · Colaboraciones con marcas · Coaching para creadoras',
  }
};

let currentLang = localStorage.getItem('aime-lang') || 'en';

function applyLang(lang) {
  currentLang = lang;
  localStorage.setItem('aime-lang', lang);
  document.documentElement.lang = lang;

  // Update toggle UI
  document.querySelectorAll('.lang-opt').forEach(el => {
    el.classList.toggle('active', el.dataset.lang === lang);
  });

  // Apply translations to all [data-i18n] elements
  const dict = I18N[lang];
  document.querySelectorAll('[data-i18n]').forEach(el => {
    const key = el.dataset.i18n;
    if (dict[key] !== undefined) {
      el.innerHTML = dict[key];
    }
  });
  // Placeholders
  document.querySelectorAll('[data-i18n-ph]').forEach(el => {
    const key = el.dataset.i18nPh;
    if (dict[key] !== undefined) el.placeholder = dict[key];
  });
}

// Attach toggle listener
const langToggle = document.getElementById('lang-toggle');
if (langToggle) {
  langToggle.addEventListener('click', (e) => {
    const opt = e.target.closest('.lang-opt');
    if (opt) { applyLang(opt.dataset.lang); return; }
    // Click anywhere on toggle = switch
    applyLang(currentLang === 'en' ? 'es' : 'en');
  });
}

// Apply on load
applyLang(currentLang);

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
