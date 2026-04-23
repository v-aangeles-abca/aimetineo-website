<?php
/**
 * Template Name: Aimé Coaching Form
 * Standalone intake form page — links from coaching page
 */
$email = get_theme_mod('aime_cta_email', 'aimetineo.social@gmail.com');
$coaching_page = get_page_by_path('coaching');
$coaching_url  = $coaching_page ? get_permalink($coaching_page->ID) : home_url('/coaching/');
get_header(); ?>

<style>

*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
:root {
  --cream: #fdf8f2; --blush: #e8c5b0; --terra: #c4714a;
  --deep: #2a1f1a; --mid: #6b4c3b; --light: #a07060;
  --accent: #d4956a; --white: #ffffff;
  --lavender: #B8A9C9; --gold: #C4A87C;
  --font-h: 'Playfair Display', serif;
  --font-b: 'Inter', sans-serif;
}
html { -webkit-font-smoothing: antialiased; scroll-behavior: smooth; }
body { background: var(--cream); font-family: var(--font-b); color: var(--deep); min-height: 100vh; }
body::before {
  content: ''; position: fixed; inset: 0; pointer-events: none; z-index: 0;
  background:
    radial-gradient(ellipse 60% 50% at 10% 20%, rgba(232,197,176,0.35) 0%, transparent 60%),
    radial-gradient(ellipse 50% 60% at 90% 80%, rgba(196,113,74,0.15) 0%, transparent 55%);
}

/* NAV */
nav {
  position: sticky; top: 0; z-index: 100;
  display: flex; align-items: center; justify-content: space-between;
  padding: 0 clamp(24px,6vw,80px); height: 68px;
  background: rgba(253,248,242,0.92); backdrop-filter: blur(12px);
  border-bottom: 1px solid rgba(196,113,74,0.15);
}
.nav-logo { font-family: var(--font-h); font-size: 20px; font-weight: 700; color: var(--deep); text-decoration: none; }
.nav-logo span { color: var(--terra); }
.nav-back {
  display: inline-flex; align-items: center; gap: 8px;
  font-size: 13px; font-weight: 500; color: var(--mid);
  text-decoration: none; transition: color 0.2s;
  padding: 8px 18px; border-radius: 100px;
  border: 1px solid rgba(196,113,74,0.25);
}
.nav-back:hover { color: var(--terra); border-color: var(--terra); }

/* PAGE HEADER */
.page-header {
  position: relative; z-index: 1;
  text-align: center; padding: 64px clamp(24px,6vw,80px) 48px;
}
.page-badge {
  display: inline-block; background: var(--terra); color: var(--white);
  font-size: 10px; font-weight: 500; letter-spacing: 0.2em;
  text-transform: uppercase; padding: 6px 18px; border-radius: 100px; margin-bottom: 20px;
}
.page-header h1 {
  font-family: var(--font-h); font-size: clamp(32px, 5vw, 56px);
  font-weight: 700; line-height: 1.1; color: var(--deep); margin-bottom: 16px;
}
.page-header h1 em { font-style: italic; color: var(--terra); }
.page-header p { font-size: 15px; color: var(--mid); line-height: 1.7; max-width: 440px; margin: 0 auto; font-weight: 300; }

/* STEPS INDICATOR */
.steps {
  display: flex; justify-content: center; align-items: center;
  gap: 0; margin: 32px auto 48px; max-width: 480px;
  position: relative; z-index: 1;
}
.step {
  display: flex; flex-direction: column; align-items: center; gap: 6px;
  flex: 1;
}
.step-dot {
  width: 32px; height: 32px; border-radius: 50%;
  background: rgba(232,197,176,0.5); border: 2px solid var(--blush);
  display: flex; align-items: center; justify-content: center;
  font-size: 12px; font-weight: 600; color: var(--mid);
}
.step.done .step-dot { background: var(--terra); border-color: var(--terra); color: var(--white); }
.step-label { font-size: 10px; text-transform: uppercase; letter-spacing: 1px; color: var(--light); }
.step-line { flex: 1; height: 1px; background: var(--blush); margin: 0 -8px; position: relative; top: -14px; }

