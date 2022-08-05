@extends('layouts/main')

@section('title', 'Profil')

@section('container')
<section class="text-gray-600 body-font">
    <div class="container mx-auto md:px-0 px-8 py-12">
        <div id="visimisi" class="lg:flex-grow lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center">
            <h1 class="title-font sm:text-4xl text-2xl mb-4 font-bold text-gray-900">Visi-Misi</h1>
            <div class="flex -mt-2 mb-8 justify-center">
                <div class="sm:w-36 w-16 h-1 rounded-full bg-purple-800 inline-flex"></div>
            </div>
            <p class="leading-relaxed sm:text-lg text-md">Visi dan Misi dari Klinik Hewan Kota Semarang adalah sebagai berikut.
                <br>
                <br class="inline-block">VISI:
                <br class="inline-block">1. Berperan dalam
                <br class="inline-block">2. Berperan dalam
                <br>
                <br class="inline-block">MISI:
                <br class="inline-block">1. Berperan dalam
                <br class="inline-block">2. Berperan dalam
                <br class="inline-block">3. Berperan dalam
                <br class="inline-block">4. Berperan dalam
            </p>
        </div>
        <div id="tupoksi" class="container mx-auto md:px-0 px-8 py-12">
            <div class="lg:flex-grow lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center">
                <h1 class="title-font sm:text-4xl text-2xl mb-4 font-bold text-gray-900">Tupoksi</h1>
                <div class="flex -mt-2 mb-8 justify-center">
                    <div class="sm:w-32 w-16 h-1 rounded-full bg-purple-800 inline-flex"></div>
                </div>
                <p class="leading-relaxed sm:text-lg text-md">Tugas Pokok dan Fungsi dari Klinik Hewan Kota Semarang adalah sebagai berikut.
                    <br>
                    <br class="inline-block">1. Berperan dalam
                    <br class="inline-block">2. Berperan dalam
                    <br class="inline-block">3. Berperan dalam
                    <br class="inline-block">4. Berperan dalam
                </p>
            </div>
        </div>
        <div id="petugas" class="container mx-auto md:px-0 px-8 py-12 -mt-8">
            <div class="lg:flex-grow lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center">
                <h1 class="title-font sm:text-4xl text-2xl mb-4 font-bold text-gray-900">Dokter</h1>
                <div class="flex -mt-2 mb-8 justify-center">
                    <div class="sm:w-80 w-40 h-1 rounded-full bg-purple-800 inline-flex"></div>
                </div>
                <p class="leading-relaxed sm:text-lg text-md">Bekerja untuk turun langsung menangani Hewan Ternak maupun Hewan Kesayangan.
            </div>
        </div>
        <div class="container flex flex-wrap justify-center sm:px-8 md:px-16 -m-4 mx-auto">
            @foreach ($tenagamedik as $medik)
            <div class="px-5 py-4 md:py-8 ">
                <div class="sm:w-64 lg:w-72 max-w-sm overflow-hidden justify-center rounded-xl shadow-md duration-200 hover:scale-105 hover:shadow-xl bg-green-100">
                    <img class="sm:h-36 md:h-64 lg:h-72 sm:w-36 md:w-64 lg:w-72 rounded-lg object-cover object-center mb-6" src="{{ asset('/storage/packages/' . $medik->foto) }}">
                    <div class="p-5">
                        <p class="text-medium text-gray-700 text-center">{{$medik->nama}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div id="petugas" class="container mx-auto md:px-0 px-8 py-12 -mt-8">
            <div class="lg:flex-grow lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center">
                <h1 class="title-font sm:text-4xl text-2xl mb-4 font-bold text-gray-900">Paramedik</h1>
                <div class="flex -mt-2 mb-8 justify-center">
                    <div class="sm:w-80 w-40 h-1 rounded-full bg-purple-800 inline-flex"></div>
                </div>
                <p class="leading-relaxed sm:text-lg text-md">Petugas yang bekerja membantu dokter hewan pada Puskesmas Hewan.
            </div>
        </div>
        <div class="container flex flex-wrap justify-center sm:px-8 md:px-16 -m-4 mx-auto">
            @foreach ($tenagamediks as $mediks)
            <div class="px-5 py-4 md:py-8 ">
                <div class="sm:w-64 lg:w-72 max-w-sm overflow-hidden justify-center rounded-xl shadow-md duration-200 hover:scale-105 hover:shadow-xl bg-green-100">
                    <img class="sm:h-36 md:h-64 lg:h-72 sm:w-36 md:w-64 lg:w-72 rounded-lg object-cover object-center mb-6" src="{{ asset('/storage/packages/' . $mediks->foto) }}">
                    <div class="p-5">
                        <p class="text-medium text-gray-700 text-center">{{$mediks->nama}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection