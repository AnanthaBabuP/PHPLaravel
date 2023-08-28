<!DOCTYPE html>
<html>
<head>
    <title>Student Management | Edit</title>
    <!-- Add the Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Student Record</h2>
        <form action="/edit/{{ $users[0]->id }}" method="post">
            @csrf <!-- Blade directive for CSRF token -->

            <table class="table">
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="stud_name" value="{{ $users[0]->name }}" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Update student" class="btn btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <!-- Add the Bootstrap JS and jQuery scripts here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>