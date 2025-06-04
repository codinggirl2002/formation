{{-- resources/views/landing.blade.php --}}
@extends('layouts.app')

@section('title', "Comment Renouer avec Mon Ado Avant qu'il ne Soit Trop Tard ?")

@section('content')
    {{-- Si il y a un message de succès en session, on l’affiche au-dessus : --}}
    @if(session('success'))
        <div style="background-color: #4CAF50; color: white; padding: 1rem; text-align: center;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Section Hero --}}
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="urgency-badge">⚠️ Formation Dimanche 8 Juin – Places Limitées</div>
                <h1>Comment Renouer le Lien avec Mon Ado Avant qu'il ne Soit Trop Tard ?</h1>
                <p class="subtitle">
                    Retrouvez la complicité perdue et créez une relation authentique avec votre adolescent
                </p>
                <a href="javascript:void(0);" class="cta-button" onclick="openModal()">🎯 Je M'Inscris Maintenant</a>
            </div>
        </div>
    </section>

    {{-- Section “Vous Reconnaissez-Vous ?” --}}
    <section class="section">
        <div class="container">
            <h2 id="pain-points">Vous Reconnaissez-Vous Dans Ces Situations ?</h2>
            <div class="pain-points">
                <div class="pain-point">
                    <h3>💔 Le Mur du Silence</h3>
                    <p>Votre ado ne vous parle plus, s'enferme dans sa chambre et vous avez l'impression d'être devenu(e) invisible dans sa vie.</p>
                </div>
                <div class="pain-point">
                    <h3>⚡ Tensions Permanentes</h3>
                    <p>Chaque conversation se transforme en conflit, chaque demande devient un rapport de force épuisant.</p>
                </div>
                <div class="pain-point">
                    <h3>😰 L'Angoisse du Parent</h3>
                    <p>Vous vous sentez dépassé(e), inquiet(e) pour son avenir, et vous ne savez plus comment l'atteindre.</p>
                </div>
                <div class="pain-point">
                    <h3>⏰ Le Temps Qui Presse</h3>
                    <p>Vous réalisez que les années passent vite et que cette période cruciale ne reviendra plus.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section “Imaginez Si Vous Pouviez …” --}}
    <section class="section">
        <div class="container">
            <h2 id="benefits">Temoignages…</h2>
            <div class="benefits">
                <div class="video-container">
                    <video controls preload="metadata">
                        <!-- Déclaration des différentes sources (formats) -->
                        <source src="{{asset('img/temv1.mp4')}}" type="video/mp4">
                        <!-- Message de secours si la balise n'est pas supportée -->
                        Votre navigateur ne supporte pas la balise <code>video</code>.
                      </video>
                </div>
                <div class="video-container">
                    <video controls preload="metadata">
                        <!-- Déclaration des différentes sources (formats) -->
                        <source src="{{asset('img/temv2.mp4')}}" type="video/mp4">
                        <!-- Message de secours si la balise n'est pas supportée -->
                        Votre navigateur ne supporte pas la balise <code>video</code>.
                      </video>
                </div>
                <div class="video-container">
                    <video controls preload="metadata">
                        <!-- Déclaration des différentes sources (formats) -->
                        <source src="{{asset('img/temv3.mp4')}}" type="video/mp4">
                        <!-- Message de secours si la balise n'est pas supportée -->
                        Votre navigateur ne supporte pas la balise <code>video</code>.
                      </video>
                </div>
            </div>
                <div class="media-gallery">
                    <div class="media-item">
                        <img src="{{asset('img/temi1.jpeg')}}" alt="Image 1">
                    </div>
                    <div class="media-item">
                        <img src="{{asset('img/temi2.jpeg')}}" alt="Image 2">
                    </div>
                    <div class="media-item">
                        <img src="{{asset('img/temi3.jpeg')}}" alt="Image 3">
                    </div>
                </div>
            
                <div class="testimonial">
                    <p style="font-size: 1.3rem; font-style: italic; margin-bottom: 1.5rem;">
                        "J'étais au bout du rouleau avec mon fils de 16 ans. Grâce à cette formation, j'ai compris que son comportement était normal et j'ai appris comment me rapprocher de lui sans le braquer. Aujourd'hui, il me parle à nouveau et je me sens enfin utile comme maman !"
                    </p>
                    <strong>- Sophie, maman de Lucas </strong>
                </div>
        </div>
    </section>

    {{-- Section témoignage --}}
    <!--section class="section">
        <div class="container">
            <div class="testimonial">
                <p style="font-size: 1.3rem; font-style: italic; margin-bottom: 1.5rem;">
                    "J'étais au bout du rouleau avec mon fils de 16 ans. Grâce à cette formation, j'ai compris que son comportement était normal et j'ai appris comment me rapprocher de lui sans le braquer. Aujourd'hui, il me parle à nouveau et je me sens enfin utile comme maman !"
                </p>
                <strong>- Sophie, maman de Lucas </strong>
            </div>
        </div>
    </!--section-->

    {{-- Section formatrice --}}
    <section class="formatrice-section">
        <div class="formatrice-container">
            <div class="formatrice-image">
                <div class="formatrice-avatar">
                    <img src="{{asset('./img/visage.jpg')}}" alt="" style="width: 350px; height: 350px; border-radius: 50%;">
                </div>
            </div>
            <div class="formatrice-content">
                <h2>Votre Formatrice</h2>
                <div class="formatrice-name">Micheline SAME</div>
                <div class="formatrice-description">
                    C'est un savant mélange entre sagesse d'une ancienne enseignante, l'énergie d'une coach passionnée et le franc-parler d'une maman qui ne se laisse pas marcher sur les pieds ! La cinquantaine sonnée, elle a troqué la craie contre le micro et Internet, les bulletins scolaires contre des plans d'action pour mamans d'ados débordées.
                    <br><br>
                    Son super-pouvoir ? Transformer les cris et les conflits en conversations complices avec les ados. Coach parentale et psychologue engagée, Micheline SAME ne vend pas du rêve, elle vend des résultats. Armée de son vécu de maman, de ses multiples formations, et de son bon sens redoutable, elle aide les mamans à reprendre le contrôle sans perdre leur tendresse.
                    <br><br>
                    Toujours avec une pointe d'humour, un brin de fermeté et un regard bienveillant, elle redonne aux familles ce qu'elles croyaient avoir perdu : la paix, l'espoir… et parfois même quelques fous rires !
                </div>
                <div class="formatrice-highlights">
                    <div class="highlight-item">
                        <span class="highlight-icon">🎓</span>
                        <h4>Ancienne Enseignante</h4>
                        <p>Expertise pédagogique</p>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-icon">💼</span>
                        <h4>Coach Parentale & Psychologue</h4>
                        <p>Accompagnement personnalisé</p>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-icon">👥</span>
                        <h4>Maman Expérimentée</h4>
                        <p>Vécu authentique</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section programme --}}
    <section class="section">
        <div class="container">
            <h2 id="programme">Programme de la Formation</h2>
            <div class="gradient-border">
                <div class="program-details">
                    <div class="program-item">
                        <div class="program-icon">1</div>
                        <div>
                            <h3>Décoder le Monde de l'Adolescent</h3>
                            <p>Comprendre les transformations physiques, émotionnelles et sociales de cette période</p>
                        </div>
                    </div>
                    <div class="program-item">
                        <div class="program-icon">2</div>
                        <div>
                            <h3>Les Clés de la Communication</h3>
                            <p>Techniques concrètes pour ouvrir le dialogue sans jugement ni pression</p>
                        </div>
                    </div>
                    <div class="program-item">
                        <div class="program-icon">3</div>
                        <div>
                            <h3>Gérer les Conflits Autrement</h3>
                            <p>Transformer les tensions en opportunités de rapprochement</p>
                        </div>
                    </div>
                    <div class="program-item">
                        <div class="program-icon">4</div>
                        <div>
                            <h3>Reconstruire la Confiance</h3>
                            <p>Stratégies pour redevenir une figure de référence positive</p>
                        </div>
                    </div>
                    <div class="program-item">
                        <div class="program-icon">5</div>
                        <div>
                            <h3>Plan d'Action Personnalisé</h3>
                            <p>Repartez avec des outils concrets adaptés à votre situation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section final CTA --}}
    <section class="section">
        <div class="container" style="text-align: center;">
            <h2 style="color: black;">Formation Dimanche 8 Juin – Dernières Places</h2>
            <p style="font-size: 1.3rem; margin-bottom: 2rem;">
                ⏰ Ne laissez pas passer cette opportunité de transformer votre relation avec votre adolescent
            </p>
            <div style="background: rgba(255,255,255,0.1); padding: 2rem; border-radius: 15px; margin-bottom: 2rem;">
                <h3 style="margin-bottom: 1rem;">📅 Informations Pratiques</h3>
                <p><strong>📅 Date :</strong> Dimanche 8 Juin 2025</p>
                <p><strong>🕐 Horaire :</strong> 19h00 (UTC+1)</p>
                <p><strong>📍 Lieu :</strong> En ligne via Zoom</p>
                <p><strong>👥 Places :</strong> Limitées à 20 participants pour un suivi personnalisé</p>
            </div>
            <a href="javascript:void(0);" class="cta-button" style="font-size: 1.4rem; padding: 20px 50px;" onclick="openModal()">
                🚀 Je Réserve Ma Place Maintenant
            </a>
            <div style="margin-top: 2rem;">
                <p style="margin-bottom: 1rem;">Rejoignez notre communauté :</p>
                <a href="https://www.facebook.com/Lesparentsdado" target="_blank" class="cta-button" style="margin: 0.5rem; padding: 12px 25px; font-size: 1rem;">
                    📘 Facebook
                </a>
                <a href="https://chat.whatsapp.com/Jwel6RT6Yi06T1e5UbkhO9" target="_blank" class="cta-button" style="margin: 0.5rem; padding: 12px 25px; font-size: 1rem;">
                    💬 WhatsApp
                </a>
            </div>
        </div>
    </section>

    {{-- Bouton flottant --}}
    <div class="floating-cta">
        <a href="javascript:void(0);" class="cta-button" style="padding: 15px 25px;" onclick="openModal()">📞 S'Inscrire</a>
    </div>
    <hr>
    {{-- Footer --}}
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Formation Parentalité. Transformez votre relation avec votre adolescent.</p>
            <p style="margin-top: 1rem; opacity: 0.8;">
                Rejoignez notre communauté sur 
                <a href="https://www.facebook.com/Lesparentsdado" target="_blank" style="color: #11398a; text-decoration: none;">Facebook</a> 
                et 
                <a href="https://chat.whatsapp.com/Jwel6RT6Yi06T1e5UbkhO9" target="_blank" style="color: #0e8d3c; text-decoration: none;">WhatsApp</a>
            </p>
        </div>
    </footer>

    {{-- Modal d'inscription --}}
    <div id="inscriptionModal" class="modal">
        <div class="modal-content">
            <div-- class="modal-header">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>🎯 Inscription Formation</h2>
                <p>Dimanche 8 Juin 2025 – 19h00 (UTC+1)</p>
            </div-->
            <div class="modal-body">
                <form id="inscriptionForm" method="POST" action="{{ route('registration.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="nom">Nom complet *</label>
                        <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
                        @error('nom')
                            <div style="color:red; margin-top:0.3rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div style="color:red; margin-top:0.3rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input type="tel" id="telephone" name="telephone" value="{{ old('telephone') }}">
                        @error('telephone')
                            <div style="color:red; margin-top:0.3rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="age_ado">Âge de votre adolescent</label>
                        <select id="age_ado" name="age_ado">
                            <option value="">Sélectionnez…</option>
                            <option value="11-12" {{ old('age_ado')=='11-12' ? 'selected':'' }}>11-12 ans</option>
                            <option value="13-14" {{ old('age_ado')=='13-14' ? 'selected':'' }}>13-14 ans</option>
                            <option value="15-16" {{ old('age_ado')=='15-16' ? 'selected':'' }}>15-16 ans</option>
                            <option value="17-18" {{ old('age_ado')=='17-18' ? 'selected':'' }}>17-18 ans</option>
                            <option value="19+"   {{ old('age_ado')=='19+'   ? 'selected':'' }}>19 ans et plus</option>
                        </select>
                        @error('age_ado')
                            <div style="color:red; margin-top:0.3rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="principale_difficulte">Quelle est votre principale difficulté avec votre ado ?</label>
                        <textarea id="principale_difficulte" name="principale_difficulte" placeholder="Communication, conflits, distance émotionnelle, etc.">{{ old('principale_difficulte') }}</textarea>
                        @error('principale_difficulte')
                            <div style="color:red; margin-top:0.3rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="attentes">Qu'attendez-vous de cette formation ?</label>
                        <textarea id="attentes" name="attentes" placeholder="Vos objectifs et espoirs…">{{ old('attentes') }}</textarea>
                        @error('attentes')
                            <div style="color:red; margin-top:0.3rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="submit-btn">🚀 Confirmer Mon Inscription</button>
                </form>

                {{-- Si l’inscription a réussi, blade affichera le message ci-dessous --}}
                @if(session('success'))
                    <div id="successMessage" class="success-message" style="display:block;">
                        <h3>✅ Inscription Confirmée !</h3>
                        <p>Merci pour votre inscription ! Vous recevrez bientôt le lien Zoom et toutes les informations nécessaires par email.</p>
                        <p style="margin-top: 1rem;">En attendant, rejoignez notre communauté :</p>
                        <div style="margin-top: 1rem;">
                            <a href="https://www.facebook.com/Lesparentsdado" target="_blank" class="cta-button" style="margin: 0.5rem; padding: 10px 20px; font-size: 0.9rem;">📘 Facebook</a>
                            <a href="https://chat.whatsapp.com/Jwel6RT6Yi06T1e5UbkhO9" target="_blank" class="cta-button" style="margin: 0.5rem; padding: 10px 20px; font-size: 0.9rem;">💬 WhatsApp</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

