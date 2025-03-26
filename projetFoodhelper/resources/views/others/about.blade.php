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
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse sapiente nostrum laudantium hic, excepturi odio libero perspiciatis unde blanditiis laborum obcaecati, illum sunt quo neque nesciunt ullam reprehenderit voluptatibus velit tenetur delectus aut. Laborum illo, est, officiis quaerat excepturi corrupti minus cumque esse enim voluptatem ipsum rerum animi. Doloribus, blanditiis!
    </p>
  </div>

  <!--skills-->
  <section class="container mx-10" style="font-family: 'Montserrat',sans-serif;">
        <div class="grid md:grid-cols-2 grid-cols-1 gap-10">
                <div  class="mr-16">
                    <h3 class="text-3xl text-green-600 pb-8 font-semibold">Notre mission</h3>
                    <p class="text-gray-500 mb-4">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione, dolore molestiae inventore illo laborum ipsam maxime iure consectetur sunt? Est consequatur possimus earum, accusamus iure autem. Error, reprehenderit aliquam. Numquam, tenetur. Ducimus saepe beatae minima iure vitae accusamus esse tempore consequuntur culpa? Debitis quibusdam temporibus rerum numquam quasi sint facilis tempore iusto officiis aliquid nam ipsum dignissimos dolorum, provident ad error. Explicabo nostrum, laboriosam expedita optio ratione dolor, sint facilis quae quidem officiis velit quam accusantium vel ipsam, beatae dolore rerum omnis! Illum recusandae aperiam odit eligendi, ipsam, reprehenderit pariatur repudiandae voluptatum exercitationem, ipsa at saepe nam fugit aspernatur mollitia quae laudantium aut consequatur beatae nostrum quis veritatis! Molestiae suscipit sequi dignissimos itaque sit distinctio illum quidem quae temporibus, quam quis recusandae dolorem.
                    </p>
                </div>
                <img src="{{asset('img/pexels-minan1398-1093837.jpg')}}" alt="nouritture" class="h-full w-full rounded-lg object-cover">
        </div>
        <div class="grid md:grid-cols-2 grid-cols-1 gap-10 mt-4 md:mt-20">
            <img src="{{asset('img/pexels-peter-de-vink-288978-849524.jpg')}}" alt="nouritture" class="h-full w-full rounded-lg object-cover md:block hidden">
            <div class="ml-16 text-right">
                <h3 class="text-3xl text-green-600 py-8 font-semibold">Notre mission</h3>
                <p class="text-gray-500 ">
                   Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos quia ipsum odit ad quam, itaque nulla voluptatum voluptas eligendi ea accusantium veritatis laboriosam natus quo consequatur! Laboriosam architecto ipsam tempore. Eaque, fuga neque! Et repellendus nesciunt praesentium id, temporibus, neque similique sit eius distinctio quam nulla deleniti deserunt necessitatibus cum itaque rem consectetur reprehenderit. Omnis eaque veniam nesciunt magni voluptatem corrupti excepturi! Magni illo consequuntur enim, laboriosam ducimus non necessitatibus iste neque magnam quis obcaecati incidunt reiciendis laudantium officiis velit cupiditate perferendis tenetur, unde alias quas libero. Eaque rem reiciendis officia harum eum sit velit eligendi laudantium, ex mollitia omnis quam libero deleniti debitis ipsum optio, alias obcaecati vero! Temporibus dolores, at aliquam numquam quibusdam perspiciatis sed! Nesciunt tenetur et esse rerum blanditiis voluptatem facere modi.              
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