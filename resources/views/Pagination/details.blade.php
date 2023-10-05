<!DOCTYPE html>
<html>

<head>
    <title>View Student Records</title>
    <!-- Include Bootstrap CSS (You should replace this with the actual Bootstrap CSS link) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>View Student Records</h2>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>