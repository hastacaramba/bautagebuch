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
<body>
<div style="text-align: right">
    <img src="/img/logo.png" style="width: 120px">
  </div><\br>
<p style="border-top: 1px solid #a42600"><span style="color:#a42600; font-size: 0.6em">{{ $project['name'] }} - {{ $project['street'] }} {{ $project['housenumber'] }}, {{ $project['postcode'] }} {{ $project['city'] }}</span><br><span style="color:grey; font-size: 1.4em">{{ $visit['title'] }}, {{ $visit['date'] }}</span>
</p>
<p style="font-size:0.6em"><b>Datum:</b> {{ $visit['date'] }}, {{ substr($visit['time'],0, 5) }}&nbsp;&nbsp;&nbsp;&nbsp;<b>Wetter:</b> {{ $visit['weather'] }}</p>
<p></p>
<p style="font-size: 1em; color: #a42600; line-height: 0.9em">Anwesende</p>
<table cellpadding="2" style="font-size: 0.7em" class="table table-bordered table-striped">
  <tr>
    <th style="border: 0.5px solid lightgrey; font-weight: bold" >Name</th>
    <th style="border: 0.5px solid lightgrey; font-weight: bold" >Firma (ggf.)</th>
    <th style="border: 0.5px solid lightgrey; font-weight: bold" >Gewerk / Funktion</th>
  </tr>
  @foreach( $presentMembers as $presentMember )
    <tr>
      <td style="text-indent:-4px; border: 0.5px solid lightgrey" >
        {{ $presentMember['surname'] }} {{ $presentMember['firstname'] }}
      </td>
      <td style="text-indent:0px; border: 0.5px solid lightgrey" >{{ $presentMember['company'] }}
      </td>
      <td style="text-indent:-4px;border: 0.5px solid lightgrey" >
        {{ $presentMember['subarea'] }}
      </td>
    </tr>
  @endforeach
</table>
<p></p>
<p style="font-size: 1em; color: #a42600; line-height: 0.9em">Baufortschritt</p><br>
<p style="white-space: pre-line; font-size:0.7em">{{ $visit['description'] }}</p>
<table cellpadding="0" style="font-size: 0.7em" class="table table-bordered table-striped">
@for ($i = 0; $i < (ceil($numOfVisitMedia / 2)); $i++)
    <tr>
      <td>
        <img src="images/{{ $visitMedia[2 * $i]['filename'] ?? ""}}" width="150"><br>
        {{ $visitMedia[2 * $i]['info'] ?? ""}}
      </td>
      @if( ($numOfVisitMedia % 2 == 1) && ($i == ceil($numOfVisitMedia / 2) - 1))
        <td>
        </td>
      @else
        <td>
          <img src="images/{{ $visitMedia[2 * $i + 1]['filename'] ?? ""}}" width="150">
        </td>
      @endif
    </tr>
@endfor
</table>
<p></p>

<p style="font-size: 1em; color: #a42600; line-height: 0.9em">Begehungsvermerke</p>
  @foreach( $visitationnotes as $visitationnote )
    <table cellpadding="2" style="font-size: 0.7em" class="table table-bordered table-striped">
      <tr>
        <td style="text-indent:-8px; border: 0.5px solid lightgrey">
          @if ($visitationnote['important'])
            <span style="color:#a42600">
          @else
            <span style="color:#000">
          @endif
          <b>({{ $visitationnote['number'] }})</b> {{ $visitationnote['category'] }}
          </span>
        </td>
        <td style="text-indent:-8px; border: 0.5px solid lightgrey">
          @if ($visitationnote['important'])
            <span style="color:#a42600">
          @else
            <span style="color:#000">
          @endif
          Erstellt am: {{ $visitationnote['createdAt'] }}
          @if ($visitationnote['deadline'] != null) / Fälligkeit: {{ $visitationnote['deadline'] }}
          @endif
          </span>
        </td>
      </tr>
      <tr>
        <td style="text-indent:-8px; border: 0.5px solid lightgrey">
          @if ($visitationnote['important'])
            <span style="color:#a42600">
          @else
            <span style="color:#000">
          @endif
            {{ $visitationnote['notes'] }}
          </span>
        </td>
        <td style="text-indent:-8px; border: 0.5px solid lightgrey">
          @if ($visitationnote['important'])
            <span style="color:#a42600">
          @else
            <span style="color:#000">
          @endif
            @if (sizeof($visitationnote['concernedMembers']) != 0)
                Betrifft:<br>
            @endif
            @foreach ($visitationnote['concernedMembers'] as $concernedMember)
              @if( $concernedMember['company'] != "")
                  {{ $concernedMember['company'] }}
              @endif
              @if( $concernedMember['surname'] != "")
                  ,{{ $concernedMember['firstname'] }} {{ $concernedMember['surname'] }} ({{ $concernedMember['subarea'] }})
              @endif
              <br>
            @endforeach
          </span>
        </td>
      </tr>

      @for ($i = 0; $i < (ceil($visitationnote['numOfRows'] / 2)); $i++)
        <tr>
          <td style="border: 0.5px solid lightgrey">
            <img src="images/{{ $visitationnote['media'][2 * $i]['filename'] ?? ""}}" width="150">

          </td>
          @if( ($visitationnote['numOfRows'] % 2 == 1) && ($i == ceil($visitationnote['numOfRows'] / 2) - 1))
            <td style="border: 0.5px solid lightgrey">
            </td>
          @else
            <td style="border: 0.5px solid lightgrey">
              <img src="images/{{ $visitationnote['media'][2 * $i + 1]['filename'] ?? ""}}" width="150">
            </td>
          @endif
        </tr>
      @endfor

    </table>
    <p style="font-size: 0.1em; line-height: 0.1em"></p>
  @endforeach
</body>
</html>