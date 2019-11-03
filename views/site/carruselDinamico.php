<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">

                    <div class="carousel slide" id="carousel-892593">
                        <ol class="carousel-indicators">
                            <?php
                            foreach ($carousels as $key => $carousel):
                                ?>
                                <li data-slide-to="<?= $key ?>" data-target="#carousel-892593" class="<?= $key == 0 ? "active" : "" ?>">
                                </li>
                            <?php endforeach; ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php
                            foreach ($carousels as $j => $carousel):
                                ?>
                                <div class="carousel-item <?= $j == 0 ? "active" : "" ?>">
                                    <div class="escimar-overlay"></div>
                                    <img class="d-block w-80" alt=" <?= $carousel->titulo_carousel ?>" src="<?= Yii::getAlias("@web/$carousel->image_path") ?>">
                                    <div class="carousel-caption">
                                        <div class="">

                                            <h2>
                                                <?= $carousel->parrafo_carousel ?>
                                            </h2>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div> 
                        <a class="carousel-control-prev" href="#carousel-892593" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span> 
                            <span class="sr-only">Previous</span>
                        </a> 
                        <a class="carousel-control-next" href="#carousel-892593" data-slide="next">
                            <span class="carousel-control-next-icon"></span> 
                            <span class="sr-only">Next</span>
                        </a>
                    </div>  
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
    </div>
</div>   
