<?php

class DbPoolsController extends AppController {

    public $uses = array('Category');
    public $components = array('RequestHandler');

    public function beforeFilter() {
    }
   
    private function get_associate_tables($tablename){
        return $this->PoolTransferMap->find('all', ['conditions'=>['parenttable'=>$tablename]]);
    }

    private function pool_table_map( $tablename ){
        $this->loadModel("PoolTransferMap");
        $this->PoolTransferMap->useDbConfig = 'maindb';
        return $this->PoolTransferMap->find('first', ['conditions'=>['tablename'=>$tablename]]);
    }
    private function transfer_Status( $dealer_id, $tablename, $transfer_type, $pool_id){
        $this->loadModel("PoolTransferStatus");
        $this->PoolTransferStatus->useDbConfig = 'maindb';
        
        $conditions = ['tablename'=>$tablename, 'pool_id' => $pool_id];
        if($transfer_type == 'Dealer'){
            $conditions['dealer_id'] = $dealer_id;
        }
        return $this->PoolTransferStatus->find('first', ['conditions'=> $conditions ]);
    }

    private function set_transfer_status($dealer_id, $tablename, $last_id, $transfer_type, $pool_id){
        $this->loadModel("PoolTransferStatus");
        $this->PoolTransferStatus->useDbConfig = 'maindb';
        
        $conditions = ['tablename'=>$tablename,'pool_id' => $pool_id];
        if($transfer_type == 'Dealer'){
            $conditions['dealer_id'] = $dealer_id;
        }
        $t_status = $this->PoolTransferStatus->find('first', ['conditions'=>$conditions]);

        if(!empty($t_status)){
            $this->PoolTransferStatus->id = $t_status['PoolTransferStatus']['id'];
            $this->PoolTransferStatus->saveField('last_sync_id',$last_id);
        }else{
            $this->PoolTransferStatus->create();
            $save_data = ['last_sync_id'=>$last_id,'tablename'=>$tablename,'pool_id' => $pool_id];
            if($transfer_type == 'Dealer'){
                $save_data['dealer_id'] = $dealer_id;
            }
            $this->PoolTransferStatus->save(['PoolTransferStatus'=> $save_data]);
        }
        return true;
    }

    public function transfer() {
        $this->layout = 'admin_default';

        $this->loadModel("User");
        $dealer_ids = $this->User->find('all', array('order'=>"User.dealer ASC",'fields' => array('DISTINCT User.dealer_id', 'dealer')));
        $opt_dealer = array();
        foreach($dealer_ids as $dealer_id){
            $opt_dealer[ $dealer_id['User']['dealer_id'] ] =  $dealer_id['User']['dealer']." #".$dealer_id['User']['dealer_id'];
        }
        $this->set('opt_dealer', $opt_dealer);
        $this->loadModel("Pool");
    }

    public function process_transfer() {
        $this->layout = 'ajax';
        $this->loadModel('PoolTransferMap');
        $dealer_id = $this->request->query('dealer_id');

        $PoolTransferMaps = $this->PoolTransferMap->find('all', [
            'order'=>"PoolTransferMap.id asc", 
            'conditions' => [
                'PoolTransferMap.transfer_type is not null',
            ]
        ]);
        $parent_tables = [];
        $parent_table_map = [];
        $all_table_map = [];

        foreach($PoolTransferMaps as $PoolTransferMap){
            if( !empty($PoolTransferMap['PoolTransferMap']['parenttable']) ){
                $parent_table_map[ $PoolTransferMap['PoolTransferMap']['parenttable'] ][] = $PoolTransferMap['PoolTransferMap']['tablename'];
                $parent_tables[ $PoolTransferMap['PoolTransferMap']['parenttable'] ] = 1;
            }
            else if( empty($parent_tables[ $PoolTransferMap['PoolTransferMap']['tablename'] ]) ) {
                $all_table_map[] = $PoolTransferMap;
            }
        }
        $this->set('parent_table_map', $parent_table_map);
        $this->set('all_table_map', $all_table_map);
        $this->set('dealer_id', $dealer_id);

        // debug( $parent_table_map );
    }

    private function all_data_exists($pooldb, $tablename){
        $transfer_query = "SELECT COUNT(*) FROM {$dealer_pool['Pool']['db_name']}.{$tablename}";
        $this->PoolTransferMap->query($transfer_query);
    }

