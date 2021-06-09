<!--Sheet 1-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Sheet 3</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
        <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <style>
            .worksheet_table{
                width: 100%;
                border:1px solid #bcbccb;
            }
            .worksheet_table td{
                padding: 5px;
                border: 1px solid #bcbccb;
                vertical-align: top;
            }

            .heading{
                font-weight: bold;
                padding: 5px;
                border-bottom: 1px solid #000;
                margin-bottom: 8px;
            }
            .td_content{
                height: 30px;
            }
            label{
                font-weight: normal;
            }
            .chechmark{
                font-weight: bold;
                margin-left: 10px;
            }
            .container{
                border: 4px solid #000; 
                padding: 2px;
            }

            .main_heading{
                text-align: center;
                font-weight: bolder;
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div style="border: 1px solid #000;padding: 10px;">
                <h1 class="main_heading">Vehicle Bill of Sale</h1>
                <br/>
                <p>
                    For the Exact Sales Amount indicated below, I the seller do hereby sell and transfer ownership of the Vehicle described below to the Buyer, acknowledge full  receipt of payment, certify that I have the authority to sell it, warrant the Vehicle to be free of any liens or encumbrances and certify that all information given is true and correct to the best of my knowledge. 
                </p>
                <div class="heading">&#187; Vehicle Information</div>
                <table class="worksheet_table">
                    <tr>
                        <td colspan="2">
                            <div>VEHICLE IDENTIFICATION NUMBER (VIN#)</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="2">
                            <div>ENGINE NUMEBR (Mappable)</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="2">
                            <div>LICENSE PLATE #</div>
                            <div class="td_content"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <div>YEAR</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="1">
                            <div>MAKE</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="2">
                            <div>MODEL</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="2">
                            <div>BODY STYLE(2 Dr, 4 Dr etc.)</div>
                            <div class="td_content"></div>
                        </td>                       
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div>ODOMETER READING(Mlle#)</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="2">
                            <div>SALE DATE</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="2">
                            <div>EXACT SALES AMOUNT</div>
                            <div class="td_content" style="margin-top: 8px;">
                                $ <span style="float: right;font-weight: 
                                        bold;"> (USD)</span>
                            </div>
                        </td>
                    </tr>
                </table>
                <br/>

                <div class="heading">&#187; Condition and Warranty</div>
                <div>
                    The seller has no knowledge of any hidden defects in and to the Vehicle, and believes to the best of the Seller's knowledge that the vehicle is being sold in good operating condition "AS-IS", meaning that there is no warranty for any defects and that all repairs are the responsibility of the Buyer.<br/><br/>

                    Seller allows the Buyer _________ days to have the Vehicle inspected by an independent mechanic, and agrees to cancel the sale if the inspection is unsatisfactory to the Buyer.   
                </div>
                <br/><br/>

                <div class="heading">&#187; Odometer Discloser Statement</div>
                <div>
                    Federal and state law requires the Seller of the Vehicle to state the odometer mileage upon the transfer of ownership. Failure to complete or a false statement may result in fines and/or imprisonment.<br/><br/>

                    I the Seller hereby certify to the best of my knowledge that the ODOMETER READING listed under the Vehicle information above was not altered, set back, or disconnected while in the Seller's possession, and the Seller has no knowledge of any doing so, and is(check on of the following):<br/>
                    <br/>
                    <input type="checkbox" name="actual_mileage" id="actual_mileage"/>
                    <label for="actual_mileage">THE ACTUAL MILEAGE</label><br/>
                    <input type="checkbox" name="excess" id="excess"/>
                    <label for="excess">MILEAGE IN EXCESS OF MECHANICAL LIMITS</label><br/>
                    <input type="checkbox" name="not_actual" id="not_actual"/>
                    <label for="not_actual">NOT THE ACTUAL MILEAGE. WARNING! ODOMETER DISCREPANCY</label><br/>
                </div>
                <br/>
                <table class="worksheet_table">
                    <tr>
                        <td colspan="3">
                            <div>SELLER'S SIGNATURE</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="2">
                            <div>SELLER'S PRINTED NAME</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="1">
                            <div>DATE</div>
                            <div class="td_content"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div>SELLER'S ADDRESS</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="1">
                            <div>CITY</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="1">
                            <div>STATE</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="1">
                            <div>ZIP</div>
                            <div class="td_content"></div>
                        </td>
                    </tr>
                </table>
                <br/>
                <table class="worksheet_table">
                    <tr>
                        <td colspan="3">
                            <div>BUYER'S SIGNATURE</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="2">
                            <div>BUYER'S PRINTED NAME</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="1">
                            <div>DATE</div>
                            <div class="td_content"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div>BUYER'S ADDRESS</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="1">
                            <div>CITY</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="1">
                            <div>STATE</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="1">
                            <div>ZIP</div>
                            <div class="td_content"></div>
                        </td>
                    </tr>
                </table>
                <br/>

                <div>
                    SWORN TO AND SUBSCRIBED BEFORE ME, this the _________ day of ____________, 20_______. 
                </div>
                <br/><br/><br/>
                <div style="text-align: right;">
                    ___________________________________<br/>
                    NOTARY PUBLIC
                </div>
                <br/>
            </div>
        </div>
    </body>
</html>
