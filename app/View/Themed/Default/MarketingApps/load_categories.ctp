<?php
echo $this->Form->input('template_category', array( 'type' => 'select', 'options' => $categories, 'empty' => 'Select', 'label'=>false, 'div'=>false, 'class' => 'form-control selectpicker catList', 'style'=>'width: 100%' ));
?>