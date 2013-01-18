

<h1><b>Most popular</b></h1>
<table>
  <tr>
    <td width="399" rowspan="2" height="150" width="40%"><p align="center">&nbsp;</p>
      <p align="center">Screenshot rotation of  items from table on the right</p>
<p>&nbsp;</p></td>
    <?php
      for ($i = 0; $i <= 3; $i++) {
        if (count($populardesigns) <= $i ) {
        ?> <td height="150" width="20%">&nbsp;</td> <?php
        } else {
        $design = $populardesigns[$i];
        ?> <td height="150" width="20%">
              <div align="center">
                <?php
  if (count($design['images']) > 0) {
     echo '<img src="' . $design['images']['0']['image_url'] . '" height="64"/>&nbsp;';
  }
                ?>
            <?php echo $this->Html->link($design['Design']['title'], array('controller' => 'designs', 'action' => 'view', $design['Design']['id'])); ?><br/>
 (<?php echo count($design['files'])?> files, <?php echo count($design['images'])?> images)
              </td> <?php
        }
     } ?>
  </tr>
  <tr>
    <?php
      for ($i = 4; $i <= 7; $i++) {
        if (count($populardesigns) <= $i ) {
        ?> <td height="150" width="20%">&nbsp;</td> <?php
        } else {
        $design = $populardesigns[$i];
        ?> <td height="150" width="20%">
              <div align="center">
                <?php
  if (count($design['images']) > 0) {
     echo '<img src="' . $design['images']['0']['image_url'] . '" height="64"/>&nbsp;';
  }
                ?>
            <?php echo $this->Html->link($design['Design']['title'], array('controller' => 'designs', 'action' => 'view', $design['Design']['id'])); ?><br/>
 (<?php echo count($design['files'])?> files, <?php echo count($design['images'])?> images)
              </td> <?php
        }
     } ?>
  </tr>
</table>
<hr/>
<br/>
<br/>

<h1><b> <?php echo $this->Html->link("Latest Designs", array('controller' => 'designs', 'action' => 'index_latest')); ?> </b></h1>
<table>
  <tr>
    <?php
      for ($i = 0; $i <= 4; $i++) {
        if (count($newdesigns) <= $i ) {
        ?> <td height="150">&nbsp;</td> <?php
        } else {
        $design = $newdesigns[$i];
        ?> <td height="150" width="20%">
              <div align="center">
                <?php
  if (count($design['images']) > 0) {
     echo '<img src="' . $design['images']['0']['image_url'] . '" height="64"/>&nbsp;';
  }
                ?>
            <?php echo $this->Html->link($design['Design']['title'], array('controller' => 'designs', 'action' => 'view', $design['Design']['id'])); ?><br/>
 (<?php echo count($design['files'])?> files, <?php echo count($design['images'])?> images)
              </td> <?php
        }
     } ?>
  </tr>
  <tr>
    <?php
      for ($i = 5; $i <= 9; $i++) {
        if (count($newdesigns) <= $i ) {
        ?> <td height="150">&nbsp;</td> <?php
        } else {
        $design = $newdesigns[$i];
        ?> <td height="150" width="20%">
              <div align="center">
                <?php
  if (count($design['images']) > 0) {
     echo '<img src="' . $design['images']['0']['image_url'] . '" height="64"/>&nbsp;';
  }
                ?>
            <?php echo $this->Html->link($design['Design']['title'], array('controller' => 'designs', 'action' => 'view', $design['Design']['id'])); ?><br/>
 (<?php echo count($design['files'])?> files, <?php echo count($design['images'])?> images)
              </td> <?php
        }
     } ?>
  </tr>
</table>
<table>
<hr/>
<br/>
<br/>

<h1><b>Newest derived Designs</b></h1>
<table>
  <tr>
    <?php
      for ($i = 0; $i <= 4; $i++) {
        if (count($deriveddesigns) <= $i ) {
        ?> <td height="150">&nbsp;</td> <?php
        } else {
        $design = $deriveddesigns[$i];
        ?> <td height="150" width="20%">
              <div align="center">
                <?php
  if ($design['images']['image_url']) {
     echo '<img src="' . $design['images']['image_url'] . '" height="64"/>&nbsp;';
  }
                ?>
            <?php echo $this->Html->link($design['designs']['title'], array('controller' => 'designs', 'action' => 'view', $design['designs']['id'])); ?><br/>
              </td> <?php
        }
     } ?>
  </tr>
  <tr>
    <?php
      for ($i = 5; $i <= 9; $i++) {
        if (count($deriveddesigns) <= $i ) {
        ?> <td height="150">&nbsp;</td> <?php
        } else {
        $design = $deriveddesigns[$i];
        ?> <td height="150" width="20%">
              <div align="center">
                <?php
   if ($design['images']['image_url']) {
     echo '<img src="' . $design['images']['image_url'] . '" height="64"/>&nbsp;';
  }
                ?>
            <?php echo $this->Html->link($design['designs']['title'], array('controller' => 'designs', 'action' => 'view', $design['designs']['id'])); ?><br/>
              </td> <?php
        }
     } ?>
  </tr>
</table>

    <?php unset($post); ?>
