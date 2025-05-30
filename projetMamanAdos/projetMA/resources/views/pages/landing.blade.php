<!-- resources/views/landing.blade.php -->
@extends('layouts.app')

@section('title','formation gratuite-maman ados')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-badge">🎁 FORMATION GRATUITE</div>
            @if(session('success'))
              <div class="success">{{ session('success') }}</div>
            @endif
            <h1>GÉRER LE STRESS ET LA CULPABILITÉ</h1>
            <p class="subtitle">
                <strong>Quand on est maman d'adolescents</strong><br>
                Formation gratuite pour résoudre les défis de l'éducation et retrouver sérénité et confiance
            </p>
            <button class="cta-hero" onclick="openModal()">
                📝 JE RESERVE MA PLACE GRATUITEMENT
            </button>
        </div>
    </section>

        <!-- Modal -->
    <div id="reservationModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>POUR LES ECOMMERCANTS ET COACHS DU DIGITAL UNIQUEMENT</h2>
                <p>Entrez vos coordonnées pour réserver votre place</p>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register.store') }}">
                @csrf

                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}">
                    @error('prenom')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}">
                    @error('telephone')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="submit-btn">JE RÉSERVE MA PLACE</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Problem Section -->
    <section class="problem-section">
        <div class="container">
            <h2 class="section-title">Vous reconnaissez-vous dans ces situations ?</h2>
            <p class="section-subtitle">
                Être maman d'ados peut être épuisant émotionnellement. Vous n'êtes pas seule.
            </p>
            
            <div class="problems-grid">
                <div class="problem-card fade-in">
                    <span class="problem-icon">😰</span>
                    <h3 class="problem-title">Stress Constant</h3>
                    <p class="problem-text">
                        Vous vous sentez dépassée par les comportements de votre ado, ses changements d'humeur, 
                        et vous ne savez plus comment réagir face à ses crises.
                    </p>
                </div>
                
                <div class="problem-card fade-in">
                    <span class="problem-icon">😔</span>
                    <h3 class="problem-title">Culpabilité Permanente</h3>
                    <p class="problem-text">
                        Vous vous remettez constamment en question : "Suis-je une bonne mère ?", 
                        "Ai-je fait les bons choix ?", "Pourquoi mon ado me rejette-t-il ?"
                    </p>
                </div>
                
                <div class="problem-card fade-in">
                    <span class="problem-icon">🔥</span>
                    <h3 class="problem-title">Conflits Répétés</h3>
                    <p class="problem-text">
                        Les disputes éclatent pour tout et rien. Vous avez l'impression de marcher 
                        sur des œufs et que chaque conversation peut dégénérer.
                    </p>
                </div>
                
                <div class="problem-card fade-in">
                    <span class="problem-icon">😴</span>
                    <h3 class="problem-title">Épuisement Mental</h3>
                    <p class="problem-text">
                        Vous vous couchez épuisée, vous réveillez fatiguée, et avez l'impression 
                        de perdre votre identité dans ce rôle de maman.
                    </p>
                </div>
                
                <div class="problem-card fade-in">
                    <span class="problem-icon">🚪</span>
                    <h3 class="problem-title">Communication Rompue</h3>
                    <p class="problem-text">
                        Votre ado s'enferme dans sa chambre, ne vous parle plus, et vous avez 
                        l'impression d'avoir perdu le lien qui vous unissait.
                    </p>
                </div>
                
                <div class="problem-card fade-in">
                    <span class="problem-icon">⚖️</span>
                    <h3 class="problem-title">Limites Floues</h3>
                    <p class="problem-text">
                        Vous oscillez entre autorité stricte et laxisme, ne sachant plus quelles 
                        règles maintenir face à votre adolescent qui grandit.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Coach Section -->
    <section class="coach-section">
        <div class="container">
            <div class="coach-container">
                <div class="coach-photo">
                    <img src="{{asset('./img/visage.jpg')}}" alt="" style="width: 250px; height: 250px; border-radius: 50%;">
                </div>
                <div class="coach-content">
                    <h2>Micheline SAME</h2>
                    <p class="coach-title">Coach Parentale & Psychologue</p>
                    <p class="coach-description">
                        En tant que coach parentale et psychologue spécialisée dans l'accompagnement 
                        des familles, j'aide les mamans d'adolescents à traverser cette période 
                        complexe avec sérénité et confiance. Mon approche bienveillante vous permettra 
                        de retrouver l'harmonie familiale.
                    </p>
                    <ul class="expertise-list">
                        <li>Plus de 10 ans d'expérience en psychologie familiale</li>
                        <li>Spécialisée dans la relation parent-adolescent</li>
                        <li>Formatrice certifiée en coaching parental</li>
                        <li>Accompagnement de centaines de familles</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Solution Section -->
    <section class="solution-section">
        <div class="container">
            <h2 class="section-title">La Solution : Une Approche Complète</h2>
            <p class="section-subtitle">
                Cette formation vous donnera tous les outils pour transformer votre relation avec votre adolescent
            </p>
            
            <div class="solutions-grid">
                <div class="solution-card fade-in">
                    <span class="solution-icon">🧠</span>
                    <h3 class="solution-title">Comprendre l'Adolescence</h3>
                    <p class="solution-text">
                        Découvrez les mécanismes psychologiques de l'adolescence pour mieux 
                        comprendre les comportements de votre enfant.
                    </p>
                </div>
                
                <div class="solution-card fade-in">
                    <span class="solution-icon">💬</span>
                    <h3 class="solution-title">Communication Efficace</h3>
                    <p class="solution-text">
                        Apprenez les techniques de communication qui créent du lien au lieu 
                        de générer des conflits.
                    </p>
                </div>
                
                <div class="solution-card fade-in">
                    <span class="solution-icon">⚖️</span>
                    <h3 class="solution-title">Poser des Limites Saines</h3>
                    <p class="solution-text">
                        Établissez un cadre bienveillant mais ferme qui rassure votre ado 
                        tout en préservant votre autorité.
                    </p>
                </div>
                
                <div class="solution-card fade-in">
                    <span class="solution-icon">🌱</span>
                    <h3 class="solution-title">Gérer Vos Émotions</h3>
                    <p class="solution-text">
                        Techniques concrètes pour gérer votre stress, évacuer la culpabilité 
                        et préserver votre santé mentale.
                    </p>
                </div>
                
                <div class="solution-card fade-in">
                    <span class="solution-icon">🔄</span>
                    <h3 class="solution-title">Reconstruire la Relation</h3>
                    <p class="solution-text">
                        Stratégies pour recréer du lien, rétablir la confiance et 
                        retrouver la complicité avec votre adolescent.
                    </p>
                </div>
                
                <div class="solution-card fade-in">
                    <span class="solution-icon">💪</span>
                    <h3 class="solution-title">Retrouver Confiance</h3>
                    <p class="solution-text">
                        Renforcez votre confiance en tant que mère et redécouvrez 
                        vos compétences parentales naturelles.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits-section">
        <div class="container">
            <h2 class="section-title" style="color: white;">Ce que vous allez obtenir</h2>
            <p class="section-subtitle" style="color: rgba(255,255,255,0.9);">
                Une transformation complète de votre quotidien de maman d'ados
            </p>
            
            <div class="benefits-grid">
                <div class="benefit-item fade-in">
                    <span class="benefit-icon">✅</span>
                    <h3 class="benefit-title">Méthodes Pratiques</h3>
                    <p>Des outils concrets à appliquer dès le lendemain</p>
                </div>
                
                <div class="benefit-item fade-in">
                    <span class="benefit-icon">📚</span>
                    <h3 class="benefit-title">Ressources Exclusives</h3>
                    <p>Guides, exercices et supports à télécharger</p>
                </div>
                
                <div class="benefit-item fade-in">
                    <span class="benefit-icon">👥</span>
                    <h3 class="benefit-title">Communauté Bienveillante</h3>
                    <p>Rejoignez un groupe de mamans qui vous comprennent</p>
                </div>
                
                <div class="benefit-item fade-in">
                    <span class="benefit-icon">🎯</span>
                    <h3 class="benefit-title">Suivi Personnalisé</h3>
                    <p>Accompagnement et réponses à vos questions</p>
                </div>
                
                <div class="benefit-item fade-in">
                    <span class="benefit-icon">🔥</span>
                    <h3 class="benefit-title">Motivation Durable</h3>
                    <p>Retrouvez votre énergie et votre joie de vivre</p>
                </div>
                
                <div class="benefit-item fade-in">
                    <span class="benefit-icon">💝</span>
                    <h3 class="benefit-title">Relation Transformée</h3>
                    <p>Une nouvelle dynamique familiale harmonieuse</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="final-cta" id="inscription">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Transformez Dès Aujourd'hui Votre Quotidien de Maman</h2>
                <p class="cta-text">
                    Ne laissez plus le stress et la culpabilité gâcher vos moments en famille. 
                    Cette formation va révolutionner votre approche parentale.
                </p>
                
                <div class="free-badge">🎁 FORMATION 100% GRATUITE</div>
                
                <div class="urgency-box">
                    <h3>🎯 Formation Exclusive</h3>
                    <p><strong>Places limitées - Inscription gratuite mais obligatoire</strong></p>
                    <p>Accès immédiat après inscription</p>
                </div>
                
                <a href="https://bit.ly/4krcCwT" class="main-cta-button" target="_blank">
                    📝 JE PARTICIPE À LA DISCUSSION
                </a>
                
                <p style="margin-top: 30px; opacity: 0.9;">
                    ⭐ Rejoignez les centaines de mamans qui ont déjà transformé leur relation avec leur ado
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 - Micheline SAME - Coach Parentale & Psychologue</p>
            <p>Formation : Comment Gérer le Stress et la Culpabilité Quand on est Maman d'Ados</p>
        </div>
    </footer>
@endsection
