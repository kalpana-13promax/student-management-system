<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Happy Birthday, Engineer! 🎉</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet"/>
  <style>
    :root{
      --bg:#0a0f1b;          /* deep blueprint navy */
      --grid:#0f1e3a;        /* blueprint grid lines */
      --card:#0f1526cc;      /* glass card */
      --text:#e7efff;        /* primary text */
      --muted:#a9b7d9;       /* secondary */
      --accent:#53e0ff;      /* cyan accent */
      --accent-2:#8b5cf6;    /* violet accent */
      --glow: 0 0 18px rgba(83,224,255,.45), 0 0 48px rgba(139,92,246,.25);
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0; 
      color:var(--text);
      font-family:"Poppins", system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, "Helvetica Neue", "Noto Sans", Arial, "Apple Color Emoji", "Segoe UI Emoji";
      background:
        radial-gradient(1200px 800px at 80% -10%, rgba(139,92,246,.25), transparent 60%),
        radial-gradient(800px 800px at -10% 110%, rgba(83,224,255,.2), transparent 60%),
        linear-gradient(0deg, rgba(255,255,255,.03), rgba(255,255,255,.03)),
        var(--bg);
      min-height:100%;
      display:grid; place-items:center; padding:24px;
    }

    /* Blueprint grid overlay */
    body::before{
      content:""; position:fixed; inset:0; pointer-events:none; opacity:.35;
      background-image:
        linear-gradient(to right, var(--grid) 1px, transparent 1px),
        linear-gradient(to bottom, var(--grid) 1px, transparent 1px);
      background-size: 36px 36px, 36px 36px;
      mask-image: radial-gradient(circle at center, #000 70%, transparent 100%);
    }

    .card{
      width:min(920px, 92vw); position:relative; overflow:hidden; border-radius:28px;
      background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.02));
      backdrop-filter: blur(10px);
      border:1px solid rgba(255,255,255,.12);
      box-shadow: 0 10px 40px rgba(0,0,0,.4), var(--glow);
    }

    /* Accent edges */
    .card::before, .card::after{
      content:""; position:absolute; inset:0; pointer-events:none; border-radius:inherit;
    }
    .card::before{ /* glowing border */
      padding:2px; background:linear-gradient(135deg, var(--accent), transparent 30%, var(--accent-2));
      -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
      -webkit-mask-composite: xor; mask-composite: exclude;
    }
    .card::after{ /* diagonal accent stripe */
      background: linear-gradient(120deg, transparent 65%, rgba(83,224,255,.08) 70%, rgba(139,92,246,.14) 80%, transparent 85%);
      mix-blend-mode: screen;
    }

    .inner{padding: clamp(20px, 4vw, 40px); position:relative; z-index:2}

    header{
      display:flex; gap:18px; align-items:center; flex-wrap:wrap; justify-content:space-between;
      border-bottom:1px dashed rgba(255,255,255,.12); padding-bottom:18px; margin-bottom:18px;
    }
    .badge{
      display:inline-flex; align-items:center; gap:10px; padding:8px 14px; border-radius:999px;
      background: rgba(83,224,255,.08); border:1px solid rgba(83,224,255,.35); box-shadow: var(--glow);
      font-weight:600; letter-spacing:.3px;
    }
    .badge .dot{width:10px; height:10px; border-radius:50%; background: radial-gradient(circle at 35% 35%, #fff, var(--accent)); box-shadow: 0 0 12px var(--accent)}

    h1{
      margin:10px 0 6px; font-family:"Space Grotesk", sans-serif; line-height:1.05; font-size: clamp(28px, 5vw, 56px);
      text-shadow: 0 2px 0 rgba(0,0,0,.35);
    }
    .name{color:var(--accent); text-shadow:0 0 18px rgba(83,224,255,.4)}
    p.lead{margin:0; color:var(--muted); font-size: clamp(14px, 2.2vw, 18px)}

    /* Engineering flair: animated gears */
    .gears{
      position:absolute; inset:0; pointer-events:none; z-index:1; opacity:.65;
    }
    .gear{position:absolute; filter: drop-shadow(0 6px 12px rgba(0,0,0,.5));}
    .gear svg{display:block; opacity:.9}
    /* positions */
    .g1{left:-70px; top:-70px; width:180px; animation:spin 24s linear infinite}
    .g2{right:-50px; top:20px; width:140px; animation:spinR 30s linear infinite}
    .g3{left:40px; bottom:-60px; width:120px; animation:spin 22s linear infinite}
    .g4{right:60px; bottom:-70px; width:200px; animation:spinR 28s linear infinite}
    @keyframes spin{to{transform:rotate(360deg)}}
    @keyframes spinR{to{transform:rotate(-360deg)}}

    /* Content grid */
    .grid{
      display:grid; gap:18px; margin-top:12px; align-items:start;
      grid-template-columns: 1.2fr .8fr;
    }
    @media (max-width: 820px){ .grid{ grid-template-columns: 1fr; } }

    .wish{
      background:rgba(255,255,255,.04); border:1px solid rgba(255,255,255,.12); border-radius:20px;
      padding:22px; line-height:1.7;
    }
    .wish p{margin:0 0 10px}
    .wish .quote{font-style:italic}

    .facts{
      display:grid; gap:12px;
    }
    .chip{
      padding:12px 14px; border-radius:16px; border:1px dashed rgba(255,255,255,.18);
      background: linear-gradient(180deg, rgba(139,92,246,.18), rgba(139,92,246,0) 60%);
      font-size:14px; color:var(--text);
    }

    /* footer actions */
    .actions{
      display:flex; gap:10px; flex-wrap:wrap; margin-top:16px;
    }
    .btn{
      appearance:none; border:none; cursor:pointer; padding:12px 16px; border-radius:14px; font-weight:700;
      letter-spacing:.4px; transition:.2s transform, .2s filter; font-family:inherit;
    }
    .btn:active{transform:translateY(1px)}
    .btn.primary{
      background: linear-gradient(135deg, var(--accent), var(--accent-2)); color:#041018; box-shadow: var(--glow);
    }
    .btn.ghost{ background:rgba(255,255,255,.08); color:var(--text); border:1px solid rgba(255,255,255,.18); }

    /* editable fields (no JS needed) */
    [contenteditable]{
      outline:none; border-radius:8px; padding:2px 6px; transition:.2s background;
    }
    [contenteditable]:focus{ background: rgba(83,224,255,.08); }

    /* subtle floating animation */
    .floaty{ animation: floaty 6s ease-in-out infinite; }
    @keyframes floaty{
      0%,100%{ transform: translateY(0) }
      50%{ transform: translateY(-6px) }
    }

    /* ... tumhara purana CSS yahin rahega ... */

    /* Confetti */
    .confetti {
      position: fixed;
      top: -10px;
      width: 8px; height: 14px;
      background: red;
      opacity: 0.9;
      animation: fall linear forwards;
    }
    @keyframes fall {
      to {
        transform: translateY(110vh) rotate(360deg);
        opacity: 0;
      }
    }

    /* Balloons */
    .balloon {
      position: fixed;
      bottom: -150px;
      width: 60px; height: 80px;
      border-radius: 50%;
      background: red;
      box-shadow: inset -8px -12px rgba(0,0,0,.2);
      animation: rise 10s linear forwards;
    }
    .balloon::after {
      content:"";
      position:absolute;
      bottom:-20px; left:50%;
      width:2px; height:30px;
      background:#fff;
      transform:translateX(-50%);
    }
    @keyframes rise {
      to {
        transform: translateY(-120vh) rotate(20deg);
        opacity: 0;
      }
    }
  </style>
</head>
<body>
    <!-- Confetti + Balloons container -->
  <div id="party"></div>

  <!-- yahan tumhara card code unchanged aayega -->
  <main class="card"> ... </main>

  <template id="gear"> ... </template>

  <main class="card">
    <!-- animated gears around the card -->
    <div class="gears" aria-hidden="true">
      <div class="gear g1">{GEAR}</div>
      <div class="gear g2">{GEAR}</div>
      <div class="gear g3">{GEAR}</div>
      <div class="gear g4">{GEAR}</div>
    </div>

    <div class="inner">
      <header>
        <span class="badge"><span class="dot"></span> Blueprint Certified Birthday Wish</span>
        <span class="badge">v1.0 · For Engineers ⚙️</span>
      </header>

      <div style="display:flex; align-items:center; gap:18px;">
        <div style="width:96px; height:96px; border-radius:50%; overflow:hidden; flex:0 0 96px; border:4px solid rgba(255,255,255,.06); background:linear-gradient(180deg, rgba(255,255,255,.02), rgba(255,255,255,.01)); display:grid; place-items:center;">
          <img id="profilePic" src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=400&auto=format&fit=crop&ixlib=rb-4.0.3&s=placeholder" alt="Profile" style="width:100%; height:100%; object-fit:cover;" />
        </div>
        <h1 class="floaty">Happy Birthday, <span class="name" contenteditable="true">Engineer Bhavya</span>! 🎉</h1>
      </div>
      <p class="lead">May your life compile without errors, your goals reach 100% completion, and your happiness scale to infinity ♾️</p>

      <section class="grid">
        <article class="wish">
          <p class="quote">“Machines follow logic, but legends like you design the logic.”</p>
          <p>
            Dear <span contenteditable="true">Friend</span>,
            wishing you a year full of bold ideas, precise plans, and flawless executions. May your <em>calculations</em> always converge and your <em>dreams</em> always find the optimal solution.
          </p>
          <p>Stay curious, keep building, and never stop engineering wonder. 🚀</p>

          <div class="actions">
            <button class="btn primary" onclick="window.print()">🖨️ Print / Save as PDF</button>
            <a class="btn ghost" href="#" onclick="navigator.clipboard.writeText(document.title + ' — Sent with ❤️'); return false;">📋 Copy Title</a>
          </div>
        </article>

        <aside class="facts">
          <div class="chip">🧠 Favorite Tool: <span contenteditable="true">AutoCAD / SolidWorks / VS Code</span></div>
          <div class="chip">⚙️ Specialty: <span contenteditable="true">Mechanical / Civil / Software / Electrical</span></div>
          <div class="chip">📐 Motto: <span contenteditable="true">“Measure twice, cut once.”</span></div>
          <div class="chip">🏅 Superpower: <span contenteditable="true">Turning ideas into reality</span></div>
          <div class="chip">🤝 From: <span contenteditable="true">Your Name</span></div>
        </aside>
      </section>
    </div>
  </main>

  <!-- gear SVG template injected in 4 places above -->
  <template id="gear">
    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <defs>
        <linearGradient id="grad" x1="0" x2="1" y1="0" y2="1">
          <stop offset="0%" stop-color="#53e0ff"/>
          <stop offset="100%" stop-color="#8b5cf6"/>
        </linearGradient>
      </defs>
      <circle cx="50" cy="50" r="30" fill="none" stroke="url(#grad)" stroke-width="12" stroke-linecap="round"/>
      <g fill="url(#grad)" opacity=".95">
        <rect x="48" y="2" width="4" height="16" rx="2"/>
        <rect x="48" y="82" width="4" height="16" rx="2"/>
        <rect x="2" y="48" width="16" height="4" rx="2"/>
        <rect x="82" y="48" width="16" height="4" rx="2"/>
        <rect x="15" y="15" width="14" height="4" rx="2" transform="rotate(-45 22 17)"/>
        <rect x="71" y="81" width="14" height="4" rx="2" transform="rotate(-45 78 83)"/>
        <rect x="71" y="15" width="14" height="4" rx="2" transform="rotate(45 78 17)"/>
        <rect x="15" y="81" width="14" height="4" rx="2" transform="rotate(45 22 83)"/>
      </g>
      <circle cx="50" cy="50" r="6" fill="#0a0f1b" stroke="url(#grad)" stroke-width="4"/>
    </svg>
  </template>

  <script>
    // Replace {GEAR} placeholders with SVG from template (keeps HTML clean)
    const gearMarkup = document.getElementById('gear').innerHTML;
    document.querySelectorAll('.gear').forEach(g => g.innerHTML = gearMarkup);
     function createConfetti() {
      const c = document.createElement("div");
      c.className = "confetti";
      c.style.left = Math.random() * 100 + "vw";
      c.style.background = `hsl(${Math.random()*360},100%,50%)`;
      c.style.animationDuration = (3 + Math.random()*3) + "s";
      document.getElementById("party").appendChild(c);
      setTimeout(() => c.remove(), 6000);
    }
    setInterval(createConfetti, 150);

    // Balloon generator
    function createBalloon() {
      const b = document.createElement("div");
      b.className = "balloon";
      b.style.left = Math.random() * 90 + "vw";
      b.style.background = `hsl(${Math.random()*360},70%,55%)`;
      b.style.animationDuration = (8 + Math.random()*5) + "s";
      document.getElementById("party").appendChild(b);
      setTimeout(() => b.remove(), 13000);
    }
    setInterval(createBalloon, 2500);

  </script>
</body>
</html>
