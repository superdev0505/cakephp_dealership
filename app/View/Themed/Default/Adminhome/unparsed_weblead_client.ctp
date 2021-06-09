<br />
<br />
<br /><br />

<div class="widget widget-body-white widget-heading-simple">
    <div class="widget-body">
        <!-- Search result-->
        <div id="trim_search_result">
            <br>
            <div id="report_data_container">
                <h4>Unparsed web-leads list(Client Specific INBOXES):</h4>
            </div>
            <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                <thead class="success">
                    <tr>
                        <th>ID</th>
                        <th>From</th>
                        <th>Date/Time</th>
                        <th>Subject</th>
                        <th>Body</th>
                        <th>Dealer ID</th>
                        
                    </tr>	
                </thead>
                <tbody>
                    <?php
                    foreach ($vals as $value) {

//              echo '<pre>';
//              print_r($activeVendors[$value['DealerName']['dealer_id']]);
                        ?>
                        <tr>
                            <td><?php
                    echo $value['Dp360crmLeadsCinbox']['id'];
                        ?></td>
                            <td><?php
                    echo $value['Dp360crmLeadsCinbox']['from'];
                        ?></td>
                             <td>
                            <?php
                            
                             echo $this->Time->format('d/m/Y H:i:s',$value['Dp360crmLeadsCinbox']['created']); 
                            ?>
                            </td>
                            <td><?php
                            echo $value['Dp360crmLeadsCinbox']['subject'];
                            ?></td>
                            <td>
                                <?php
                                echo $this->Text->truncate(strip_tags(htmlentities($value['Dp360crmLeadsCinbox']['body'])), 175, array('html' => true,
                                    'ellipsis' => '<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="lead_details no-ajaxify" id = "' . $value['Dp360crmLeadsCinbox']['id'] . '" >Read more</a>'));
                                ?>
                            </td>
                           <td><?php
                            echo $value['Dp360crmLeadsCinbox']['dealer_id'];
                            ?></td>
                        </tr>
                                <?php
                            }
                            ?>    

                </tbody>
            </table>

            <!-- // Table END -->
            <br>
        </div>
        <!-- //Search result End-->
    </div>
</div>


<script>
    $script.ready('bundle', function() {
        ///on click pop-up 
        $(".lead_details" ).click(function(event){
            //  alert( $(this).attr('id') );
            var id=$(this).attr('id');
            event.preventDefault();
            $.ajax({
                type: "GET",
                cache: false,
                url: "/Adminhome/leaddetailsclient/"+id,
                success: function(data){
                    bootbox.dialog({
                        message: data,
                        title: "Lead's Body."
                    }).find("div.modal-dialog").addClass("largeWidth");
                }
            });
            
        }); 
        
    });

</script>