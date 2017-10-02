<?php

namespace frontend\controllers;


use Yii;
use frontend\components\Controller;
use frontend\models\StaticPages;
use yii\web\NotFoundHttpException;
use frontend\models\ContactForm;


class StaticPagesController extends Controller
{


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex($page)
    {
        $model = $this->findModel($page);
        return $this->render('index', [
                'model' => $model,
        ]);
    }


    public function actionAboutus()
    {
        return $this->render('index', ['model' => $this->findModel('aboutus')]);
    }


    public function actionBalance()
    {
        return $this->render('index', ['model' => $this->findModel('balance')]);
    }


    public function actionHelp()
    {
        $mHelp = new \frontend\models\HelpForm();

        if (\Yii::$app->user->id !== NULL) {
            $mUser = \Yii::$app->user->identity;
            $mHelp->email = $mUser->email;
            $mHelp->name = $mUser->fullName;
        }

        if ($mHelp->load(Yii::$app->request->post()) && $mHelp->validate()) {
            if ($mHelp->sendEmail(Yii::$app->params['adminEmail'])) {
                \Yii::$app->notification->set('global', \Yii::t('app', 'HELP_FORM_SEND_MESSAGE'));
            } else {
                //Yii::$app->session->setFlash('error', \Yii::t('app', 'THERE_WAS_ERROR_SENDING_EMAIL'));
            }
            return $this->refresh();
        } else {
            return $this->render('help', [
                    'model' => $this->findModel('help'),
                    'mHelp' => $mHelp,
            ]);
        }
    }


    public function actionContacts()
    {
        $formModel = new ContactForm();

        if (!Yii::$app->user->isGuest) {
            $user = \Yii::$app->user->identity;
            $formModel->email = $user->email;
            $formModel->name = $user->fullName;
        }

        if ($formModel->load(Yii::$app->request->post()) && $formModel->validate()) {
            $formModel->sendEmail(Yii::$app->params['adminEmail']);
            \Yii::$app->notification->set('global', \Yii::t('app', 'CONTACT_FORM_SEND_MESSAGE'));
            return $this->refresh();
        }

        return $this->render('contact-us', ['model' => $this->findModel('contacts'), 'formModel' => $formModel]);
    }


    public function actionLegalinfo()
    {
        return $this->render('index', ['model' => $this->findModel('legalinfo')]);
    }


    protected function findModel($alias)
    {
        $model = StaticPages::find()
            ->where([
                'alias' => $alias,
                'published' => StaticPages::PUBLISHED_YES,
                'locale' => Yii::$app->language
            ])
            ->one();
        if ($model !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'REQUESTED_PAGE_WAS_NOT_FOUND'));
    }
}
