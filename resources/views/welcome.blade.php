<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Plateforme d'Événements Universitaires</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,700;0,9..144,900;1,9..144,500&family=Inter:wght@400;500;600;700;800&family=Space+Mono:wght@400;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --ink: #1B1B2F;
            --ink-soft: #2A2A45;
            --paper: #FAF7EF;
            --paper-dim: #F1ECDF;
            --gold: #E8A33D;
            --stub-red: #C1443C;
            --perf: #C9C2AE;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--paper);
            color: var(--ink);
        }

        .font-display {
            font-family: 'Fraunces', serif;
        }

        .font-mono {
            font-family: 'Space Mono', monospace;
        }

        /* Perforated divider */
        .perf-line {
            background-image: linear-gradient(to bottom, var(--perf) 60%, transparent 0%);
            background-position: top;
            background-size: 2px 14px;
            background-repeat: repeat-y;
        }

        .perf-line-h {
            background-image: linear-gradient(to right, var(--perf) 60%, transparent 0%);
            background-position: left;
            background-size: 14px 2px;
            background-repeat: repeat-x;
        }

        /* Ticket notch cutouts */
        .notch {
            position: absolute;
            width: 28px;
            height: 28px;
            background: var(--paper);
            border-radius: 9999px;
            z-index: 10;
        }

        .notch-ink {
            background: var(--ink);
        }

        .stamp {
            transform: rotate(-9deg);
            border: 2.5px solid currentColor;
            font-family: 'Space Mono', monospace;
        }

        /* Split-flap number */
        .flap {
            font-family: 'Space Mono', monospace;
            letter-spacing: 0.02em;
        }

        @media (prefers-reduced-motion: no-preference) {
            .lift:hover {
                transform: translateY(-4px) rotate(-0.3deg);
            }
        }

        .lift {
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .focus-ring:focus-visible {
            outline: 3px solid var(--gold);
            outline-offset: 2px;
        }
    </style>
</head>

<body class="antialiased min-h-screen flex flex-col justify-between">

    <!-- Header / Navbar -->
    <header
        class="bg-[var(--paper)]/90 backdrop-blur-md border-b-2 border-dashed border-[var(--perf)] sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <!-- Logo -->
            <a href="/"
                class="flex items-center gap-2.5 font-display font-black text-lg text-[var(--ink)] tracking-tight focus-ring rounded">
                <div
                    class="w-9 h-9 rounded-full bg-[var(--ink)] text-[var(--gold)] flex items-center justify-center shadow-md rotate-[-6deg]">
                    <svg class="w-4.5 h-4.5" width="18" height="18" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 002 2 2 2 0 012 2 2 2 0 01-2 2v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 01-2-2 2 2 0 012-2V7a2 2 0 00-2-2H5z" />
                    </svg>
                </div>
                <span>UniEvents</span>
            </a>

            <!-- Auth Buttons -->
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('student.dashboard') }}"
                        class="px-4 py-2 rounded-full text-xs font-bold bg-[var(--ink)] text-[var(--paper)] hover:bg-[var(--ink-soft)] transition-all shadow-sm focus-ring">
                        Tableau de bord
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 rounded-full text-xs font-bold text-[var(--ink)]/70 hover:text-[var(--ink)] hover:bg-[var(--paper-dim)] transition-all focus-ring">
                        Connexion
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 rounded-full text-xs font-bold bg-[var(--ink)] text-[var(--paper)] hover:bg-[var(--ink-soft)] transition-all shadow-sm focus-ring">
                        Inscription
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <main class="space-y-24 pb-20">

        <!-- 1. Hero Section — presented as a giant boarding pass -->
        <section class="pt-14 lg:pt-20">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div
                    class="relative bg-[var(--ink)] text-[var(--paper)] rounded-[28px] shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-[1fr_auto] border border-white/5">

                    <!-- Ambient glow -->
                    <div
                        class="absolute -right-24 -top-24 w-96 h-96 bg-[var(--gold)]/10 rounded-full blur-3xl pointer-events-none">
                    </div>

                    <!-- Main panel -->
                    <div class="relative z-10 px-6 py-12 sm:px-12 sm:py-16 space-y-7">
                        <span
                            class="font-mono text-[11px] tracking-[0.25em] uppercase text-[var(--gold)] border border-[var(--gold)]/40 px-3 py-1 rounded-full inline-block">
                            Pass Universitaire — Accès Illimité
                        </span>
                        <h1
                            class="font-display text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight leading-[1.05] max-w-2xl">
                            Découvrez et réservez vos billets pour les événements universitaires
                        </h1>
                        <p class="text-sm sm:text-base text-[var(--paper)]/60 max-w-lg leading-relaxed font-light">
                            Ateliers, séminaires, conférences : votre place s'affiche en un clic, votre pass s'imprime
                            tout seul.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-2">
                            <a href="#events"
                                class="px-7 py-3.5 rounded-full text-xs sm:text-sm font-bold bg-[var(--gold)] hover:bg-[var(--gold)]/90 text-[var(--ink)] shadow-lg transition-all transform hover:-translate-y-0.5 focus-ring">
                                Explorer les événements
                            </a>
                            @guest
                                <a href="{{ route('register') }}"
                                    class="px-7 py-3.5 rounded-full text-xs sm:text-sm font-bold bg-transparent hover:bg-white/10 text-[var(--paper)] border border-white/25 transition-all focus-ring">
                                    Rejoignez-nous maintenant
                                </a>
                            @endguest
                        </div>
                    </div>

                    <!-- Perforation + stub -->
                    <div class="hidden md:block relative w-px perf-line"></div>
                    <div class="notch hidden md:block" style="top:-14px; left:calc(100% - 152px);"></div>
                    <div class="notch hidden md:block" style="bottom:-14px; left:calc(100% - 152px);"></div>

                    <div
                        class="relative z-10 px-8 py-12 flex md:flex-col items-center justify-between md:justify-center gap-6 md:w-[152px] border-t md:border-t-0 border-dashed border-white/10 perf-line-h md:perf-line-none">
                        <span
                            class="font-mono text-[10px] tracking-[0.2em] uppercase text-[var(--paper)]/40 md:[writing-mode:vertical-rl] md:rotate-180">Campus
                            Access</span>
                        <span class="font-display text-3xl font-black text-[var(--gold)]">2026</span>
                        <span class="font-mono text-[11px] text-[var(--paper)]/50">Nº 00184</span>
                    </div>
                </div>
            </div>
        </section>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-24">

            <!-- 2. Statistics — split-flap departure board -->
            <section class="bg-[var(--ink)] rounded-2xl px-6 py-8 sm:px-10 shadow-lg">
                <p class="font-mono text-[10px] uppercase tracking-[0.25em] text-[var(--paper)]/40 mb-6">Tableau des
                    réservations — en direct</p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8">
                    <div class="text-center space-y-1">
                        <span
                            class="flap text-3xl sm:text-4xl font-bold text-[var(--gold)] block">{{ $stats['events_count'] ?? '50+' }}</span>
                        <p class="text-[10px] font-bold text-[var(--paper)]/50 uppercase tracking-widest">Événements</p>
                    </div>
                    <div class="text-center space-y-1">
                        <span
                            class="flap text-3xl sm:text-4xl font-bold text-emerald-400 block">{{ $stats['students_count'] ?? '1,200+' }}</span>
                        <p class="text-[10px] font-bold text-[var(--paper)]/50 uppercase tracking-widest">Étudiants
                            Inscrits</p>
                    </div>
                    <div class="text-center space-y-1">
                        <span
                            class="flap text-3xl sm:text-4xl font-bold text-[var(--stub-red)] block">{{ $stats['tickets_count'] ?? '3,400+' }}</span>
                        <p class="text-[10px] font-bold text-[var(--paper)]/50 uppercase tracking-widest">Billets
                            Réservés</p>
                    </div>
                    <div class="text-center space-y-1">
                        <span class="flap text-3xl sm:text-4xl font-bold text-sky-400 block">100%</span>
                        <p class="text-[10px] font-bold text-[var(--paper)]/50 uppercase tracking-widest">Confirmation
                            Instantanée</p>
                    </div>
                </div>
            </section>

            <!-- 3. About Platform -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="space-y-5">
                    <span class="font-mono text-[11px] font-bold text-[var(--stub-red)] uppercase tracking-[0.2em]">À
                        propos de la plateforme</span>
                    <h2 class="font-display text-2xl sm:text-4xl font-bold text-[var(--ink)] leading-snug">
                        Un écosystème complet pour la vie de votre campus
                    </h2>
                    <p class="text-sm text-[var(--ink)]/60 leading-relaxed">
                        Conçue pour simplifier l'accès des étudiants aux ateliers, séminaires et activités académiques.
                        Réservez votre place en quelques secondes, suivez vos billets et imprimez votre pass au format
                        PDF avec un code de confirmation unique.
                    </p>
                    <div class="pt-2 space-y-3">
                        <div class="flex items-center gap-3 text-xs font-bold text-[var(--ink)]/80">
                            <span class="w-6 h-px bg-[var(--gold)]"></span>
                            Billets numériques automatisés au format PDF.
                        </div>
                        <div class="flex items-center gap-3 text-xs font-bold text-[var(--ink)]/80">
                            <span class="w-6 h-px bg-[var(--gold)]"></span>
                            Suivi en temps réel des réservations et des statuts.
                        </div>
                    </div>
                </div>
                <div class="relative rounded-[28px] overflow-hidden bg-gray-100 h-64 sm:h-80 shadow-xl rotate-1">
                    <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=800&auto=format&fit=crop&q=80"
                        alt="Vie étudiante" class="w-full h-full object-cover">
                </div>
            </section>

            <!-- 4. Upcoming Events — ticket stub cards -->
            <section id="events" class="space-y-8">
                <div
                    class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 border-b-2 border-dashed border-[var(--perf)] pb-5">
                    <div>
                        <span class="font-mono text-[10px] uppercase tracking-[0.25em] text-[var(--stub-red)]">À
                            l'affiche</span>
                        <h2 class="font-display text-2xl sm:text-3xl font-bold text-[var(--ink)] mt-1">Événements à
                            Venir</h2>
                    </div>
                    <a href="{{ route('events.index') ?? '#' }}"
                        class="text-xs font-bold text-[var(--ink)] hover:text-[var(--stub-red)] transition-colors focus-ring rounded">
                        Voir tous les événements →
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse(collect($events ?? [])->take(6) as $event)
                        <div
                            class="lift relative bg-white rounded-2xl shadow-md hover:shadow-2xl overflow-hidden flex flex-col group">
                            <div class="relative h-44 overflow-hidden bg-gray-100">
                                <img src="{{ $event->image_path ? asset('storage/' . $event->image_path) : 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&auto=format&fit=crop&q=60' }}"
                                    alt="{{ $event->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <span
                                    class="stamp absolute top-3 right-3 px-2.5 py-1 rounded-md text-[11px] font-bold bg-white/90 text-[var(--stub-red)]">
                                    {{ isset($event->price) && $event->price > 0 ? number_format($event->price, 2) . ' DH' : 'GRATUIT' }}
                                </span>
                            </div>

                            <div class="px-5 pt-5 pb-4 space-y-2">
                                <h3
                                    class="font-display text-base font-bold text-[var(--ink)] group-hover:text-[var(--stub-red)] transition-colors line-clamp-1">
                                    {{ $event->title }}</h3>
                                <p class="text-xs text-[var(--ink)]/50 line-clamp-2 leading-relaxed">
                                    {{ $event->description }}</p>
                            </div>

                            <!-- Perforated tear line with notches -->
                            <div class="relative perf-line-h border-t-0">
                                <div class="notch" style="left:-14px; top:-14px;"></div>
                                <div class="notch" style="right:-14px; top:-14px;"></div>
                            </div>

                            <div class="px-5 py-4 flex items-center justify-between">
                                <div class="flex items-center gap-2 text-[11px] font-mono text-[var(--ink)]/50">
                                    <svg class="w-3.5 h-3.5 text-[var(--ink)]/30 shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z" />
                                    </svg>
                                    <span>{{ $event->date }}</span>
                                </div>
                                <a href="{{ route('student.events.show', $event->id) ?? '#' }}"
                                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-[11px] font-bold bg-[var(--ink)] text-[var(--paper)] hover:bg-[var(--stub-red)] transition-all duration-200 focus-ring">
                                    Réserver →
                                </a>
                            </div>
                        </div>
                    @empty
                        <div
                            class="col-span-3 bg-white rounded-2xl p-12 text-center border-2 border-dashed border-[var(--perf)]">
                            <svg class="w-10 h-10 mx-auto text-[var(--perf)]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z" />
                            </svg>
                            <p class="mt-3 text-xs font-medium text-[var(--ink)]/40">Aucun événement disponible pour le
                                moment.</p>
                        </div>
                    @endforelse
                </div>
            </section>

            <!-- 5. Features — presented as ticket conditions -->
            <section class="space-y-8">
                <div class="max-w-xl space-y-2">
                    <span
                        class="font-mono text-[10px] uppercase tracking-[0.25em] text-[var(--stub-red)]">Fonctionnalités</span>
                    <h2 class="font-display text-2xl sm:text-3xl font-bold text-[var(--ink)]">Ce que votre pass vous
                        donne</h2>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-3 gap-px bg-[var(--perf)] rounded-2xl overflow-hidden border border-[var(--perf)]">
                    <div class="bg-[var(--paper)] p-7 space-y-3">
                        <span class="font-mono text-xs text-[var(--gold)] font-bold">01</span>
                        <h3 class="font-display text-base font-bold text-[var(--ink)]">Réservation Instantanée</h3>
                        <p class="text-xs text-[var(--ink)]/50 leading-relaxed">Confirmez votre place et obtenez votre
                            pass en un seul clic.</p>
                    </div>
                    <div class="bg-[var(--paper)] p-7 space-y-3">
                        <span class="font-mono text-xs text-[var(--gold)] font-bold">02</span>
                        <h3 class="font-display text-base font-bold text-[var(--ink)]">Billets PDF & QR</h3>
                        <p class="text-xs text-[var(--ink)]/50 leading-relaxed">Téléchargez un pass officiel avec vos
                            informations pour le contrôle à l'entrée.</p>
                    </div>
                    <div class="bg-[var(--paper)] p-7 space-y-3">
                        <span class="font-mono text-xs text-[var(--gold)] font-bold">03</span>
                        <h3 class="font-display text-base font-bold text-[var(--ink)]">Gestion Transparente</h3>
                        <p class="text-xs text-[var(--ink)]/50 leading-relaxed">Suivez la disponibilité des places et
                            vos inscriptions depuis votre compte.</p>
                    </div>
                </div>
            </section>

            <!-- 6. Call To Action — oversized stamp -->
            <section
                class="relative bg-[var(--ink)] rounded-[28px] px-8 py-14 sm:px-16 sm:py-20 text-center space-y-6 overflow-hidden shadow-2xl">
                <div
                    class="absolute -left-16 -bottom-16 w-72 h-72 bg-[var(--gold)]/10 rounded-full blur-3xl pointer-events-none">
                </div>
                <span
                    class="stamp inline-block px-4 py-1.5 rounded-full text-[11px] font-bold text-[var(--gold)] uppercase tracking-widest">Accès
                    Confirmé</span>
                <h2 class="font-display text-2xl sm:text-4xl font-black text-[var(--paper)] relative z-10">Prêt à
                    assister à votre prochain événement ?</h2>
                <p class="text-[var(--paper)]/50 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed relative z-10">
                    Créez votre compte en quelques secondes et accédez à tous les ateliers et événements universitaires.
                </p>
                <div class="pt-2 relative z-10">
                    <a href="{{ route('register') }}"
                        class="px-8 py-3.5 rounded-full text-xs sm:text-sm font-bold bg-[var(--gold)] text-[var(--ink)] hover:bg-[var(--gold)]/90 transition-all shadow-md inline-block focus-ring">
                        Créer un compte gratuitement
                    </a>
                </div>
            </section>

        </div>
    </main>

    <!-- 7. Footer -->
    <footer class="border-t-2 border-dashed border-[var(--perf)] py-8 text-center text-xs text-[var(--ink)]/40">
        <div class="max-w-7xl mx-auto px-4 space-y-3">
            <div class="flex items-center justify-center gap-2 font-display font-bold text-[var(--ink)]">
                <div
                    class="w-6 h-6 rounded-full bg-[var(--ink)] text-[var(--gold)] flex items-center justify-center text-xs">
                    ★</div>
                <span>UniEvents</span>
            </div>
            <p>&copy; {{ date('Y') }} UniEvents. Tous droits réservés.</p>
        </div>
    </footer>

</body>

</html>
