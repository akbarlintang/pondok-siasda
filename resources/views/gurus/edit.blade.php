<x-app-layout>
    <div class="p-6">
        <div class="max-w-7xl mb-2 mx-auto sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-700">
            <main class="h-full pb-16 overflow-y-auto">
                <a href="{{ route('gurus.index')}}">
                    <button
                        class="mb-3 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                        Kembali
                    </button>
                </a>
                <h4 class="mb-6 mt-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Edit Biodata Guru
                </h4>
                
                <div class="mt-1 px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form name="daftar" action="{{ route('gurus.update',$guru->id) }}" method="POST" 
                        enctype="multipart/form-data">
                        @method('patch')
                        @csrf

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nama Guru</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{$guru->nama}}"
                                name="nama_guru" placeholder="Nama Guru..." />
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Email Guru</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{$guru->user->email}}"
                                name="email_guru" placeholder="Email Guru..." />
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nomor Induk Guru</span>
                            <input type="number"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{$guru->nik}}"
                                name="nik" placeholder="Nomor Induk Guru..." />
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Jenjang</span>
                            <select id="jenjang" name="jenjang" required
                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                <option value="smk" @if($guru->jenjang == 'smk') selected @endif >SMK</option>
                                <option value="ma" @if($guru->jenjang == 'ma') selected @endif >MA</option>
                                <option value="mts" @if($guru->jenjang == 'mts') selected @endif >MTS</option>
                            </select>
                        </label>

                        {{-- <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Tingkatan</span>
                            <select id="tingkatan" name="tingkatan" required
                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                <option value="1" @if($guru->tingkatan == '1') selected @endif>1</option>
                                <option value="2" @if($guru->tingkatan == '2') selected @endif>2</option>
                                <option value="3" @if($guru->tingkatan == '3') selected @endif>3</option>
                            </select>
                        </label> --}}

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Kelas</span>
                        </label>
                        <div class="bg-white rounded-lg border border-black dark:bg-gray-700 dark:border-gray-600 dark:text-white px-3 py-1">
                            @for ($i = 1; $i <= 3; $i++)
                                <label class="block text-sm mt-2">
                                    <span class="text-gray-700 dark:text-gray-400">Tingkatan {{ $i }}</span>
                                    <div class="flex items-center mt-1 mb-4">
                                        <div class="mr-6">
                                            <input id="default-checkbox" type="checkbox" value="A" name="kelas{{ $i }}[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ in_array('A', $guru->kelas[$i-1]) ? 'checked' : '' }}>
                                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">A</label>
                                        </div>
                                        <div class="mr-6">
                                            <input id="default-checkbox" type="checkbox" value="B" name="kelas{{ $i }}[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ in_array('B', $guru->kelas[$i-1]) ? 'checked' : '' }}>
                                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">B</label>
                                        </div>
                                        <div class="mr-6">
                                            <input id="default-checkbox" type="checkbox" value="C" name="kelas{{ $i }}[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ in_array('C', $guru->kelas[$i-1]) ? 'checked' : '' }}>
                                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">C</label>
                                        </div>
                                        <div class="mr-6">
                                            <input id="default-checkbox" type="checkbox" value="D" name="kelas{{ $i }}[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ in_array('D', $guru->kelas[$i-1]) ? 'checked' : '' }}>
                                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">D</label>
                                        </div>
                                        <div class="mr-6">
                                            <input id="default-checkbox" type="checkbox" value="E" name="kelas{{ $i }}[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ in_array('E', $guru->kelas[$i-1]) ? 'checked' : '' }}>
                                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">E</label>
                                        </div>
                                        <div class="mr-6">
                                            <input id="default-checkbox" type="checkbox" value="F" name="kelas{{ $i }}[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ in_array('F', $guru->kelas[$i-1]) ? 'checked' : '' }}>
                                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">F</label>
                                        </div>
                                        <div class="mr-6">
                                            <input id="default-checkbox" type="checkbox" value="G" name="kelas{{ $i }}[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ in_array('G', $guru->kelas[$i-1]) ? 'checked' : '' }}>
                                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">G</label>
                                        </div>
                                        <div class="mr-6">
                                            <input id="default-checkbox" type="checkbox" value="H" name="kelas{{ $i }}[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ in_array('H', $guru->kelas[$i-1]) ? 'checked' : '' }}>
                                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">H</label>
                                        </div>
                                    </div>
                                </label>
                            @endfor
                        </div>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Mata Pelajaran</span>
                            <div class="bg-white rounded-lg border border-black dark:bg-gray-700 dark:border-gray-600 dark:text-white px-3 py-1">
                                <div class="flex flex-col mb-4">
                                    @foreach ($mapels as $mapel)
                                        <div class="mt-2">
                                            <input id="default-checkbox" type="checkbox" value="{{ $mapel->nama }}" name="mapel[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ isset($guru->mapel) ? (in_array($mapel->nama, $guru->mapel) ? 'checked' : '') : '' }}>
                                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $mapel->nama }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Tempat Lahir</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{$guru->tempat_lahir}}"
                                name="tempat_lahir" placeholder="Tempat Lahir..." />
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Tanggal Lahir</span>
                            <input type="date"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{$guru->tanggal_lahir}}"
                                name="tanggal_lahir" placeholder="Tanggal Lahir..." />
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Tahun Masuk</span>
                            <input type="number"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                value="{{$guru->tahun_masuk}}"
                                name="tahun_masuk" placeholder="Tahun Masuk..." />
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