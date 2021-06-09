
<?php
$adf ='
<?ADF VERSION="1.0"?> 
<adf> 
<prospect> 
<requestdate>2014-04-07T4:35:52 PM</requestdate> 
<customer> 
<contact> 
<name part="first">test</name> 
<name part="last">test</name> 
<phone type="voice" time="day"></phone> 
<phone type="voice" time="evening">8002885917</phone> 
<phone type="cellphone" >8008675309</phone> 
<email>test@dealerspike.com</email> 
</contact> 
<comments><![CDATA[This is a Dealerspike Test]]></comments> 
</customer> 
<vehicle> 
<year>2013</year> 
<make>EverGreen®</make> 
<model>i-Go G256BH</model> 
<stock>43698A</stock> 
<vin>5ZWTGKE29D1003396</vin> 
<option> 
<optionname>Trade In Year</optionname> 
<manufacturecode>2014</manufacturecode> 
</option> 
<option> 
<optionname>Current Make</optionname> 
<manufacturecode>Test</manufacturecode> 
</option> 
<option> 
<optionname>Current Model</optionname> 
<manufacturecode>Test</manufacturecode> 
</option> 
<option> 
<optionname>Current Mileage</optionname> 
<manufacturecode>123456789</manufacturecode> 
</option> 
</vehicle> 
<vendor> 
<vendorname>Uhlmann RV</vendorname> 
<contact> 
<phone>888.455.9665</phone> 
<address> 
<street line="1">1001 SW Interstate Ave</street> 
<city>Chehalis</city> 
<regioncode>WA</regioncode> 
<postalcode>98532</postalcode> 
<country>US</country> 
</address> 
</contact> 
</vendor> 
<provider> 
<name sequence="1" part="full">Dealerspike</name> 
<id>1106</id> 
<service>uhlmannrv</service> 
<dealix>uhlmannrv</dealix> 
<url>http://www.uhlmannrv.com/</url> 
<contact> 
<name part="full">Dealerspike</name> 
<phone>8002285917x222</phone> 
</contact> 
</provider> 
</prospect> 
</adf>';
print_r($adf);
?>