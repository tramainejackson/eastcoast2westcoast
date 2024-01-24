<x-app-layout>

    @section('title', 'All Admin Users - Eastcoast2Westcoast')

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

                <div class="row row-cols-1 row-cols-md-3 g-4">

                    @foreach($getAllusers as $user)

                        <div class="col">
                            <div class="card text-white text-center border border-1 border-secondary-subtle h-100" style="background-image: linear-gradient(4deg, rgba(38,8,31,0.75) 30%, rgba(38,8,31,0.75) 45%, rgba(38,8,31,0.75) 100%), url('/images/background_art_1.png');
                            background-size: cover;
                            background-attachment: fixed;
                            background-repeat: no-repeat;
                            background-position: center">

                                <div class="card-header"><h2
                                        class="text-white text-center">{{ $user->first_name . " " . $user->last_name }}</h2>
                                </div>

                                <div class="card-body">
                                    <div class="">
                                        <p class="mb-0">User account is currently</p>
                                        <button class='btn {{ $user->active == 'Y' ? 'btn-outline-success' : 'btn-outline-danger' }}'
                                                type='button'>{{ $user->active == 'Y' ? 'Active' : 'Inactive' }}</button>
                                    </div>

                                    <div class="mt-4 mb-2">
                                        <a href="/admin/{{ $user->id }}/edit" class="btn btn-primary">Edit</a>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    @if(Auth::id() == $user->id)
                                        <span class="grey-text font-italic font-small">Currently Logged In</span>
                                        <br/>
                                        <span
                                            class="grey-text font-italic font-small">Last Login - {{ $last_login }}</span>
                                    @else
                                        <span
                                            class="grey-text font-italic font-small">Last Login - {{ $user->last_login == NULL ? 'User Has Not Logged In Yet' : $user->last_login }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
