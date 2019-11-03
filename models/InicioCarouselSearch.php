<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InicioCarousel;

/**
 * InicioCarouselSearch represents the model behind the search form of `app\models\InicioCarousel`.
 */
class InicioCarouselSearch extends InicioCarousel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_inicio_carousel'], 'integer'],
            [['titulo_carousel', 'parrafo_carousel', 'boton_carousel', 'url_boton_carousel', 'image_path'], 'safe'],
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
        $query = InicioCarousel::find();

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
            'id_inicio_carousel' => $this->id_inicio_carousel,
        ]);

        $query->andFilterWhere(['like', 'titulo_carousel', $this->titulo_carousel])
            ->andFilterWhere(['like', 'parrafo_carousel', $this->parrafo_carousel])
            ->andFilterWhere(['like', 'boton_carousel', $this->boton_carousel])
            ->andFilterWhere(['like', 'url_boton_carousel', $this->url_boton_carousel])
            ->andFilterWhere(['like', 'image_path', $this->image_path]);

        return $dataProvider;
    }
}
