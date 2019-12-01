


<li>
                            <a href="<?= \yii\helpers\Url::to(['category/view', 'alias' => $category['alias']]); ?>" data-pjax="0">
                                <?=$tab . $category['name']?>
                            </a>

                            <?php if( isset($category['childs']) ): ?>
                                <?php
//                                Debug($category['img']['filePath'])
//     Debug($category['childs']['img']['filePath']);
                                ?>

                                <span class="items_s">

                                    <?php foreach ($category['childs'] as $value): ?>
                                        <?php

//                                        Debug($value);
                                        ?>
                                        <a href="<?= \yii\helpers\Url::to(['category/view', 'alias' => $value['alias']]); ?>" data-pjax="0">


                                              <img src="/upload/store/<?= $value['img']['filePath']?>" alt="" style="height: 50px;" class="round">

                                            <hr>

                                        <?=  $value['name']?>


                                        </a>
<!--                                        --><?php //if( isset($value['childs']) ): ?>
<!---->
<!--                                               --><?php //foreach ($value['childs'] as $value): ?>
<!--                                                   <a href="--><?//= \yii\helpers\Url::to(['category/view', 'alias' => $value['alias']]); ?><!--" data-pjax="0">-->
<!---->
<!--                                                        <img src="/upload/store/--><?//= $value['img']['filePath']?><!--" alt="" style="height: 50px;" class="round">-->
<!---->
<!--                                                       <hr>-->
<!---->
<!--                                                   --><?//=  $value['name']?>
<!---->
<!--                                                    </a>-->
<!--                                                --><?php //endforeach; ?>
<!---->
<!--                                        --><?php //endif;?>
                                    <?php endforeach; ?>

                                </span>

                            <?php endif;?>
                        </li>
                        <div class="line_menu_img" style="width: 100%; height: 1px;"></div>
