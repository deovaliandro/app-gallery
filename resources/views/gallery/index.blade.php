@extends('inc.headeradmin')
@section('content')

<section class="section">
    <div class="container">

        <div class="buttons">
            <a href="/admin/gallery/create" class="button is-primary">Add Data</a>
        </div>

        <table id="table" class="table is-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Action</th>
                    <th>More</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gallery as $gl)
                    <tr>
                        <td>{{ $gl->id }}</td>
                        <td>{{ $gl->name }}</td>
                        <td>{{ $gl->category }}</td>
                        <td>{{ $gl->address }}</td>
                        <td>
                            <div class="buttons">
                                <a href="/admin/gallery/edit/{{ $gl->id }}" class="button is-warning">Edit</a>
                                <a href="/admin/gallery/destroy/{{ $gl->id }}"
                                    class="button is-danger is-outlined">Delete</a>
                            </div>
                        </td>
                        <td><a href="/admin/gallery/show/{{ $gl->id }}"
                                class="button button is-outlined is-primary">Details</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('#table').DataTable({
            "columns": [
                null,
                null,
                null,
                null,
                {
                    "width": "20%"
                },
                null

            ]
        });
    });

</script>

@endsection
