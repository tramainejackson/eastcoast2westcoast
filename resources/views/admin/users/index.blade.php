<x-app-layout>

    <div class="col-12 px-5" id="">

        <div class="container-fluid my-3 pt-3" id="admin_users_links">
            <div class="row">
                <div id="" class="col-12 col-md-6">
                    <h1 class="pageTopicHeader text-center text-md-start">All Admin Users</h1>
                </div>

                <div class="col-12 col-md-6 text-center">
                    <x-button-link href="{{ route('admin.create') }}" class="btn-primary ms-3">Create New Admin Users
                    </x-button-link>
                </div>
            </div>
        </div>

        <div class="row mt-4">

            <div id="all_users" class="col-12">

                <div class="row" id="">
                    @foreach($getAllusers as $user)

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="card text-center border border-1 border-secondary-subtle">
                                <div class="card-header"><h2
                                        class="order-first text-center">{{ $user->first_name . " " . $user->last_name }}</h2>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <p class="mb-0">User account is currently</p>
                                        <button class='btn {{ $user->active == 'Y' ? 'btn-success' : 'btn-danger' }}'
                                                type='button'>{{ $user->active == 'Y' ? 'Active' : 'Inactive' }}</button>
                                    </div>

                                    <div class="mt-4 mb-2">
                                        <a href="/admin/{{ $user->id }}/edit" class="btn btn-primary">Edit</a>
                                    </div>

                                    <div class="card-footer">
                                        @if(Auth::id() == $user->id)
                                            <span class="grey-text font-italic font-small">Currently Logged In</span>
                                            <br/>
                                            <span class="grey-text font-italic font-small">Last Login - {{ $last_login }}</span>
                                        @else
                                            <span class="grey-text font-italic font-small">Last Login - {{ $user->last_login == NULL ? 'User Has Not Logged In Yet' : $user->last_login }}</span>
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
