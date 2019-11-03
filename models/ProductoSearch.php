<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producto;

/**
 * ProductoSearch represents the model behind the search form of `app\models\Producto`.
 */
class ProductoSearch extends Producto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_producto', 'categoria_id', 'stock_producto'], 'integer'],
            [['codBarra_producto', 'nombre_producto', 'descripcion_producto', 'imagen_producto'], 'safe'],
            [['precio_producto', 'precioM2_producto'], 'number'],
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
        $query = Producto::find();

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
            'id_producto' => $this->id_producto,
            'categoria_id' => $this->categoria_id,
            'stock_producto' => $this->stock_producto,
            'precio_producto' => $this->precio_producto,
            'precioM2_producto' => $this->precioM2_producto,
        ]);

        $query->andFilterWhere(['like', 'codBarra_producto', $this->codBarra_producto])
            ->andFilterWhere(['like', 'nombre_producto', $this->nombre_producto])
            ->andFilterWhere(['like', 'descripcion_producto', $this->descripcion_producto])
            ->andFilterWhere(['like', 'imagen_producto', $this->imagen_producto]);

        return $dataProvider;
    }
}