/* FORM CONTAINER */
.form-wrap {
  position: relative; z-index: 1;
  max-width: 680px; margin: 0 auto;
  padding: 0 clamp(16px,4vw,40px) 80px;
}


  :root {
    --cream: #fdf8f2;
    --blush: #e8c5b0;
    --terracotta: #c4714a;
    --deep: #2a1f1a;
    --mid: #6b4c3b;
    --light-mid: #a07060;
    --accent: #d4956a;
    --white: #ffffff;
    --shadow: rgba(42, 31, 26, 0.1);
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    background: var(--cream);
    font-family: 'DM Sans', sans-serif;
    color: var(--deep);
    min-height: 100vh;
    position: relative;
    overflow-x: hidden;
  }

  /* Background texture */
  body::before {
    content: '';
    position: fixed;
    inset: 0;
    background:
      radial-gradient(ellipse 60% 50% at 10% 20%, rgba(232,197,176,0.35) 0%, transparent 60%),
      radial-gradient(ellipse 50% 60% at 90% 80%, rgba(196,113,74,0.15) 0%, transparent 55%);
    pointer-events: none;
    z-index: 0;
  }

  .container {
    position: relative;
    z-index: 1;
    max-width: 680px;
    margin: 0 auto;
    padding: 60px 24px 80px;
  }

  /* Header */
  .header {
    text-align: center;
    margin-bottom: 56px;
    animation: fadeDown 0.8s ease both;
  }

  .badge {
    display: inline-block;
    background: var(--terracotta);
    color: var(--white);
    font-size: 10px;
    font-weight: 500;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    padding: 6px 18px;
    border-radius: 100px;
    margin-bottom: 20px;
  }

  .header h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(32px, 6vw, 48px);
    font-weight: 700;
    line-height: 1.15;
    color: var(--deep);
    margin-bottom: 16px;
  }

  .header h1 em {
    font-style: italic;
    color: var(--terracotta);
  }

  .header p {
    font-size: 15px;
    color: var(--mid);
    line-height: 1.7;
    max-width: 420px;
    margin: 0 auto;
    font-weight: 300;
  }

  /* Decorative line */
  .divider {
    display: flex;
    align-items: center;
    gap: 16px;
    margin: 40px 0;
  }
  .divider::before, .divider::after {
    content: '';
    flex: 1;
    height: 1px;
    background: var(--blush);
  }
  .divider span {
    font-size: 18px;
    color: var(--accent);
  }

  /* Form card */
  .form-card {
    background: var(--white);
    border-radius: 24px;
    padding: 48px 40px;
    box-shadow: 0 4px 40px var(--shadow);
    border: 1px solid rgba(232,197,176,0.4);
    animation: fadeUp 0.9s ease 0.2s both;
  }

  /* Sections */
  .section-label {
    font-family: 'Playfair Display', serif;
    font-size: 18px;
    font-weight: 700;
    color: var(--deep);
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .section-label .num {
    width: 28px;
    height: 28px;
    background: var(--blush);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 500;
    color: var(--terracotta);
    flex-shrink: 0;
  }

  .section-block {
    margin-bottom: 40px;
    padding-bottom: 40px;
    border-bottom: 1px solid rgba(232,197,176,0.4);
  }
  .section-block:last-of-type {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
  }

  /* Field groups */
  .field-group {
    margin-bottom: 22px;
  }

  label {
    display: block;
    font-size: 13px;
    font-weight: 500;
    color: var(--mid);
    letter-spacing: 0.04em;
    text-transform: uppercase;
    margin-bottom: 8px;
  }

  label .required {
    color: var(--terracotta);
    margin-left: 3px;
  }

  label .hint {
    font-size: 11px;
    color: var(--light-mid);
    text-transform: none;
    letter-spacing: 0;
    font-weight: 300;
    margin-left: 6px;
  }

  input[type="text"],
  input[type="email"],
  input[type="url"],
  input[type="number"],
  select,
  textarea {
    width: 100%;
    background: var(--cream);
    border: 1.5px solid var(--blush);
    border-radius: 12px;
    padding: 13px 16px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    color: var(--deep);
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
    appearance: none;
  }

  input:focus, select:focus, textarea:focus {
    border-color: var(--terracotta);
    background: var(--white);
    box-shadow: 0 0 0 3px rgba(196,113,74,0.12);
  }

  textarea {
    resize: vertical;
    min-height: 90px;
    line-height: 1.6;
  }

  /* Select arrow */
  .select-wrap {
    position: relative;
  }
  .select-wrap::after {
    content: '▾';
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--light-mid);
    pointer-events: none;
    font-size: 14px;
  }

  /* Two columns */
  .two-col {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
  }

  /* Checkbox / radio grid */
  .check-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
    gap: 10px;
  }

  .check-item {
    position: relative;
  }

  .check-item input {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
  }

  .check-item label {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 14px;
    background: var(--cream);
    border: 1.5px solid var(--blush);
    border-radius: 10px;
    cursor: pointer;
    font-size: 13px;
    color: var(--mid);
    text-transform: none;
    letter-spacing: 0;
    font-weight: 400;
    transition: all 0.18s;
  }

  .check-item label::before {
    content: '';
    width: 16px;
    height: 16px;
    border-radius: 4px;
    border: 1.5px solid var(--blush);
    background: var(--white);
    flex-shrink: 0;
    transition: all 0.18s;
  }

  .check-item input:checked + label {
    background: rgba(196,113,74,0.08);
    border-color: var(--terracotta);
    color: var(--terracotta);
    font-weight: 500;
  }

  .check-item input:checked + label::before {
    background: var(--terracotta);
    border-color: var(--terracotta);
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 10 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 4L3.5 6.5L9 1' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
    background-size: 10px 8px;
    background-repeat: no-repeat;
    background-position: center;
  }

  /* Radio pill */
  .radio-pill-group {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
  }

  .radio-pill {
    position: relative;
  }
  .radio-pill input {
    position: absolute;
    opacity: 0;
    width: 0; height: 0;
  }
  .radio-pill label {
    padding: 9px 18px;
    background: var(--cream);
    border: 1.5px solid var(--blush);
    border-radius: 100px;
    cursor: pointer;
    font-size: 13px;
    color: var(--mid);
    text-transform: none;
    letter-spacing: 0;
    font-weight: 400;
    transition: all 0.18s;
  }
  .radio-pill input:checked + label {
    background: var(--terracotta);
    border-color: var(--terracotta);
    color: var(--white);
    font-weight: 500;
  }

  /* Scale */
  .scale-group {
    display: flex;
    gap: 8px;
    align-items: center;
  }
  .scale-label {
    font-size: 11px;
    color: var(--light-mid);
    white-space: nowrap;
  }
  .scale-btns {
    display: flex;
    gap: 6px;
    flex: 1;
    justify-content: center;
  }
  .scale-btn {
    position: relative;
  }
  .scale-btn input {
    position: absolute;
    opacity: 0;
    width: 0; height: 0;
  }
  .scale-btn label {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    background: var(--cream);
    border: 1.5px solid var(--blush);
    cursor: pointer;
    font-size: 13px;
    font-weight: 500;
    color: var(--mid);
    text-transform: none;
    letter-spacing: 0;
    transition: all 0.15s;
  }
  .scale-btn input:checked + label {
    background: var(--terracotta);
    border-color: var(--terracotta);
    color: var(--white);
  }

  /* Submit button */
  .submit-wrap {
    margin-top: 40px;
    text-align: center;
  }

  button[type="submit"] {
    background: var(--terracotta);
    color: var(--white);
    border: none;
    padding: 16px 48px;
    border-radius: 100px;
    font-family: 'DM Sans', sans-serif;
    font-size: 15px;
    font-weight: 500;
    cursor: pointer;
    letter-spacing: 0.02em;
    transition: all 0.2s;
    box-shadow: 0 4px 20px rgba(196,113,74,0.35);
  }

  button[type="submit"]:hover {
    background: var(--mid);
    transform: translateY(-2px);
    box-shadow: 0 8px 28px rgba(196,113,74,0.3);
  }

  button[type="submit"]:active {
    transform: translateY(0);
  }

  /* Success state */
  .success {
    display: none;
    text-align: center;
    padding: 60px 20px;
    animation: fadeUp 0.6s ease both;
  }

  .success .icon {
    font-size: 56px;
    margin-bottom: 20px;
  }

  .success h2 {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    color: var(--deep);
    margin-bottom: 12px;
  }

  .success p {
    color: var(--mid);
    font-size: 15px;
    line-height: 1.6;
  }

  /* Animations */
  @keyframes fadeDown {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(24px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @media (max-width: 520px) {
    .form-card { padding: 32px 20px; }
    .two-col { grid-template-columns: 1fr; }
    .scale-btns { gap: 4px; }
    .scale-btn label { width: 30px; height: 30px; font-size: 12px; }
  }

  /* Success state toggled via URL fragment (#success-state) after form submit */
  #success-state { display: none; }
  #success-state:target { display: block; }
  body:has(#success-state:target) #form-content { display: none; }
  body:has(#success-state:target) .header p { display: none; }


/* Override form CSS to match page */
.form-card {
  border-radius: 24px !important;
  box-shadow: 0 8px 48px rgba(42,31,26,0.1) !important;
}

/* FOOTER */
.page-footer {
  position: relative; z-index: 1;
  text-align: center; padding: 28px;
  border-top: 1px solid rgba(232,197,176,0.4);
  font-size: 12px; color: var(--light);
}
.page-footer a { color: var(--terra); text-decoration: none; }

/* LANG TOGGLE */
.form-lang-toggle {
  display: inline-flex; align-items: center; gap: 6px;
  background: rgba(232,197,176,0.3); border-radius: 100px;
  padding: 6px 14px; border: 1.5px solid var(--blush);
  cursor: pointer; font-family: var(--font-b);
  font-size: 11px; font-weight: 700; letter-spacing: 1.5px;
}
.flang { color: var(--light); cursor: pointer; transition: color 0.2s; }
.flang.active { color: var(--terra); }

/* PROGRESS BAR */
.progress-bar {
  position: fixed; top: 68px; left: 0; right: 0; z-index: 99;
  height: 3px; background: rgba(232,197,176,0.3);
}
.progress-fill {
  height: 100%; background: linear-gradient(to right, var(--terra), var(--accent));
  width: 0%; transition: width 0.3s ease;
}

</style>

<!-- PROGRESS BAR -->
<div class="progress-bar"><div class="progress-fill" id="progress-fill"></div></div>

<!-- PAGE HEADER -->
<div class="page-header">
  <div class="page-badge">✦ Sesión 1:1 · Creadora de Contenido</div>
  <h1 class="page-header-h1">Cuéntame sobre ti,<br><em>futura creadora</em></h1>
  <p class="page-header-sub">Este formulario me ayuda a personalizar tu sesión para que salgas con un plan real y accionable para ti.</p>
</div>

<!-- FORM -->
<div class="form-wrap">
  <div class="form-card">
    <form id="form-content" action="https://script.google.com/macros/s/AKfycbykMPI4esuJPEbvXs2Olt2iij5lnLGWv3R9KZgKj8bSHIZedeBmD22TXg_rrqBWRmmQ/exec" method="post">

      <!-- SECCIÓN 1: DATOS PERSONALES -->
      <div class="section-block">
        <div class="section-label"><span class="num">1</span> Sobre ti</div>

        <div class="two-col">
          <div class="field-group">
            <label>Tu nombre <span class="required">*</span></label>
            <input type="text" placeholder="Ej. Valentina" id="nombre" name="nombre" required>
          </div>
          <div class="field-group">
            <label>Tu edad</label>
            <input type="number" placeholder="25" min="13" max="80" id="edad" name="edad">
          </div>
        </div>

        <div class="field-group">
          <label>Correo electrónico <span class="required">*</span></label>
          <input type="email" placeholder="hola@correo.com" id="email" name="email" required>
        </div>

        <div class="field-group">
          <label>País / Ciudad</label>
          <input type="text" placeholder="Ej. Colombia, Bogotá" id="ubicacion" name="ubicacion">
        </div>

        <div class="field-group">
          <label>¿A qué te dedicas actualmente?</label>
          <textarea placeholder="Ej. Estudiante, trabajo en una empresa, soy mamá en casa, emprendedora…" id="ocupacion" name="ocupacion"></textarea>
        </div>
      </div>

      <!-- SECCIÓN 2: REDES ACTUALES -->
      <div class="section-block">
        <div class="section-label"><span class="num">2</span> Tu situación actual en redes</div>

        <div class="field-group">
          <label>¿Tienes redes sociales activas?</label>
          <div class="radio-pill-group">
            <div class="radio-pill"><input type="radio" name="redes_activas" id="r1" value="no_tengo"><label for="r1">Aún no tengo</label></div>
            <div class="radio-pill"><input type="radio" name="redes_activas" id="r2" value="tengo_personal"><label for="r2">Solo personales</label></div>
            <div class="radio-pill"><input type="radio" name="redes_activas" id="r3" value="tengo_creadora"><label for="r3">Ya soy creadora</label></div>
            <div class="radio-pill"><input type="radio" name="redes_activas" id="r4" value="inactiva"><label for="r4">Las tengo pero inactiva</label></div>
          </div>
        </div>

        <div class="field-group">
          <label>¿En qué plataformas quieres crecer? <span class="hint">(puede ser más de una)</span></label>
          <div class="check-grid">
            <div class="check-item"><input type="checkbox" name="plataforma" id="ig" value="instagram"><label for="ig">📸 Instagram</label></div>
            <div class="check-item"><input type="checkbox" name="plataforma" id="tt" value="tiktok"><label for="tt">🎵 TikTok</label></div>
            <div class="check-item"><input type="checkbox" name="plataforma" id="yt" value="youtube"><label for="yt">▶️ YouTube</label></div>
            <div class="check-item"><input type="checkbox" name="plataforma" id="pi" value="pinterest"><label for="pi">📌 Pinterest</label></div>
            <div class="check-item"><input type="checkbox" name="plataforma" id="tw" value="twitter"><label for="tw">🐦 X / Twitter</label></div>
            <div class="check-item"><input type="checkbox" name="plataforma" id="li" value="linkedin"><label for="li">💼 LinkedIn</label></div>
          </div>
        </div>

        <div class="field-group">
          <label>Link de tu perfil principal <span class="hint">(si tienes)</span></label>
          <input type="url" placeholder="https://instagram.com/tu_usuario" id="perfil_url" name="perfil_url">
        </div>

        <div class="field-group">
          <label>¿Cuántos seguidores tienes aproximadamente?</label>
          <div class="select-wrap">
            <select id="seguidores" name="seguidores">
              <option value="" disabled selected>Selecciona…</option>
              <option value="0">Aún no tengo cuenta</option>
              <option value="0-500">0 - 500</option>
              <option value="500-1k">500 - 1,000</option>
              <option value="1k-5k">1,000 - 5,000</option>
              <option value="5k-10k">5,000 - 10,000</option>
              <option value="10k+">Más de 10,000</option>
            </select>
          </div>
        </div>
      </div>

      <!-- SECCIÓN 3: NICHO Y CONTENIDO -->
      <div class="section-block">
        <div class="section-label"><span class="num">3</span> Tu nicho y contenido</div>

        <div class="field-group">
          <label>¿Sobre qué tema(s) te gustaría crear contenido?</label>
          <div class="check-grid">
            <div class="check-item"><input type="checkbox" name="nicho" id="n1" value="moda"><label for="n1">👗 Moda & Estilo</label></div>
            <div class="check-item"><input type="checkbox" name="nicho" id="n2" value="belleza"><label for="n2">💄 Belleza</label></div>
            <div class="check-item"><input type="checkbox" name="nicho" id="n3" value="fitness"><label for="n3">🏋️ Fitness</label></div>
            <div class="check-item"><input type="checkbox" name="nicho" id="n4" value="lifestyle"><label for="n4">✨ Lifestyle</label></div>
            <div class="check-item"><input type="checkbox" name="nicho" id="n5" value="viajes"><label for="n5">✈️ Viajes</label></div>
            <div class="check-item"><input type="checkbox" name="nicho" id="n6" value="cocina"><label for="n6">🍳 Cocina</label></div>
            <div class="check-item"><input type="checkbox" name="nicho" id="n7" value="maternidad"><label for="n7">👶 Maternidad</label></div>
            <div class="check-item"><input type="checkbox" name="nicho" id="n8" value="negocios"><label for="n8">💡 Negocios</label></div>
            <div class="check-item"><input type="checkbox" name="nicho" id="n9" value="finanzas"><label for="n9">💰 Finanzas</label></div>
            <div class="check-item"><input type="checkbox" name="nicho" id="n10" value="salud"><label for="n10">🌿 Salud</label></div>
            <div class="check-item"><input type="checkbox" name="nicho" id="n11" value="entretenimiento"><label for="n11">🎭 Entretenimiento</label></div>
            <div class="check-item"><input type="checkbox" name="nicho" id="n12" value="otro"><label for="n12">💬 Otro</label></div>
          </div>
        </div>

        <div class="field-group">
          <label>Cuéntame más sobre tu nicho <span class="hint">(en tus palabras)</span></label>
          <textarea placeholder="Ej. Me apasiona el maquillaje natural para latinas de piel morena, algo que no se habla mucho…" id="nicho_detalle" name="nicho_detalle"></textarea>
        </div>

        <div class="field-group">
          <label>¿Qué tipo de contenido te imaginas haciendo?</label>
          <div class="check-grid">
            <div class="check-item"><input type="checkbox" name="contenido" id="c1" value="reels"><label for="c1">🎬 Reels / Videos</label></div>
            <div class="check-item"><input type="checkbox" name="contenido" id="c2" value="fotos"><label for="c2">📷 Fotos</label></div>
            <div class="check-item"><input type="checkbox" name="contenido" id="c3" value="tutoriales"><label for="c3">📚 Tutoriales</label></div>
            <div class="check-item"><input type="checkbox" name="contenido" id="c4" value="vlogs"><label for="c4">🎥 Vlogs</label></div>
            <div class="check-item"><input type="checkbox" name="contenido" id="c5" value="podcasts"><label for="c5">🎙️ Podcast</label></div>
            <div class="check-item"><input type="checkbox" name="contenido" id="c6" value="lives"><label for="c6">🔴 Lives</label></div>
            <div class="check-item"><input type="checkbox" name="contenido" id="c7" value="carruseles"><label for="c7">🖼️ Carruseles</label></div>
            <div class="check-item"><input type="checkbox" name="contenido" id="c8" value="stories"><label for="c8">⭕ Stories</label></div>
          </div>
        </div>
      </div>

      <!-- SECCIÓN 4: METAS -->
      <div class="section-block">
        <div class="section-label"><span class="num">4</span> Tus metas</div>

        <div class="field-group">
          <label>¿Qué quieres lograr con tus redes sociales?</label>
          <div class="check-grid">
            <div class="check-item"><input type="checkbox" name="meta" id="m1" value="monetizar"><label for="m1">💸 Monetizar</label></div>
            <div class="check-item"><input type="checkbox" name="meta" id="m2" value="marca_personal"><label for="m2">🌟 Marca personal</label></div>
            <div class="check-item"><input type="checkbox" name="meta" id="m3" value="negocio"><label for="m3">🏪 Vender mi negocio</label></div>
            <div class="check-item"><input type="checkbox" name="meta" id="m4" value="comunidad"><label for="m4">🤝 Crear comunidad</label></div>
            <div class="check-item"><input type="checkbox" name="meta" id="m5" value="colaboraciones"><label for="m5">🤳 Colaboraciones</label></div>
            <div class="check-item"><input type="checkbox" name="meta" id="m6" value="expresarme"><label for="m6">🎨 Expresarme</label></div>
          </div>
        </div>

        <div class="field-group">
          <label>¿En cuánto tiempo te gustaría ver resultados?</label>
          <div class="radio-pill-group">
            <div class="radio-pill"><input type="radio" name="tiempo" id="t1" value="1mes"><label for="t1">1 mes</label></div>
            <div class="radio-pill"><input type="radio" name="tiempo" id="t2" value="3meses"><label for="t2">3 meses</label></div>
            <div class="radio-pill"><input type="radio" name="tiempo" id="t3" value="6meses"><label for="t3">6 meses</label></div>
            <div class="radio-pill"><input type="radio" name="tiempo" id="t4" value="1ano"><label for="t4">1 año</label></div>
            <div class="radio-pill"><input type="radio" name="tiempo" id="t5" value="sinplazo"><label for="t5">Sin plazo definido</label></div>
          </div>
        </div>

        <div class="field-group">
          <label>¿Cuántas horas a la semana puedes dedicarle a tu contenido?</label>
          <div class="radio-pill-group">
            <div class="radio-pill"><input type="radio" name="horas" id="h1" value="1-3"><label for="h1">1–3 horas</label></div>
            <div class="radio-pill"><input type="radio" name="horas" id="h2" value="4-7"><label for="h2">4–7 horas</label></div>
            <div class="radio-pill"><input type="radio" name="horas" id="h3" value="8-15"><label for="h3">8–15 horas</label></div>
            <div class="radio-pill"><input type="radio" name="horas" id="h4" value="15+"><label for="h4">Más de 15</label></div>
          </div>
        </div>
      </div>

      <!-- SECCIÓN 5: BLOQUEOS Y NIVEL -->
      <div class="section-block">
        <div class="section-label"><span class="num">5</span> Bloqueos y confianza</div>

        <div class="field-group">
          <label>¿Qué te ha frenado para empezar o crecer en redes?</label>
          <div class="check-grid">
            <div class="check-item"><input type="checkbox" name="bloqueo" id="b1" value="no_se_que_publicar"><label for="b1">❓ No sé qué publicar</label></div>
            <div class="check-item"><input type="checkbox" name="bloqueo" id="b2" value="miedo_camaras"><label for="b2">📹 Miedo a la cámara</label></div>
            <div class="check-item"><input type="checkbox" name="bloqueo" id="b3" value="que_diran"><label for="b3">👀 Qué dirán</label></div>
            <div class="check-item"><input type="checkbox" name="bloqueo" id="b4" value="tiempo"><label for="b4">⏰ Falta de tiempo</label></div>
            <div class="check-item"><input type="checkbox" name="bloqueo" id="b5" value="tecnica"><label for="b5">🔧 Temas técnicos</label></div>
            <div class="check-item"><input type="checkbox" name="bloqueo" id="b6" value="consistencia"><label for="b6">🔄 Ser constante</label></div>
            <div class="check-item"><input type="checkbox" name="bloqueo" id="b7" value="algoritmo"><label for="b7">🤖 El algoritmo</label></div>
            <div class="check-item"><input type="checkbox" name="bloqueo" id="b8" value="dinero"><label for="b8">💰 Falta de presupuesto</label></div>
          </div>
        </div>

        <div class="field-group">
          <label>¿Qué tan cómoda te sientes frente a la cámara? <span class="hint">(1 = nada cómoda · 5 = muy cómoda)</span></label>
          <div class="scale-group">
            <span class="scale-label">😰 Nada</span>
            <div class="scale-btns">
              <div class="scale-btn"><input type="radio" name="camara" id="sc1" value="1"><label for="sc1">1</label></div>
              <div class="scale-btn"><input type="radio" name="camara" id="sc2" value="2"><label for="sc2">2</label></div>
              <div class="scale-btn"><input type="radio" name="camara" id="sc3" value="3"><label for="sc3">3</label></div>
              <div class="scale-btn"><input type="radio" name="camara" id="sc4" value="4"><label for="sc4">4</label></div>
              <div class="scale-btn"><input type="radio" name="camara" id="sc5" value="5"><label for="sc5">5</label></div>
            </div>
            <span class="scale-label">😎 Muy cómoda</span>
          </div>
        </div>

        <div class="field-group">
          <label>¿Qué tan seguido publicas actualmente?</label>
          <div class="radio-pill-group">
            <div class="radio-pill"><input type="radio" name="frecuencia" id="f1" value="nunca"><label for="f1">Nunca</label></div>
            <div class="radio-pill"><input type="radio" name="frecuencia" id="f2" value="1-2_mes"><label for="f2">1–2 veces al mes</label></div>
            <div class="radio-pill"><input type="radio" name="frecuencia" id="f3" value="1_semana"><label for="f3">~1 vez por semana</label></div>
            <div class="radio-pill"><input type="radio" name="frecuencia" id="f4" value="varios_semana"><label for="f4">Varios días a la semana</label></div>
            <div class="radio-pill"><input type="radio" name="frecuencia" id="f5" value="diario"><label for="f5">A diario</label></div>
          </div>
        </div>
      </div>

      <!-- SECCIÓN 6: EXTRAS -->
      <div class="section-block">
        <div class="section-label"><span class="num">6</span> Para personalizar tu sesión</div>

        <div class="field-group">
          <label>¿Tienes referentes o creadoras que admiras? <span class="hint">(cuenta por qué, si quieres)</span></label>
          <textarea placeholder="Ej. Me encanta @dulceida por su autenticidad y @juandavidhincapie por su edición…" id="referentes" name="referentes"></textarea>
        </div>

        <div class="field-group">
          <label>¿Qué es lo más importante que quieres aprender o resolver en nuestra sesión?</label>
          <textarea placeholder="Ej. Quiero saber cómo encontrar mi nicho, qué equipo necesito para empezar y cómo no morir en el intento siendo constante…" id="prioridad" name="prioridad"></textarea>
        </div>

        <div class="field-group">
          <label>¿Tienes alguna pregunta que ya quieras traer preparada?</label>
          <textarea placeholder="Escribe aquí tus dudas más urgentes…" id="preguntas" name="preguntas"></textarea>
        </div>

        <div class="field-group">
          <label>¿Algo más que quieras que sepa antes de nuestra sesión?</label>
          <textarea placeholder="Puedes contarme lo que quieras: situación especial, limitaciones, sueños… ¡estoy aquí para ayudarte!" id="extra" name="extra"></textarea>
        </div>
      </div>

      <div class="submit-wrap">
        <button type="submit">Enviar formulario ✦</button>
      </div>

    </form><!-- /#form-content -->

    <!-- SUCCESS STATE -->
    <div class="success" id="success-state">
      <div class="icon">🌸</div>
      <h2>¡Listo, lo recibí!</h2>
      <p>Gracias por tomarte el tiempo de llenar esto.<br>Ya estoy preparando tu sesión personalizada. <br>¡Nos vemos pronto!</p>
    </div>
  </div>
</div>

<script>

// Progress bar on scroll
const fill = document.getElementById('progress-fill');
window.addEventListener('scroll', () => {
  const doc = document.documentElement;
  const pct = (doc.scrollTop / (doc.scrollHeight - doc.clientHeight)) * 100;
  if (fill) fill.style.width = Math.min(pct, 100) + '%';
});

// Form submit
const form = document.getElementById('form-content');
if (form) {
  form.addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = form.querySelector('button[type="submit"]');
    btn.textContent = 'Enviando…'; btn.disabled = true;
    try {
      await fetch(form.action, { method: 'POST', body: new FormData(form), mode: 'no-cors' });
      form.style.display = 'none';
      const s = document.getElementById('success-state');
      if (s) { s.style.display = 'block'; fill.style.width = '100%'; }
      window.scrollTo({ top: 0, behavior: 'smooth' });
    } catch(err) {
      btn.textContent = 'Error — intenta de nuevo';
      btn.disabled = false;
    }
  });
}


// ── FORM LANGUAGE TOGGLE ──
const FORM_LANG = {
  es: {
    badge: '✦ Sesión 1:1 · Creadora de Contenido',
    h1: 'Cuéntame sobre ti,<br><em>futura creadora</em>',
    sub: 'Este formulario me ayuda a personalizar tu sesión para que salgas con un plan real y accionable para ti.',
    submit: 'Enviar formulario ✦',
    sending: 'Enviando…',
    error: 'Error — intenta de nuevo',
    backLink: '← Volver al Coaching',
    s1: 'Sobre ti',
    s2: 'Tu situación actual en redes',
    s3: 'Tu nicho y contenido',
    s4: 'Tus metas',
    s5: 'Bloqueos y confianza',
    s6: 'Para personalizar tu sesión',
  },
  en: {
    badge: '✦ 1-on-1 Session · Content Creator',
    h1: 'Tell me about you,<br><em>future creator</em>',
    sub: 'This form helps me personalize your session so you leave with a real, actionable plan.',
    submit: 'Submit Form ✦',
    sending: 'Sending…',
    error: 'Error — please try again',
    backLink: '← Back to Coaching',
    s1: 'About You',
    s2: 'Your Current Social Media',
    s3: 'Your Niche & Content',
    s4: 'Your Goals',
    s5: 'Blocks & Confidence',
    s6: 'To Personalize Your Session',
  }
};

// Field-level translations
const FIELD_LANG = {
  es: {
    nombre: ['Tu nombre', 'Ej. Valentina'],
    edad: ['Tu edad', '25'],
    email: ['Correo electrónico', 'hola@correo.com'],
    ubicacion: ['País / Ciudad', 'Ej. Colombia, Bogotá'],
    ocupacion: ['¿A qué te dedicas actualmente?', 'Ej. Estudiante, trabajo en una empresa…'],
    redes_label: '¿Tienes redes sociales activas?',
    r1: 'Aún no tengo', r2: 'Solo personales', r3: 'Ya soy creadora', r4: 'Las tengo pero inactiva',
    plataforma_label: '¿En qué plataformas quieres crecer?',
    perfil_url: ['Link de tu perfil principal', 'https://instagram.com/tu_usuario'],
    seguidores_label: '¿Cuántos seguidores tienes aproximadamente?',
    seg0: 'Aún no tengo cuenta', seg1: '0 - 500', seg2: '500 - 1,000', seg3: '1,000 - 5,000', seg4: '5,000 - 10,000', seg5: 'Más de 10,000',
    nicho_label: '¿Sobre qué tema(s) te gustaría crear contenido?',
    nicho_detalle: ['Cuéntame más sobre tu nicho', 'Ej. Me apasiona el maquillaje natural para latinas…'],
    contenido_label: '¿Qué tipo de contenido te imaginas haciendo?',
    meta_label: '¿Qué quieres lograr con tus redes sociales?',
    tiempo_label: '¿En cuánto tiempo te gustaría ver resultados?',
    t1:'1 mes', t2:'3 meses', t3:'6 meses', t4:'1 año', t5:'Sin plazo definido',
    horas_label: '¿Cuántas horas a la semana puedes dedicarle a tu contenido?',
    h1:'1–3 horas', h2:'4–7 horas', h3:'8–15 horas', h4:'Más de 15',
    bloqueo_label: '¿Qué te ha frenado para empezar o crecer en redes?',
    camara_label: '¿Qué tan cómoda te sientes frente a la cámara? (1 = nada cómoda · 5 = muy cómoda)',
    camara_min: '😰 Nada', camara_max: '😎 Muy cómoda',
    frecuencia_label: '¿Qué tan seguido publicas actualmente?',
    f1:'Nunca', f2:'1–2 veces al mes', f3:'~1 vez por semana', f4:'Varios días a la semana', f5:'A diario',
    referentes: ['¿Tienes referentes o creadoras que admiras?', 'Ej. Me encanta @dulceida por su autenticidad…'],
    prioridad: ['¿Qué es lo más importante que quieres aprender?', 'Ej. Quiero saber cómo encontrar mi nicho…'],
    preguntas: ['¿Tienes alguna pregunta preparada?', 'Escribe aquí tus dudas más urgentes…'],
    extra: ['¿Algo más que quieras que sepa?', 'Puedes contarme lo que quieras…'],
    success_title: '¡Listo, lo recibí!',
    success_p: 'Gracias por tomarte el tiempo de llenar esto. Ya estoy preparando tu sesión personalizada. ¡Nos vemos pronto!',
  },
  en: {
    nombre: ['Your name', 'e.g. Valentina'],
    edad: ['Your age', '25'],
    email: ['Email address', 'hello@email.com'],
    ubicacion: ['Country / City', 'e.g. USA, New York'],
    ocupacion: ['What do you do currently?', 'e.g. Student, corporate job, stay-at-home mom, entrepreneur…'],
    redes_label: 'Do you have active social media?',
    r1: "Don't have any yet", r2: 'Personal accounts only', r3: 'Already a creator', r4: 'Have them but inactive',
    plataforma_label: 'Which platforms do you want to grow on?',
    perfil_url: ['Link to your main profile', 'https://instagram.com/your_handle'],
    seguidores_label: 'How many followers do you have approximately?',
    seg0: "Don't have an account yet", seg1: '0 - 500', seg2: '500 - 1,000', seg3: '1,000 - 5,000', seg4: '5,000 - 10,000', seg5: 'More than 10,000',
    nicho_label: 'What topic(s) would you like to create content about?',
    nicho_detalle: ['Tell me more about your niche', 'e.g. I love natural makeup for Latinas with darker skin tones…'],
    contenido_label: 'What type of content do you imagine creating?',
    meta_label: 'What do you want to achieve with your social media?',
    tiempo_label: 'How soon would you like to see results?',
    t1:'1 month', t2:'3 months', t3:'6 months', t4:'1 year', t5:'No specific timeline',
    horas_label: 'How many hours a week can you dedicate to content?',
    h1:'1–3 hours', h2:'4–7 hours', h3:'8–15 hours', h4:'More than 15',
    bloqueo_label: "What's been holding you back from starting or growing?",
    camara_label: 'How comfortable are you in front of the camera? (1 = not at all · 5 = very comfortable)',
    camara_min: '😰 Not at all', camara_max: '😎 Very comfortable',
    frecuencia_label: 'How often do you currently post?',
    f1:'Never', f2:'1–2 times a month', f3:'~Once a week', f4:'Several days a week', f5:'Every day',
    referentes: ['Do you have creators you admire?', 'e.g. I love @dulceida for her authenticity…'],
    prioridad: ['What is the most important thing you want to learn?', 'e.g. I want to know how to find my niche…'],
    preguntas: ['Do you have any questions ready?', 'Write your most urgent questions here…'],
    extra: ['Anything else you want me to know?', 'Tell me anything: special situation, limitations, dreams…'],
    success_title: "Got it — I'll be in touch!",
    success_p: "Thank you for taking the time to fill this out. I'm already preparing your personalized session. See you soon!",
  }
};

let currentFormLang = localStorage.getItem('aime-form-lang') || 'es';

function applyFormLang(lang) {
  currentFormLang = lang;
  localStorage.setItem('aime-form-lang', lang);
  const t = FORM_LANG[lang];
  const f = FIELD_LANG[lang];

  // Toggle UI
  document.querySelectorAll('.flang').forEach(el => el.classList.toggle('active', el.dataset.lang === lang));
  document.documentElement.lang = lang;

  // Header
  const badge = document.querySelector('.page-badge');
  const h1 = document.querySelector('.page-header h1');
  const sub = document.querySelector('.page-header p');
  const backLink = document.querySelector('.nav-back');
  if (badge) badge.textContent = t.badge;
  if (h1) h1.innerHTML = t.h1;
  if (sub) sub.textContent = t.sub;
  if (backLink) backLink.textContent = t.backLink;

  // Section labels
  const sectionNums = document.querySelectorAll('.section-label');
  const sKeys = ['s1','s2','s3','s4','s5','s6'];
  sectionNums.forEach((el, i) => {
    const num = el.querySelector('.num');
    if (t[sKeys[i]]) el.innerHTML = (num ? num.outerHTML : '') + ' ' + t[sKeys[i]];
  });

  // Text inputs
  [['nombre','nombre'],['edad','edad'],['email','email'],['ubicacion','ubicacion'],
   ['ocupacion','ocupacion'],['perfil_url','perfil_url'],
   ['nicho_detalle','nicho_detalle'],['referentes','referentes'],
   ['prioridad','prioridad'],['preguntas','preguntas'],['extra','extra']
  ].forEach(([key, id]) => {
    const el = document.getElementById(id);
    const labelEl = el ? el.previousElementSibling || document.querySelector(`label[for="${id}"]`) : null;
    if (el && f[key]) {
      if (Array.isArray(f[key])) {
        el.placeholder = f[key][1];
        // Update associated label
        const lbl = document.querySelector(`label[for="${id}"]`);
        if (lbl) { const req = lbl.querySelector('.required'); const hint = lbl.querySelector('.hint'); lbl.textContent = f[key][0]; if(req) lbl.appendChild(req); if(hint) lbl.appendChild(hint); }
      }
    }
  });

  // Submit button
  const submitBtn = document.querySelector('button[type="submit"]');
  if (submitBtn && !submitBtn.disabled) submitBtn.textContent = t.submit;

  // Success state
  const successH2 = document.querySelector('.success h2');
  const successP = document.querySelector('.success p');
  if (successH2) successH2.textContent = f.success_title;
  if (successP) successP.textContent = f.success_p;

  // Add hidden lang field
  let langField = document.getElementById('_form_lang');
  if (!langField) {
    langField = document.createElement('input');
    langField.type = 'hidden'; langField.name = 'idioma'; langField.id = '_form_lang';
    document.getElementById('form-content')?.appendChild(langField);
  }
  langField.value = lang === 'es' ? 'Español' : 'English';
}

document.addEventListener('DOMContentLoaded', () => {
  applyFormLang(currentFormLang);
  document.querySelectorAll('.flang').forEach(opt => {
    opt.addEventListener('click', () => applyFormLang(opt.dataset.lang));
  });
  document.getElementById('form-lang-toggle')?.addEventListener('click', e => {
    if (!e.target.dataset.lang) applyFormLang(currentFormLang === 'es' ? 'en' : 'es');
  });
});


</script>

<?php get_footer(); ?>
