<!DOCTYPE html>
<html>
<head>
   <title>View Student Records</title>
   <!-- Add Bootstrap CSS link -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
   <div class="container mt-4">
      <h2>View Student Records</h2>
      <table class="table table-bordered">
         <thead>
            <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Edit</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($users as $user)
            <tr>
               <td>{{ $user->id }}</td>
               <td>{{ $user->name }}</td>
               <td><a href='delete/{{ $user->id }}' class='btn btn-danger btn-sm'>Delete</a></td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</body>
</html>