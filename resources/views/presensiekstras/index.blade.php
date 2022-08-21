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

    <div class="p-6">
    <form action="{{route('presensiekstras.index')}}" method="get">
        @csrf
        <div class="mx-auto sm:px-6 lg:px-8 ">
            <select id="ekstra" name="ekstra" required
                class="bg-blue-500 text-white block w-6/12 mt-1 text-sm form-select hover:shadow-outline-purple rounded-md mt-7 py-3">
                <option class="border-black bg-white text-black" disabled selected>--Pilih Ekstra--</option>
                @foreach ($semua as $ekstra)
                    <option class="border-black bg-white text-black" value="{{$ekstra->id}}">{{$ekstra->nama}}</option>
                @endforeach
            </select>
        </div>

        <div class="mx-auto sm:px-6 lg:px-8">
            <button class="hover:bg-blue-400 bg-blue-500 delay-75 duration-100 text-white text-sm font-bold rounded-2xl px-10 py-3 mt-7 border-b-4 border-b-green-600 w-12/12">
                Cari
            </button>
        </div>
    </form>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p>Menampilkan Ekstrakurikuler {{strtoupper($tes->nama)}}</p>
            <!-- component -->
            @php
                $data = [];
                $count = count($pilihekstra);
            @endphp
            {{-- @foreach ($ekstrakurikuler as $eks)
                @php
                    $data[$count][0] = $eks->tanggal_lahir;
                    $data[$count][1] = $siswa->nama_siswa;
                    $data[$count][2] = $siswa->nis;
                    if (count($siswa->ekstra_siswas) > 0 ) {
                        for ($i=0; $i < count($siswa->ekstra_siswas) ; $i++) { 
                            $data[$count][3][$i] = $siswa->ekstra_siswas[$i]->ekstra[0]->nama;
                        }
                    } else {
                        $data[$count][3] = 'belum ada';
                    }
                    $data[$count][9] = $siswa->id;
                    $count++;
                @endphp
            @endforeach --}}

            <body class="flex items-center justify-center">
                <div class="container block">
                    <table
                    class="table-fixed w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                        <thead class="text-black">
                            @for ($i = 0; $i < $count; $i++)
                            <tr
                                class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Tanggal
                                </th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Aksi
                                </th>
                            </tr>
                            @endfor
                        </thead>
                        <tbody class="flex-1 sm:flex-none">
                            @for ($i = 0; $i < $count; $i++)
                                <tr
                                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Tanggal</span>
                                            {{ \Carbon\Carbon::parse($pilihekstra[$i]->tanggal)->translatedFormat('d F Y') }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Aksi</span>
                                        <a href="{{ route('presensiekstras.edit', [$pilihekstra[$i]->tanggal,'id_ekstra' => $ekstras, 'tanggal' => $pilihekstra[$i]->tanggal]) }}"
                                            class="text-blue-400 hover:text-blue-600 underline">Edit</a>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </body>

            <a href="{{route('presensiekstras.create')}}">
                <button title="Tambah Presensi"
                class="fixed z-90 bottom-8 right-8 bg-blue-600 w-20 h-20 rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl flex">+</button>
            </a>

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
        </div>
    </div>
    </div>
</x-app-layout>