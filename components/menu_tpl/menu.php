<li>
    <a href="<?= \yii\helpers\Url::to(['category/view', 'alias' => $category['alias']]); ?>" data-pjax="0">
        <?=$tab . $category['name']?>
        <?php if( isset($category['childs']) ): ?>
            <span class="pull-left"><i class="fa fa-folder"></i></span>
        <?php endif;?>
    </a>
    <?php if( isset($category['childs']) ): ?>

        <ul>

            <?= $this->getMenuHtml($category['childs'], $tab . "-")?>
        </ul>
    <?php endif;?>
</li>