<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */

?>
<div class="profile-view">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Профиль пользователя
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= Url::to(['site/index']); ?>"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li class="active">Профиль пользователя</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?= $model->image/* ../../dist/img/user4-128x128.jpg */ ?>" alt="User profile picture">

                        <h3 class="profile-username text-center"><?= $model->first_name.' '.$model->last_name; ?></h3>

                        <p class="text-muted text-center">Профессия: <?php
                            if(!empty($model->userProfession))
                            {
                                foreach($model->userProfession as $row)
                                {
                                    echo ' '.$row['title'].'';
                                    break;
                                }
                            } else echo 'Не указано';
                            ?></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Рейтинг</b> <a class="pull-right"> <?php
                                    if(!empty($model->rating))
                                        echo $model->rating;
                                    else
                                        echo 'Не задано';
                                    ?>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Доверенные пользователи</b> <a class="pull-right">15</a>
                            </li>
                            <li class="list-group-item">
                                <b>Количество просмотров профиля</b> <a class="pull-right">
                                    <?php
                                    if(!empty($model->profileviews))
                                        echo $model->profileviews;
                                    else
                                        echo 'Кол-во не указано';
                                    ?>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Followers</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Последняя авторизация</b> <a class="pull-right">
                                    <?php
                                    if(!empty($model->last_login))
                                        echo $model->last_login;
                                    else
                                        echo 'Дата не указано';
                                    ?>
                                </a>
                            </li>

                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Обо мне</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Имя компании</strong>
                        <p class="text-muted">
                            <?php
                            if(!empty($model->company_name))
                                echo $model->company_name;
                            else
                                echo 'Компания не указана';
                            ?>
                        </p>
                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Должность в компании</strong>
                        <p class="text-muted">
                            <?php
                            if(!empty($model->company_post))
                                echo $model->company_post;
                            else
                                echo 'Должность не указана';
                            ?>
                        </p>
                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Местоположение</strong>
                        <p class="text-muted">
                            <?php
                                if(!empty($model->city->name))
                                    echo $model->city->name;
                                else
                                    echo 'Город не задан';
                                echo ', ';
                                if(!empty($model->city->country->name))
                                    echo $model->city->country->name;
                                else
                                    echo 'Страна не задана';
                            ?>
                        </p>
                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Направления (профессии)</strong>
                        <p>
                        <?php
                            if(!empty($model->userProfession))
                            {
                                foreach($model->userProfession as $row)
                                {
                                    echo "<span class=\"label label-success\">".$row['title']."</span><br>"; // label-danger label-info label-warning label-primary
                                }
                            }
                        ?>
                        </p>
                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> E-mail</strong>
                        <p class="text-muted">
                            <?php
                            if(!empty($model->email))
                                echo $model->email;
                            else
                                echo 'Почта не указана';
                            ?>
                        </p>
                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Сайт</strong>
                        <p class="text-muted">
                            <?php
                            if(!empty($model->site))
                                echo $model->site;
                            else
                                echo 'Сайт не указан';
                            ?>
                        </p>
                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Имя пользователя</strong>
                        <p class="text-muted">
                            <?php
                            if(!empty($model->username))
                                echo $model->username;
                            else
                                echo 'Имя пользователя не указано';
                            ?>
                        </p>
                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Дата рождения</strong>
                        <p class="text-muted">
                            <?php
                            if(!empty($model->birthdate))
                                echo $model->birthdate;
                            else
                                echo 'Дата рождения не указана';
                            ?>
                        </p>
                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Пол</strong>
                        <p class="text-muted">
                            <?php
                            if(!empty($model->gender))
                                echo $model->gender;
                            else
                                echo 'Пол не указан';
                            ?>
                        </p>
                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Телефон</strong>
                        <p class="text-muted">
                            <?php
                            if(!empty($model->phone))
                                echo $model->phone;
                            else
                                echo 'Телефон не указан';
                            ?>
                        </p>
                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Заметки</strong>

                        <p><?= $model->about; ?></p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->


</div>
