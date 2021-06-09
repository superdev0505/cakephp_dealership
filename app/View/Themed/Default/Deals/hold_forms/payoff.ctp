<!--Sheet 1-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Sheet 1</title>
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
                <h1 class="main_heading">Dealer Payoff Worksheet</h1>
                <br/>
                <div class="heading">&#187; Owner Information</div>
                <table class="worksheet_table">
                    <tr>
                        <td colspan="6">
                            <div>OWNER NAME</div>
                            <div class="td_content"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div>STREET ADDRESS</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="1">CITY</td>
                        <td colspan="1">STATE</td>
                        <td colspan="1">ZIP</td>
                    </tr>
                </table>
                <br/>

                <div class="heading">&#187; Vehicle Information</div>
                <table class="worksheet_table">
                    <tr>
                        <td colspan="1">
                            <div>YEAR</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="1">
                            <div>MAKE</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="1">
                            <div>MODEL</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="3">
                            <div>VIN</div>
                            <div class="td_content"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div>TITLE STATE / TITLE #</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="3">
                            <div>TITLE STATE / TITLE #</div>
                            <div class="td_content" style="padding-top: 5px;">
                                <label for="paper">Paper</label>
                                <input type="checkbox" name="paper" id="paper"/>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <label for="paper">Electronic</label>
                                <input type="checkbox" name="electronic" id="electronic"/>
                            </div>
                        </td>
                    </tr>
                </table>
                <br/>

                <div class="heading">&#187; Lienholder Information</div>
                <table class="worksheet_table">
                    <tr>
                        <td colspan="6">
                            <div>LIENHOLDER NAME</div>
                            <div class="td_content"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div>CONTACT PERSON</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="3">
                            <div>TELEPHONE #</div>
                            <div class="td_content"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <div>ACCOUNT #</div>
                            <div class="td_content"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div>PAYOFF AMOUNT OWED</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="2">
                            <div>DATE QUOTED</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="2">
                            <div>QUOTED GOOD UNTIL DATE</div>
                            <div class="td_content"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <div>ADDRESS TO MAIL PAYOFF</div>
                            <div class="td_content"></div>
                        </td>
                    </tr>
                </table>
                <br/>

                <div class="heading">&#187; Mail To Lienholder</div>
                <div>
                    <div style="padding-left: 30px;">
                        &#8730;&nbsp;&nbsp; Copy of completed DRT-1 Form.<br/>
                        &#8730;&nbsp;&nbsp; Guaranteed funds (See definition of guaranteed funds on reverse side).<br/>
                        &#8730;&nbsp;&nbsp; Return express mail envelope: for paper title only if express mail service not provided by  the lienholder.<br/>
                        <br/>
                        <div>
                            <b>NOTE:</b>  If payoff is transmitted to the lienholder by EFT, the DRT-1 should be faxed to the lienhodler. In this circumstance, check with the individual lienholder for specific instructions.
                        </div>

                    </div>
                </div>
                <br/>

                <div class="heading">&#187; Mailing Method</div>
                <table class="worksheet_table">
                    <tr>
                        <td colspan="2">
                            <div>EXPRESS MAIL (FED EX, UPS, DHL etc.)</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="2">
                            <div>TRACKING #</div>
                            <div class="td_content"></div>
                        </td>
                        <td colspan="2">
                            <div>DATE MAILED</div>
                            <div class="td_content"></div>
                        </td>
                    </tr>
                </table>
                <div style="font-weight: bold;text-align: center;font-style: italic;">
                    Additional information on reverse side.
                </div>
                <br/>
                <br/><br/>
                <div style="font-weight: lighter;text-align: center;font-style: italic;">
                    Dealer Payoff Worksheet RMV 3.26.2007
                </div>              
            </div>
        </div>
    </body>
</html>
