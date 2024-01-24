<x-app-layout>

    @section('title', 'Create A New Vacation - Eastcoast2Westcoast')

    <div class="col-12 px-5" id="all_contacts">

        <div class="container my-3 pt-3" id="contacts_links">
            <div class="row mb-3">
                <div id="" class="col-12 col-md-6">
                    <h1 class="pageTopicHeader text-center text-md-start">Create New Trip/Vacation</h1>
                </div>

                <div class="col-12 col-md-6 text-center">
                    <x-button-link href="{{ route('location.index') }}" class="btn-primary ms-3">See All Trips
                    </x-button-link>
                </div>
            </div>

            {{--Create Form--}}
            @include('components.forms.trip_create_form')

            <div class="row mb-5">
                <div class="col-12">
                    <div class="uploadsView d-none flex-column my-3 align-items-center justify-content-center">
                        <div class="">
                            <h2 class="">Here Is The Image You Would Like To Add For This Trip</h2>
                            <hr class="hr hr-blurry"/>
                        </div>

                        <img src="" class="img-fluid" alt="Uploaded Image"/>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
