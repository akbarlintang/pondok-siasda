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
    <form action="{{route('spps.index')}}" method="get" enctype="multipart/form-data">
        @csrf
        <div class="grid grid grid-cols-4">        
            <div class="mx-auto sm:px-6 lg:px-8 ">
                <select id="jenjang" name="jenjang" required
                    class="bg-blue-500 text-white  block w-full mt-1 text-sm form-select hover:shadow-outline-purple rounded-md mt-7 py-3">
                    <option class="border-black bg-white text-black" disabled selected hidden>--Pilih Jenjang--</option>
                    <option class="border-black bg-white text-black" value="smk" {{ $jenjang == 'smk' ? 'selected' : '' }}>SMK</option>
                    <option class="border-black bg-white text-black" value="ma" {{ $jenjang == 'ma' ? 'selected' : '' }}>MA</option>
                    <option class="border-black bg-white text-black" value="mts" {{ $jenjang == 'mts' ? 'selected' : '' }}>MTS</option>
                </select>
            </div>

            <div class="mx-auto sm:px-6 lg:px-8">
                <select id="tingkatan" name="tingkatan" required
                class="bg-blue-500 text-white  block w-full mt-1 text-sm form-select hover:shadow-outline-purple rounded-md mt-7 py-3">
                    <option class="border-black bg-white text-black" disabled selected hidden>--Pilih Tingkatan--</option>
                    <option class="border-black bg-white text-black" value="1" {{ $tingkat == '1' ? 'selected' : '' }}>1</option>
                    <option class="border-black bg-white text-black" value="2" {{ $tingkat == '2' ? 'selected' : '' }}>2</option>
                    <option class="border-black bg-white text-black" value="3" {{ $tingkat == '3' ? 'selected' : '' }}>3</option>
                </select>
            </div>

            <div class="mx-auto sm:px-6 lg:px-8">
                <select id="kelas" name="kelas" required
                    class="bg-blue-500 text-white  block w-full mt-1 text-sm form-select hover:shadow-outline-purple rounded-md mt-7 py-3">
                    <option class="border-black bg-white text-black" disabled selected hidden>--Pilih Kelas--</option>
                    <option class="border-black bg-white text-black" value="A" {{ $kelas == 'A' ? 'selected' : '' }}>A</option>
                    <option class="border-black bg-white text-black" value="B" {{ $kelas == 'B' ? 'selected' : '' }}>B</option>
                    <option class="border-black bg-white text-black" value="C" {{ $kelas == 'C' ? 'selected' : '' }}>C</option>
                    <option class="border-black bg-white text-black" value="D" {{ $kelas == 'D' ? 'selected' : '' }}>D</option>
                    <option class="border-black bg-white text-black" value="E" {{ $kelas == 'E' ? 'selected' : '' }}>E</option>
                </select>
            </div>

            <div class="mx-auto sm:px-6 lg:px-8">
                <button class="hover:bg-blue-400 bg-blue-500 delay-75 duration-100 text-white text-sm font-bold rounded-2xl px-10 py-3 mt-7 border-b-4 border-b-green-600 w-12/12">
                    Cari
                </button>
            </div>
        </div>
    </form>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p>Menampilkan {{strtoupper($jenjang)}} Tingkat {{$tingkat}} Kelas {{$kelas}}</p>
            <!-- component -->
            @php
                $data = [];
                $count = 0;
                // dd($siswas);
            @endphp
            @foreach ($siswas as $siswa)
                @php
                    $data[$count][1] = $siswa->nama_siswa;
                    $data[$count][2] = $siswa->nis;
                    $data[$count][3] = $siswa->tingkatan;
                    $data[$count][4] = $siswa->kelas;
                    if (count($siswa->spps) > 0 ) {
                        $data[$count][5] = $siswa->spps->last()->status;
                        $data[$count][6] = \Carbon\Carbon::parse($siswa->spps->last()->tanggal)->translatedformat('F Y');
                    } else {
                        $data[$count][5] = '-';
                        $data[$count][6] = '-';
                    }
                    $data[$count][7] = $siswa->id;
                    $count++;
                    @endphp
            @endforeach
            
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
                                    Nama
                                </th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    NIS
                                </th>
                                {{-- <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Tingkat
                                </th>
                                <th
                                    class="p-3 font-bold row-2 uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Kelas
                                </th> --}}
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Status Pembayaran
                                </th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Bulan Pembayaran Terakhir
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
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nama</span>
                                            {{ $data[$i][1] }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">NIS</span>
                                            {{ $data[$i][2] }}
                                    </td>
                                    {{-- <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Tingkat</span>
                                            {{ $data[$i][3] }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Kelas</span>
                                            {{ $data[$i][4] }}
                                    </td>     --}}
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Hapalan Terakhir</span>
                                        {{ strtoupper($data[$i][5]) }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Tanggal</span>
                                        {{$data[$i][6]}}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Aksi</span>
                                        <a href="{{ route('spps.show', $data[$i][7]) }}"
                                            class="text-blue-400 hover:text-blue-600 underline pl-6">Lihat</a>
                                        <a href="{{ route('spps.create', ['id' => $data[$i][7]]) }}"
                                            class="text-blue-400 hover:text-blue-600 underline pl-6">Tambah</a>
                                    </td>
                                </tr>
                            @endfor
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
        </div>
    </div>
    </div>
</x-app-layout>
