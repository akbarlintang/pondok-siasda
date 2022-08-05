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
            @foreach ($spps as $spp)
                @php
                    $data[$count][1] = $spp->status;
                    // dd($spp->sisa);
                    if (is_null($spp->sisa)){
                        $data[$count][2] = '-';
                    } else {
                        $data[$count][2] = $spp->sisa;
                    }
                    $data[$count][3] = $spp->tanggal;
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
                                    Status
                                </th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Sisa Pembayaran
                                </th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Bulan Pembayaran
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
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                                            {{ $data[$i][1] }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Sisa</span>
                                            {{ $data[$i][2] }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Bulan Pembayaran</span>
                                            {{ \Carbon\Carbon::parse( $data[$i][3] ) -> translatedFormat('F Y')}}
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
</x-app-layout>