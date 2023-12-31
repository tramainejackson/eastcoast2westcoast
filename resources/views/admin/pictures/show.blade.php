<x-app-layout>

    @section('additional_css')
        <style>
            /*Smartphones portrait*/
            @media only screen and (max-width: 575px) {
                div#app {
                    background: initial;
                }

                div#app:after {
                    content: "";
                    position: fixed;
                    background-image: url(/images/Jacksonville_Skyline_Night_Panorama_Digon3.jpg);
                    background-size: cover;
                    background-position: center center;
                    background-repeat: no-repeat;
                    top: 0;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    z-index: -1;
                }

                .display-2 {
                    color: whitesmoke;
                }
            }
        </style>
    @endsection

    @if($getPictures->count() > 0)

        <div class="col-12 mt-5 mb-2">
            <h1 class="h1 display-2 d-inline-block pr-3"
                style="border-right: solid; border-bottom: solid; font-family: 'Playfair Display', serif;">{{ $trip->trip_location }}
                Photos</h1>
        </div>

        <div class="col-12">

            <div class="container">

                <div class="row">

                    @php $content1 = Storage::disk('local')->has($trip->trip_photo); @endphp
                    @php $getPictures = $trip->pictures; @endphp

                    <div class="col-12">

                        <div id="mdb-lightbox-ui"></div>

                        <div class="mdb-lightbox no-margin">

                            @foreach($getPictures as $picture)

                                @php $content = Storage::disk('local')->has($picture->picture_name); @endphp

                                <figure class="col-md-4">

                                    <!--Large image-->
                                    <a href="{{ $content == true ? asset('storage/' . str_ireplace('public/', '', $picture->picture_name)) : '/images/no_image_lg.png' }}"
                                       class="" title="{{ $picture->picture_caption }}"
                                       data-size="1600x{{ $picture->lg_height }}">

                                        <!-- Thumbnail-->
                                        <img
                                            src="{{ $content == true ? asset('storage/' . str_ireplace('public/', '', $picture->picture_name)) : '/images/no_image_lg.png' }}"
                                            class="img-thumbnail"/>
                                    </a>
                                </figure>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else

        <div class="col-12">

            <div class="mt-5 mb-2 pl-3">

                <h1 class="h1 display-2 d-inline-block pr-3"
                    style="border-right: solid; border-bottom: solid; font-family: 'Playfair Display', serif;">{{ $trip->trip_location }}
                    Photos</h1>
            </div>

            <div class="pl-3">

                <h2>No pictures have been added yet for this trip</h2>
            </div>

            <div class="pl-3">

                <p class="additionalPictures">If you have any pictures or videos that you want posted, please send them
                    to <a class="mailToLink"
                          href="mailto:jacksond1961@yahoo.com?cc=rhonda.lambert@sbcglobal.com&subject=Trip%20Pictures">jacksond1961@yahoo.com</a>
                </p>
            </div>
        </div>

    @endif

    <div class="col-12 mt-5 mb-2">
        <h2 class="h2 text-center">Photos From Other Vacations</h2>
    </div>

    <div class="col-12">

        <div class="container-fluid">

            <div class="row">

                @foreach($trips as $next_trip)

                    @php $content1 = Storage::disk('local')->has($next_trip->trip_photo); @endphp
                    @php $getPictures = $next_trip->pictures; @endphp

                    @if($trip->id != $next_trip->id)

                        <div class="col-12 col-sm-6 col-lg-3">

                            <div class="card my-2">

                                <a href="/pictures/{{ $trip->id }}"><img
                                        src="{{ $content1 == true ? asset('storage/' . str_ireplace('public/', '', $next_trip->trip_photo)) : '/images/skyline.jpg' }}"
                                        class="card-img-top" href="" aria-expanded="false"/></a>

                                <div class="card-header" role="tab" id="">

                                    <h5 class="mb-0">
                                        <a class="" href="/pictures/{{ $next_trip->id }}"
                                           aria-expanded="false">{{ $next_trip->trip_location }}</a>
                                    </h5>

                                </div>

                                <div class="card-footer">

                                    <p class="text-muted"> Total Pictures: <i>{{ $getPictures->count() }}</i></p>

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
