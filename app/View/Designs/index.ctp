<h1>published designs</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($designs as $design): ?>
    <tr>
        <td><?php echo $design['Design']['id']; ?></td>
        <td>
<?php
  if (count($design['files']) > 0) {
     echo '<img src="' . $design['images']['0']['image_url'] . '" height="64"/>&nbsp;';
  }
?>
            <?php echo $this->Html->link($design['Design']['title'],
array('controller' => 'designs', 'action' => 'view', $design['Design']['id'])); ?>
 (<?php echo count($design['files'])?> files, <?php echo count($design['images'])?> images)
        </td>
        <td><?php echo $design['Design']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
