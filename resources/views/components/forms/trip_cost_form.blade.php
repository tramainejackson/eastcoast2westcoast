<!--- Trip Cost --->
<div class="terms_cost_div trip_edit_div">

    <!-- Editable table -->
    <div class="card">
        <h3 class="card-header text-center fw-bold text-uppercase py-4 bg-yellow">Trip
            Cost</h3>
        <div class="card-body">


            {{-- Cost: Price Per Adult--}}
            <div class="md-form input-group mb-3">
                <span class="input-group-text" id="addon1">$</span>

                <input type="number" step="0.01" name="per_adult" class="form-control"
                       value="{{ $costs !== null ? $costs->per_adult : '' }}"
                       placeholder="Price Per Adult" aria-label="Price Per Adult"
                       aria-describedby="addon1"/>

                <span class="input-group-text">price per adult</span>
            </div>

            {{-- Cost: Price Per Child--}}
            <div class="md-form input-group mb-3">
                <span class="input-group-text" id="addon2">$</span>

                <input type="number" step="0.01" name="per_child" class="form-control"
                       value="{{ $costs !== null ? $costs->per_child : '' }}"
                       placeholder="Price Per Child" aria-label="Price Per Child"
                       aria-describedby="addon2"/>

                <span class="input-group-text">price per child</span>
            </div>

            {{-- Cost: Single Occupancy--}}
            <div class="md-form input-group mb-3">
                <span class="input-group-text" id="addon3">$</span>

                <input type="number" step="0.01" name="single_occupancy"
                       class="form-control"
                       value="{{ $costs !== null ? $costs->single_occupancy : '' }}"
                       placeholder="Price For Single Occupancy"
                       aria-label="Price For Single Occupancy" aria-describedby="addon3"/>

                <span class="input-group-text">single occupancy</span>
            </div>

            {{-- Cost: Double Occupancy--}}
            <div class="md-form input-group mb-3">
                <span class="input-group-text" id="addon4">$</span>

                <input type="number" step="0.01" name="double_occupancy"
                       class="form-control"
                       value="{{ $costs !== null ? $costs->double_occupancy : '' }}"
                       placeholder="Price For Double Occupancy"
                       aria-label="Price For Double Occupancy" aria-describedby="addon4"/>

                <span class="input-group-text">double occupancy</span>
            </div>

            {{-- Cost: Triple Occupancy--}}
            <div class="md-form input-group mb-3">
                <span class="input-group-text" id="addon5">$</span>

                <input type="number" step="0.01" name="triple_occupancy"
                       class="form-control"
                       value="{{ $costs !== null ? $costs->triple_occupancy : '' }}"
                       placeholder="Price For Triple Occupancy"
                       aria-label="Price For Triple Occupancy" aria-describedby="addon5"/>

                <span class="input-group-text">triple occupancy</span>
            </div>

            {{-- Cost: Trip Packages --}}
            <div class="md-form input-group mb-3">
                <span class="input-group-text" id="addon5"><i class="fas fa-suitcase-rolling"></i></span>

                <textarea name="package" class="form-control"
                          rows="3"
                          placeholder="Enter Trip Packages"
                          aria-label="Package Descriptions"
                          aria-describedby="addon5">{{ $costs !== null ? $costs->package : '' }}</textarea>

                <span class="input-group-text">Package Descriptions</span>
            </div>
        </div>
    </div>
    <!-- Editable table -->
</div>
<!--- Trip Cost --->
