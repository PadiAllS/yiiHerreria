<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "presupuesto".
 *
 * @property int $id_presupuesto
 * @property int $cliente_id
 * @property string $fecha_presupuesto
 * @property string $monto_presupuesto
 * @property string $status_presupuesto
 *
 * @property ItemPresupuesto[] $itemPresupuestos
 * @property Cliente $cliente
 */
class Presupuesto extends \yii\db\ActiveRecord
{
    const PENDIENTE = 0;
    const CONFIRMADO = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presupuesto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['cliente_id', 'monto_presupuesto'], 'required'],
            [['cliente_id','status_presupuesto'], 'integer'],
            [['fecha_presupuesto'], 'safe'],
            [['monto_presupuesto'], 'number'],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente_id' => 'id_cliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_presupuesto' => 'Id Presupuesto',
            'cliente_id' => 'Cliente ID',
            'fecha_presupuesto' => 'Fecha Presupuesto',
            'monto_presupuesto' => 'Monto Presupuesto',
            'status_presupuesto' => 'Status Presupuesto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemPresupuestos()
    {
        return $this->hasMany(ItemPresupuesto::className(), ['presupuesto_id' => 'id_presupuesto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id_cliente' => 'cliente_id']);
    }
    
    public function getTotal()
    {
        $total =0;
        foreach ($this->itemPresupuestos as $item)
        {
            $total = $total + $item->getMonto();
           
        }
        return $total;
    }
}
