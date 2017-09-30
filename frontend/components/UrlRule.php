<?php

namespace frontend\components;

use yii\web\UrlRuleInterface;
use yii\base\Object;
use yii\helpers\Json;
use frontend\models\User;
use frontend\models\Company;
use frontend\models\UrlRules;
use frontend\models\SeoUrl;
use frontend\models\Article;
use frontend\models\ArticleCategory;

class UrlRule extends Object implements UrlRuleInterface {

    public $urls;
    public $rules = Null;
    public $model;

    public function __construct($config = array()) {
        parent::__construct($config);
    }

    public function createUrl($manager, $route, $params) {
        $this->getUrls();
        $this->getRules();
        if (isset($this->urls[$route][Json::encode($params)])) {
            return $this->urls[$route][Json::encode($params)];
        } else {
            if (isset($this->rules[$route]['url'])) {
                $mSeoUrl = new SeoUrl();
                $out = $this->rules[$route]['url'];

                $routeArr = explode("/", $route);
                switch ($routeArr[0]) {
                    case 'users':
                        //if ($routeArr[1] == 'profile') {
                            $this->model = User::findOne($params['id']);
                        //}
                        break;
                    case 'company':
                        if (isset($params['id'])) {
                            $this->model = Company::findOne($params['id']);
                        }
                        break;
                    case 'article':
                        switch ($routeArr[1]) {
                            case 'cat-index':
                                if (isset($params['category'])) {
                                    $mSeoUrl = ArticleCategory::findOne($params['category']);
                                    $this->model->catName = "111";
                                }
                                break;
                            case 'view':
                                $this->model = Article::findOne($params['id']);
                                break;
                            default :
                                return false;
                                break;
                        }
                        break;
                    default :
                        return false;
                        break;
                }
                $mSeoUrl->route = $route;
                $mSeoUrl->params = Json::encode($params);
                unset($params['id']);

                if($this->rules[$route]['tag'] != "") {
                    $mSeoUrl->meta_tags = $this->getReplaceParams($this->rules[$route]['tag']);
                }
                
                if($this->rules[$route]['descr'] != "") {
                    $mSeoUrl->meta_descr = $this->getReplaceParams($this->rules[$route]['descr']);
                }

                $getQuery = count($params) > 0 ? "?" . http_build_query($params) : "";
                $mSeoUrl->link = mb_strtolower($this->_($this->getReplaceParams($out))) . $getQuery;

                if ($mSeoUrl->save()) {
                    return $mSeoUrl->link;
                }
            } else {
                
            }
        }
        return false;
    }

    public function getReplaceParams($out) {
        preg_match_all('|%(.+)%|isU', $out, $matches);

        foreach ($matches[1] as $key => $item) {
            isset($this->model->$item) ? $out = str_replace($matches[0][$key], $this->model->$item, $out) : NULL;
        }
        return $out;
    }

    public function parseRequest($manager, $request) {
        $pathInfo = $request->getPathInfo();
        $mSeoUrl = SeoUrl::findOne(['link' => $pathInfo]);
        if (isset($mSeoUrl->id)) {
            return [$mSeoUrl->route, Json::decode($mSeoUrl->params, true)];
        } else {
            
        }
        return false;
    }

    private function getUrls() {
        if (!isset($this->urls)) {
            $mSeoUrl = SeoUrl::find()->all();
            foreach ($mSeoUrl as $item) {
                $this->urls[$item->route][$item->params] = $item->link;
            }
        }
    }

    private function getRules() {
        if (!isset($this->rules)) {
            $mUrlRules = UrlRules::find()->all();
            foreach ($mUrlRules as $item) {
                $this->rules[$item->contr_act] = [
                    'url' => $item->rules,
                    'tag' => $item->meta_tag_rules,
                    'descr' => $item->meta_descr_rules
                ];
            }
        }
    }

    public function _($st) {
        $converter = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v',
            'г' => 'g', 'д' => 'd', 'е' => 'e',
            'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
            'и' => 'i', 'й' => 'y', 'к' => 'k',
            'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r',
            'с' => 's', 'т' => 't', 'у' => 'u',
            'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
            'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
            'А' => 'A', 'Б' => 'B', 'В' => 'V',
            'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
            'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
            'И' => 'I', 'Й' => 'Y', 'К' => 'K',
            'Л' => 'L', 'М' => 'M', 'Н' => 'N',
            'О' => 'O', 'П' => 'P', 'Р' => 'R',
            'С' => 'S', 'Т' => 'T', 'У' => 'U',
            'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
            'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
            'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
            ' ' => '-', '"' => ''
        );
        return strtr($st, $converter);
    }

}
