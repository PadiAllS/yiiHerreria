<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id_cliente
 * @property string $nombre_cliente
 * @property string $tipoDoc_cliente
 * @property string $nroDoc_cliente
 * @property string $direccion_cliente
 * @property string $mail_cliente
 * @property string $tel_cliente
 *
 * @property Presupuesto[] $presupuestos
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_cliente', 'tipoDoc_cliente', 'nroDoc_cliente', 'mail_cliente', 'tel_cliente'], 'required'],
            [['nombre_cliente', 'mail_cliente', 'tel_cliente'], 'string', 'max' => 45],
            [['tipoDoc_cliente'], 'string', 'max' => 20],
            [['nroDoc_cliente'], 'string', 'max' => 10],
            [['direccion_cliente'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Id Cliente',
            'nombre_cliente' => 'Nombre Cliente',
            'tipoDoc_cliente' => 'Tipo Doc Cliente',
            'nroDoc_cliente' => 'Nro Doc Cliente',
            'direccion_cliente' => 'Direccion Cliente',
            'mail_cliente' => 'Mail Cliente',
            'tel_cliente' => 'Tel Cliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresupuestos()
    {
        return $this->hasMany(Presupuesto::className(), ['cliente_id' => 'id_cliente']);
    }
}
