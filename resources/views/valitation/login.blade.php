<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                {!!implode('',$errors->all('<li>:message</li>'))!!}
            </ul>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{ url('/validationForm') }}">
            @csrf

            <table class="table table-bordered">
                <tr>
                    <td class="text-center" colspan="2">Login</td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                            value="{{ old('username') }}">
                        @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="text-center" colspan="2"><button type="submit" class="btn btn-primary">Login</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>