<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $id_producto
 * @property int $categoria_id
 * @property string $codBarra_producto
 * @property string $nombre_producto
 * @property int $stock_producto
 * @property string $descripcion_producto
 * @property string $imagen_producto
 * @property double $precio_producto
 * @property double $precioM2_producto
 *
 * @property ItemPresupuesto[] $itemPresupuestos
 * @property Categoria $categoria
 */
class Producto extends UploadForm
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoria_id', 'nombre_producto', 'stock_producto', 'precio_producto', 'precioM2_producto'], 'required'],
            [['categoria_id', 'stock_producto'], 'integer'],
            [['precio_producto', 'precioM2_producto'], 'number'],
            [['codBarra_producto'], 'string', 'max' => 45],
            [['nombre_producto'], 'string', 'max' => 50],
            [['descripcion_producto'], 'string', 'max' => 250],
            [['imagen_producto'], 'string', 'max' => 450],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id' => 'id_categoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id Producto',
            'categoria_id' => 'Categoria ID',
            'codBarra_producto' => 'Cod Barra Producto',
            'nombre_producto' => 'Nombre Producto',
            'stock_producto' => 'Stock Producto',
            'descripcion_producto' => 'Descripcion Producto',
            'imagen_producto' => 'Imagen Producto',
            'precio_producto' => 'Precio Producto',
            'precioM2_producto' => 'Precio M2 Producto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemPresupuestos()
    {
        return $this->hasMany(ItemPresupuesto::className(), ['producto_id' => 'id_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id_categoria' => 'categoria_id']);
    }
    
    public function upload() {
        if ($this->validate()) {
            $this->imagen_producto = 'img/producto/' . md5(date('Ymd H:i:s:u')). '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($this->imagen_producto);
            return true;
        } else {
            return false;
        }
    }
}
