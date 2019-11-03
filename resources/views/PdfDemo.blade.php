<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Begehungsbericht {{ $visitTitle }} vom {{ $visitDate }} </title>
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
<table class="table table-bordered table-striped">
  <tr>
    <td style="width: 80%">
      <h1>Begehung: {{ $visitTitle }}</h1>
      <p>Datum: {{ $visitDate }}</p>
      <p>Projekt: {{ $projectNumber }}, {{ $projectName }}</p>
    </td>
    <td style="width: 20%">
      <img src="/img/logo.png" style="width: 150px">
    </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>