<x-app-layout>

    @section('additional_css')
        <style>

            .scrollspy-example {
                overflow-y: initial;
                position: relative;
                height: initial;
                padding: 1rem;
            }

            #mdb-scrollspy-ex .nav-item {
                width: 100%;
            }

            #mdb-scrollspy-ex a {
                font-size: .8rem;
                font-weight: 400;
                line-height: 1.1rem;
                padding: 0 5px;
                margin-top: 3px;
                margin-bottom: 3px;
                color: black;
            }

            #mdb-scrollspy-ex li .active {
                font-weight: 600;
            }

            .mdb-scrollspy-ex-example {
                height: 200px;
            }

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

    <div class="col-12" id="">
        <div class="row mb-5" id="">
            <div id="pictures_page_header" class="col-auto mr-4">

                <h1 class="pageTopicHeader">Trip Pictures</h1>
            </div>

            <div class="col-auto">

                <a href="{{ route('pictures.create') }}" class="btn btn-success ml-0">Add New Pictures</a>
            </div>
        </div>

        <div class="row d-xl-none">

            <div class="col-12">

                <div class="container-fluid">

                    <div class="row">

                        @foreach($getLocations as $location)

                            @php $content1 = Storage::disk('local')->has($location->trip_photo); @endphp
                            @php $getPictures = $location->pictures; @endphp

                            <div class="col-12 col-sm-6">

                                <div class="card my-2">

                                    <img
                                        src="{{ $content1 == true ? asset('storage/' . str_ireplace('public/', '', $location->trip_photo)) : '/images/skyline.jpg' }}"
                                        class="card-img-top"/>

                                    <div class="card-header d-flex justify-content-around align-items-center" role="tab"
                                         id="heading{{ $loop->iteration }}">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse"
                                               href="#collapse{{ $loop->iteration }}" aria-expanded="false"
                                               aria-controls="collapse{{ $loop->iteration }}">{{ $location->trip_location }}</a>
                                        </h5>
                                        <a href="/pictures/{{$location->id}}/edit" class="btn btn-primary ml-3">Edit</a>
                                    </div>

                                    <div id="collapse{{ $loop->iteration }}" class="collapse" role="tabpanel"
                                         aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row location_photos">
                                                @foreach($getPictures as $picture)
                                                    @php $content = Storage::disk('local')->has($picture->picture_name); @endphp

                                                    <a href="{{ $content == true ? asset('storage/' . str_ireplace('public/', '', $picture->picture_name)) : '/images/no_image_lg.png' }}"
                                                       class="col-6" title="{{ $picture->picture_caption }}"><img
                                                            src="{{ $content == true ? asset('storage/' . str_ireplace('public/', '', $picture->picture_name)) : '/images/no_image_lg.png' }}"
                                                            class="img-thumbnail"/></a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-muted">{{ $location->trip_location }} Total Pictures:
                                                <i>{{ $getPictures->count() }}</i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row d-none d-xl-flex">

            <div class="col-10">

                <div class="scrollspy-example text-center p-0" data-spy="scroll" data-target="#mdb-scrollspy-ex"
                     data-offset="0" id="">

                    @foreach($getLocations as $location)

                        <section class="currentPicturesDiv" id="item-{{ $loop->iteration }}">

                            <div class="d-flex align-items-center">

                                <h2 class="display-3">{{ $location->trip_location }}</h2>

                                @if($location->pictures->count() > 0)
                                    <a href="/pictures/{{$location->id}}/edit"
                                       class="btn btn-primary btn-lg ml-3">Edit</a>
                                @endif
                            </div>

                            @if($location->pictures->count() > 0)
                                <div class="">
                                    <span
                                        class="text-light"><i>Total Pictures:</i> {{ $location->pictures->count() }}</span>
                                </div>
                            @endif

                            <div class="container-fluid">

                                <div class="row">

                                    @if($location->pictures->count() < 1)

                                        <div class="col">
                                            <div class="noPicturesDiv">
                                                <p class="noValueMessage text-light">There have been no pictures added
                                                    yet for this location.&nbsp;<a
                                                        href="{{ route('pictures.create') }}">Add New Pictures Now</a>
                                                </p>
                                            </div>
                                        </div>
                                    @else

                                        @foreach($location->pictures as $picture)

                                            @php $content = Storage::disk('local')->has($picture->picture_name); @endphp
                                            <div class="col-3">
                                                <div class="card my-2">
                                                    <img
                                                        src="{{ $content == true ? asset('storage/' . str_ireplace('public/', '', $picture->picture_name)) : '/images/no_image_lg.png' }}"
                                                        class="card-img-top" style=""/>
                                                    <div class="card-footer">
                                                        <span
                                                            class="text-center">{{ $picture->picture_caption != null ? $picture->picture_caption : 'No Caption Added Yet' }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach

                                    @endif
                                </div>
                            </div>

                            @if(!$loop->last)
                                <div class="divider"></div>
                            @endif

                        </section>
                    @endforeach
                </div>
            </div>

            <div class="col-2 position-fixed position-right" id="">

                <div class="" id="mdb-scrollspy-ex">
                    <!-- Links -->
                    <ul class="nav nav-pills default-pills smooth-scroll">

                        @foreach($getLocations as $location)

                            <li class="nav-item">
                                <a class="nav-link"
                                   href="#item-{{ $loop->iteration }}">{{ $location->trip_location }}</a>
                            </li>

                        @endforeach

                    </ul>
                    <!-- Links -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
