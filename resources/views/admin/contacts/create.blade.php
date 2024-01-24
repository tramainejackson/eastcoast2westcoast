<x-app-layout>

    @section('title', 'Create New Contact - Eastcoast2Westcoast')

    <div class="col-12 px-5" id="all_contacts">

        <div class="container my-3 pt-3" id="contacts_links">
            <div class="row">
                <div id="" class="col-12 col-md-6">
                    <h1 class="pageTopicHeader text-center text-md-start">Create New Contact</h1>
                </div>

                <div class="col-12 col-md-6 text-center">
                    <x-button-link href="{{ route('contacts.index') }}" class="btn-primary ms-3">See All Contacts
                    </x-button-link>
                </div>
            </div>

            {{--Create Form--}}
            @include('components.forms.contact_create_form')
        </div>

    </div>

</x-app-layout>