    public function transfer_table_data() {

        // sleep(1);

        $this->layout = 'ajax';
        $dealer_id = $this->request->query('dealer_id');
        $tablename = $this->request->query('tablename');
        $page = empty($this->request->query('page'))? 1 : (int)$this->request->query('page') ;

        App::uses('ConnectionManager', 'Model');
        $dataSource = ConnectionManager::getDataSource('maindb');
        $main_db_name = $dataSource->config['database'];
        // debug( $main_db_name );

        $this->loadModel('DealerPool');
        $this->DealerPool->useDbConfig = 'maindb';
        $dealer_pool = $this->DealerPool->find('first', ['conditions'=>['dealer_id' => $dealer_id ]]);
        // debug($dealer_pool);

        if(empty($dealer_pool) || $dealer_pool['Pool']['id'] == 1 ){
            $data['total_page'] = 0;
            $data['page'] = 1;
            $data['dealer_id'] = $dealer_id;
            $data['is_last'] = 'yes';
            $data['pool'] = 'Main db';
            $this->set("json", json_encode($data));
        }else{

            // $allcnt = $this->all_data_exists($dealer_pool['Pool']['db_name'], $tablename);
            // debug();

            //Table Details
            $pool_t_map = $this->pool_table_map( $tablename );
            // debug($pool_t_map);

            //Get Last Sync Id 
            $pool_t_status = $this->transfer_Status($dealer_id, $tablename, $pool_t_map['PoolTransferMap']['transfer_type'], $dealer_pool['Pool']['id']);
            // debug($pool_t_status);            

            $primary_key = (!empty($pool_t_map['PoolTransferMap']['primary_key_field']))? $pool_t_map['PoolTransferMap']['primary_key_field'] : 'id';

            $is_completed_cond = "";
            if(!empty($pool_t_status)){
                $is_completed_cond = " AND {$main_db_name}.{$tablename}.{$primary_key} > {$pool_t_status['PoolTransferStatus']['last_sync_id']} ";
            }

            if($pool_t_map['PoolTransferMap']['transfer_type'] == 'All'){
                $main_condition = "WHERE 1=1 {$is_completed_cond} ";
                $count_condition = "";
            }else{
                $main_condition = " WHERE {$main_db_name}.{$tablename}.{$pool_t_map['PoolTransferMap']['key_field']} = '$dealer_id' {$is_completed_cond} ";
                $count_condition = "WHERE {$main_db_name}.{$tablename}.{$pool_t_map['PoolTransferMap']['key_field']} = '$dealer_id'";
            }

            $total_row_count = $this->PoolTransferMap->query(" SELECT COUNT(*) AS count_row FROM {$main_db_name}.{$tablename} {$count_condition} ");
            $total_row_count = (int)$total_row_count['0']['0']['count_row'];

            // debug(" SELECT COUNT(*) AS count_row FROM {$main_db_name}.{$tablename} {$main_condition} ");
            $p_row_count = $this->PoolTransferMap->query(" SELECT COUNT(*) AS count_row FROM {$main_db_name}.{$tablename} {$main_condition} ");
            $p_row_count = $p_row_count['0']['0']['count_row'];

            $limit = 200;

            //transfer Main table
            $transfer_query = "INSERT INTO {$dealer_pool['Pool']['db_name']}.{$tablename}  SELECT * FROM {$main_db_name}.{$tablename} {$main_condition} order by {$primary_key} ASC LIMIT  {$limit}";
            $this->PoolTransferMap->query($transfer_query);

            //List of rows transferred 
            $rows_main_table = "SELECT {$primary_key} FROM {$tablename} {$main_condition} order by {$primary_key} ASC LIMIT {$limit}";
            $row_id_ar = $this->PoolTransferMap->query($rows_main_table);

            $rows_ids = [];
            foreach($row_id_ar as $row_id_a){
               $rows_ids[] = $row_id_a[$tablename][$primary_key];
            }
            if(!empty($rows_ids)){
                end($rows_ids);
                $last_id = $rows_ids [ key($rows_ids) ];
                $this->set_transfer_status($dealer_id, $tablename, $last_id, $pool_t_map['PoolTransferMap']['transfer_type'], $dealer_pool['Pool']['id']);

                //Transfer Associate table data
                $associate_tables = $this->get_associate_tables($tablename);
                if(!empty($associate_tables)){                
                    foreach($associate_tables as $associate_table){
                        // debug( $associate_table );
                        // debug( $rows_ids );
                        $rows_ids_text = implode(",", $rows_ids);
                        $transfer_asso_query = "INSERT INTO {$dealer_pool['Pool']['db_name']}.{$associate_table['PoolTransferMap']['tablename']}  SELECT * FROM {$main_db_name}.{$associate_table['PoolTransferMap']['tablename']} WHERE {$main_db_name}.{$associate_table['PoolTransferMap']['tablename']}.{$associate_table['PoolTransferMap']['key_field']} in ({$rows_ids_text})";
                        $this->PoolTransferMap->query($transfer_asso_query);
                    }
                }
            }
            $item_left = (($p_row_count - $limit) > 0) ? $p_row_count - $limit : 0 ;
            $item_done = $total_row_count - $item_left;
            $percentage =  ($total_row_count == 0)? 0 :  ceil( ($item_done/$total_row_count) * 100 );


            if($item_left == 0){
                $percentage = 100;
            }

            $data['total_row_count'] = $total_row_count;
            $data['item_left'] = $item_left;
            $data['dealer_id'] = $dealer_id;
            $data['percentage'] = $percentage;
            $data['is_last'] = ($item_left == 0 )? 'yes' : 'no';

            $this->set("json", json_encode($data));
        }


            
    }
    

}

?>
