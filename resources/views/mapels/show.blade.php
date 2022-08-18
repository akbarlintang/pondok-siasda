<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p>Menampilkan Siswa {{$siswa->nama_siswa}} {{strtoupper($siswa->jenjang)}} Tingkat {{$siswa->tingkatan}} Kelas {{$siswa->kelas}}</p>
            <!-- component -->
            @php
                $data = [];
                $count = 0;
                // dd($siswas);
            @endphp
            @foreach ($hapalans as $hap)
                @php
                    $data[$count][1] = $hap->hapalan;
                    $data[$count][2] = $hap->tanggal;
                    $count++;
                    @endphp
            @endforeach
            
            <body class="flex items-center justify-center">
                <div class="container block">
                    @if ($count <= 0)
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-3 rounded relative" role="alert">
                            <strong class="font-bold">Siswa belum memiliki data hapalan!</strong>
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
                                        Hapalan
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
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Hapalan</span>
                                                {{ $data[$i][1] }}
                                        </td>
                                        <td
                                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                            <span
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Tanggal</span>
                                                {{ $data[$i][2] }}
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
