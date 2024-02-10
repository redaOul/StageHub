@extends('layouts.app', ['title' => 'Les stagiaires', 'header' => 'stage'])

@section('content')
    <div class="flex flex-col my-8">
        <div class="my-2 overflow-x-auto">
            <div class="py-2 align-middle inline-block min-w-full lg:px-12">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Project
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Remaining time
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                        @foreach($stages as $stage)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4 text-sm font-medium text-gray-900">
                                            {{ $stage->name }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap hidden sm:block">
                                    <div class="text-sm text-gray-900">
                                        {{ $stage->prjTitre }}
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <div class="text-gray-500">
                                        {{ $stage->dmTitre }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if((strtotime($stage->date_fin_stage) - time()) >= 0)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-300 text-green-800">
                                            Active
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-300 text-green-800">
                                            Termine
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
