<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <script src="https://kit.fontawesome.com/3daf03b0f7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bulma.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bulma.min.js"></script>

</head>

<body>
    <section class="hero is-dark">
    @include('layouts.navbar')
    </section>
    <section class="section">
        <div class="container">
            <div class="tabs is-centered">
                <ul>
                    <li class="is-active">
                        <a>
                            <span class="icon is-small"><i class="fas fa-image" aria-hidden="true"></i></span>
                            <span>Pictures</span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="icon is-small"><i class="fas fa-music" aria-hidden="true"></i></span>
                            <span>Music</span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="icon is-small"><i class="fas fa-film" aria-hidden="true"></i></span>
                            <span>Videos</span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                            <span>Documents</span>
                        </a>
                    </li>
                </ul>
            </div>

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
                                    <a href="/admin/gallery/destroy/{{ $gl->id }}" class="button is-danger is-outlined">Delete</a>
                                </div>
                            </td>
                            <td><a href="/admin/gallery/show/{{ $gl->id }}" class="button button is-outlined is-primary">Details</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</body>

<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "columns": [
                null,
                null,
                null,
                null,
                { "width": "20%" },
                null

            ]
        });
    } );
</script>

</html>