<x-app-layout>

    <div class="col-12 px-5" id="">

        <div class="container my-3 pt-3" id="contacts_links">
            <div class="row">
                <div id="" class="col-12 col-md-6">
                    <h1 class="pageTopicHeader text-center text-md-start">All Contacts</h1>
                </div>

                <div class="col-12 col-md-6 text-center">
                    <x-button-link href="{{ route('contacts.create') }}" class="btn-primary ms-3">Create Contact
                    </x-button-link>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col">

                <table id="contacts_table_admin" class="table table-striped table-responsive-md" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Email</th>
                        <th class="th-sm">Phone</th>
                        <th class="th-sm">Family Size</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td><a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td class="align-middle">{{ $contact->full_name() }}</td>
                            <td class="align-middle">{{ $contact->email }}</td>
                            <td class="align-middle">{{ $contact->phone }}</td>
                            <td class="align-middle">{{ $contact->family_size }}</td>
                            <td class="align-middle"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
