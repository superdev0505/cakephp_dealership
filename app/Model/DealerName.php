<?php
class DealerName extends AppModel {
	
	public $useDbConfig  = 'maindb';		
	
	public $actsAs = array(
              'Upload.Upload' => array(
              /* 'coupon_image' => array(
               'thumbnailSizes' => array(
                    'view' => '200x200',
                ),
                'thumbnailMethod' => 'php', //GD library instead of imagick

               'extensions'=>array('gif', 'jpeg', 'png', 'jpg'),

				'pathMethod'=>array('random'=>'nn/nn/nn'),
				'thumbnailQuality' => '8'

            ),*/
			'dealer_logo' => array(
               'thumbnailSizes' => array(
                    'view' => '200x200',
                ),
                'thumbnailMethod' => 'php', //GD library instead of imagick

               'extensions'=>array('gif', 'jpeg', 'png', 'jpg'),

				'pathMethod'=>array('random'=>'nn/nn/nn'),
				'thumbnailQuality' => '8'

            )
        )
    );
	
}