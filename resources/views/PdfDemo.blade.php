<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Begehungsbericht {{ $visit['title'] }} </title>
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
<span style="text-align: right">
    <img src="/img/logo.png" style="width: 120px">
  </span><\br>
<p style="border-top: 1px solid #a42600"><span style="color:#a42600; font-size: 0.6em">{{ $project['name'] }} - {{ $project['street'] }} {{ $project['housenumber'] }}, {{ $project['postcode'] }} {{ $project['city'] }}</span><br><span style="color:grey; font-size: 1.4em">{{ $visit['title'] }}, {{ $visit['date'] }}</span>
</p>
<p style="font-size:0.6em"><b>Datum:</b> {{ $visit['date'] }}, {{ $visit['time'] }}&nbsp;&nbsp;&nbsp;&nbsp;<b>Wetter:</b> {{ $visit['weather'] }}</p>
<p style="font-size:0.6em"><b>Anmerkungen:</b><br>{{ $visit['description'] }}</p>
<p></p>
<p style="font-size: 1em; color: #a42600; line-height: 0.9em">Anwesende</p>
  <table cellpadding="5" style="font-size: 0.6em" class="table table-bordered table-striped">
    <tr>
      <th style="border: 0.5px solid lightgrey; font-weight: bold" >Name</th>
      <th style="border: 0.5px solid lightgrey; font-weight: bold" >Firma (ggf.)</th>
      <th style="border: 0.5px solid lightgrey; font-weight: bold" >Gewerk / Funktion</th>
    </tr>
    @foreach( $presentMembers as $presentMember )
    <tr>
      <td style="border: 0.5px solid lightgrey" >
        {{ $presentMember['surname'] }} {{ $presentMember['firstname'] }}
      </td>
      <td style="border: 0.5px solid lightgrey" >{{ $presentMember['company'] }}
      </td>
      <td style="border: 0.5px solid lightgrey" >
        {{ $presentMember['subarea'] }}
      </td>
    </tr>
    @endforeach
  </table>
<p></p>
<p style="font-size: 1em; color: #a42600; line-height: 0.9em">Begehungsvermerke</p>
  @foreach( $visitationnotes as $visitationnote )
    <table cellpadding="5" style="font-size: 0.6em" class="table table-bordered table-striped">
      <tr>
        <td style="border: 0.5px solid lightgrey; font-weight: bold">{{ $visitationnote['title'] }}</td>
        <td style="border: 0.5px solid lightgrey"><b>Kategorie:</b> {{ $visitationnote['category'] }}</td>
      </tr>
      <tr>
        <td style="border: 0.5px solid lightgrey" colspan="2"><b>Beschreibung:</b><br>{{ $visitationnote['notes'] }}
        </td >
        <td style="border: 0.5px solid lightgrey"></td>
      </tr>
      <tr>
        <td style="border: 0.5px solid lightgrey"><b>Fälligkeit: </b>{{ $visitationnote['deadline'] }}
        </td>
        <td style="border: 0.5px solid lightgrey"><b>Erledigt: </b>
          @if ( $visitationnote['done'] == 1)
            ja
          @else
            nein
          @endif
        </td>
      </tr>
      <tr>
        <td>{{ $visitationnote['media'][0]['filename'] ?? ""}}</td>
        <td></td>
      </tr>
    </table>
    <p style="font-size: 0.1em"></p>
  @endforeach
</body>
</html>