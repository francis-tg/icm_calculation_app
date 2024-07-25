@extends('layouts.auth')

@section('content')
<div class="flex items-center justify-center">
    <div class="xl:w-1/3 md:w-1/2 w-full p-3">
        <h1 class="text-3xl text-center uppercase">Se connecter</h1>
        <form method="POST" action="{{ url('/auth/login') }}" class="p-8">
            @csrf
            
            <!-- Display Validation Errors -->
            @if($errors->any())
                <div class="mb-4 text-red-500">
                    @foreach($errors->all() as $error)
                    <p class="p-2 mb- bg-red-300 rounded text-black">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            
            <div class="relative mb-8">
                <i class="fas fa-envelope absolute text-gray-500 left-2 bottom-2 text-xl"></i>
                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    class="border-b-2 indent-7 w-full p-2 outline-none"
                    required
                />
            </div>
            
            <div class="relative mb-10">
                <i class="fas fa-lock absolute text-gray-500 left-2 bottom-2 text-xl"></i>
                <input
                    type="password"
                    name="password"
                    placeholder="Mot de passe"
                    class="border-b-2 indent-7 w-full p-2 outline-none"
                    required
                />
            </div>
            
            <button type="submit" class="bg-teal-500 w-full text-white rounded p-3">
                Connexion
            </button>
        </form>

        <div class="text-center mt-3">
            <p>
                Vous n'avez pas encore de compte ? <a href="/auth/register" class="text-teal-500">Créer un</a>
            </p>
        </div>
    </div>
</div>
@endsection
