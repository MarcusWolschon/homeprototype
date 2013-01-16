
<?php
echo $this->Html->link('<back',
array('controller' => 'designs', 'action' => 'index'));
?><br/>



<br/>
<?php
 if ($user) {
   echo "hello user #" . $user . "<br/>";
   if ($user == h($design['Design']['user_id']))  {
       echo $this->Html->link('[edit]',
            array('controller' => 'designs', 'action' => 'edit', $design['Design']['id']));
   }
 } else {
    echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'));
 }
?><br/>




<hr/>

<!--
<pre>
<?php
print_r($design);
?>
</pre>
-->

<!--    files 

  <?php foreach ($design['files'] as $file): ?>
     File: <a href="<?php echo $file['url']; ?>"><?php echo $file['name']; ?></a><br/>
    
    <?php
//TODO: if STL
    ?>
   <script src="/js/Three.js"></script>
    <script src="/js/plane.js"></script>
    <script src="/js/thingiview.js"></script>

    <script>
      window.onload = function() {
        thingiurlbase = "/js";
        thingiview = new Thingiview("viewer");
        thingiview.setObjectColor('#C0D8F0');
        thingiview.initScene();
        thingiview.loadSTL("<?php echo $file['url']; ?>");
      }
    </script>

    <div id="viewer" style="width:300px;height:300px"></div>
   <a href="https://github.com/tbuser/thingiview.js">thingiview</a>
    <?php endforeach; ?><br/>

-->








<div align="center">
  <table width="1024" border="1">
    <tr>
      <td height="300" colspan="<?php echo count($design['images']) - 1 ?>">


  <?php
     $first=true;
     foreach ($design['images'] as $image): 
        if ($first) {
             $first=false;
             ?>
            <a href="<?php echo $image['image_url']; ?>" target="_blank" rel="lightbox[designimg]" ><img src="<?php echo $image['image_url']; ?>" border="0" width="256" hspace="5" vspace="5"></a>
  
            <?php foreach ($design['files'] as $file): ?>
    <?php
//TODO: if STL
    ?>
            <script src="/js/Three.js"></script>
            <script src="/js/plane.js"></script>
            <script src="/js/thingiview.js"></script>

    <script>
      window.onload = function() {
        thingiurlbase = "/js";
        thingiview = new Thingiview("viewer");
        thingiview.setObjectColor('#C0D8F0');
        thingiview.initScene();
        thingiview.loadSTL("<?php echo $file['url']; ?>");
      }
    </script>
            <div id="viewer" style="width:300px;height:300px"></div>
            <small><a href="https://github.com/tbuser/thingiview.js">(thingiview)</a></small>
            <?php
             break;
             endforeach;

        }
    endforeach; ?>
    </td>
      <td width="524" rowspan="2"><div align="center">
        <p><strong><?php echo h($design['Design']['title']); ?></strong></p>
        <p><?php echo h($design['Design']['body']); ?></p>
        <p>created by: <?php echo $this->Html->link("#" .  $design['Design']['user_id'], array('controller' => 'users', 'action' => 'view',  $design['Design']['user_id'])); ?></a>
           on: <?php echo $design['Design']['created']; ?></p>
      </div></td>
    </tr>
    <tr>
  <?php
     $first=true;
     foreach ($design['images'] as $image): 
        if ($first) {
             $first=false;
             // already shown above
        } else {
     ?> <td width="100" height="79"><a href="<?php echo $image['image_url']; ?>" target="_blank" rel="lightbox[designimg]" ><img src="<?php echo $image['image_url']; ?>" border="0" width="128" hspace="5" vspace="5"></a></td> <?php
       }
    endforeach; ?>
    </tr>
    <tr>
      <td height="447" colspan="5"><table width="1024" border="1">
        <tr>
          <td width="214"><h3>&nbsp;</h3>
            <h3>Related Files</h3></td>
          <td width="794" rowspan="7"><div align="center">Build instructions (Would be nice if this section could be viewed  step by step with screenshots similar to instructable)</div></td>
          </tr>

    <?php foreach ($design['files'] as $file): ?>
        <tr>
          <td><a href="<?php echo $file['url']; ?>"><?php echo $file['name']; ?></a></td>
        </tr>
    <?php endforeach; ?>
        <tr>
          <td height="247">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="5"><table width="1024" border="1">
        <tr>
          <td width="300" height="150">Who made one + thumbnails</td>
          <td rowspan="3"><div align="center">Comments</div></td>
        </tr>
        <tr>
          <td height="150"><p>Ancestry</p>
            <p><b>Improving on:</b><br/>
            <a href="project2.html">Project 2</a></p>
            <a href="project2.html">Project 2</a></p>
            <p><b>Improved by:</b><br/>
            <a href="project2.html">Project 2</a></p>
            <a href="project2.html">Project 2</a></p>
          </td>
        </tr>
        <tr>
          <td height="239"><p><?php echo $design['Design']['liked']; ?> Likes</p>
          
            <p><a href="User2.html">User 2</a></p></td>
        </tr>
      </table></td>
    </tr>
  </table>
</div>

