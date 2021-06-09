<br />
<br />
<br /><br />

<div class="widget widget-body-white widget-heading-simple">
		<div class="widget-body">
			<!-- Search result-->
			<div id="trim_search_result">
<br>
<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
    <thead class="success">
        <tr><th>#</th> <th>Name</th> <th>dealer</th> <th>ID</th> </tr>	</thead>
    <tbody>
        <tr>
            <td>111</td>
            <td>
                test data			
            </td>
            <td>Test Dealer</td>
            <td>8900</td>
                            
        </tr>
        <tr>
            <td>54</td>
            <td>
                test data		
            </td>
            <td>test data</td>
            <td>1225</td>
        </tr>
        <tr>
            <td>109</td>
            <td>
                    test data		
            </td>
            <td>DP360 CRM</td>
            <td>2501</td>
        </tr>
                    
    </tbody>
</table>

<!-- // Table END -->
<br>
<script>
$(function(){ 
	
	$(".lnk_edit_user" ).click(function(event){
		event.preventDefault();
		
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Edit User",
				});
			}
		});
		
	});
	

	$(".paging a" ).click(function(event){
		event.preventDefault();
		$("#ajaxOverlayLoader").show();
		$.ajax({
			url: $(this).attr('href'),
			type: "get",
			cache: false,
			success: function(results){ 
				$('#trim_search_result').html(results);
			}
		});
	});
	
	
	
});

</script>
</div>
			<!-- //Search result End-->
		</div>
	</div>