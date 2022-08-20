<x-app-layout>
    @if (session()->has('success'))
        <x-slot name="header">
            <h2 class="font-semibold text-xl leading-tight text-white">
                {{ session('success') }}
            </h2>
        </x-slot>
    @endif

    @if (session()->has('failed'))
        <x-slot name="header">
            <h2 class="font-semibold text-xl leading-tight text-white">
                {{ session('failed') }}
            </h2>
        </x-slot>
    @endif

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p>Menampilkan data presensi siswa {{ auth()->user()->nama_siswa }}</p>
            <!-- component -->
            @php
                $data = [];
                $tingkatan = [1, 2, 3];
                $semester = ['ganjil', 'genap']
            @endphp

            <body class="flex items-center justify-center">
                <div class="container block">
                    <table
                    class="table-fixed w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                        <thead class="text-black">
                            <tr
                                class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Tingkatan
                                </th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Semester
                                </th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="flex-1 sm:flex-none">
                            @foreach ($tingkatan as $tingkat)
                                {{-- @foreach ($semester as $smt) --}}
                                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                        <td rowspan="2" class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                            <span
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Tingkatan</span>
                                                {{ $tingkat }}
                                        </td>
                                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                            <span
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Semester</span>
                                                {{ ucwords($semester[0]) }}
                                        </td>
                                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                            <span
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Aksi</span>
                                            <a href="{{ route('rekap-kbm.show', ['ganjil', $tingkat]) }}"
                                                class="text-blue-400 hover:text-blue-600 underline">Lihat</a>
                                        </td>
                                    </tr>
                                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                            <span
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Semester</span>
                                                {{ ucwords($semester[1]) }}
                                        </td>
                                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                            <span
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Aksi</span>
                                            <a href="{{ route('rekap-kbm.show', ['genap', $tingkat]) }}"
                                                class="text-blue-400 hover:text-blue-600 underline">Lihat</a>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $siswas->links() }} --}}
                </div>
            </body>

            <style>
                html,
                body {
                    height: 100%;
                }

                @media (min-width: 640px) {
                    table {
                        display: inline-table !important;
                    }

                    thead tr:not(:first-child) {
                        display: none;
                    }
                }

                td:not(:last-child) {
                    border-bottom: 0;
                }

                th:not(:last-child) {
                    border-bottom: 2px solid rgba(0, 0, 0, .1);
                }

            </style>
            {{-- <a href="{{route('siswas.create')}}">
            <button title="Contact Sale"
            class="fixed z-90 bottom-8 right-8 bg-blue-600 w-20 h-20 rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl flex">+</button>
            </a>    --}}
        </div>
    </div>
</x-app-layout>
