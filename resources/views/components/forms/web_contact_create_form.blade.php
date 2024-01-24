<!-- Web Contacts Form -->
<div class="page_signup_form col-12 col-md-8 py-1 mx-auto">

    <h3 class="text-center text-light">Sign Me Up</h3>

    <form class="signupForm" id="" action="{{ route('contacts.store') }}" method="POST">

        @csrf

        <div class="md-form form-outline" data-mdb-input-init>
            <input type="text" name="first_name" class="form-control text-white" value="{{ old('first_name') }}"
                   placeholder="Enter Firstname"/>

            @if ($errors->has('first_name'))
                <span class="text-danger">First Name cannot be empty</span>
            @endif

            <label class="form-label">Firstname</label>
        </div>

        <div class="md-form form-outline" data-mdb-input-init>
            <input type="text" name="last_name" class="form-control text-white" value="{{ old('last_name') }}"
                   placeholder="Enter Lastname"/>

            @if ($errors->has('last_name'))
                <span class="text-danger">Last Name cannot be empty</span>
            @endif

            <label class="form-label">Lastname</label>
        </div>

        <div class="md-form form-outline" data-mdb-input-init>
            <input type="text" name="email" class="form-control text-white" value="{{ old('email') }}"
                   placeholder="Enter Email Address"/>

            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif

            <label class="form-label">Email Address</label>
        </div>

        <div class="mt-3">
            <div class="row justify-content-center align-items-center">
                <div class="col text-start">
                    <button class="btn btn-info btn-lg ms-md-0" type="submit">Sign Me Up</button>
                </div>
            </div>
        </div>

        <input type="number" name="trip_id" class="hidden" value="{{ $tripLocation->id }}" hidden />

        <div class="paymentInstructions text-light">
            <p class="m-0 py-3">For everyone who has a PayPal account and would like to pay
                electronically, please send all payments to jacksond1961@yahoo.com by selecting the
                option to send money to friends and family. <a href="http://www.paypal.com" target="_blank">Click
                    here</a> to go
                to the PayPal website.</p>
        </div>
    </form>
</div>
