<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cliente;

/**
 * ClienteSearch represents the model behind the search form of `app\models\Cliente`.
 */
class ClienteSearch extends Cliente
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente'], 'integer'],
            [['nombre_cliente', 'tipoDoc_cliente', 'nroDoc_cliente', 'direccion_cliente', 'mail_cliente', 'tel_cliente'], 'safe'],
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
        $query = Cliente::find();

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
            'id_cliente' => $this->id_cliente,
        ]);

        $query->andFilterWhere(['like', 'nombre_cliente', $this->nombre_cliente])
            ->andFilterWhere(['like', 'tipoDoc_cliente', $this->tipoDoc_cliente])
            ->andFilterWhere(['like', 'nroDoc_cliente', $this->nroDoc_cliente])
            ->andFilterWhere(['like', 'direccion_cliente', $this->direccion_cliente])
            ->andFilterWhere(['like', 'mail_cliente', $this->mail_cliente])
            ->andFilterWhere(['like', 'tel_cliente', $this->tel_cliente]);

        return $dataProvider;
    }
}
