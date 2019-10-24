<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel PDF</title>
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <style type="text/css">
    body{
      font-family: 'Lato', sans-serif;
    }
  </style>
</head>
<body>
<div class="container" style="margin-top: 50px;">
  @if(count($users) > 0)
    <h2 class="text-left">User List</h2><br>
    <a href="/download" class="btn btn-success btn-sm">Download PDF</a>
    <a href="/viewpdf" class="btn btn-primary btn-sm">Open PDF</a>
    <br><br>
    <table class="table table-bordered table-striped">
      <tr>
        <th>ID</th>
        <th>Name</th>
      </tr>
      @foreach($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
        </tr>
      @endforeach
    </table>
  @else
    <br><h4 class="text-center">There are no users</h4>
  @endif

</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>