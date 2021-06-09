<script>
$(function() {
       $("#timepicker").timepicker();
});
</script>
<script>
$(function() {
       $("#datepicker").datepicker();
});
</script>

<style>
 /* This is a CSS style sheet: it adds style to the program output */
.output { font-weight: bold; }           /* Calculated values in bold */
#payment { text-decoration: underline; } /* For element with id="payment" */
#graph { border: solid black 1px; }      /* Chart has a simple border */
th, td { vertical-align: top; }          /* Don't center table cells */
</style>

<script>
"use strict"; // Use ECMAScript 5 strict mode in browsers that support it

function calculate() {
// Look up the input and output elements in the document
var amount = document.getElementById("amount");
var apr = document.getElementById("apr");
var tax = document.getElementById("DealTaxFee");
var years = document.getElementById("years");

//Outgoing var 
var payment = document.getElementById("payment");

var total = document.getElementById("total");

var taxamount = document.getElementById("DealTaxFee");

var totalinterest = document.getElementById("totalinterest");


// Get the user's input from the input elements. Assume it is all valid.
// Convert interest from a percentage to a decimal, and convert from
// an annual rate to a monthly rate. Convert payment period in years
// to the number of monthly payments.

var principal = parseFloat(amount.value);
var interest = parseFloat(apr.value) / 100 / 12;
var payments = parseFloat(years.value) * 12;

// Now compute the monthly payment figure.
var x = Math.pow(1 + interest, payments, taxamount);   // Math.pow() computes powers
var monthly = (principal*x*interest)/(x-1);

// If the result is a finite number, the user's input was good and
// we have meaningful results to display
if (isFinite(monthly)) {
// Fill in the output fields, rounding to 2 decimal places

payment.innerHTML = monthly.toFixed(2);

total.innerHTML = (monthly * payments).toFixed(2);

totalinterest.innerHTML = ((monthly*payments)-principal).toFixed(2);



}
else {  
// Result was Not-a-Number or infinite, which means the input was
// incomplete or invalid. Clear any previously displayed output.
payment.innerHTML = "";        // Erase the content of these elements
total.innerHTML = ""
totalinterest.innerHTML = "";
chart();                       // With no arguments, clears the chart
}
}


</script>

<script type="text/javascript">
function applyTax(){
  var inputAmount = document.getElementById('amount').value;
  var salesTax = (inputAmount / 100 * document.getElementById('ContactTaxFee').value);
  var totalAmount = (inputAmount*1) + (salesTax * 1);

  
  document.getElementById('requestedTax').innerHTML = salesTax;
  
}

</script>

<script language=javascript>
function add() {
var sum = 0; 

var inputs = document.getElementsByClassName("input-mini"); 



for(i =0; i < inputs.length; i++) {
if( inputs[i].value.match( /^[0]*(\d+)$/)) {
sum += parseInt(RegExp.$1);
}
else {valid=false;}
}
if(valid) {
document.getElementById('amount').value = sum - document.getElementById('ContactTradeValue').value - document.getElementById('ContactDownPayment').value + sum / 100 * document.getElementById( 'ContactTaxFee' ).value;
}
else{
alert("Please enter numbers only");
}
}
</script>