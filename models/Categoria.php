<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $id_categoria
 * @property string $nombre_categoria
 * @property string $descripcion_categoria
 * @property int $condicion_categoria
 *
 * @property Producto[] $productos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_categoria'], 'required'],
            [['condicion_categoria'], 'integer'],
            [['nombre_categoria'], 'string', 'max' => 45],
            [['descripcion_categoria'], 'string', 'max' => 250],
            [['nombre_categoria'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_categoria' => 'Id Categoria',
            'nombre_categoria' => 'Nombre Categoria',
            'descripcion_categoria' => 'Descripcion Categoria',
            'condicion_categoria' => 'Condicion Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['categoria_id' => 'id_categoria']);
    }
}
