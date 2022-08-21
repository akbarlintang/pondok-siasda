<x-app-layout>
    <div class="p-6">
        <div class="max-w-7xl mb-2 mx-auto sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-700">
            <main class="h-full pb-16 overflow-y-auto">
                <a href="{{ route('penilaians.show', $siswa->id)}}">
                    <button
                        class="mb-3 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                        Kembali
                    </button>
                </a>
                <h4 class="mb-6 mt-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    {{-- Penilaian Siswa {{ $siswa->nama_siswa }} Semester {{ ucfirst($semester) }} --}}
                    Penilaian Siswa
                </h4>
                
                <div class="mt-1 px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form name="daftar" action="{{ route('penilaians.tambah', [$siswa->id, $semester]) }}" method="POST" 
                        enctype="multipart/form-data">
                        @csrf

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nama Siswa</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md disabled:opacity-75"
                                value="{{$siswa->nama_siswa}}" placeholder="Nama Siswa..." disabled/>
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nomor Induk Siswa</span>
                            <input type="number"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md disabled:opacity-75"
                                value="{{$siswa->nis}}"
                                name="nis" placeholder="Nomor Induk Siswa..." disabled />
                        </label>
                        
                        {{-- <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Jenjang</span>
                            <select id="jenjang" name="jenjang" required
                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                <option value="smk" @if($siswa->jenjang == 'smk') selected @endif >SMK</option>
                                <option value="ma" @if($siswa->jenjang == 'ma') selected @endif >MA</option>
                                <option value="mts" @if($siswa->jenjang == 'mts') selected @endif >MTS</option>
                            </select>
                        </label> --}}

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Tingkatan</span>
                            {{-- <select id="tingkatan" name="tingkatan" required
                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                <option value="1" @if($siswa->tingkatan == '1') selected @endif>1</option>
                                <option value="2" @if($siswa->tingkatan == '2') selected @endif>2</option>
                                <option value="3" @if($siswa->tingkatan == '3') selected @endif>3</option>
                            </select> --}}
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md disabled:opacity-75"
                                value="{{$siswa->tingkatan}}" placeholder="Tingkatan Siswa..." disabled />
                                <input type="hidden" name="tingkatan" value="{{$siswa->tingkatan}}">
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Kelas</span>
                            {{-- <select id="kelas" name="kelas" required
                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                <option value="A" @if($siswa->kelas == 'A') selected @endif >A</option>
                                <option value="B" @if($siswa->kelas == 'B') selected @endif >B</option>
                                <option value="C" @if($siswa->kelas == 'C') selected @endif>C</option>
                                <option value="D" @if($siswa->kelas == 'D') selected @endif>D</option>
                                <option value="E" @if($siswa->kelas == 'E') selected @endif>E</option>
                            </select> --}}

                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md disabled:opacity-75"
                                value="{{$siswa->kelas}}" placeholder="Kelas Siswa..." disabled />
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Semester</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md disabled:opacity-75"
                                value="{{ucfirst($semester)}}" placeholder="Semester..." disabled />
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Mata Pelajaran</span>
                            <select id="mapel" name="mapel" required
                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                <option value="" selected disabled hidden>--Pilih Mata Pelajaran--</option>
                                @foreach ($mapels as $mapel)
                                    <option value="{{ $mapel->nama }}">{{ $mapel->nama }}</option>
                                @endforeach
                            </select>
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nilai Tugas 1</span>
                            <input type="number"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{ isset($penilaian->tugas_1) ? $penilaian->tugas_1 : '' }}"
                                name="tugas_1" placeholder="NIlai Tugas 1..." />
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nilai Tugas 2</span>
                            <input type="number"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{ isset($penilaian->tugas_2) ? $penilaian->tugas_2 : '' }}"
                                name="tugas_2" placeholder="NIlai Tugas 2..." />
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nilai Tugas 3</span>
                            <input type="number"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{ isset($penilaian->tugas_3) ? $penilaian->tugas_3 : '' }}"
                                name="tugas_3" placeholder="NIlai Tugas 3..." />
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nilai UTS</span>
                            <input type="number"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{ isset($penilaian->uts) ? $penilaian->uts : '' }}"
                                name="uts" placeholder="NIlai UTS..." />
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nilai UAS</span>
                            <input type="number"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{ isset($penilaian->uas) ? $penilaian->uas : '' }}"
                                name="uas" placeholder="NIlai UAS..." />
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