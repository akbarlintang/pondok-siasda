<x-app-layout>
    <div class="p-6">
        <div class="max-w-7xl mb-2 mx-auto sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-700">
            <main class="h-full pb-16 overflow-y-auto">
                <a href="{{ route('presensikbms.input', [$jenjang, $tingkatan, $kelas, $mapel, $semester, $guru_id, $tanggal])}}">
                    <button
                        class="mb-3 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                        Kembali
                    </button>
                </a>
                <h4 class="mb-6 mt-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Tambah Keterangan Ketidakhadiran Presensi KBM
                </h4>
                
                <div class="mt-1 px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form name="daftar" action="{{ route('presensikbms.keteranganUpdate') }}" method="POST" 
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="jenjang" value="{{ $jenjang }}">
                        <input type="hidden" name="tingkatan" value="{{ $tingkatan }}">
                        <input type="hidden" name="kelas" value="{{ $kelas }}">
                        <input type="hidden" name="mapel" value="{{ $mapel }}">
                        <input type="hidden" name="semester" value="{{ $semester }}">
                        <input type="hidden" name="guru_id" value="{{ $guru_id }}">

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nama Siswa</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md disabled:opacity-75"
                                value="{{ $data->siswa->nama_siswa }}" placeholder="Nama Siswa..." disabled/>
                                <input type="hidden" name="nama_siswa" value="{{ $data->siswa }}">
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Tanggal</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md disabled:opacity-75"
                                value="{{ date('d F Y', strtotime($data->tanggal)) }}" placeholder="Tanggal..." disabled/>
                                <input type="hidden" name="tanggal" value="{{ $data->tanggal }}">
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Status Kehadiran</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md disabled:opacity-75"
                                value="Tidak Hadir" placeholder="Status Kehadiran..." disabled />
                                <input type="hidden" name="status" value="tidak hadir">
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Keterangan</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="keterangan" placeholder="Keterangan Ketidakhadiran..." required/>
                        </label>

                        <div class="mt-5">
                            <button type="submit"
                            class="bg-blue-500 text-white py-2 px-4 rounded shadow-sm focus:outline-none hover:bg-indigo-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>