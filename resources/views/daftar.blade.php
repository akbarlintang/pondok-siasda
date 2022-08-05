@extends('layouts/main')

@section('title', 'Pendaftaran Pengobatan di Tempat')

@section('container')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <main class="h-full pb-16 overflow-y-auto">
                <a href="/layanan1">
                    <button
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                        Kembali
                    </button>
                </a>
                <h4 class="mb-4 mt-3 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Pendaftaran Pengobatan Pasif
                </h4>
                <div class="px-4 py-3 my-8 border-4 border-black rounded-lg shadow-md">
                    <form name="daftar" action="{{ route('daftars.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <label class="block text-sm">
                            <span class="text-gray-700 font-bold">Tanggal Pendaftaran</span>
                            <input type="date"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="tanggal" />
                        </label>

                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 font-bold">Nama</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="nama" placeholder="Nama" />
                        </label>

                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 font-bold">KTP</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="ktp" placeholder="ktp" />
                        </label>

                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 font-bold">Nomor HP/WA</span>
                            <input type="number"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="hp" placeholder="hp" />
                        </label>

                        <label class="block mt-4 text-sm" for="jenis_hewan">
                            <span class="text-gray-700 font-bold">
                                Hewan
                            </span>
                            <select id="jenis_hewan" name="jenis_hewan" required onchange="hewanlain()"
                                class="border-black block w-full mt-1 text-sm form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple rounded-md ">
                                <option disabled selected>--Pilih Hewan--</option>
                                <option value="anjing">Anjing</option>
                                <option value="kambing">Kambing</option>
                                <option value="kucing">Kucing</option>
                                <option value="kelinci">Kelinci</option>
                                <option value="hamster">Hamster</option>
                                <option value="ayam">Ayam</option>
                                <option value="lain">Lainnya...</option>
                            </select>
                        </label>

                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 font-bold">Hewan Lain : </span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="hl" id="hl" placeholder="hewan lain" />
                        </label>

                        <label class="block text-sm mt-3 font-bold">Nama Hewan : <br></label>
                        <ol style="padding-left: 20px" class="list-decimal">
                            <li><input type="text"
                                    class="block w-full ml-1 mt-3 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="nama_hewan" id="nama_hewan" placeholder="Nama Hewan 1" /></li>
                            <li><input type="text"
                                    class="block w-full ml-1 mt-5 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="nama_hewan2" id="nama_hewan2" placeholder="Nama Hewan 2" /></li>
                            <li><input type="text"
                                    class="block w-full ml-1 mt-5 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="nama_hewan3" id="nama_hewan3" placeholder="Nama Hewan 3"/></li>
                        </ol>

                        <label class="block mt-3 text-sm">
                            <span class="text-gray-700 font-bold">Gejala</span>
                            <textarea id="gejala" name="gejala"
                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"
                                rows="3" placeholder="Tuliskan Gejala"></textarea>
                        </label>

                        <div class="mt-5">
                            <button type="submit"
                                class="bg-blue-500 text-white py-2 px-4 rounded shadow-sm focus:outline-none hover:bg-indigo-700">Daftar</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection