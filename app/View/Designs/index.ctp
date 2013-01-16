

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
  if (count($design['files']) > 0) {
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
  if (count($design['files']) > 0) {
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
  if (count($design['files']) > 0) {
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
  if (count($design['files']) > 0) {
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
    <td height="150"><div align="center"><a href="project1.html">fork 1</a></div></td>
    <td><div align="center"><a href="project2.html">fork 2</a></div></td>
    <td><div align="center">fork 3</div></td>
    <td><div align="center">fork 4</div></td>
    <td><div align="center">fork 5</div></td>
  </tr>
  <tr>
    <td height="150"><div align="center">fork 6</div></td>
    <td><div align="center">fork 7</div></td>
    <td><div align="center">fork 8</div></td>
    <td><div align="center">fork 9</div></td>
    <td><div align="center">fork 10</div></td>
  </tr>
</table>

    <?php unset($post); ?>
