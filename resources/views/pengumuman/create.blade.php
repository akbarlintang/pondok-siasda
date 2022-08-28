<x-app-layout>
    <div class="p-6">
        <div class="max-w-7xl mb-2 mx-auto sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-700">
            <main class="h-full pb-16 overflow-y-auto">
                <a href="{{ route('pengumuman.index')}}">
                    <button
                        class="mb-3 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                        Kembali
                    </button>
                </a>
                <h4 class="mb-6 mt-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Buat Pengumuman Baru
                </h4>

                <div class="mt-1 px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form name="daftar" action="{{ route('pengumuman.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Role Penerima Pengumuman</span>
                            {{-- <select name="roles"
                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                <option value="" selected disabled hidden>-- Pilih Role Penerima Pengumuman --</option>
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->nama}}</option>
                                @endforeach
                            </select> --}}

                            <div class="flex flex-col mb-4">
                                @foreach ($roles as $role)
                                    <div class="mt-2">
                                        <input id="default-checkbox" type="checkbox" value="{{ $role->name }}" name="role[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $role->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </label>

                        {{-- <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Tanggal Ekstrakurikuler</span>
                            <input type="date"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="tanggal" id="tanggal" placeholder="Tanggal Ekstrakurikuler..." 
                                />
                                {{\Carbon\Carbon::parse($request->tanggal)->translatedformat('F Y')}}
                        </label> --}}

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Isi Pengumuman</span>
                            <textarea class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="isi" id="isi" placeholder="Masukkan isi pengumuman..." rows="5"
                                ></textarea>
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Foto Pengumuman</span>
                            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" name="file" type="file">
                        </label>

                        <div class="mt-5">
                            <button type="submit"
                            class="bg-blue-500 text-white py-2 px-4 rounded shadow-sm focus:outline-none hover:bg-indigo-700">Buat</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>