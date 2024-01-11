<x-app-layout>

    <div class="col-12 px-5" id="">

        <div id="users_page_header" class="">
            <h1 class="pageTopicHeader">All Admins</h1>
        </div>

        <a href="{{ route('admin.create') }}" class="btn btn-success">Create New User</a>

        <div class="row mt-4">

            <div id="all_users" class="col-12">

                <div class="row" id="">
                    @foreach($getAllusers as $user)

                        @php $user->active == 'Y' ? $user->active = 'Active' : $user->active = 'Inactive'; @endphp

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="card text-center border border-1 border-secondary-subtle">
                                <div class="card-header"><h2
                                        class="order-first text-center">{{ $user->first_name . " " . $user->last_name }}</h2>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <p class="mb-0">User account is currently</p>
                                        <button class='btn {{ $user->active == 'Active' ? 'btn-success' : 'btn-danger' }}'
                                                type='button'>{{ $user->active }}</button>
                                    </div>

                                    <div class="mt-4 mb-2">
                                        <a href="/admin/{{ $user->id }}/edit" class="btn btn-primary">Edit</a>
                                    </div>

                                    <div class="card-footer">
                                        @if(Auth::id() == $user->id)
                                            <span class="grey-text font-italic font-small">Currently Logged In</span>
                                        @else
                                            <span class="grey-text font-italic font-small">Last Login - </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
