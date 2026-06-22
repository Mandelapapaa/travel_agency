<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Package;

/**
 * PackageSearch represents the model behind the search form of `app\models\Package`.
 */
class PackageSearch extends Package
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['package_name', 'destination', 'duration', 'description'], 'safe'],
            [['price'], 'number'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params, $formName = null)
    {
        $query = Package::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'package_name', $this->package_name])
            ->andFilterWhere(['like', 'destination', $this->destination])
            ->andFilterWhere(['like', 'duration', $this->duration])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}