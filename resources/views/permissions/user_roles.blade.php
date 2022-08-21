<x-app-layout>
    <div class="p-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- component -->
            <body class="flex items-center justify-center">
                <div class="container block" id="app">
                    @if (session()->has('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-6 rounded relative" role="alert">
                            <strong class="font-bold">{{ session('success') }}</strong>
                        </div>
                    @endif
                    <div class="text-lg font-bold text-gray-700">Daftar Role User</div>
                    <form action="{{ route('user-roles.store') }}" method="POST" class="m-form m-form--fit m-form--label-align-right">
                        {{ csrf_field() }}
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group my-6">
                                <div class="inline-block relative w-1/2">
                                    <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="selectUser">
                                        User
                                    </label>
                                    <select name="user" id="selectUser" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="" selected="selected" disabled="disabled" hidden>Pilih User</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ $user->id == $data ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="m-form__group form-group">
                                <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="selectUser">
                                    Role
                                </label>
                                <div class="m-checkbox-list">
                                    @foreach($roles as $role)
                                        @if(count($roleData) > 0)
                                            <div class="flex items-center mb-4">
                                                <input id="default-checkbox" type="checkbox" value="{{ $role->id }}" name="role[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ in_array($role->id, $roleData) ? 'checked' : '' }}>
                                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $role->name }}</label>
                                            </div>
                                        @else
                                            <div class="flex items-center mb-4">
                                                <input id="default-checkbox" type="checkbox" value="{{ $role->id }}" name="role[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $role->name }}</label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot">
                            <div class="row align-items-center">
                                <div class="col-lg-12 m--align-right">
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
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

                .m-checkbox-list {
                    max-height: 300px;
                    overflow: auto;
                    border: 1px dotted #efefef;
                    padding: 0.5rem 1rem;
                }

                .locked {
                    background-color: #efefef;
                }

            </style>

            <script>
                function saveRoles(event) {
                    var formData    = new FormData(event.target);
                    var action      = event.target.action;
                    this.load.save  = true;

                    $('.cb-role').prop('disabled', true);
                    $('.m-checkbox-list').addClass('locked');

                    axios.post(action, formData).then((response) => {
                        if (response.data.status == 'success') {
                            this.load.save  = false;
                            $('.cb-role').prop('disabled', false);
                            $('.m-checkbox-list').removeClass('locked');
                            toastr.success('Role berhasil diperbarui!');
                        }
                    });
                }

                $('#selectUser').on('change', function(e) {
                    var data = $('#selectUser').val();
                    
                    axios.get("{{ route('user-roles.get', ':id') }}".replace(':id', data))
                        .then(response=>{
                            console.log(response);
                            window.location.href = "{{ route('user-roles.index') }}";
                        })
                        .catch(e=>{
                            console.log(e);
                        });
                });
            </script>
        </div>
    </div>
</x-app-layout>
