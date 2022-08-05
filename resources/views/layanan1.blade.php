@extends('layouts/main')

@section('title', 'Pengobatan di Tempat')

@section('container')
    <section class="container mx-auto text-gray-600 body-font">
            <div class="flex flex-col text-center w-full mt-16 -mb-8">
                <h1 class="sm:text-3xl text-xl font-bold title-font text-gray-900">LAYANAN PENGOBATAN</h1>
                <div class="flex mt-2 justify-center">
                    <div class="w-24 h-1 rounded-full bg-purple-800 inline-flex"></div>
                </div>
            </div>
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -mx-4 -mb-10 text-center">
                    <div class="sm:w-1/2 mb-10 px-4">
                        <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full" src="images/Layanan 1.jpg">
                        </div>
                        <h2 class="title-font text-2xl font-semibold text-gray-900 mt-6 mb-3">Pelayanan Aktif</h2>
                        <p class="leading-relaxed text-base">Pelayanan Pengobatan yang dilakukan oleh Tenaga Medik dengan mengunjungi Kandang Ternak. Peternak dapat menghubungi terlebih dahulu pihak Puskeswan melalui (024)6714930, selanjutnya mendaftarnya untuk reservasi tanggal pemeriksaan.</p>
                        <button class="flex mx-auto mt-6 text-white bg-green-400 border-0 py-2 px-5 focus:outline-none hover:bg-purple-800 rounded-lg"><a href="{{route('daftarAktif')}}">Daftar</a></button>
                    </div>
                <div class="sm:w-1/2 mb-10 px-4">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full" src="images/Layanan 2.jpg">
                        </div>
                        <h2 class="title-font text-2xl font-semibold text-gray-900 mt-6 mb-3">Pelayanan Pasif</h2>
                        <p class="leading-relaxed text-base">Pelayanan Pengobatan yang dilakukan secara mandiri oleh pemilik hewan kesayangan dengan mengunjungi langsung ke Puskeswan, yang sebelumnya telah melakukan pendaftaran secara online untuk mendapatkan nomor antrian.</p>
                        <button class="flex mx-auto mt-6 text-white bg-green-400 border-0 py-2 px-5 focus:outline-none hover:bg-purple-800 rounded-lg"><a href="{{route('daftar')}}">Daftar</a></button>
                    </div>
                </div>
            </div>
        @php
            $data = [];
            $count = 0;
        @endphp
        @foreach ($daftaraktif as $aktif)
            @php
                $data[$count][0] = $aktif->tanggal;
                $data[$count][1] = $aktif->nama;
                $data[$count][2] = $aktif->kelompok;
                $data[$count][3] = $aktif->namkel;
                $count++;
            @endphp
        @endforeach
        <div class="container mx-auto py-3 -mt-16 -mb-16 text-center">
            <p class="text-center font-bold">Agenda Pelayanan Aktif</p>
            <div class="container mx-auto">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="border-b bg-green-300 ">
                                        <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Nomor
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Nama Peternak
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Kelurahan
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Kelompok Ternak
                                        </th>
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Tanggal Pemeriksaan
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < $count; $i++)
                                        <tr class="border-b bg-green-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$i + 1}}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$data[$i][1]}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$data[$i][3]}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$data[$i][2]}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($data[$i][0])->isoFormat('dddd, D MMMM Y') }}
                                        </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $datas = [];
            $counts = 0;
        @endphp
        @foreach ($daftars as $pasif)
            @php
                $datas[$counts][0] = $pasif->tanggal;
                $datas[$counts][1] = $pasif->nama;
                $datas[$counts][2] = $pasif->nama_hewan;
                $datas[$counts][3] = $pasif->jenis_hewan;
                $datas[$counts][4] = $pasif->no;
                $counts++;
            @endphp
            @endforeach
            <div class="container mx-auto py-3 mt-16 text-center">
                @if (empty($tanggal))
                    <p class="text-center font-bold">Antrian Pelayanan Pasif {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</p>
                @else
                    <p class="text-center font-bold">Antrian Pelayanan Pasif {{ \Carbon\Carbon::parse($tanggal)->isoFormat('dddd, D MMMM Y') }}</p>
                @endif
                <div class="container mx-auto">
                    <div>
                    <p class="ml-2 text-left font-semibold mt-8">Masukkan Tanggal Antrian:</p>
                    <form action="{{ 'layanan1' }}" method="get">
                        @csrf
                        <div class="flex flex-row lg:w-1/2">
                            <input type="date"
                            class="ml-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                            id= "tanggal" name="tanggal" />
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded shadow-sm focus:outline-none hover:bg-indigo-700 float-right mt-2 ml-8">Pilih</button>
                        </div>
                    </form>
                    </div>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="border-b bg-green-300 ">
                                        <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Nomor Antrian
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Nama Pemilik
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Nama Hewan
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Jenis Hewan
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Tanggal
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < $counts; $i++)
                                        <tr class="border-b bg-green-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$datas[$i][4]}}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$datas[$i][1]}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$datas[$i][2]}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$datas[$i][3]}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ \Carbon\Carbon::parse($datas[$i][0])->isoFormat('dddd, D MMMM Y') }}
                                        </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>        

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
@endsection
