<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "itemPresupuesto".
 *
 * @property int $id_itemPresu
 * @property int $presupuesto_id
 * @property int $producto_id
 * @property int $alto_itemPresu
 * @property int $ancho_itemPresu
 * @property string $precio_itemPresu
 * @property int $cantidad_itemPresu
 *
 * @property Presupuesto $presupuesto
 * @property Producto $producto
 */
class ItemPresupuesto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'itemPresupuesto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['presupuesto_id', 'producto_id', 'alto_itemPresu', 'ancho_itemPresu', 'precio_itemPresu', 'cantidad_itemPresu'], 'required'],
            [['presupuesto_id', 'producto_id', 'alto_itemPresu', 'ancho_itemPresu', 'cantidad_itemPresu'], 'integer'],
            [['precio_itemPresu'], 'number'],
            [['presupuesto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Presupuesto::className(), 'targetAttribute' => ['presupuesto_id' => 'id_presupuesto']],
            [['producto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['producto_id' => 'id_producto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_itemPresu' => 'Id Item Presu',
            'presupuesto_id' => 'Presupuesto ID',
            'producto_id' => 'Producto ID',
            'alto_itemPresu' => 'Alto Item Presu',
            'ancho_itemPresu' => 'Ancho Item Presu',
            'precio_itemPresu' => 'Precio Item Presu',
            'cantidad_itemPresu' => 'Cantidad Item Presu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresupuesto()
    {
        return $this->hasOne(Presupuesto::className(), ['id_presupuesto' => 'presupuesto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id_producto' => 'producto_id']);
    }
    
    public function getMonto(){
        $this->precio_itemPresu = (($this->alto_itemPresu * $this->ancho_itemPresu)/1000)* $this->producto->precioM2_producto;
        return $this->precio_itemPresu;
    }
}
