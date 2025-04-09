@extends('base')
@section('title', 'A propos')
@section('content')

  <!--image illustrative-->
  <div class="mt-30 md:mx-16 mx-6">
    <img src="{{asset('img/about.jpg')}}" alt="" class="rounded-2xl md:h-[500px] h-[350px] w-full object-cover object-center">
  </div>

  <!--about section-->
  <div class="my-30 md:px-20 px-10 mx-auto">
    <h1 class="md:text-5xl text-3xl text-center text-green-600 font-extrabold pb-10" style="font-family: 'Tangerine','Montserrat',sans-serif;">Apropos de FOODHELPER</h1>
    <p class="text-gray-500 text-center" style="font-family: 'Montserrat',sans-serif;">
      FOODHELPER est une initiative locale engagée dans la lutte contre le gaspillage alimentaire et la distribution de nourriture aux personnes dans le besoin. Notre équipe de bénévoles dévoués œuvre chaque jour pour améliorer la vie des habitants de notre communauté, en favorisant la solidarité et en renforçant les liens locaux.
    </p>
  </div>

  <!--skills-->
  <section class="container mx-10" style="font-family: 'Montserrat',sans-serif;">
        <div class="grid md:grid-cols-2 grid-cols-1 gap-10">
                <div  class="mr-16">
                    <h3 class="text-3xl text-green-600 pb-8 font-semibold">Notre mission</h3>
                    <p class="text-gray-500 mb-4">
                      Chez <span class="text-green-600"> FOODHELPER</span>, notre mission est de lutter contre le gaspillage alimentaire tout en aidant ceux qui en ont le plus besoin. Nous croyons fermement que chaque individu mérite un accès à une alimentation saine et nutritive. En collaborant avec des supermarchés, des restaurants et des producteurs locaux, nous recueillons les surplus alimentaires qui seraient autrement jetés.
                      Nous nous engageons à redistribuer ces ressources alimentaires aux personnes et familles en situation de précarité. Grâce à notre réseau de bénévoles dévoués, nous organisons des collectes régulières et des distributions ciblées pour répondre aux besoins spécifiques de notre communauté.
                      Notre ambition est de sensibiliser le public à l'importance de la solidarité et de la protection de notre environnement. En réduisant le gaspillage alimentaire, nous contribuons également à la durabilité de notre planète. Chaque geste compte, et ensemble, nous pouvons créer un impact positif. Rejoignez-nous dans notre mission pour changer des vies, une assiette à la fois.                    </p>
                </div>
                <img src="{{asset('img/pexels-minan1398-1093837.jpg')}}" alt="nouritture" class="h-full w-full rounded-lg object-cover">
        </div>
        <div class="grid md:grid-cols-2 grid-cols-1 gap-10 mt-4 md:mt-20">
            <img src="{{asset('img/pexels-peter-de-vink-288978-849524.jpg')}}" alt="nouritture" class="h-full w-full rounded-lg object-cover md:block hidden">
            <div class="ml-16 text-right">
                <h3 class="text-3xl text-green-600 py-8 font-semibold">Notre mission</h3>
                <p class="text-gray-500 ">
                  La mission de <span class="text-green-600"> FOODHELPER</span> est de transformer la manière dont notre communauté perçoit et gère l'alimentation. Nous sommes déterminés à créer un système alimentaire plus juste et équitable, où chacun a accès à des repas sains et nutritifs.
                  Nous travaillons sans relâche pour établir des partenariats avec des entreprises locales afin de récupérer les excédents alimentaires. Ces dons sont ensuite redistribués à des familles en difficulté, des personnes isolées et des refuges communautaires. Nous croyons que la lutte contre la faim commence par la solidarité et l'entraide.
                  En plus de notre action directe, nous organisons des ateliers et des événements éducatifs pour sensibiliser la communauté sur l'importance de la nutrition et de la réduction du gaspillage. Nous encourageons les comportements responsables et l'engagement communautaire, car nous savons que c'est ensemble que nous pouvons apporter un changement durable. Au cœur de notre mission se trouve la conviction que chaque repas partagé peut renforcer les liens sociaux et bâtir un avenir meilleur pour tous. 
                </p>
            </div>
        </div> 
  </section>

  <!--contact section-->
  <div class=" relative w-full md:h-80 h-64 bg-cover bg-center mt-30" style="background-image: url('{{asset('img/pexels-julia-m-cameron-6994993.jpg')}}')">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="container mx-auto relative top-25 z-10 flex flex-col items-center justify-center text-center">
        <h1 class="md:text-6xl text-4xl font-extrabold mb-4 text-green-600" style="font-family: 'Tangerine','Montserrat',sans-serif;">Vous aimeriez en savoir plus sur nous?</h1>
        <a href="{{route('contact')}}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-full transition">
            Contactez-nous
        </a>
    </div>
  </div>

@endsection