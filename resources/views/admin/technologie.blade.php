@extends('layouts.app', ['title' => 'Gestion des technologies des projets','header' => 'Projets'])

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
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                nom
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                framework
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                resource
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                projets
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">traiter</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100 dark:bg-gray-300">
                        @foreach($technologies as $technologie)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-3 text-sm font-medium text-gray-900">
                                            {{ $technologie->nom }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <ul class="list-disc text-left text-sm">
                                        @foreach(\App\Models\Framework::where('technologie_id', $technologie->technologie_id)->get() as $framework)
                                            <li>{{ $framework->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-blue-500">
                                    <a href="{{ $technologie->resource }}" target="_blank">{{ $technologie->resource }}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <ul class="list-disc text-left text-sm">
                                        @foreach($technologie->projet as $projet)
                                            <li>{{ $projet->titre }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <form action="/technologies/{{ $technologie->technologie_id }}" method="POST" class="w-min inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 pl-4 focus:outline-none">
                                            supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr id="field" class="hidden">
                            <form action="/technologies" method="POST" class="w-full">
                                @csrf
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-3 text-sm font-medium text-gray-900">
                                            <input type="text" name="nom" class="focus:ring-indigo-500 focus:border-indigo-500 w-min flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="PHP">
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-blue-500">
                                    <input type="text" name="resource" class="focus:ring-indigo-500 focus:border-indigo-500 w-min flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="https://www.example.com">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select id="select1" name="projet1" class="block text-sm w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected="selected" value="0">None</option>
                                        @foreach($projets as $projet)
                                            <option value="{{ $projet->projet_id }}">{{ $projet->titre }}</option>
                                        @endforeach
                                    </select>
                                    <select id="select2" name="projet2" class="hidden block text-sm mt-2 w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                        <option selected="selected" value="0">None</option>
                                        @foreach($projets as $projet)
                                            <option value="{{ $projet->projet_id }}">{{ $projet->titre }}</option>
                                        @endforeach
                                    </select>
                                    <select id="select3" name="projet3" class="hidden block mt-2 w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                        <option selected="selected" value="0">None</option>
                                        @foreach($projets as $projet)
                                            <option value="{{ $projet->projet_id }}">{{ $projet->titre }}</option>
                                        @endforeach
                                    </select>
                                    <select id="select4" name="projet4" class="hidden block mt-2 w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                                        <option selected="selected" value="0">None</option>
                                        @foreach($projets as $projet)
                                            <option value="{{ $projet->projet_id }}">{{ $projet->titre }}</option>
                                        @endforeach
                                    </select>
                                    <select id="select5" name="projet5" class="hidden block mt-2 w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                                        <option selected="selected" value="0">None</option>
                                        @foreach($projets as $projet)
                                            <option value="{{ $projet->projet_id }}">{{ $projet->titre }}</option>
                                        @endforeach
                                    </select>
                                    <div class="w-min mx-auto mt-2">
                                        <div id="addSelectBtn" class="w-6 h-6 bg-green-500 cursor-pointer text-center rounded-full p-1 shadow-md" onclick="addSelect()">
                                            <svg class="text-white mx-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg>
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
