<x-app-layout>

    @section('title', 'Edit Admin User - Eastcoast2Westcoast')

    <div class="col-12 px-5" id="edit_users">
        <div class="container my-3 pt-3" id="admin_users_links">
            <div class="row">
                <div id="" class="col-12 col-md-6">
                    <h1 class="pageTopicHeader text-center text-md-start">Edit Admin User</h1>
                </div>

                <div class="col-12 col-md-6 text-center">
                    <x-button-link href="{{ route('admin.index') }}" class="btn-primary ms-3">See All Admin Users
                    </x-button-link>
                </div>
            </div>

            {{--Update Form--}}
            @include('components.forms.user_update_form')
        </div>
    </div>

    @include('modals.delete_user')

</x-app-layout>
