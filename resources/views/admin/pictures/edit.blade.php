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

    <div id="" class="col-12">

        <div class="col-12">
            <div class="">
                <h2 class="display-3">{{ $trip->trip_location }}</h2>
            </div>
        </div>

        @if($getPictures->isNotEmpty())

            <div class="col-12" id="">

                <form name="" id="edit_picture_form" class="pictureForm" action="/pictures/{{ $trip->id }}"
                      method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PATCH')

                    <div class="md-row">
                        <button type="submit" class="btn btn-secondary btn-lg ml-3">Update All</button>

                        <div class="container-fluid" id="">

                            <div class="row" id="">

                                @foreach($getPictures as $picture)

                                    @php $content = Storage::disk('local')->has($picture->picture_name); @endphp

                                    <div class="col-12 col-md-6 col-lg-4 animated">

                                        <div class="card my-2">

                                            <img
                                                src="{{ $content == true ? asset('storage/' . str_ireplace('public/', '', $picture->picture_name)) : '/images/skyline.jpg' }}"
                                                class="card-img-top" alt="{{ $picture->picture_caption }}" style=""/>

                                            <div class="card-body">

                                                <div class="md-form" id="">
                                                    <input type="text" name="picture_caption[]" class="form-control"
                                                           value="{{ $picture->picture_caption }}"
                                                           placeholder="Enter Caption"/>
                                                    <label class="card-title">Picture Caption</label>
                                                </div>

                                                <input type="text" name="picture_id[]" class=""
                                                       value="{{ $picture->id }}" hidden/>
                                            </div>

                                            <div class="card-footer">
                                                <button class="btn btn-danger mx-auto d-block"
                                                        onclick="event.preventDefault(); removePicture({{ $picture->id }});">
                                                    Remove Picture
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        @else
            <div class="col-12 col-md-6 col-lg-4 py-4 animated">
                <h2 class="h2">There are no pictures added for this trip yet. Click <a
                        href="{{ route('pictures.create') }}">here</a> to add pictures.</h2>
            </div>
        @endif

    </div>

</x-app-layout>
