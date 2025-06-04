<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Landing') - Formation Parentalité</title>

    {{-- CSS inline repris de ton code afin de simplifier --}}
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            color: white;
            text-align: center;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/img/photocover.jpg')  no-repeat center center/cover;

        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            /* background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><radialGradient id="g"><stop offset="0%" stop-color="%23ffffff" stop-opacity="0.1"/><stop offset="100%" stop-color="%23ffffff" stop-opacity="0"/></radialGradient></defs><circle cx="20" cy="20" r="2" fill="url(%23g)"><animate attributeName="opacity" values="0;1;0" dur="3s" repeatCount="indefinite"/></circle><circle cx="80" cy="30" r="1.5" fill="url(%23g)"><animate attributeName="opacity" values="0;1;0" dur="4s" repeatCount="indefinite" begin="1s"/></circle><circle cx="30" cy="70" r="1" fill="url(%23g)"><animate attributeName="opacity" values="0;1;0" dur="2s" repeatCount="indefinite" begin="2s"/></circle><circle cx="70" cy="80" r="2.5" fill="url(%23g)"><animate attributeName="opacity" values="0;1;0" dur="3.5s" repeatCount="indefinite" begin="0.5s"/></circle></svg>') repeat; */
            animation: float 20s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .hero-content {
            position: relative;
            z-index: 2;
            animation: fadeInUp 1s ease-out;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .hero h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            line-height: 1.2;
        }
        .hero .subtitle {
            font-size: clamp(1.2rem, 2.5vw, 1.5rem);
            margin-bottom: 2rem;
            opacity: 0.9;
            font-weight: 300;
        }
        .urgency-badge {
            display: inline-block;
            background: linear-gradient(45deg, #ff6b6b, #ff8e8e);
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: 600;
            margin-bottom: 2rem;
            animation: pulse 2s infinite;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.4);
        }
        @keyframes pulse {
            0%   { transform: scale(1); }
            50%  { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(45deg, #ffd89b 0%, #19547b 100%);
            color: white;
            padding: 18px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            margin: 1rem;
        }
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(0,0,0,0.3);
        }
        .section {
            padding: 80px 0;
            background: white;
        }
        .section:nth-child(even) {
            background: #f8f9fa;
        }
        .section h2 {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 3rem;
            color: #2c3e50;
            position: relative;
        }
        .section h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 2px;
        }
        .pain-points {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        .pain-point {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            border-left: 5px solid #ff6b6b;
        }
        .pain-point:hover {
            transform: translateY(-5px);
        }
        .pain-point h3 {
            color: #e74c3c;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }
        .benefits {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        .benefit {
            text-align: center;
            padding: 2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 20px;
            transition: transform 0.3s ease;
        }
        .benefit:hover {
            transform: scale(1.05);
        }
        .benefit-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: block;
        }
        .testimonial {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 3rem;
            border-radius: 20px;
            text-align: center;
            margin: 3rem 0;
            position: relative;
            overflow: hidden;
        }
        .testimonial::before {
            content: '"';
            position: absolute;
            top: -10px;
            left: 20px;
            font-size: 5rem;
            opacity: 0.3;
        }
        .formatrice-section {
            background: linear-gradient(135deg, #e0c3fc 0%, #9bb5ff 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }
        .formatrice-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="25" cy="25" r="1" fill="%23ffffff" opacity="0.1"><animate attributeName="r" values="1;3;1" dur="4s" repeatCount="indefinite"/></circle><circle cx="75" cy="75" r="2" fill="%23ffffff" opacity="0.15"><animate attributeName="r" values="2;4;2" dur="3s" repeatCount="indefinite"/></circle></svg>') repeat;
            animation: floatSlow 15s ease-in-out infinite;
        }
        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50%     { transform: translateY(-10px) rotate(2deg); }
        }
        .formatrice-container {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 4rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .formatrice-image {
            flex: 0 0 300px;
            position: relative;
        }
        .formatrice-avatar {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 6rem;
            color: white;
            box-shadow: 0 20px 60px rgba(0,0,0,0.2);
            position: relative;
            overflow: hidden;
        }
        .formatrice-avatar::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            animation: shine 3s ease-in-out infinite;
        }
        @keyframes shine {
            0%   { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            50%  { transform: translateX(100%) translateY(100%) rotate(45deg); }
            100% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        }
        .formatrice-content {
            flex: 1;
            color: #2c3e50;
        }
        .formatrice-content h2 {
            font-size: 2.8rem;
            margin-bottom: 1rem;
            color: #2c3e50;
            text-align: left;
        }
        .formatrice-name {
            font-size: 2rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 1rem;
        }
        .formatrice-description {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 2rem;
            text-align: justify;
        }
        .formatrice-highlights { 
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        .highlight-item {
            background: rgba(255,255,255,0.8);
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .highlight-item:hover {
            transform: translateY(-5px);
        }
        .highlight-icon {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            display: block;
        }
        .highlight-item h4 {
            color: #667eea;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .program-details {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            padding: 3rem;
            border-radius: 20px;
            margin: 3rem 0;
        }
        .program-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: rgba(255,255,255,0.7);
            border-radius: 10px;
        }
        .program-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: white;
            font-weight: bold;
        }
        .footer {
            background: #2c3e50;
            color: white;
            text-align: center;
            padding: 2rem;
        }
        .floating-cta {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
            animation: bounce 2s infinite;
        }
        @keyframes bounce {
            0%,20%,50%,80%,100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.8);
            animation: fadeIn 0.3s ease-out;
        }
        .modal-content {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 2% auto;
            padding: 0;
            border-radius: 20px;
            width: 90%;
            max-width: 500px;
            position: relative;
            animation: slideIn 0.3s ease-out;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-height: 90vh;
            overflow-y: auto;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }
        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to   { transform: translateY(0);    opacity: 1; }
        }
        .modal-header {
            background: rgba(255,255,255,0.1);
            padding: 2rem;
            border-radius: 20px 20px 0 0;
            text-align: center;
            color: white;
        }
        .modal-header h2 {
            margin: 0;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }
        .close {
            position: absolute;
            right: 15px;
            top: 15px;
            color: white;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.3s;
        }
        .close:hover {
            opacity: 0.7;
        }
        .modal-body {
            padding: 2rem;
            color: white;
        }
        .form-group {
            margin-bottom: 0.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.3rem;
            font-weight: 600;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            background: rgba(255,255,255,0.9);
            color: #333;
            box-sizing: border-box;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            background: white;
            box-shadow: 0 0 0 3px rgba(255,255,255,0.3);
        }
        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }
        .submit-btn {
            width: 100%;
            background: linear-gradient(45deg, #ffd89b 0%, #19547b 100%);
            color: white;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
        }
        .success-message {
            text-align: center;
            padding: 2rem;
            color: white;
        }
        .success-message h3 {
            color: #4CAF50;
            margin-bottom: 1rem;
        }
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            .pain-points {
                grid-template-columns: 1fr;
            }
            .benefits {
                grid-template-columns: 1fr;
            }
            .floating-cta {
                bottom: 20px;
                right: 20px;
            }
            .formatrice-container {
                flex-direction: column;
                text-align: center;
                gap: 2rem;
            }
            .formatrice-image {
                flex: none;
            }
            .formatrice-avatar {
                width: 250px;
                height: 250px;
                font-size: 5rem;
            }
            .formatrice-content h2 {
                text-align: center;
            }
            .formatrice-description {
                text-align: center;
            }
            .formatrice-highlights {
                grid-template-columns: 1fr;
            }
        }
    </style>

    @yield('extra-css')
</head>
<body>
    @yield('content')

    {{-- JS inline pour modal + animations --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // IntersectionObserver pour les animations au scroll
            const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.pain-point, .benefit, .program-item').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'all 0.6s ease-out';
                observer.observe(el);
            });
        });

        // Fonctions pour ouvrir / fermer la modal
        function openModal() {
            document.getElementById('inscriptionModal').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
        function closeModal() {
            document.getElementById('inscriptionModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }
        window.onclick = function(event) {
            const modal = document.getElementById('inscriptionModal');
            if (event.target === modal) {
                closeModal();
            }
        };

        // Aucun traitement JS côté formulaire Laravel (handled server-side)
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('inscriptionForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    // On laisse Laravel gérer la validation et la redirection
                });
            }
        });

        // Smooth scroll sur les ancres
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>

    @yield('extra-js')
</body>
</html>

