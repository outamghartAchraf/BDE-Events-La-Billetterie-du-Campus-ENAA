{{--
    resources/views/auth/register.blade.php
    BDE-Events — Création de compte
    Palette alignée sur la page d'accueil (thème "billet / boarding-pass").
    Tailwind via CDN, aucune étape de build requise.
--}}
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Créer un compte — BDE·Events</title>

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

  /* Dot-grid texture for the brand panel — no gradient blobs */
  .dot-grid {
    background-image: radial-gradient(rgba(250,247,239,0.08) 1px, transparent 1px);
    background-size: 22px 22px;
  }

  /* Badge / ticket-stub signature element — same language as the homepage cards */
  .badge {
    position: relative;
    isolation: isolate;
  }
  .badge::before {
    content: "";
    position: absolute;
    top: -14px;
    left: 50%;
    transform: translateX(-50%);
    width: 46px;
    height: 46px;
    border-radius: 999px;
    background: #1B1B2F;
    box-shadow: inset 0 0 0 1px #3A3A56;
    z-index: 3;
  }
  .badge::after {
    content: "";
    position: absolute;
    top: -3px;
    left: 50%;
    transform: translateX(-50%);
    width: 18px;
    height: 18px;
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

    {{-- LEFT — Brand panel with the membership-badge signature --}}
    <div class="hidden lg:flex relative flex-col justify-between bg-ink dot-grid px-14 py-12 border-r border-line overflow-hidden">

      <span class="font-display font-semibold tracking-tight text-sm text-mist">
        BDE<span class="text-gold-soft">·</span>Events
      </span>

      <div class="flex-1 flex items-center justify-center">
        <div class="badge rise w-72 bg-panel border border-line rounded-[28px] shadow-2xl shadow-black/50 px-6 pt-9 pb-6">

          <div class="w-16 h-16 rounded-2xl bg-gold/15 border border-gold/30 flex items-center justify-center mx-auto mb-4">
            <span id="badge-initial" class="font-display font-bold text-2xl text-gold-soft">B</span>
          </div>

          <p id="badge-name" class="text-center font-display font-semibold text-base text-paper mb-0.5">
            Ton nom ici
          </p>
          <p class="text-center text-xs text-mist mb-5">Membre · Campus</p>

          <div class="flex items-center justify-between text-[10px] font-mono text-mist border-t border-line pt-3.5">
            <span>ID·2026</span>
            <span class="text-stub">ACTIF</span>
          </div>

          <div class="barcode flex items-end h-6 mt-3 opacity-70" aria-hidden="true">
            <span style="height:60%"></span><span style="height:100%"></span><span style="height:40%"></span>
            <span style="height:80%"></span><span style="height:55%"></span><span style="height:90%"></span>
            <span style="height:35%"></span><span style="height:70%"></span><span style="height:50%"></span>
            <span style="height:95%"></span><span style="height:45%"></span><span style="height:65%"></span>
            <span style="height:30%"></span><span style="height:85%"></span><span style="height:60%"></span>
          </div>
        </div>
      </div>

      <p class="max-w-sm text-sm text-mist leading-relaxed">
        Un seul compte pour réserver tes places, suivre tes billets et vivre chaque événement du campus.
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

        <h1 class="font-display font-bold text-3xl text-paper mb-2">Créer ton compte</h1>
        <p class="text-mist text-sm mb-8">Rejoins la communauté étudiante et réserve en un clic.</p>

 

        <form action="{{ route('register.store') }}" method="POST" class="space-y-4">
          @csrf

          <div>
            <label for="name" class="block text-xs text-mist mb-1.5">Nom complet</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}"
              placeholder="Sofia El Amrani"   autofocus  
              oninput="document.getElementById('badge-name').textContent = this.value || 'Ton nom ici'; document.getElementById('badge-initial').textContent = (this.value.trim()[0] || 'B').toUpperCase();"
              class="w-full bg-surface border border-line rounded-lg px-3.5 py-2.5 text-sm text-paper placeholder:text-mist/50 focus:border-gold-soft transition-colors">
                @error('name')
                    <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                @enderror
          </div>

          <div>
            <label for="email" class="block text-xs text-mist mb-1.5">Email étudiant</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
              placeholder="prenom.nom@etu.campus.ma" 
              class="w-full bg-surface border border-line rounded-lg px-3.5 py-2.5 text-sm text-paper placeholder:text-mist/50 focus:border-gold-soft transition-colors">
                @error('email')
                    <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                @enderror
          </div>

          <div>
            <label for="password" class="block text-xs text-mist mb-1.5">Mot de passe</label>
            <input id="password" type="password" name="password"  
              placeholder="••••••••"
              class="w-full bg-surface border border-line rounded-lg px-3.5 py-2.5 text-sm text-paper placeholder:text-mist/50 focus:border-gold-soft transition-colors">
              @error('password')
                <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
              @enderror
          </div>

          <div>
            <label for="password_confirmation" class="block text-xs text-mist mb-1.5">Confirmer le mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation"  
              placeholder="••••••••"
              class="w-full bg-surface border border-line rounded-lg px-3.5 py-2.5 text-sm text-paper placeholder:text-mist/50 focus:border-gold-soft transition-colors">
              @error('password_confirmation')
                <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
              @enderror
          </div>

          <button type="submit"
            class="glow-btn w-full bg-gold hover:bg-gold-soft text-ink font-display font-semibold text-sm rounded-lg py-3.5 mt-2">
            Créer mon compte
          </button>
        </form>

        <p class="text-center text-sm text-mist mt-7">
          Déjà membre ?
          <a href="{{ route('login') }}" class="text-gold-soft hover:text-paper font-semibold transition-colors">Se connecter</a>
        </p>
      </div>
    </div>

  </div>
</body>
</html>