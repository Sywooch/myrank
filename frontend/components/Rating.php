<?php

namespace frontend\components;

use yii\base\Component;
use frontend\models\Testimonials;
use frontend\models\UserTrustees;

class Rating extends Component {

    // Граница отрицательной оценки
    const RATE_BORDER = 4.9;
    // Коэфициент веса количества доверенных лиц
    const TRUST_COUNT_CONST = 1;
    // Количество рейтинга за заполненное поле
    const USER_FIELD_SUMM = 20;
    // Количество рейтинга довереного лица
    const USER_TRUST_SUMM_NO_BACK = 1;
    const USER_TRUST_SUMM_BACK = 10;
    const MAIN_PARENT = 0;
    const TRUST_BACK_COUNT = 2;

    private $model;
    private $rating = 0;

    public function process($model) {
        $this->model = $model;

        $this->processMark();
        $this->processTestimonials();
        $this->trustCount();
        $this->userInfo();

        $model->rating = $this->rating;
        $model->save();
        
        return $this->rating;
    }

    private function processMark() {
        $plus = $minus = 0;
        $model = $this->model->getUserMarkRatingTo()->select(['mark_val'])->asArray()->all();
        foreach ($model as $item) {
            $item['mark_val'] > self::RATE_BORDER ? $plus++ : $minus++;
        }
        $n = $plus + $minus;
        if ($n != 0) {
            $z = 1.64485;
            $phat = $plus / $n;
            $res = ($phat + $z * $z / (2 * $n) - $z * sqrt(($phat * (1 - $phat) + $z * $z / (4 * $n)) / $n)) / (1 + $z * $z / $n);
            $this->rating = (int) ($res * 1000);
        }
    }

    private function processTestimonials() {
        if (isset($this->model->testimonialsFrom)) {
            $model = $this->model->getTestimonialsFrom()->andWhere(['parent_id' => self::MAIN_PARENT])->groupBy("from_id")->asArray()->all();
            foreach ($model as $item) {
                $summ = $this->trustBackUser($item) ? self::USER_TRUST_SUMM_BACK : self::USER_TRUST_SUMM_NO_BACK;
                if ($item['smile'] <= Testimonials::SMILE_CLASS_NEGATIVE) {
                    $this->rating -= $summ;
                } else {
                    $this->rating += $summ;
                }
            }
        }
    }

    private function trustBackUser($item) {
        $model = UserTrustees::find()
                ->where(['from_id' => $item['from_id'], 'to_id' => $item['to_id']])
                ->orWhere(['from_id' => $item['to_id'], 'to_id' => $item['from_id']])
                ->count();
        return $model == self::TRUST_BACK_COUNT;
    }

    private function trustCount() {
        $this->rating += $this->model->getUserTrusteesTo()->count() * self::TRUST_COUNT_CONST;
    }

    private function userInfo() {
        if ($this->model->isCompany) {
            $this->rating += 40;
            ($this->model->count_persons == 0) ?: $this->rating += self::USER_FIELD_SUMM;
            ($this->model->cash == 0) ?: $this->rating += self::USER_FIELD_SUMM;
            ($this->model->director == "") ?: $this->rating += self::USER_FIELD_SUMM;
        }
    }

}
