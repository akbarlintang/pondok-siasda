<x-app-layout>
    <div class="p-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p>Menampilkan Siswa {{$siswa->nama_siswa}} {{strtoupper($siswa->jenjang)}} Tingkat {{$siswa->tingkatan}} Kelas {{$siswa->kelas}}</p>
            <!-- component -->

            <a href="{{ url()->previous() }}" class="right-0">
                <button
                    class="mb-3 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                    Kembali
                </button>
            </a>

            @php
                $data = [];
                $count = 0;
                // dd($siswas);
            @endphp
            @foreach ($evaluasis as $eval)
                @php
                    $data[$count][1] = $eval->evaluasi; 
                    $data[$count][2] = $eval->keterangan;
                    $data[$count][3] = $eval->tanggal;
                    $count++;
                    @endphp
            @endforeach
            
            <body class="flex items-center justify-center">
                <div class="container block">
                    @if ($count <= 0)
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-16 rounded relative" role="alert">
                            <strong class="font-bold">Siswa belum memiliki data evaluasi!</strong>
                        </div>
                    @else
                        <table
                        class="table-fixed w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                            <thead class="text-black">
                                @for ($i = 0; $i < $count; $i++)
                                <tr
                                    class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                    <th
                                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                        Evaluasi
                                    </th>
                                    <th
                                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                        Keterangan
                                    </th>
                                    <th
                                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                        Tanggal
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
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Evaluasi</span>
                                                {{ $data[$i][1] }}
                                        </td>
                                        <td
                                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                            <span
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Keterangan</span>
                                                {{ $data[$i][2] }}
                                        </td>
                                        <td
                                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                            <span
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Tanggal</span>
                                                {{ $data[$i][3] }}
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    @endif
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
</x-app-layout>
