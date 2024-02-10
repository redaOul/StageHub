@extends('layouts.app', ['title' => 'Gestion des domaines de l\'entreprise','header' => 'Domaines'])

@section('content')
    <script>
        function addField() {}

        function cancelField() {}

        function addSelect() {}
    </script>
    <div class="flex flex-col my-8">
        <div class="overflow-x-auto">
            <div class="py-2 align-middle inline-block min-w-full lg:px-12">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-3/4">
                                Domaines
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4">
                                traitement
                            </th>                            
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100 dark:bg-gray-300">
                        @foreach($domaines as $domaine)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-3 text-sm font-medium text-gray-900">
                                            {{ $domaine->titre }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <form action="/domaines/{{ $domaine->id }}" method="POST" class="w-min inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none">
                                            supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr id="field" class="hidden">
                            <form action="/domaines" method="POST" class="w-full">
                                @csrf
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-3 text-sm font-medium text-gray-900">
                                            <input type="text" name="titre" required class="focus:ring-indigo-500 focus:border-indigo-500 w-min flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Titre">
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <button type="submit" class="text-white hover:bg-green-800 bg-green-600 px-4 py-2 rounded-lg focus:outline-none">
                                        Ajouter
                                    </button>
                                </td>
                            </form>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-min mx-auto mt-2">
                    <button id="addFieldBtn" class="w-6 h-6 bg-green-500 text-center rounded-full p-1 shadow-md" onclick="addField()">
                        <svg class="text-white mx-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </button>
                    <button id="cancelFieldBtn" class="w-6 h-6 bg-red-500 hidden text-center rounded-full p-1 shadow-md" onclick="cancelField()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-white mx-auto" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script defer>
        var field = document.getElementById('field');
        var addFieldBtn = document.getElementById('addFieldBtn');
        var cancelFieldBtn = document.getElementById('cancelFieldBtn');
        var count = 2;

        function addField() {
            addFieldBtn.classList.add('hidden');
            cancelFieldBtn.classList.remove('hidden');
            field.classList.remove('hidden');
        }

        function cancelField() {
            addFieldBtn.classList.remove('hidden');
            cancelFieldBtn.classList.add('hidden');
            field.classList.add('hidden');
        }

        function addSelect() {
            if(count > 5)
                return
            document.getElementById(`select${count}`).classList.remove('hidden');
            count++;
        }
    </script>
@endsection
