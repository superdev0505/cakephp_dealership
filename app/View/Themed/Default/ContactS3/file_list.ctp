<?php 
	function get_filename($fname){
		//$fname = "10341_549bf6a99ad79_photodune-1949987-male-portrait-s.jpg";
		$name1 = substr($fname, strpos($fname, "_")+1   );
		$filename = substr($name1, strpos($name1, "_")+1   );
		return $filename;
	}
	function file_size($size){
		return number_format($size/1024, 1, '.', '')."KB" ;
	}
	//debug($files);
?>



	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse' >
			<th>Name</th>
			<th>Size</th>
			<th style="width: 138px;" >Action</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($files as $file){ ?>
			<tr class="gradeA">
				<td><?php echo get_filename($file['Key']); ?></td>
				<td><?php echo file_size($file['Size']); ?></td>
				<td>
					<?php echo $this->Html->link("Download",
					 array('controller'=>'contact_s3', 'action'=> 'download_file',"?"=>array('filename'=> $file['Key'] )), array('class'=>"btn btn-primary btn-xs no-ajaxify")); ?>

					 <?php echo $this->Html->link("Delete",
					 array('controller'=>'contact_s3', 'action'=> 'delete_file',"?"=>array('contact_id'=> $contact_id ,'filename'=> $file['Key'] )), array('class'=>"btn btn-danger btn-xs no-ajaxify delete_s3_file")); ?>

				</td>
			</tr>
			<?php } ?>
		</tbody>
		<!-- // Table body END -->
	</table>


	<script type="text/javascript">
	$(function(){
		$(".delete_s3_file").click(function(event){
			event.preventDefault();

			if(confirm("Do you want to delete the file?")){
				var del_url = $(this).attr("href");

				$(this).attr("disabled", 'disabled');

				$.ajax({
					type: "GET",
					url: del_url,
					success: function(data){
						$("#s3_files_list").html(data);
					}
				});
				
			}


		});

	});


	</script>