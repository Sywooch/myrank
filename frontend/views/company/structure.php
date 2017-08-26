<?php
/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::t('app', 'COMPANY_STRUCT');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['company/structure']];
?>
<div class = "container">
    <div id = "main">

        <!--begin b-content -->
        <div class = "b-content">

            <!--begin b-user -->
            <div class = "b-user b-block">
                <div class = "b-title">
                    <?= Yii::t('app', 'COMPANY_STRUCT') ?>
                    <?= Html::button(Yii::t("app", "CREATE_STRUCT"), [
                        'class' => 'button-small showModal', 
                        'data-url' => Url::toRoute(['company/createstruct']),
                    ]); ?>
                </div>

                <div class = "b-collapse">
                    <?= $this->render('structure_item', ['model' => $model]); ?>
                    <div class = "b-collapse__item">
                        <a href = "#personal" class = "b-collapse__nav collapsed" data-toggle = "collapse" aria-controls = "personal">
                            <span class = "b-collapse__name"><?= Yii::t('app', 'PERS_NO_STRUCT') ?></span>
                            <ul class = "b-stats b-collapse__stats">
                                <li class = "b-stats__item">
                                    <span class = "b-stats__numbs"><?= count($persNoStruct) ?></span>
                                    <i class = "b-stats__icon b-stats__icon_man"></i>
                                </li>
                            </ul>
                        </a>
                        <div class = "b-collapse__tab collapse" id = "personal">
                            <div class = "b-collapse__inner">
                                <div class = "b-tabs">
                                    <div class = "b-tabs__content tab-content">
                                        <div class = "tab-pane fade in active" role = "tabpanel" id = "commerce-1">
                                            <div class = "row">
                                                <?php foreach ($persNoStruct as $item) { ?>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <div class="b-card__logo__block">
                                                            <img class = "b-card__logo" src = "<?= $item->user->imageName ?>" alt = "logo">
                                                        </div>
                                                        <div class = "b-card__name">
                                                            <?= Html::a($item->user->fullName, $item->user->profileLink) ?>
                                                        </div>
                                                        <div class = "b-card__post"><?= $item->company_post ?></div>
                                                        <div class = "b-card__footer">
                                                            <?php if(isset($item->user->phone) && ($item->user->phone != "")) { ?>
                                                            <a href = "tel:<?= $item->user->phone ?>" class = "b-card__phone"><?= $item->user->phone ?></a>
                                                            <?php } else { ?>
                                                            <a href="mailto:<?= $item->user->email ?>" class="b-card__email"><?= $item->user->email ?></a>
                                                            <?php } ?>
                                                            <button type="button" 
                                                                    class="button-small showModal" 
                                                                    data-url="<?= Url::toRoute([
                                                                        'company/addusertostruct',
                                                                        'user_id' => $item->user_id
                                                                    ]) ?>" 
                                                                    style="margin-top: 10px; margin-bottom: 10px;">
                                                                <?= Yii::t('app', 'STRUCT') ?>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- a href = "#" class = "b-tabs__link-more">
                                        <span class = "b-more b-more_icon-bottom">
                                            <span class = "b-more__text">Все сотрудники</span>
                                        </span>
                                    </a -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--end b-user -->



            <!--begin b-company-evaluation -->
            <div class = "b-company-evaluation b-block">
                <div class = "b-title">
                    <?= Yii::t('app', 'COMPANY_MARKS') ?>
                </div>

                <div class = "b-company-evaluation__container clearfix">
                    <?php foreach ($model->userMarksTo as $item) { ?>
                    <div class = "col-sm-6 col-xs-12 b-company-evaluation__item">
                        <div class = "b-text-rows">
                            <div class = "b-text-rows__aside-left b-company-evaluation__img">
                                <img src = "<?= $item->user->imageName ?>" alt = "img">
                            </div>
                            <div class = "b-text-rows__main b-company-evaluation__main">
                                <div class = "b-company-evaluation__name">
                                    <?= Html::a($item->user->fullName, $item->user->profileLink) ?>
                                </div>
                                <div class = "b-company-evaluation__post">
                                    <?= isseT($item->user->objUserCompany->company_post) ? $item->user->objUserCompany->company_post : "" ?></div>
                                <ul class = "b-company-evaluation__marks-list">
                                    <?php
                                    $allMarksName = $item->markNames;
                                    foreach ($item->descrArr as $key => $item) {
                                        if($item > 0) {
                                    ?>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name"><?= $allMarksName[$key] ?></span>
                                        <span class = "b-list__numbs"><?= $item ?></span>
                                    </li>
                                    <?php }} ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>


                <!-- div class = "b-company-evaluation__container">
                    <a href = "#" class = "b-company-evaluation__link-more">
                        <span class = "b-more b-more_icon-right">
                            <span class = "b-more__text">Все оценки</span>
                        </span>
                    </a>
                </div -->
            </div>
            <!--end b-company-trusted -->

        </div>
        <!--end b-content -->

        <!--begin b-sidebar -->
        <aside class="b-sidebar">

            <!--begin b-last-marks -->
            <div class="b-list-rating b-block">
                <div class="b-title"><?= Yii::t('app', 'RATING_PERS') ?></div>
                <div class="b-list-rating__container">
                    <?php foreach ($persInComp as $item) { ?>
                    <div class="b-list-rating__item">
                        <div class="b-text-rows">
                            <div class="b-text-rows__aside-left b-list-rating__logo">
                                <img src="<?= $item->user->imageName ?>" alt="">
                            </div>

                            <div class = "b-text-rows__main b-list-rating__main">
                                <div class = "b-list-rating__name">
                                    <?= Html::a(implode("<br/>", explode(" ", $item->user->fullName)), $item->user->profileLink) ?>
                                </div>
                                <div class = "b-list-rating__post"><?= $item->company_post ?></div>
                                <div class = "b-list-rating__stats" style="width: 168px;">
                                    <!-- ul class = "b-stats">
                                        <li class = "b-stats__item">
                                            <i class = "b-stats__icon b-stats__icon_users"></i>
                                            <span class = "b-stats__numbs"><?= 0 ?></span>
                                        </li>
                                        <li class = "b-stats__item">
                                            <i class = "b-stats__icon b-stats__icon_diagram"></i>
                                            <span class = "b-stats__numbs">2</span>
                                        </li>
                                        <li class = "b-stats__item">
                                            <i class = "b-stats__icon b-stats__icon_comments"></i>
                                            <span class = "b-stats__numbs">5</span>
                                        </li>
                                    </ul -->
                                </div>
                            </div>

                            <div class = "b-text-rows__aside-right b-list-rating__score">
                                <div class = "b-list-rating__label"><?= Yii::t('app', 'RATING') ?>:</div>
                                <div class = "b-list-rating__numbs"><?= $item->user->rating ?></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <!-- a href = "#" class = "b-list-rating__link-more">
                    <span class = "b-more b-more_icon-right">
                        <span class = "b-more__text">Весь рейтинг</span>
                    </span>
                </a -->
            </div>
            <!--end b-last-marks -->

        </aside>
        <!--end b-sidebar -->

    </div>
</div>
<?php
$this->registerJs("
        ");
?>

