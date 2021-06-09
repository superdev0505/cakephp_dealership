<?php
class Project extends AppModel {
	/*public $belongsTo = 'User';

	public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Title required'
            )
        ),
        'description' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Description required'
            )
        ),
		'sevarity' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please select evarity'
            )
        )
		
		     
    );*/
    public $belongsTo = 'Developer';
     public $hasMany = array(
        'Note' => array(
            'className' => 'Note'
        ),
         'DevteamDaily' => array(
            'className' => 'DevteamDaily'
        ),
         'ProjectFile' => array(
            'className' => 'ProjectFile'
        )
    );
    
}