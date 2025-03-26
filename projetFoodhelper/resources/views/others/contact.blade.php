@extends('base')
@section('title','contact')
@section('content')
    <section class="mt-20 h-full bg-gray-100 w-full">
        <div class="grid md:grid-cols-2 py-10 ">
            <aside class="ml-20">
                <h1 class="text-green-600 text-7xl py-10" style="font-family: 'Tangerine','Montserrat',sans-serif;">Prenons contact!</h1>
                <p class="text-gray-500" style="font-family: 'Montserrat',sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam tenetur laborum facilis sed nihil fugit cumque quo, amet in officia quaerat hic sequi earum quasi eligendi. <br><br> Nulla molestiae omnis ad illum esse dolor nostrum natus temporibus ipsam mollitia dolorem reiciendis accusamus, sint saepe debitis accusantium quasi eveniet, voluptate quod placeat repellat perferendis nesciunt! Ut ipsam consequatur officiis aperiam, minus excepturi. Nihil animi, temporibus modi laborum asperiores doloremque possimus dolores velit sequi quam distinctio fuga.</p>
            </aside>

            <div class="mx-16 mt-16">
                <form action="" class="flex flex-col ">
                    <input type="text" placeholder="Votre Nom" class="w-full p-2 border rounded outline-none border-x-transparent border-t-0 border-b-[1px] shadow-md  border-green-600 bg-white my-3 focus:shadow-lg focus:shadow-green-200 transition ease-in">
                    <input type="text" placeholder="Votre E-mail" class="w-full p-2 border rounded outline-none border-x-transparent border-t-0 border-b-[1px] shadow-md  border-green-600 bg-white my-3 focus:shadow-lg focus:shadow-green-200 transition ease-in">
                    <textarea name="" id=""  rows="5" placeholder="votre message" class="w-full p-2 border rounded outline-none border-x-transparent border-t-0 border-b-[1px] shadow-md  border-green-600 bg-white my-3 focus:shadow-lg focus:shadow-green-200 transition ease-in"></textarea>
                </form>
                <button class="bg-green-600 rounded-full text-white font-semibold px-4 py-2 mt-3">Envoyer</button>
            </div>
        </div>
    </section>
@endsection