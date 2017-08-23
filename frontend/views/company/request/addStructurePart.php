<div class ="b-collapse__item">
    <a href="#coll<?= $model->id ?>" class="b-collapse__nav collapsed" data-toggle="collapse" aria-controls="collapse<?= $model->id ?>">
        <span class="b-collapse__name"><?= $model->name ?></span>
    </a>
    <div class="b-collapse__tab collapse" id="coll<?= $model->id ?>" data-id="<?= $model->id ?>">
        <div class="b-collapse__inner">
            <div class="b-tabs">
                <div class="b-tabs__nav clearfix">
                    <div class="col-md-12" style="margin-bottom:20px;">
                        <div class="input-group">
                            <input type="text" class="form-control nameChildrenPart" placeholder="Название отдела">
                            <span class="input-group-btn">
                                <button class="btn button-small addChildrenPart" type="button">Добавить</button>
                            </span>
                            <span class="input-group-btn">
                                <button class="btn button-small removePart" type="button">Удалить</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>