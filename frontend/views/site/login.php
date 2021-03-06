<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use frontend\models\User;

$this->title = \Yii::t('app','LOGIN');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="b-modal">
    <?php
    $form = ActiveForm::begin([
		'options' => ['id' => 'LoginForm']
    ]);
    ?>
    <div class="b-modal__header"><?= \Yii::t('app','AUTHORIZATION'); ?></div>
    <div class="b-modal__content">
	<div class="row">
	    <div class="col-xs-12">
		<span>* Email:</span>
		<?= $form->field($model, 'username')->textInput(['class' => 'input-text', 'placeholder' => 'example@domain.name'])->label(FALSE); ?>
	    </div>
	</div>
	<div class="row">
	    <div class="col-xs-12">
		<span>* <?= \Yii::t('app','PASSWORD'); ?>:</span>
		<?= $form->field($model, 'password')->passwordInput(['class' => 'input-text', 'placeholder' => ''])->label(FALSE); ?>
	    </div>
	</div>
	<div class="row">
	    <div class="col-xs-12">
		<?= $form->field($model, 'rememberMe')->checkbox([]); ?>
	    </div>
	</div>
	<div class="row">
	    <div class="col-xs-12 col-sm-12" id="LoginFormError" style="display: none; color:red;"></div>
	</div>
	<div class="b-modal__content__buttons">
	    <div class="b-modal__content__buttons__item">
		<a id="loginSave" class="button-small" href="#"><?= \Yii::t('app','ENTER'); ?></a>
	    </div>
	    <div class="b-modal__content__buttons__item">
		<span><a id="registered" href="#"><?= \Yii::t('app','REGISTER'); ?></a></span>
	    </div>
	    <div class="b-modal__content__buttons__item">
		<span><a id="rememberPass" href="#"><?= Yii::t('app', 'REMEMBER_PASSWORD') ?></a></span>
	    </div>
	</div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<script type="text/javascript">
    var csrf = "<?= Yii::$app->request->getCsrfToken(); ?>";
    $("#loginSave").on('click', function () {
	url = "<?= Url::toRoute("site/loginval") ?>";
	$.ajax({
	    url: url,
	    method: 'POST',
	    dataType: 'json',
	    data: $("#LoginForm").serialize(),
	    success: function (out) {
		if (out.code == 1) {
                    location.reload();
		} else {
		    view = "";
		    $.each(out.errors, function (i, val) {
			view += val[0] + "<br/>";
		    });
		    $("#LoginFormError").html(view).show("slow");
		    //alert('<?= \Yii::t('app','INCORRECT_LOGIN_OR_PASSWORD'); ?>');
		}
	    }
	});
	return false;
    });

    $("#registered").on('click', function () {
	url = '<?= Url::toRoute(['registration/step1', 'type' => User::TYPE_USER_USER]) ?>';
	showModal(url, 0, 0);
	return false;
    });
    
    $("#rememberPass").on('click', function() {
	url = '<?= Url::toRoute(['site/requestpasswordreset']) ?>';
	showModal(url, 0, 0);
	return false;
    });
</script>