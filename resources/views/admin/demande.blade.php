@extends('layouts.app', ['title' => 'Gestion des demandes', 'header' => 'Demande'])

@section('content')
    <div class="flex flex-col">
        <div class="overflow-x-auto">

            <div class="py-2 align-middle inline-block min-w-full lg:px-12">
                <form action="/demande" method="GET" class="w-full text-right my-4">
                    @csrf
                    <select name="option" class="md:w-32 sm:w-52 w-36 border bg-white rounded px-3 py-2 outline-none required">
                        <option class="py-1" value="name">Name</option>
                        <option class="py-1" value="etablissement">Etablissement</option>
                    </select>
                    <input type="text" name="search" class="mx-3 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-400 rounded-md">
                    <input type="submit" value="search" class="w-32 py-2 bg-indigo-600 hover:bg-indigo-700 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md rounded-lg"/>
                </form>
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Domaine
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Durée
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Etablissement
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Traitement
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100 dark:bg-gray-300">
                        @foreach($demandes as $demande)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $demande->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $demande->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $demande->titre }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ round((strtotime($demande->date_fin_stage) - strtotime($demande->date_debut_stage))/2628002.88) }} mois
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                    {{ $demande->etablissement }}
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <a href="/demande/{{ $demande->id }}" type="submit" class="text-green-600 hover:text-green-900 pr-8 focus:outline-none">
                                        traiter
                                    </a>
                                    <form action="/demande/{{ $demande->id }}" method="POST" class="w-min inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 pl-4 focus:outline-none">
                                            refuser
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    
    <div class="absolute top-0 left-0 min-h-screen min-w-full bg-black bg-opacity-40 {{ $hidden }}">
        <div class="sm:mx-10 mx-3">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-800 my-36 max-w-4xl mx-auto">
                <div class="flex items-center">
                    <div class="w-full">
                        <div class="w-full md:grid md:grid-cols-3 md:divide-x md:divide-gray-300">
                            <div class="md:col-span-2">
                                <div class="flex flex-col sm:flex-row m-5 mb-10">
                                    <div class="mx-auto text-center flex-grow ">
                                        <div class="text-xl font-medium text-gray-900">
                                            {{ $demande->name }}
                                        </div>
                                        <div class="text-md text-gray-500">
                                            {{ $demande->email }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-5 mb-7">
                                    <span class="text-md font-medium text-gray-900">Etablisement:</span>
                                    <span class="text-md font-medium text-gray-700 mt-3 ml-10">{{ $demande->etablissement }}</span>
                                </div>
                                <div class="mx-5 my-7">
                                    <span class="text-md font-medium text-gray-900">Domaine: </span>
                                    <span class="text-md font-medium text-gray-700 mt-3 ml-10">{{ $demande->titre }}</span>
                                </div>
                                <div class="flex flex-row mx-auto max-w-md mt-8 mb-5">
                                    <div class="flex-grow sm:mr-8 mr-2">
                                        <span class="text-md font-medium text-gray-900">du: </span>
                                        <span class="text-md font-medium text-gray-700 mt-3 ml-3">{{ $demande->date_debut_stage }}</span>
                                    </div>
                                    <div class="flex-grow">
                                        <span class="text-md font-medium text-gray-900">a: </span>
                                        <span class="text-md font-medium text-gray-700 mt-3 ml-3">{{ $demande->date_fin_stage }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="py-4 px-9">
                                <div class="my-7">
                                    <a href="/uploads/{{ $demande->cv }}" target="_blank" class="py-2 px-4 flex justify-center items-center cursor-pointer bg-gray-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none rounded-lg ">
                                        CV
                                    </a>
                                </div>
                                <div class="my-7">
                                    <a href="/uploads/{{ $demande->lettre_motivation }}" target="_blank" class="py-2 px-4 flex justify-center items-center cursor-pointer bg-gray-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none rounded-lg ">
                                        Lettre de motivation
                                    </a>
                                </div>
                                <div class="my-7">
                                    <a href="/uploads/{{ $demande->demande_stage }}" target="_blank" class="py-2 px-4 flex justify-center items-center cursor-pointer bg-gray-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none rounded-lg ">
                                        Demande de stage
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-2 relative w-full">
                            <form action="/demande/{{ $demande->id }}" method="POST" class="w-full">
                                @csrf
                                @method('PATCH')
                                <div class="w-min mb-2">
                                    <div class="ml-3 flex flex-col w-min inline-block">
                                        <span class="text-md font-medium text-gray-900">Affectation du projet: </span>
                                        <select id="select1" name="projet" class="md:w-72 sm:w-52 w-36 mb-2 border bg-white rounded px-3 py-2 outline-none required">
                                            @foreach(\App\Models\Project::all() as $project)
                                                <option class="py-1" value="{{ $project->id }}">{{ $project->titre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-min mx-auto">
                                        <div id="addSelectBtn">
                                            <svg class="text-white mx-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Accepter" class="w-32 mx-4 py-2 px-4 cursor-pointer bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 inline-block focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg"/>
                                <input type="hidden" name="user_id" value="{{ $demande->user_id }}" />
                            </form>
                            <a href="/demande" class="absolute bottom-0 cursor-pointer right-0 w-32 h-10 mx-4 py-2 px-4 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">Annuler</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script defer>
        var count = 2;

        function addSelect() {
            if(count > 4)
                return
            document.getElementById(`select${count}`).classList.remove('hidden');
            count++;
        }
    </script>
@endsection
