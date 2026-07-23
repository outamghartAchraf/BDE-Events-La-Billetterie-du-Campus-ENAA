{{--
    resources/views/auth/login.blade.php
    BDE-Events — Connexion
    Palette alignée sur la page d'accueil (thème "billet / boarding-pass").
    Tailwind via CDN, aucune étape de build requise.
--}}
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Connexion — BDE·Events</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,500;0,9..144,600;0,9..144,700;0,9..144,900&family=Inter:wght@400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">

<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          ink:      '#1B1B2F',
          surface:  '#232338',
          panel:    '#2A2A45',
          line:     '#3A3A56',
          mist:     '#B9B4A6',
          paper:    '#FAF7EF',
          gold:     '#E8A33D',
          'gold-soft': '#F0BB66',
          stub:     '#C1443C',
        },
        fontFamily: {
          display: ['Fraunces', 'serif'],
          body: ['Inter', 'sans-serif'],
          mono: ['"Space Mono"', 'monospace'],
        },
      },
    },
  }
</script>

<style>
  body { background: #1B1B2F; }

  .dot-grid {
    background-image: radial-gradient(rgba(250,247,239,0.08) 1px, transparent 1px);
    background-size: 22px 22px;
  }

  /* Badge / ticket-stub signature element — same language as the homepage cards */
  .badge { position: relative; isolation: isolate; }
  .badge::before {
    content: "";
    position: absolute;
    top: -14px; left: 50%;
    transform: translateX(-50%);
    width: 46px; height: 46px;
    border-radius: 999px;
    background: #1B1B2F;
    box-shadow: inset 0 0 0 1px #3A3A56;
    z-index: 3;
  }
  .badge::after {
    content: "";
    position: absolute;
    top: -3px; left: 50%;
    transform: translateX(-50%);
    width: 18px; height: 18px;
    border-radius: 999px;
    background: #121220;
    z-index: 4;
  }

  .barcode span {
    display: inline-block;
    width: 3px;
    background: rgba(250,247,239,0.35);
    margin-right: 3px;
  }

  @keyframes rise {
    from { opacity: 0; transform: translateY(14px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .rise { animation: rise 0.7s cubic-bezier(0.16,1,0.3,1) both; }

  .glow-btn { transition: box-shadow 0.25s ease, transform 0.15s ease; }
  .glow-btn:hover {
    box-shadow: 0 0 0 1px rgba(232,163,61,0.5), 0 10px 30px -8px rgba(232,163,61,0.45);
    transform: translateY(-1px);
  }
  .glow-btn:active { transform: translateY(0); }

  /* Custom checkbox */
  .chk {
    appearance: none;
    width: 16px; height: 16px;
    border-radius: 5px;
    border: 1px solid #3A3A56;
    background: #232338;
    display: inline-block;
    position: relative;
    cursor: pointer;
    transition: background 0.15s ease, border-color 0.15s ease;
  }
  .chk:checked {
    background: #E8A33D;
    border-color: #E8A33D;
  }
  .chk:checked::after {
    content: "";
    position: absolute;
    left: 5px; top: 1.5px;
    width: 4px; height: 8px;
    border: solid #1B1B2F;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
  }

  @media (prefers-reduced-motion: reduce) {
    .rise { animation: none; }
    .glow-btn { transition: none; }
  }

  input:focus-visible, button:focus-visible, a:focus-visible {
    outline: 2px solid #F0BB66;
    outline-offset: 2px;
  }
</style>
</head>

<body class="min-h-screen font-body text-paper antialiased">

  <div class="min-h-screen grid lg:grid-cols-2">

    {{-- LEFT — Brand panel --}}
    <div class="hidden lg:flex relative flex-col justify-between bg-ink dot-grid px-14 py-12 border-r border-line overflow-hidden">

      <span class="font-display font-semibold tracking-tight text-sm text-mist">
        BDE<span class="text-gold-soft">·</span>Events
      </span>

      <div class="flex-1 flex items-center justify-center">
        <div class="badge rise w-72 bg-panel border border-line rounded-[28px] shadow-2xl shadow-black/50 px-6 pt-9 pb-6">

          <div class="w-16 h-16 rounded-2xl bg-gold/15 border border-gold/30 flex items-center justify-center mx-auto mb-4">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#F0BB66" stroke-width="2">
              <rect x="3" y="11" width="18" height="10" rx="2"/>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
          </div>

          <p class="text-center font-display font-semibold text-base text-paper mb-0.5">
            Bon retour
          </p>
          <p class="text-center text-xs text-mist mb-5">Ton pass t'attend</p>

          <div class="flex items-center justify-between text-[10px] font-mono text-mist border-t border-line pt-3.5">
            <span>ID·2026</span>
            <span class="text-stub">SESSION</span>
          </div>

          <div class="barcode flex items-end h-6 mt-3 opacity-70" aria-hidden="true">
            <span style="height:50%"></span><span style="height:90%"></span><span style="height:35%"></span>
            <span style="height:75%"></span><span style="height:45%"></span><span style="height:95%"></span>
            <span style="height:30%"></span><span style="height:65%"></span><span style="height:55%"></span>
            <span style="height:85%"></span><span style="height:40%"></span><span style="height:70%"></span>
            <span style="height:60%"></span><span style="height:35%"></span><span style="height:80%"></span>
          </div>
        </div>
      </div>

      <p class="max-w-sm text-sm text-mist leading-relaxed">
        Retrouve tes billets, tes inscriptions et les prochains événements du campus en un instant.
      </p>
    </div>

    {{-- RIGHT — Form panel --}}
    <div class="flex items-center justify-center px-6 py-14">
      <div class="w-full max-w-sm rise" style="animation-delay:.1s">

        <div class="lg:hidden mb-8">
          <span class="font-display font-semibold tracking-tight text-sm text-mist">
            BDE<span class="text-gold-soft">·</span>Events
          </span>
        </div>

        <h1 class="font-display font-bold text-3xl text-paper mb-2">Connecte-toi</h1>
        <p class="text-mist text-sm mb-8">Accède à tes événements et à tes billets.</p>

        {{-- Session status (Breeze) --}}
        @if (session('status'))
          <div class="mb-6 rounded-xl bg-gold/10 border border-gold/30 px-4 py-3.5 text-sm text-gold-soft">
            {{ session('status') }}
          </div>
        @endif

        @if ($errors->any())
          <div class="mb-6 rounded-xl bg-stub/10 border border-stub/30 px-4 py-3.5">
            <ul class="text-red-300 text-sm space-y-1">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
          @csrf

          <div>
            <label for="email" class="block text-xs text-mist mb-1.5">Email étudiant</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
              placeholder="prenom.nom@etu.campus.ma" required autofocus
              class="w-full bg-surface border border-line rounded-lg px-3.5 py-2.5 text-sm text-paper placeholder:text-mist/50 focus:border-gold-soft transition-colors">
          </div>

          <div>
            <div class="flex items-center justify-between mb-1.5">
              <label for="password" class="block text-xs text-mist">Mot de passe</label>
              @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-xs text-gold-soft hover:text-paper transition-colors">
                  Mot de passe oublié ?
                </a>
              @endif
            </div>
            <input id="password" type="password" name="password" required
              placeholder="••••••••"
              class="w-full bg-surface border border-line rounded-lg px-3.5 py-2.5 text-sm text-paper placeholder:text-mist/50 focus:border-gold-soft transition-colors">
          </div>

          <label class="flex items-center gap-2.5 pt-1 cursor-pointer select-none">
            <input type="checkbox" name="remember" class="chk">
            <span class="text-sm text-mist">Rester connecté</span>
          </label>

          <button type="submit"
            class="glow-btn w-full bg-gold hover:bg-gold-soft text-ink font-display font-semibold text-sm rounded-lg py-3.5 mt-2">
            Se connecter
          </button>
        </form>

        @if (Route::has('register'))
          <p class="text-center text-sm text-mist mt-7">
            Pas encore de compte ?
            <a href="{{ route('register') }}" class="text-gold-soft hover:text-paper font-semibold transition-colors">Créer un compte</a>
          </p>
        @endif
      </div>
    </div>

  </div>
</body>
</html>