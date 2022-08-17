<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mb-2 mx-auto sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-700">
            <main class="h-full pb-16 overflow-y-auto">
                <h4 class="mb-6 mt-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Biodata Siswa
                </h4>
                
                <div class="mt-1 px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form name="daftar" action="{{ route('siswas.update',$siswa->id) }}" method="POST" 
                        enctype="multipart/form-data">
                        @method('patch')
                        @csrf

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nama Siswa</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{$siswa->nama_siswa}}"
                                name="nama_siswa" placeholder="Nama Siswa..." disabled/>
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nomor Induk Siswa</span>
                            <input type="number"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{$siswa->nis}}"
                                name="nis" placeholder="Nomor Induk Siswa..." disabled/>
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Jenjang</span>
                            <select id="jenjang" name="jenjang" required
                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md" disabled>
                                <option value="smk" @if($siswa->jenjang == 'smk') selected @endif >SMK</option>
                                <option value="ma" @if($siswa->jenjang == 'ma') selected @endif >MA</option>
                                <option value="mts" @if($siswa->jenjang == 'mts') selected @endif >MTS</option>
                            </select>
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Tingkatan</span>
                            <select id="tingkatan" name="tingkatan" required
                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md" disabled>
                                <option value="1" @if($siswa->tingkatan == '1') selected @endif>1</option>
                                <option value="2" @if($siswa->tingkatan == '2') selected @endif>2</option>
                                <option value="3" @if($siswa->tingkatan == '3') selected @endif>3</option>
                            </select>
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Kelas</span>
                            <select id="kelas" name="kelas" required
                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md" disabled>
                                <option value="A" @if($siswa->kelas == 'A') selected @endif >A</option>
                                <option value="B" @if($siswa->kelas == 'B') selected @endif >B</option>
                                <option value="C" @if($siswa->kelas == 'C') selected @endif>C</option>
                                <option value="D" @if($siswa->kelas == 'D') selected @endif>D</option>
                                <option value="E" @if($siswa->kelas == 'E') selected @endif>E</option>
                            </select>
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Tempat Lahir</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{$siswa->tempat_lahir}}"
                                name="tempat_lahir" placeholder="Tempat Lahir..." disabled/>
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Tanggal Lahir</span>
                            <input type="date"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{$siswa->tanggal_lahir}}"
                                name="tanggal_lahir" placeholder="Tanggal Lahir..." disabled/>
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Tahun Masuk</span>
                            <input type="number"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{$siswa->tahun_masuk}}"
                                name="tahun_masuk" placeholder="Tahun Masuk..." disabled/>
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Wali Kamar</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{$siswa->wali_kamar}}"
                                name="wali_kamar" placeholder="Wali Kamar..." disabled/>
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nomor Wali</span>
                            <input type="number"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{$siswa->nomor_wali}}"
                                name="nomor_wali" placeholder="Nomor Wali..." disabled/>
                        </label>
                    </form>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>