<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ItemPresupuesto;

/**
 * ItempresupuestoSearch represents the model behind the search form of `app\models\ItemPresupuesto`.
 */
class ItempresupuestoSearch extends ItemPresupuesto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_itemPresu', 'presupuesto_id', 'producto_id', 'alto_itemPresu', 'ancho_itemPresu', 'cantidad_itemPresu'], 'integer'],
            [['precio_itemPresu'], 'number'],
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
        $query = ItemPresupuesto::find();

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
            'id_itemPresu' => $this->id_itemPresu,
            'presupuesto_id' => $this->presupuesto_id,
            'producto_id' => $this->producto_id,
            'alto_itemPresu' => $this->alto_itemPresu,
            'ancho_itemPresu' => $this->ancho_itemPresu,
            'precio_itemPresu' => $this->precio_itemPresu,
            'cantidad_itemPresu' => $this->cantidad_itemPresu,
        ]);

        return $dataProvider;
    }
}
