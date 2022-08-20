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
            <p>Menampilkan Presensi KBM Kelas  {{ \Carbon\Carbon::parse($presensis[0]->tanggal)->translatedFormat('d F Y') }}</p>
            <!-- component -->
            <form action="{{ route('presensikbms.update-all') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="tanggal" value="{{ $presensis[0]->tanggal }}">
                <input type="hidden" name="mapel" value="{{ $presensis[0]->mapel_id }}">
                <button type="submit" class="float-right py-2 px-4 bg-transparent text-blue-600 font-semibold border border-blue-600 rounded hover:bg-blue-600 hover:text-white hover:border-transparent transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" 
                        >Hadir Semua</button>
            </form>
            <body class="flex items-center justify-center">
                <div class="container block">
                    <table
                    class="table-fixed w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                        <thead class="text-black">
                            <tr
                                class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Nama
                                </th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Kehadiran
                                </th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="flex-1 sm:flex-none">
                            @foreach ($presensis as $presensi)
                                <tr
                                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nama</span>
                                            {{ $presensi->Siswa->nama_siswa }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Kehadiran</span>
                                            @if ($presensi->status == 'hadir')
                                                <a class="font-bold text-green-600">{{ strtoupper($presensi->status) }}</a>
                                            @else
                                                <a class="font-bold text-red-600">{{ strtoupper($presensi->status) }}</a>
                                            @endif
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Aksi</span>    
                                            <form action="{{ route('presensikbms.update', $presensi->id)}}" method="post">
                                                @csrf
                                                @method('patch')
                                                <button class="py-2 px-4 bg-transparent text-green-600 font-semibold border border-green-600 rounded hover:bg-green-600 hover:text-white hover:border-transparent transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" 
                                                    value="hadir" name="status">Hadir</button>
                                                <button class="py-2 px-4 bg-transparent text-red-600 font-semibold border border-red-600 rounded hover:bg-red-600 hover:text-white hover:border-transparent transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" 
                                                    value="tidak hadir" name="status">Tidak Hadir</button>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </body>

            {{-- <a href="{{route('presensiekstras.create')}}">
                <button title="Tambah Presensi"
                class="fixed z-90 bottom-8 right-8 bg-blue-600 w-20 h-20 rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl flex">+</button>
            </a> --}}

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
</x-app-layout>