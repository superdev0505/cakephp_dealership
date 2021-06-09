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



	<table class="dynamicTable tableTools table table-bordered" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<tbody>
			<?php 
			$total_file_size = 0;
			foreach($files as $file){ ?>
			<tr class="gradeA">
				<td><?php echo get_filename($file['Key']); ?></td>
				<td><?php
					$total_file_size += $file['Size'];
				 echo file_size($file['Size']); ?></td>
				<td>
					<input type="hidden" name="attachment_files[]" value="<?php echo $file['Key']; ?>" >
					 <?php echo $this->Html->link('<i class="fa fa-times"></i>',
					 array('controller'=>'contact_s3', 'action'=> 'delete_attachment_support',"?"=>array('message_key'=> $message_key, 'filename'=> $file['Key'] )), array('escape'=>false, 'class'=>"btn btn-danger btn-xs no-ajaxify delete_s3_attachment")); ?>

				</td>
			</tr>
			<?php } ?>
			<input type="hidden" value="<?php echo $total_file_size;  ?>" id="uploaded_total" >
		</tbody>
	</table>


	<script type="text/javascript">
	$(function(){


		
		// if( $(".delete_s3_attachment").length == 3 ){
		// 	$("#upload3").hide();
		// }else{
		// 	$("#upload3").show();
		// }
		<?php 
		if($total_file_size >= 15728640){ 
		?>
			$("#input_attachment").hide();
		<?php }else{ ?>
			$("#input_attachment").show();
		<?php } ?>


		$(".delete_s3_attachment").click(function(event){
			event.preventDefault();

			if(confirm("Do you want to delete the file?")){
				var del_url = $(this).attr("href");

				$(this).attr("disabled", 'disabled');

				$.ajax({
					type: "GET",
					url: del_url,
					success: function(data){
						$("#file_attachment_list").html(data);
					}
				});
				
			}


		});

	});


	</script>