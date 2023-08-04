<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        @yield('content')
        <div class="card bg-secondary text-white">
            <div class="card-body">Copyright (c) 2023 MyProject</div>
        </div>
    </div>
</body>

</html>