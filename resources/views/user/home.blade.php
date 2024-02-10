@extends('layouts.user')

@section('content')
    <header
        class="max-w-7xl shadow-lg bg-white dark:bg-gray-700 items-center h-24 sm:h-20 rounded-2xl z-40 mx-auto p-5 flex">
        <div class="relative items-center pl-1 flex w-full pl-5 lg:max-w-68 sm:pr-2 sm:ml-0 text-2xl">
            Bienvenue {{ Auth::user()->name }},
        </div>
        <div class="ml-4 flex items-center ml-6">
            <div class="flex items-center ml-6">
                {{-- a corriger --}}
                <button type="button" id="dark-mode"
                    class="flex justify-center mx-4 p-2 text-gray-500 transition duration-150 ease-in-out bg-gray-100 border border-transparent rounded-md lg:bg-white lg:dark:bg-gray-900 dark:text-gray-200 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-700 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50"
                    onclick="localStorage.theme = 'light'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-6 w-6 cursor-pointer hidden" id="toggle-dark">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-6 w-6 cursor-pointer hidden" id="toggle-light">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </button>
                {{--  --}}
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-medium text-gray-500 dark:text-white hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </header>




    @php
        $demande = \App\Models\Demande::where('user_id', Auth::user()->id)
        ->orderBy('demandes.updated_at', 'desc')
        ->first();
    @endphp
    {{-- il a la main pour faire une demande --}}
    @if (!isset($demande->etat) || $demande->etat == 'succes' || $demande->etat == 'refuse')
        @if(isset($demande->etat) && $demande->etat == 'refuse')
            <div class="w-min mx-auto">
                <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-800 my-10 mx-auto text-center py-6 px-20">
                    <h1 class="whitespace-nowrap text-center text-4xl">
                        Votre Demande a été refusée
                    </h1>
                    <h1 class="whitespace-nowrap text-center text-2xl">
                        Vous pouvez faire une autre demande a tous moments !
                    </h1>
                </div>
            </div>
        @endif
        <div class="sm:mx-10 mx-3 ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-800 my-20 max-w-4xl mx-auto">
                <div class="flex items-center">
                    <form action="/demande" method="POST" enctype="multipart/form-data" class="w-full">
                        @csrf
                        <div class="w-full md:grid md:grid-cols-3 md:divide-x md:divide-gray-300">
                            <div class="md:col-span-2 mt-8">
                                <div class="mx-5 mb-7">
                                    <label for="etablissement"
                                        class="block text-sm font-medium text-gray-700">Etablisement</label>
                                    <input type="text" name="etablissement" placeholder="EILCO" required
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-400 rounded-md">
                                </div>
                                <div class="mx-5 mb-7">
                                    <label for="domaine" class="block text-sm font-medium text-gray-700">Domaine</label>
                                    <select name="domaine_id" required
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:w-full shadow-sm sm:text-sm border-gray-400 rounded-md">
                                        @php $domaines = \App\Models\Domaine::all(); @endphp
                                        @foreach ($domaines as $domaine)
                                            <option value="{{$domaine->id}}">{{$domaine->titre}}</option> 
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex flex-row mx-auto max-w-md mb-5">
                                    <div class="flex-grow sm:mr-8 mr-2">
                                        <label for="date_debut_stage" class="block text-sm font-medium text-gray-700">Date
                                            de debut</label>
                                        <input type="date" name="date_debut_stage"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-400 rounded-md"
                                            required>
                                    </div>
                                    <div class="flex-grow">
                                        <label for="date_fin_stage" class="block text-sm font-medium text-gray-700">Date de
                                            fin</label>
                                        <input type="date" name="date_fin_stage"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-400 rounded-md"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div class="p-4">
                                <div>
                                    <label for="cv_uri"
                                        class="block text-md font-medium text-gray-700 mb-2 pl-3">Curriculum vitae</label>
                                    <label
                                        class="py-2 px-4 flex justify-center items-center cursor-pointer bg-gray-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                                        <svg width="20" height="20" fill="currentColor" class="mr-2"
                                            viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1344 1472q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm256 0q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-224v320q0 40-28 68t-68 28h-1472q-40 0-68-28t-28-68v-320q0-40 28-68t68-28h427q21 56 70.5 92t110.5 36h256q61 0 110.5-36t70.5-92h427q40 0 68 28t28 68zm-325-648q-17 40-59 40h-256v448q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-448h-256q-42 0-59-40-17-39 14-69l448-448q18-19 45-19t45 19l448 448q31 30 14 69z">
                                            </path>
                                        </svg>
                                        Upload CV (.pdf)
                                        <input type="file" name="file[]" accept=".pdf" class="w-0" required />
                                    </label>
                                </div>
                                <div>
                                    <label for="lettre_motivation_uri"
                                        class="block text-md font-medium text-gray-700 mt-5 mb-2 pl-3">
                                        Lettre de motivation
                                    </label>
                                    <label
                                        class="py-2 px-4 flex justify-center items-center cursor-pointer bg-gray-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                                        <svg width="20" height="20" fill="currentColor" class="mr-2"
                                            viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1344 1472q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm256 0q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-224v320q0 40-28 68t-68 28h-1472q-40 0-68-28t-28-68v-320q0-40 28-68t68-28h427q21 56 70.5 92t110.5 36h256q61 0 110.5-36t70.5-92h427q40 0 68 28t28 68zm-325-648q-17 40-59 40h-256v448q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-448h-256q-42 0-59-40-17-39 14-69l448-448q18-19 45-19t45 19l448 448q31 30 14 69z">
                                            </path>
                                        </svg>
                                        Upload LM (.pdf)
                                        <input type="file" name="file[]" accept=".pdf" class="w-0" required />
                                    </label>
                                </div>
                                <div>
                                    <label for="demande-stage_uri"
                                        class="block text-md font-medium text-gray-700 mt-5 mb-2 pl-3">Demande de
                                        stage</label>
                                    <label
                                        class="py-2 px-4 flex justify-center items-center cursor-pointer bg-gray-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                                        <svg width="20" height="20" fill="currentColor" class="mr-2"
                                            viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1344 1472q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm256 0q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-224v320q0 40-28 68t-68 28h-1472q-40 0-68-28t-28-68v-320q0-40 28-68t68-28h427q21 56 70.5 92t110.5 36h256q61 0 110.5-36t70.5-92h427q40 0 68 28t28 68zm-325-648q-17 40-59 40h-256v448q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-448h-256q-42 0-59-40-17-39 14-69l448-448q18-19 45-19t45 19l448 448q31 30 14 69z">
                                            </path>
                                        </svg>
                                        Upload DS (.pdf)
                                        <input type="file" name="file[]" accept=".pdf" class="w-0" required/>
                                    </label>
                                </div>
                            </div>


                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                        <input type="hidden" name="etat" value="traitement" />
                        <div class="w-max mt-4 mx-auto mt-6 mb-2">
                            <input type="submit" value="Envoyer"
                                class="md:ml-12 w-48 py-2 px-4 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
    {{-- en cours de faire le stage --}}
    @elseif($demande->etat == 'execution')
        @php
            $projet = $demande->project;
        @endphp
        <div class="flex flex-row w-full">
            <div class="flex-grow">
                <div class="w-min mx-auto">
                    <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-800 my-4 mx-auto text-center py-6 px-20">
                        <h1 class="whitespace-nowrap text-center text-3xl">
                            Votre Projet
                        </h1>
                    </div>
                </div>
                <div class="w-full">
                    <div class="shadow-lg rounded-2xl relative p-4 bg-white dark:bg-gray-800 my-10 mx-auto max-w-xl">
                        <div class="w-min whitespace-nowrap mx-auto">
                            <h1 class="text-2xl mb-6 text-black dark:text-white pb-2">
                                {{ $projet->titre }}
                            </h1>
                        </div>
                        <div>
                            <p class="text-gray-500 dark:text-gray-100 text-md text-left my-4 px-8">
                                {{ $projet->description }}
                            </p>
                        </div>
                        <div>
                            <div class="text-center mb-3 rounded-full bg-gray-300 w-min mx-auto px-4 py-1">
                                Technologie
                            </div>
                            <div class="text-gray-500 dark:text-gray-100 text-md text-left my-4 px-8">
                                {{ $projet->framework }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    {{-- en cours du traitement --}}
    @elseif($demande->etat == 'traitement')
        <div class="w-min mx-auto">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-800 my-64 mx-auto text-center py-6 px-20">
                <h1 class="whitespace-nowrap text-center text-4xl">
                    Votre Demande est en cours de traitement
                </h1>
            </div>
        </div>
    @endif
@endsection
