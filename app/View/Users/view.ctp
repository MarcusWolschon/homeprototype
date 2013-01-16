<div align="center">
  <table width="1024" border="1">
    <tr>
      <td width="200" height="200"><div align="center">Avatar</div></td>
      <td width="714"><p align="center"><strong><?php echo $user['User']['username']?></strong></p>
      <p align="left">Role: <?php echo $user['User']['role']?><br/>
                        since: <?php echo $user['User']['created']?><br/>
                        Name, age, location, PM link, introduction, website url, etc...</p></td>
    </tr>
    <tr>
      <td colspan="2"><table width="1024" border="1">
        <tr>
          <td width="300"><div align="center"><b>Designs</b></div></td>
          <td width="600" colspan="2">
              <table border="0">
                <tr><td width="300"><div align="center"><a href="#">Made</a>(TAB)</div></td>
                    <td width="300"><div align="center"><a href="#">Liked</a>(TAB)</div></td>
                </tr>
                </table>
          </td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="2"><table width="1024" border="1">
        <tr>
    <?php
      for ($i = 1; $i <= 5; $i++) {
        if (count($userdesigns) <= $i ) {
        ?> <td height="150">&nbsp;</td> <?php
        } else {
        $design = $userdesigns[$i];
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
      for ($i = 6; $i <= 10; $i++) {
        if (count($userdesigns) <= $i ) {
        ?> <td height="150">&nbsp;</td> <?php
        } else {
        $design = $userdesigns[$i];
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
      </table></td>
    </tr>
  </table>
</div>
