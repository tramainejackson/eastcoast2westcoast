<x-app-layout>

    <div class="col-12 px-5" id="all_users">

        <div class="container-fluid my-3 pt-3" id="admin_users_links">
            <div class="row">
                <div id="" class="col-12 col-md-6">
                    <h1 class="pageTopicHeader text-center text-md-start">Create New Contact</h1>
                </div>

                <div class="col-12 col-md-6 text-center">
                    <x-button-link href="{{ route('contacts.index') }}" class="btn-primary ms-3">See All Contacts
                    </x-button-link>
                </div>
            </div>
        </div>

        {{--Create Form--}}
        @include('components.forms.contact_create_form')

    </div>

</x-app-layout>
