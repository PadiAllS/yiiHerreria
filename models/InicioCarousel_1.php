<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inicio_carousel".
 *
 * @property int $id_inicio_carousel
 * @property string $titulo_carousel
 * @property string $parrafo_carousel
 * @property string $boton_carousel
 * @property string $url_boton_carousel
 */
class InicioCarousel extends UploadForm
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inicio_carousel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parrafo_carousel','image_path'], 'string'],
            [['titulo_carousel', 'url_boton_carousel'], 'string', 'max' => 255],
            [['boton_carousel'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_inicio_carousel' => 'Id Inicio Carousel',
            'titulo_carousel' => 'Titulo Carousel',
            'parrafo_carousel' => 'Parrafo Carousel',
            'boton_carousel' => 'Boton Carousel',
            'url_boton_carousel' => 'Url Boton Carousel',
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->image_path= 'img/inicio-carousel/' . $this->id_inicio_carousel . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($this->image_path);
            return true;
        } else {
            return false;
        }
    }
    
}
