<!DOCTYPE html>
<html>

<head>
    <title>Ajax Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#ajax-form').submit(function(event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(data) {
                    $("#msg").html(data.msg);
                }
            });
        });
    });
    </script>
</head>

<body>
    <div class="container mt-5">
        <div id="msg" class="alert alert-info">
            @if(isset($message))
            {{ $message }}
            @else
            This message will be replaced using Ajax. Click the button to replace the message.
            @endif
        </div>

        <form id="ajax-form" method="POST" action="{{'/getmsg'}}">
            @csrf
            <button type="submit" class="btn btn-primary">Replace Message</button>
        </form>
    </div>
</body>

</html>