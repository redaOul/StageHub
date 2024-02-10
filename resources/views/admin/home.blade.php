@extends('layouts.app', ['title' => 'Home', 'header' => 'Home'])

@section('content')
    <div id="wrapper" class="mx-10 my-20 justify-center">
        <div class="sm:grid sm:grid-flow-row justify-items-center sm:grid-cols-3 sm:max-w-5xl min-w-4xl mx-auto">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-800 sm:w-48 md:w-60 my-5 sm:m-0">
                <div class="flex items-center">
                    <p class="text-md text-black dark:text-white ml-2">
                        New demande
                    </p>
                </div>
                <div class="flex flex-col justify-start">
                    <p class="text-gray-700 dark:text-gray-100 text-4xl text-center font-bold my-4">
                        {{ $nbDemande }}
                    </p>
                </div>
                <div class="flex items-center text-green-500 text-sm text-center">
                    <span class="text-gray-400 text-right">
                        non traiter
                    </span>
                </div>
            </div>
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-800 sm:w-48 md:w-60 my-5 sm:m-0">
                <div class="flex items-center">
                    <p class="text-md text-black dark:text-white ml-2">
                        Nb projet
                    </p>
                </div>
                <div class="flex flex-col justify-start">
                    <p class="text-gray-700 dark:text-gray-100 text-4xl text-center font-bold my-4">
                        {{ $nbProjet }}
                    </p>
                </div>
                <div class="flex items-center text-green-500 text-sm text-center">
                    <span class="text-gray-400 text-right">
                        total
                    </span>
                </div>
            </div>
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-800 sm:w-48 md:w-60 my-5 sm:m-0">
                <div class="flex items-center">
                    <p class="text-md text-black dark:text-white ml-2">
                        Nb stagiaire
                    </p>
                </div>
                <div class="flex flex-col justify-start">
                    <p class="text-gray-700 dark:text-gray-100 text-4xl text-center font-bold my-4">
                        {{ $nbStagiaire }}
                    </p>
                </div>
                <div class="flex items-center text-green-500 text-sm text-center">
                        <span class="text-gray-400 text-right">
                            en service
                        </span>
                </div>
            </div>
        </div>
    </div>
@endsection
