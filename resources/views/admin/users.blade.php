@extends('layouts.app', ['title' => 'Gestion des utilisateurs','header' => 'Users'])

@section('content')
    <script>
        function addNewUser() {}
        function cancel() {}
    </script>
    <div class="flex flex-col md:flex-row">
        <div class="md:m-5 mb-0 m-5 flex-grow">
            <div class="container flex flex-col mx-auto w-full items-center justify-center">
                <div class="px-4 py-5 sm:px-6 border dark:bg-gray-800 bg-white shadow rounded-md text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white px-10">
                        Admins
                    </h3>
                </div>
                <ul class="flex flex-col w-full px-20 mt-6">
                    @foreach($users as $user)
                        @if($user->is_admin)
                            <li class="border-gray-400 flex flex-row mb-5">
                                <div class="shadow-md border select-none bg-white dark:bg-gray-800 rounded-md flex flex-1 items-center p-5">
                                    <div class="flex-1 pl-1 md:mr-16">
                                        <div class="font-medium dark:text-white">
                                            {{ $user->name }}
                                        </div>
                                        <div class="md:block hidden text-gray-600 dark:text-gray-200 text-sm">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                    <div class="text-gray-600 dark:text-gray-200 text-sm">
                                    </div>
                                    @if($user->id != 1)
                                        <form action="/users/{{ $user->id }}" method="POST" class="w-24 text-right flex justify-end">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-min">
                                                <svg width="22" height="28" class="hover:text-red-500 dark:hover:text-white dark:text-gray-200 text-red-700" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M704 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm-544-992h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </li>
                        @endif
                    @endforeach
                    <form action="/users" method="POST" class="w-full">
                        @csrf
                    <li id="newUser" class="hidden border-gray-400 flex flex-col mb-5">
                        <div class="shadow-md border select-none bg-white dark:bg-gray-800 rounded-md items-center p-5">
                            <div class="pl-1 pb-3 md:mr-16 w-full">
                                <input type="email" name="email" placeholder="Email" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-400 rounded-md">
                            </div>
                            <div class="pl-1 pb-3 md:mr-16 w-full">
                                <input type="text" name="name" placeholder="Nom" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-400 rounded-md">
                            </div>
                            <div class="pl-1 md:mr-16 w-full">
                                <input type="password" name="password" placeholder="Password" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-400 rounded-md">
                            </div>
                        </div>
                    </li>
                    <li id="gestBtn" class="hidden text-center">
                        <button type="submit" class="mx-4 w-8 h-8 bg-green-500 text-center rounded-full p-2 shadow-md" onclick="addNewUser()">
                            <svg class="text-white mx-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </button>
                        <button onclick="cancel()" class="mx-4 w-8 h-8 bg-red-500 text-center rounded-full p-2 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-white mx-auto" viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </button>
                    </li>
                    </form>
                    <button id="addBtn" class="w-8 h-8 bg-green-500 text-center rounded-full mx-auto p-2 shadow-md" onclick="addNewUser()">
                        <svg class="text-white mx-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </button>
                </ul>
            </div>
        </div>
        <div class="md:m-5 mb-0 m-5 flex-grow">
            <div class="container flex flex-col mx-auto w-full items-center justify-center">
                <div class="px-4 py-5 sm:px-6 border dark:bg-gray-800 bg-white shadow rounded-md text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white px-10">
                        Users
                    </h3>
                </div>
                <ul class="flex flex-col w-full px-20 mt-6">
                    @foreach($users as $user)
                        @if(!$user->is_admin)
                            <li class="border-gray-400 flex flex-row mb-5">
                                <div class="shadow-md border select-none bg-white dark:bg-gray-800 rounded-md flex flex-1 items-center p-5">
                                    <div class="flex-1 pl-1 md:mr-16">
                                        <div class="font-medium dark:text-white">
                                            {{ $user->name }}
                                        </div>
                                        <div class="md:block hidden text-gray-600 dark:text-gray-200 text-sm">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                    <div class="text-gray-600 dark:text-gray-200 text-sm">
                                    </div>
                                    <form action="/users/{{ $user->id }}" method="POST" class="w-24 text-right flex justify-end">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-min">
                                            <svg width="22" height="28" class="hover:text-red-500 dark:hover:text-white dark:text-gray-200 text-red-700" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M704 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm-544-992h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <script defer>
            var fill = document.getElementById('newUser');
            var gesBtn = document.getElementById('gestBtn');
            var addBtn = document.getElementById('addBtn');

            function addNewUser() {
                addBtn.classList.add('hidden');
                fill.classList.remove('hidden');
                gesBtn.classList.remove('hidden');
            }

            function cancel() {
                addBtn.classList.remove('hidden');
                fill.classList.add('hidden');
                gesBtn.classList.add('hidden');
            }
        </script>
@endsection
