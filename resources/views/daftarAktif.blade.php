@extends('layouts/main')

@section('title', 'Pendaftaran Pengobatan Aktif')

@section('container')
    <section>
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
                        Pendaftaran Pengobatan Aktif
                    </h4>
                    <div class="px-4 py-3 mb-8 border-2 border-blue-500 rounded-lg shadow-md dark:bg-gray-800">
                        <form name="daftar" action="{{ route('daftaraktifs.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-bold">Tanggal Pendaftaran<span class="text-red-800">*</span></span>
                                <input type="date"
                                    class="date1 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="tanggal" />
                            </label>

                            <label class="block text-sm mt-3">
                                <span class="text-gray-700 dark:text-gray-400 font-bold">Nama<span class="text-red-800">*</span></span>
                                <input type="text"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="nama" placeholder="Nama" />
                            </label>

                            <label class="block text-sm mt-3">
                                <span class="text-gray-700 dark:text-gray-400 font-bold">Kecamatan<span class="text-red-800">*</span></span><br>
                                <select id="kecamatan" name="kecamatan" class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"">
                                    <option value="" selected disabled>Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $key => $kecam)
                                        <option value="{{ $key }}"> {{ $kecam }}</option>
                                    @endforeach
                                </select>
                            </label>

                            <label class="block text-sm mt-3">
                                <span class="text-gray-700 dark:text-gray-400 font-bold">Kelurahan<span class="text-red-800">*</span></span><br>
                                    <select name="kelurahan" id="kelurahan" class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"">
                                        <option value="" selected disabled>Pilih Kelurahan</option>
                                    </select>
                            </label>

                            <label class="block text-sm mt-3">
                                <span class="text-gray-700 dark:text-gray-400 font-bold">Nomor HP/WA<span class="text-red-800">*</span></span>
                                <input type="number"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="hp" placeholder="hp" />
                            </label>

                            <label class="block text-sm mt-3">
                                <span class="text-gray-700 dark:text-gray-400 font-bold">Kelompok Ternak</span>
                                <input type="text"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="kelompok" placeholder="Kelompok Ternak" />
                            </label>

                            <label class="block mt-4 text-sm" for="jenis_hewan">
                                <span class="text-gray-700 dark:text-gray-400 font-bold">
                                    Hewan<span class="text-red-800">*</span>
                                </span>
                                <select id="jenis_hewan" name="jenis_hewan" required onchange="hewanlain()"
                                    class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                    <option disabled selected>--Pilih Hewan--</option>
                                    <option value="sapi_perah">Sapi Perah</option>
                                    <option value="sapi_potong">Sapi Potong</option>
                                    <option value="kerbau">Kerbau</option>
                                    <option value="kambing">Kambing</option>
                                    <option value="lain">Lainnya...</option>
                                </select>
                            </label>

                            <label class="block text-sm mt-3">
                                <span class="text-gray-700 dark:text-gray-400 font-bold">Hewan Lain</span>
                                <input type="text"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md "
                                    disabled
                                    name="hl" id="hl" placeholder="hewan lain" />
                            </label>

                            <label class="block mt-4 text-sm" for="jenkel">
                                <span class="text-gray-700 dark:text-gray-400 font-bold">
                                    Jenis Kelamin
                                </span>
                                <select id="jenkel" name="jenkel" required
                                    class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                    <option disabled selected>--Pilih Jenis Kelamin--</option>
                                    <option value="jantan">Jantan</option>
                                    <option value="betina">Betina</option>
                                </select>
                            </label>

                            <label class="block text-sm mt-3">
                                <span class="text-gray-700 dark:text-gray-400 font-bold">Umur<span class="text-red-800">*</span></span>
                                <input type="text"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="umur" id="umur" placeholder="Umur"
                                    />
                            </label>

                            <label class="block mt-4 text-sm" for="status">
                                <span class="text-gray-700 dark:text-gray-400 font-bold">
                                    Jenis Pengobatan
                                </span>
                                <select id="status" name="status" required
                                    class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                    <option disabled selected>--Pilih Jenis Pengobatan--</option>
                                    <option value="hibah">Hibah</option>
                                    <option value="gaduhan">Gaduhan</option>
                                    <option value="perseorangan">Pribadi perseorangan</option>
                                    <option value="kelompok">Pribadi anggota kelompok</option>
                                </select>
                            </label>

                            <label class="block mt-3 text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-bold">Ciri Khusus</span>
                                <textarea id="ciri_khusus" name="ciri_khusus"
                                    class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"
                                    rows="3" placeholder="Tuliskan Ciri Khusus"></textarea>
                            </label>

                            <label class="block mt-3 text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-bold">Gejala</span>
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
        </div>
    </section>
    <script>
        $('#kecamatan').change(function() {
            var id_kecamatan = $(this).val();
            if (id_kecamatan) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('getKelurahan') }}?id_kecamatan=" + id_kecamatan,
                    success: function(res) {
                        if (res) {
                            $("#kelurahan").empty();
                            $("#kelurahan").append('<option disabled>Pilih Kelurahan</option>');
                            $.each(res, function(key, value) {
                                $("#kelurahan").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        } else {
                            $("#kelurahan").empty();
                        }
                    }
                });
            } else {    
                $("#kelurahan").empty();
            }
        });    
    </script>
@endsection