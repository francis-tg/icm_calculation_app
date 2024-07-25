@extends('layouts.auth')
@section('content')
<div class="flex items-center justify-center">
    <div class="xl:w-1/2 md:w-1/2 w-full p-3">
        <h1 class="text-3xl text-center uppercase">Créer un compte</h1>
        <form method="post" action="{{url('/auth/register')}}" class="p-8">
            @csrf
           <div class="grid grid-cols-2 gap-3">
            <div class="relative mb-8">
                <i class="fas fa-user absolute text-gray-500 left-2 bottom-2 text-xl"></i>
                <input
                    type="text"
                    placeholder="Votre nom"
                    name="nom"
                    class="border-b-2 indent-7 w-full p-2 outline-none"
                />
            </div>
            <div class="relative mb-8">
                <i class="fas fa-user absolute text-gray-500 left-2 bottom-2 text-xl"></i>
                <input
                    type="text"
                    placeholder="Votre prenom"
                    name="prenom"
                    class="border-b-2 indent-7 w-full p-2 outline-none"
                />
            </div>
            <div class="relative mb-8">
                <i class="fas fa-envelope absolute text-gray-500 left-2 bottom-2 text-xl"></i>
                <input
                    type="email"
                    placeholder="Email"
                    name="email"
                    class="border-b-2 indent-7 w-full p-2 outline-none"
                />
            </div>
            <div class="relative mb-8">
                <i class="fas fa-phone absolute text-gray-500 left-2 bottom-2 text-xl"></i>
                <input
                    type="tel"
                    placeholder="Contact"
                    name="contact"
                    class="border-b-2 indent-7 w-full p-2 outline-none"
                />
            </div>
            <div class="relative mb-10 col-span-2">
                <i class="fas fa-lock absolute text-gray-500 left-2 bottom-2 text-xl"></i>
                <input
                    type="password"
                    onChange="onChangeData(event)"
                    name="password"
                    placeholder="Mot de passe"
                    class="border-b-2 indent-7 w-full p-2 outline-none"
                />
                <div>
                    <div class="absolute right-0 -bottom-6 text-slate-800">
                        <a href="#">Mot de passe oublié</a>
                    </div>
                </div>
            </div>
           </div>

            <button  class="bg-teal-500 w-full text-white rounded p-3">
                Créer un compte
            </button>
        </form>

        <div class="text-center mt-3">
            <p class="text-center">
                Vous avez déjà un compte ? <a href="/login" class="text-teal-500">Connectez-vous</a>
            </p>
        </div>
    </div>
</div>
@endsection