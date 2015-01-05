<h4 style="padding-bottom: 30px">プロジェクト一覧</h4>
<ul class="collapsible">
    <?php foreach($projects as $project): ?>
        <li>
            <div class="collapsible-header"><?php echo $project['Project']['name']; ?></div>
            <div class="collapsible-body" style="background-color: #f9f9f9">
                <p><?php echo $project['Project']['message']; ?></p>
                <p style="float: right"><?php echo $this->Html->link('詳しく見る', array('action' => 'view', $project['Project']['id']), array('class' => 'waves-effect waves-light btn')); ?></p>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
<script type="text/javascript">
    $(document).ready(function(){
        $('.collapsible').collapsible();
    });
</script>