<hr id="Line1">
<div id="site_Text4">
    <span id="site_uid6">БРЕНДЫ</span>
</div>
<hr id="Line2">
<div id="menu">
    <ul>
<?php foreach ($brands as $brand):?>
<li>
    <a href="<?= \yii\helpers\Url::to(['brands/view', 'alias' =>$brand['alias']]); ?>" data-pjax="0" style="margin-bottom: 1px; line-height: 25px;">
    <?= $brand->name ?>
    </a>
</li>
<?php endforeach;?>
    </ul>
</div>
<!--Ссылки-->
<div class="filters_head" style="height: 30px; background-color: #FFF; padding: 5px;" >
    <div id="category_Text22">
    <span id="category_uid2" style="color: #9D1C20;
    font-family: Avenir Next Cyr Medium;
    font-size: 17px;">
        <a href="<?= \yii\helpers\Url::to(['/brands'])?>">
    Все бренды
            </a>
    </span>
    </div>
</div>
