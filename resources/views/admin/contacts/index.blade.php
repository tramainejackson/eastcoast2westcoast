<x-app-layout>

    <div class="col-12 px-5" id="">
        <div class="row">

            <div class="col-12">
                <div id="users_page_header" class="">
                    <h1 class="pageTopicHeader">All Contacts</h1>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col py-4">
                <a href="{{ route('contacts.create') }}" class="btn btn-success">Create New Contact</a>
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
                            <td class="align-middle"></td>
                            <td class="align-middle">{{ $contact->full_name() }}</td>
                            <td class="align-middle">{{ $contact->email }}</td>
                            <td class="align-middle">{{ $contact->phone }}</td>
                            <td class="align-middle">{{ $contact->family_size }}</td>
                            <td><a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-default">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
