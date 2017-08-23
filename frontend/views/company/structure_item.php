<?php foreach ($model->companyStruct as $item) { ?>
    <div class = "b-collapse__item">
        <a href = "#collapse<?= $item->id ?>" class = "b-collapse__nav collapsed" data-toggle = "collapse" aria-controls = "collapse<?= $item->id ?>">
            <span class = "b-collapse__name"><?= $item->name ?></span>
            <ul class = "b-stats b-collapse__stats">
                <li class = "b-stats__item">
                    <span class = "b-stats__numbs"><?= count($item->children) ?></span>
                    <i class = "b-stats__icon b-stats__icon_people"></i>
                </li>
                <li class = "b-stats__item">
                    <span class = "b-stats__numbs"><?= $item->countPersStruct ?></span>
                    <i class = "b-stats__icon b-stats__icon_man"></i>
                </li>
            </ul>
        </a>
        <div class = "b-collapse__tab collapse" id = "collapse<?= $item->id ?>">
            <div class = "b-collapse__inner">
                <div class = "b-tabs">
                    <div class = "b-tabs__nav clearfix">
                        <?php foreach ($item->children as $key => $child) { ?>
                            <div class = "col-lg-4 col-md-6">
                                <a href = "#order-<?= $child->id ?>" class = "b-tabs__link <?= $key == 0 ? "b-tabs__link_active" : "" ?>" aria-controls = "order-<?= $child->id ?>" role = "tab" data-toggle = "tab"><?= $child->name ?></a>
                            </div>
                        <?php } ?>
                    </div>

                    <div class = "b-tabs__content tab-content">
                        <?php foreach ($item->children as $child) { ?>
                            <div class = "tab-pane fade in active" role = "tabpanel" id = "order-<?= $child->id ?>">
                                <div class = "row">
                                    <?php foreach ($child->users as $user) { ?>
                                        <div class = "col-lg-3 col-sm-6">
                                            <div class = "b-card b-company-structure__cards">
                                                <div class="b-card__logo__block">
                                                    <img class = "b-card__logo" src = "<?= $user->imageName ?>" alt = "logo">
                                                </div>
                                                <div class = "b-card__name"><?= $user->fullName ?></div>
                                                <div class = "b-card__post"><?= $user->objUserCompany->company_post ?></div>
                                                <div class = "b-card__footer">
                                                    <?php if (isset($user->phone) && ($user->phone != "")) { ?>
                                                        <a href = "tel:<?= $user->phone ?>" class = "b-card__phone"><?= $user->phone ?></a>
                                                    <?php } else { ?>
                                                        <a href="mailto:<?= $user->email ?>" class="b-card__email"><?= $user->email ?></a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
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
<?php } ?>