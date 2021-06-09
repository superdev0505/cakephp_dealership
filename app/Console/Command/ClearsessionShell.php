<?php 
class ClearsessionShell extends AppShell {
	
	public function remove() {
		$path = APP.'tmp'.DS.'sessions';
		$files = scandir($path);
		foreach($files as $file){
			if($file == '.' || $file == '..' || $file == '.svn'  ){
				continue;
			}else{
				debug($file);
				unlink($path.DS.$file);
			}
		}
	}
}

?>