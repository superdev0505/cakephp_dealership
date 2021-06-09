<?php

class Setting extends AppModel {
	

	 public $actsAs = array(
              'Upload.Upload' => array(
               'image' => array(
               'thumbnailSizes' => array(
                    'view' => '100x120',
                ),
                'thumbnailMethod' => 'php', //GD library instead of imagick

               'extensions'=>array('gif', 'jpeg', 'png', 'jpg'),

				'pathMethod'=>array('random'=>'nn/nn/nn'),
				'thumbnailQuality' => '8'

            )
        )
    );
    
}