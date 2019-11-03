<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Presupuesto;

/**
 * PresupuestoSearch represents the model behind the search form of `app\models\Presupuesto`.
 */
class PresupuestoSearch extends Presupuesto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_presupuesto', 'cliente_id'], 'integer'],
            [['fecha_presupuesto', 'status_presupuesto'], 'safe'],
            [['monto_presupuesto'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Presupuesto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_presupuesto' => $this->id_presupuesto,
            'cliente_id' => $this->cliente_id,
            'fecha_presupuesto' => $this->fecha_presupuesto,
            'monto_presupuesto' => $this->monto_presupuesto,
        ]);

        $query->andFilterWhere(['like', 'status_presupuesto', $this->status_presupuesto]);

        return $dataProvider;
    }
}
