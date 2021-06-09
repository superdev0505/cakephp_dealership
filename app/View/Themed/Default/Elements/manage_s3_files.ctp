<table cellspacing="0" cellpadding="0" border="0" style="font-size:12px;width:100%;" id="table-main" class="dynamicTable tableTools table table-bordered checkboxs">
	<tr>
		<th width="60px">Sr No.</td>
		<th width="560px">URL</td>
		<th width="150px">Image</td>
		<th>Copy URL</td>
	</tr>
		
	<!-- <tr> -->

		<?php
			// Get the contents of our bucket
			$PerRow = 3;
			$Counter = 1;
			foreach ($s3files as $file){
			
				$fname = $file['name'];
				$furl = "https://images-client.s3.amazonaws.com/".$fname;
				
			//	if($Counter>1 && ($Counter%$PerRow)==1){
				?>
				<!--	</tr>
					<tr> -->
				<?php
				// }
				?>
				<tr>
					<td><?php echo $Counter; ?></td>
					<td><?php echo $furl;?></td>
					<td>
						<a href="<?php echo $furl;?>" target="_blank" >
							<img src="<?php echo $furl;?>" width="100px" height="100px" /> 
						</a> 
					</td>
					<td>
						<button class="copybutton btn btn-primary" id="copybutton_<?php echo $Counter;?>" data-clipboard-text="<?php echo $furl;?>"  title="Click to copy the URL of your image.">Copy</button>
						<br>
						<br>
						&nbsp;&nbsp;&nbsp;<span id="span_copybutton_<?php echo $Counter;?>" style="background:#8bbf61"> </span>
					</td>
				</tr>
			<?php
				$Counter++;
			}
		?>
	<!-- </tr> -->
</table>

<script type="text/javascript">
$( document ).ready(function() {
	var client = new ZeroClipboard($(".copybutton"));
		client.on( "ready", function( readyEvent ) {
		  // alert( "ZeroClipboard SWF is ready!" );

		  client.on( "aftercopy", function( event ) {
			// `this` === `client`
			// `event.target` === the element that was clicked
			//event.target.style.display = "none";
			//alert(event.target.id);
			id = event.target.id;
			$(event.target).removeClass("btn-primary");
			$(event.target).addClass("btn-inverse");
			//$("#span_"+id).text("Copied");
		  } );
		} );
});

var client = new ZeroClipboard($(".copybutton"));
		client.on( "ready", function( readyEvent ) {
		  // alert( "ZeroClipboard SWF is ready!" );

		  client.on( "aftercopy", function( event ) {
			// `this` === `client`
			// `event.target` === the element that was clicked
			//event.target.style.display = "none";
			//alert(event.target.id);
			id = event.target.id;
			$(event.target).removeClass("btn-primary");
			$(event.target).addClass("btn-inverse");
			//$("#span_"+id).text("Copied");
		  } );
		} );
</script>