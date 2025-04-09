@extends('base')
@section('title','contact')
@section('content')
    <section class="mt-20 h-full bg-gray-100 w-full">
        @if(session('success'))
        <div class="bg-green-50 text-green-700 p-2 rounded">
            {{ session('success') }}
        </div> 
        @endif
        <div class="grid md:grid-cols-2 py-10 ">
            <aside class="ml-20">
                <h1 class="text-green-600 text-7xl py-10" style="font-family: 'Tangerine','Montserrat',sans-serif;">Prenons contact!</h1>
                <p class="text-gray-500" style="font-family: 'Montserrat',sans-serif;">
                    Nous sommes ravis de vous accueillir sur notre page de contact ! Chez FOODHELPER, nous croyons que chaque voix compte et que la communication est essentielle pour créer un impact positif dans notre communauté. Que vous souhaitiez en savoir plus sur nos activités, vous impliquer en tant que bénévole ou faire un don, nous sommes là pour vous aider. <br>
                    N'hésitez pas à nous contacter par le biais du formulaire ci-contre, ou par téléphone au +2376 9756 0242 pour rester informé de nos événements et initiatives. <br>
                    Nous nous efforçons de répondre à toutes les demandes dans les plus brefs délais. Votre soutien et votre engagement font une réelle différence dans la vie de ceux que nous aidons. Merci de faire partie de notre mission !                </p>
            </aside>

            <div class="mx-16 mt-16">
                <form action="" class="flex flex-col" method="post">
                    @csrf

                    <div>
                        <input type="text" name="nom" value="{{old('nom', Auth::user()?->name)}}" placeholder="Votre Nom" class="w-full p-2 border rounded outline-none border-x-transparent border-t-0 border-b-[1px] shadow-md  border-green-600 bg-white my-3 focus:shadow-lg focus:shadow-green-200 transition ease-in">
                        @error('titre')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div>
                        <input type="email" name="email" value="{{old('email', Auth::user()?->email)}}" placeholder="Votre E-mail" class="w-full p-2 border rounded outline-none border-x-transparent border-t-0 border-b-[1px] shadow-md  border-green-600 bg-white my-3 focus:shadow-lg focus:shadow-green-200 transition ease-in">
                        @error('user_email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <textarea name="message" id="" value="{{old('message')}}"  rows="5" placeholder="votre message" class="w-full p-2 border rounded outline-none border-x-transparent border-t-0 border-b-[1px] shadow-md  border-green-600 bg-white my-3 focus:shadow-lg focus:shadow-green-200 transition ease-in"></textarea>
                        @error('message')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="bg-green-600 rounded-full text-white font-semibold px-4 py-2 mt-3">Envoyer</button>
                </form>
            </div>
        </div>
    </section>
@endsection