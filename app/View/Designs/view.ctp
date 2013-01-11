
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
This design was created by #<?php echo h($design['Design']['user_id']); ?> on <?php echo $design['Design']['created']; ?><br/>

<!--
<pre>
<?php
print_r($design);
?>
</pre>
-->

  <?php
     $first=true;
     foreach ($design['images'] as $image): 
        if ($first) {
             $first=false;
     ?> <a href="<?php echo $image['image_url']; ?>" target="_blank" rel="lightbox[designimg]" ><img src="<?php echo $image['image_url']; ?>" border="0" width="256" hspace="5" vspace="5"></a> <?php
        } else {
     ?> <a href="<?php echo $image['image_url']; ?>" target="_blank" rel="lightbox[designimg]" ><img src="<?php echo $image['image_url']; ?>" border="0" width="128" hspace="5" vspace="5"></a> <?php
       }
    endforeach; ?><br/>
  <?php foreach ($design['files'] as $file): ?>
     File: <a href="<?php echo $file['url']; ?>"><?php echo $file['name']; ?></a><br/>
    <?php endforeach; ?><br/>


<h1>Title: <?php echo h($design['Design']['title']); ?></h1>



<p>description: <?php echo h($design['Design']['body']); ?></p>
