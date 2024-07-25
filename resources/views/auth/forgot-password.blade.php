@extends('layouts.auth')
@section('content')
<div class="flex items-center justify-center">
    <div class="xl:w-1/3 md:w-1/2 w-full p-3">
        <h1 class="text-3xl text-center uppercase">Se connecter</h1>
        <form method="post" class="p-8">
            <div class="relative mb-8">
                <i class="IoMailOutline absolute text-gray-500 left-0 bottom-3 text-xl"></i>
                <input
                    type="text"
                    placeholder="Email"
                    onChange="onChangeData(event)"
                    id="email"
                    class="border-b-2 indent-7 w-full p-2 outline-none"
                />
            </div>
            <div class="relative mb-10">
                <i class="FiLock absolute text-gray-500 left-0 bottom-3 text-xl"></i>
                <input
                    type="password"
                    onChange="onChangeData(event)"
                    id="password"
                    placeholder="Mot de passe"
                    class="border-b-2 indent-7 w-full p-2 outline-none"
                />
                <div>
                    <div class="absolute right-0 -bottom-6 text-slate-800">
                        <a href="#">Mot de passe oublié</a>
                    </div>
                </div>
            </div>

            <button  class="bg-teal-500 w-full text-white rounded p-3">
                Connexion
            </button>
        </form>

        <div class="text-center mt-3">
            <p class="text-center">
                Veuillez-vous connecter pour calculer votre indice de masse corporel
            </p>
        </div>
    </div>
</div>
@endsection