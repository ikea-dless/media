<div class="collection with-header">
    <li class="collection-header"><h4>不満スレ一覧</h4></li>
    <?php foreach($categories as $category): ?>
    <?php echo $this->Html->link($category['Category']['name'], array('controller' => 'posts', 'action' => 'index', $category['Category']['id']), array('class' => 'collection-item')); ?>
    <?php endforeach; ?>
</div>