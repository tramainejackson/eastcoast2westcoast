<!-- Trips Form -->
<form id="" class="locationEditForm" action="{{ route('location.edit', $showLocation->id) }}" method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PATCH')

    <div class="tripLocationContent">

        @include('components.forms.trip_bio_form')
        @include('components.forms.trip_cost_form')
        @include('components.forms.trip_payments_form')
        @include('components.forms.trip_includes_form')
        @include('components.forms.trip_terms_form')
        @include('components.forms.trip_events_form')
        @include('components.forms.trip_participants_form')

    </div>
</form>
