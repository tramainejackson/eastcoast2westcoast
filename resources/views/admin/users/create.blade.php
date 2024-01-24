<x-app-layout>

    @section('title', 'Create A New Admin User - Eastcoast2Westcoast')

    <div class="col-12 px-5" id="all_users">

        <div class="container my-3 pt-3" id="admin_users_links">
            <div class="row">
                <div id="" class="col-12 col-md-6">
                    <h1 class="pageTopicHeader text-center text-md-start">Create New Admin User</h1>
                </div>

                <div class="col-12 col-md-6 text-center">
                    <x-button-link href="{{ route('admin.index') }}" class="btn-primary ms-3">See All Admin Users
                    </x-button-link>
                </div>
            </div>

            {{--Update Form--}}
            @include('components.forms.user_create_form')
        </div>
    </div>

</x-app-layout>
