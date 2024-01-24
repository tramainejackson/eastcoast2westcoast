<x-app-layout>

    @section('title', 'Edit Contact - Eastcoast2Westcoast')

    <div class="col-12 px-5" id="edit_contact">
        <div class="container my-3 pt-3" id="contact_links">
            <div class="row">
                <div id="" class="col-12 col-md-6">
                    <h1 class="pageTopicHeader text-center text-md-start">Edit Contact</h1>
                </div>

                <div class="col-12 col-md-6 text-center">
                    <x-button-link href="{{ route('contacts.index') }}" class="btn-primary ms-3">See All Contacts
                    </x-button-link>
                </div>
            </div>

            {{--Update Form--}}
            @include('components.forms.contact_update_form')
        </div>
    </div>

    @include('modals.delete_contact')

</x-app-layout>
