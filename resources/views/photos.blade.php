<x-app-layout>

    @section('additional_css')
        <style type="text/css">
            .card-img-top {
                max-height: 350px;
            }

            @media only screen and (max-width: 575px) {

                .card-img-top {
                    height: 250px;
                    max-height: 250px;
                }
            }

            @media only screen and (min-width: 576px) {

                .card-img-top {
                    height: 325px;
                    max-height: 325px;
                }
            }
        </style>
    @endsection

    <div class="col-12 p-5 mt-5 text-center">
        <h2 class="display-3 font-weight-bold">Trip Photos</h2>
    </div>

    <div class="col-12">

        <div class="container-fluid">

            <div class="row">

                @foreach($trips as $trip)

                    @php $content1 = Storage::disk('local')->has($trip->trip_photo); @endphp
                    @php $getPictures = $trip->pictures; @endphp

                    <div class="col-12 col-sm-6 col-lg-3">

                        <div class="card my-2">

                            <a href="/pictures/{{ $trip->id }}"><img
                                    src="{{ $content1 == true ? asset('storage/' . str_ireplace('public/', '', $trip->trip_photo)) : '/images/skyline.jpg' }}"
                                    class="card-img-top" href="" aria-expanded="false"/></a>

                            <div class="card-header" role="tab" id="">
                                <h5 class="mb-0">
                                    <a class="" href="/pictures/{{ $trip->id }}"
                                       aria-expanded="false">{{ $trip->trip_location }}</a>
                                </h5>
                            </div>

                            <div class="card-footer">

                                <p class="text-muted"> Total Pictures: <i>{{ $getPictures->count() }}</i></p>
                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>
</x-app-layout>
