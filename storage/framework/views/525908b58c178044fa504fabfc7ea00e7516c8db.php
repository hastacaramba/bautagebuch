<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Begehungsbericht <?php echo e($visit['title']); ?> </title>
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
  </div>
<p style="line-height: 0.5em; border-bottom: 1px solid #a42600;"><span style="color:#a42600; font-size: 1.2em"><?php echo e($project['name']); ?> </span><span style="color:#a42600; font-size: 0.8em">- <?php echo e($project['street']); ?> <?php echo e($project['housenumber']); ?>, <?php echo e($project['postcode']); ?> <?php echo e($project['city']); ?></span></p>
<span style="border-top: 1px solid #a42600;color:grey; font-size: 1.2em"><?php echo e($visit['title']); ?>, <?php echo e(date('d.m.Y', strtotime($visit['date']))); ?></span><br>
<p style="font-size:0.7em"><b>Datum:</b> <?php echo e(date('d.m.Y', strtotime($visit['date']))); ?>, <?php echo e(substr($visit['time'],0, 5)); ?> Uhr&nbsp;&nbsp;&nbsp;&nbsp;<b>Bauleiter:</b> <?php echo e($responsible); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php if( $visit['weather'] != ""): ?><b>Wetter:</b> <?php endif; ?><?php echo e($visit['weather']); ?></p>
<p></p>
<p style="font-size: 1em; color: #a42600; line-height: 0.9em">Anwesende</p>
<table cellpadding="2" style="font-size: 0.7em" class="table table-bordered table-striped">
  <tr>
    <th style="border: 0.5px solid lightgrey; font-weight: bold" >Name</th>
    <th style="border: 0.5px solid lightgrey; font-weight: bold" >Firma (ggf.)</th>
    <th style="border: 0.5px solid lightgrey; font-weight: bold" >Gewerk / Funktion</th>
  </tr>
  <?php $__currentLoopData = $presentMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $presentMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td style="text-indent:-4px; border: 0.5px solid lightgrey" >
        <?php echo e($presentMember['surname']); ?> <?php echo e($presentMember['firstname']); ?>

      </td>
      <td style="text-indent:0px; border: 0.5px solid lightgrey" ><?php echo e($presentMember['company']); ?>

      </td>
      <td style="text-indent:-4px;border: 0.5px solid lightgrey" >
        <?php echo e($presentMember['subarea']); ?>

      </td>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<p></p>
<p style="font-size: 1em; color: #a42600; line-height: 0.9em">Baufortschritt</p><br>
<p style="font-size:0.7em">
    <?php $__currentLoopData = $visitDescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($line); ?><br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</p>
<table cellpadding="10" style="font-size: 0.7em" class="table table-bordered table-striped">
<?php for($i = 0; $i < (ceil($numOfVisitMedia / 2)); $i++): ?>
    <tr>
      <td>
        <img src="images/<?php echo e($visitMedia[2 * $i]['filename'] ?? ""); ?>" width="250"><br>
        <?php echo e($visitMedia[2 * $i]['info'] ?? ""); ?><br>
      </td>
      <?php if( ($numOfVisitMedia % 2 == 1) && ($i == ceil($numOfVisitMedia / 2) - 1)): ?>
        <td>
        </td>
      <?php else: ?>
        <td>
          <img src="images/<?php echo e($visitMedia[2 * $i + 1]['filename'] ?? ""); ?>" width="250"><br>
          <?php echo e($visitMedia[2 * $i + 1]['info'] ?? ""); ?><br>
        </td>
      <?php endif; ?>
    </tr>
<?php endfor; ?>
</table>
<p></p>

  <?php if($openVisitationNotesCounter  > 0): ?>
    <p style="font-size: 1em; color: #a42600; line-height: 0.9em">Begehungsvermerke</p>
  <?php endif; ?>
  <?php $__currentLoopData = $visitationnotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visitationnote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if(!$visitationnote['done']): ?>
        <table cellpadding="2" style="font-size: 0.7em" class="table table-bordered table-striped">
          <tr>
            <td style="text-indent:-10px; border: 0.5px solid lightgrey">
              <?php if($visitationnote['important']): ?>
                <span style="color:#a42600">
              <?php else: ?>
                <span style="color:#000">
              <?php endif; ?>
              <b>(<?php echo e($visitationnote['number']); ?>)</b> <?php echo e($visitationnote['category']); ?>

              </span>
            </td>
            <td style="text-indent:-10px; border: 0.5px solid lightgrey">
              <?php if($visitationnote['important']): ?>
                <span style="color:#a42600">
              <?php else: ?>
                <span style="color:#000">
              <?php endif; ?>
              Erstellt am: <?php echo e($visitationnote['createdAt']); ?>

              <?php if($visitationnote['deadline'] != null ): ?>
                        / Fälligkeit: <?php echo e($visitationnote['deadline']); ?>

              <?php endif; ?>
              </span>
            </td>
          </tr>
          <tr>
            <td style="text-indent:-10px; border: 0.5px solid lightgrey">
              <?php if($visitationnote['important']): ?>
                <span style="color:#a42600">
              <?php else: ?>
                <span style="color:#000">
              <?php endif; ?>
                <?php echo e($visitationnote['notes']); ?>

              </span>
            </td>
            <td style="text-indent:-10px; border: 0.5px solid lightgrey">
              <?php if($visitationnote['important']): ?>
                <span style="color:#a42600">
              <?php else: ?>
                <span style="color:#000">
              <?php endif; ?>
                <?php if(sizeof($visitationnote['concernedMembers']) != 0): ?>
                    Betrifft:<br>
                <?php endif; ?>
                <?php if($visitationnote['concernsAll']): ?>
                    BETRIFFT ALLE GEWERKE
                <?php endif; ?>
                <?php if(!$visitationnote['concernsAll']): ?>
                    <?php $__currentLoopData = $visitationnote['concernedMembers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $concernedMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if( $concernedMember['company'] != ""): ?>
                            <?php echo e($concernedMember['company']); ?>

                        <?php endif; ?>
                        <?php if( $concernedMember['surname'] != ""): ?>
                            (<?php echo e($concernedMember['subarea']); ?>)
                        <?php endif; ?>
                        <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </span>
            </td>
          </tr>

          <?php for($i = 0; $i < (ceil($visitationnote['numOfRows'] / 2)); $i++): ?>
            <tr>
              <td style="border: 0.5px solid lightgrey">
                <img src="images/<?php echo e($visitationnote['media'][2 * $i]['filename'] ?? ""); ?>" width="250">
                <?php echo e($visitationnote['media'][2 * $i]['info'] ?? ""); ?>


              </td>
              <?php if( ($visitationnote['numOfRows'] % 2 == 1) && ($i == ceil($visitationnote['numOfRows'] / 2) - 1)): ?>
                <td style="border: 0.5px solid lightgrey">
                </td>
              <?php else: ?>
                <td style="border: 0.5px solid lightgrey">
                  <img src="images/<?php echo e($visitationnote['media'][2 * $i + 1]['filename'] ?? ""); ?>" width="250">
                  <?php echo e($visitationnote['media'][2 * $i + 1]['info'] ?? ""); ?>

                </td>
              <?php endif; ?>
            </tr>
          <?php endfor; ?>

        </table>
        <p style="font-size: 0.1em; line-height: 0.1em"></p>
      <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH /www/htdocs/w019e95a/bautagebuch/resources/views/PdfDemo.blade.php ENDPATH**/ ?>