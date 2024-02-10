@extends('layouts.app', ['title' => 'Gestion des projets','header' => 'Projets'])

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4 mx-4">
        @foreach($projets as $projet)
            <div class="w-full">
                <div class="shadow-lg rounded-2xl relative p-4 bg-white dark:bg-gray-800 my-10 mx-auto max-w-xl">
                    <form action="/projets/{{ $projet->id }}" method="POST" class="w-full text-right flex justify-end">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-min">
                            <svg width="22" height="28" class="hover:text-red-500 dark:hover:text-white dark:text-gray-200 text-red-700" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M704 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm-544-992h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z">
                                </path>
                            </svg>
                        </button>
                    </form>
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
                    <div class="grid grid-cols-5 divide-x divide-gray-300 mt-10">
                        <div class="col-span-2">
                            <p class="text-gray-500 dark:text-gray-100 text-md text-left my-4 px-8">
                                {{ $projet->framework }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="w-full">
            <div id="addBtn" onclick="addForm()" class="shadow-lg rounded-2xl cursor-pointer text-center bg-white dark:bg-gray-800 mt-4 mx-auto w-24 h-24 hover:bg-gray-200 transition ease-in duration-200">
                <div class="p-7 text-4xl font-bold text-gray-500">
                    +
                </div>
            </div>
            <form method="POST" action="/projets" id="form" class="hidden shadow-lg rounded-2xl relative p-4 bg-white dark:bg-gray-800 my-10 mx-auto max-w-xl">
                @csrf
                <div class="text-center">
                    <button type="submit" class="mx-4 w-8 h-8 bg-green-500 text-center rounded-full p-2 shadow-md">
                        <svg class="text-white mx-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                        </svg>
                    </button>
                    <button id="cancelBtn" onclick="cancelForm()" class="mx-4 w-8 h-8 bg-red-500 text-center rounded-full p-2 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-white mx-auto" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </button>
                </div>
                <div class="mt-1">
                    <div>
                        <label for="titre" class="block ml-3 text-sm font-medium text-gray-700">
                            Titre
                        </label>
                        <input type="text" name="titre" required class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300">
                    </div>
                    <div class="mt-4">
                        <label for="description" class="block ml-3 text-sm font-medium text-gray-700">
                            Description
                        </label>
                        <div class="mt-1">
                            <textarea name="description" rows="3" required class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="about" class="block ml-3 text-sm font-medium text-gray-700">
                            Technologies
                        </label>
                        <select id="select1" name="technologie1" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option selected="selected" value="0">None</option>
                            <option value="Laravel">Laravel</option>
                            <option value="Express.js">Express.js</option>
                            <option value="Django">Django</option>
                            <option value="Ruby on Rails">Ruby on Rails</option>
                            <option value="Spring Boot">Spring Boot</option>
                            <option value="Flask">Flask</option>
                            <option value="Angular">Angular</option>
                            <option value="React">React</option>
                            <option value="Vue.js">Vue.js</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        var form = document.getElementById('form');
        var addBtn = document.getElementById('addBtn');
        var count = 2;

        function addForm() {
            addBtn.classList.add('hidden');
            form.classList.remove('hidden');
        }

        function cancelForm() {
            addBtn.classList.remove('hidden');
            form.classList.add('hidden');
        }

        function addSelect() {
            if(count > 5)
                return
            document.getElementById(`select${count}`).classList.remove('hidden');
            count++;
        }
    </script>
@endsection
