<?php
//This Custom form Mapped Author: Abha Sood Negi
	$zone = AuthComponent::user('zone');
	$dealer = AuthComponent::user('dealer');
	$cid = AuthComponent::user('dealer_id');
	$d_address = AuthComponent::user('d_address');
	$sperson = AuthComponent::user('full_name');
	$d_city = AuthComponent::user('d_city');
	$d_state = AuthComponent::user('d_state');
	$d_zip = AuthComponent::user('d_zip');
	$d_phone = AuthComponent::user('d_phone');
	$d_fax = AuthComponent::user('d_fax');
	$d_email = AuthComponent::user('d_email');
	$d_website = AuthComponent::user('d_website');

	$date = new DateTime();
	date_default_timezone_set($zone);
	$expectedt = date('m/d/Y');

	$date = new DateTime();
	date_default_timezone_set($zone);
	$datetimefullview = date('M d, Y g:i A');
?>

<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;"> 
	<?php echo $this->Form->create("CustomForm", array('type'=>'post','class'=>'apply-nolazy')); ?>
		<?php  if($edit){?>
	    	<input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
	    <?php } ?>
	    <input type="hidden" id="contact_id" value="<?php echo isset($info['contact_id'])?$info['contact_id']:''; ?>" name="contact_id">
	    <input type="hidden" id="user_id" value="<?php echo isset($info['user_id'])?$info['user_id']:AuthComponent::user('id'); ?>" name="user_id">
	    <input type="hidden" id="dealer_id" value="<?php echo isset($info['dealer_id'])?$info['dealer_id']:AuthComponent::user('dealer_id'); ?>" name="dealer_id">
	    <input type="hidden" id="form_id" value="<?php echo isset($info['form_id'])? $info['form_id']:$form_info['CustomForm']['id']; ?>" name="form_id">
		<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
		<style>
			input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
			label{font-size: 14px; font-weight: normal;}
			p{margin: 0 0 14px 0; font-size: 14px;}
			.wraper.main input {padding: 2px;}
			@media print {.dontprint{display: none;}}
		</style>

		<div class="wraper header"> 
			<!-- container start -->
			<h2 style="float: left; width: 100%; font-size: 15px; text-align: center; margin: 50px 0 30px;">RELEASE</h2>
			<p>THE UNDERSIGNED (ON MY OWN BEHALF AND ON BEHALF OF MY HEIRS, PERSONAL REPRESENTATIVES, SUCCESSORS AND ASSIGNS) FOR AND IN CONSIDERATION OF THE OPPORTUNITY TO ENGAGE TODAY IN FREE DEMONSTRATION RIDE OF A HARLEY-DAVIDSON MOTORCYCLE(S) AND FOR OTHER VALUABLE CONSIDERATION, THE RECEIPT AND ADEQUACY OF WHICH ARE HEREBY ACKNOWLEDGED, RELEASES AND FOREVER DISCHARGES BLUEFIELD CYCLES, INC. ITS OFFICERS, DIRECTORS, EMPLOYEES, AGENTS AND AUTHORIZED DEALERS (“RELEASED PARTIES”) FROM ANY AND ALL CLAIMS, DEMANDS, RIGHTS AND CAUSES OF ACTION OF ANY KIND WHATSOEVER, KNOWN OR UNKNOWN, WHICH I NOW HAVE OR LATER MAY HAVE IN ANY WAY RESULTING FROM, OR ARISING OUT OF, MY DEMONSTRATION RIDE ON A HARLEY-DAVIDSON MOTORCYCLE(S).</p>

			<p>THE RELEASE EXTENDS TO ANY AND ALL CLAIMS I HAVE OR MAY HAVE AGAINST THE RELEASED PARTIES, EVEN IF SUCH CLAIMS RESULT FROM STRICT LIABILITY OR NEGLIGENCE ON THE PART OF ANY OR ALL OF THE RELEASED PARTIES, CONCERNING THE DESIGN, MANUFACTURE, REPAIR OR MAINTENANCE OF THE MOTORCYCLE(S) WHICH I WILL BE DEMONSTRATING RIDING OR CONCERNING THE CONDITIONS, QUALIFICATIONS, INSTRUCTIONS, RULES OR PROCEDURES UNDER WHICH THE DEMONSTRATION RIDES ARE CONDUCTED, OR FROM ANY OTHER CAUSE. HOWEVER, I DO NOT RELEASE THE RELEASED PARTY FROM ANY INTENTIONAL MISCONDUCT ON ITS PART.</p>

			<p>I HEREBY STATE I AM EXPERIENCED IN AND FAMILIAR WITH THE OPERATION OF VARIOUS MOTORCYCLES AND FULLY UNDERSTAND THE RISKS AND DANGERS INHERENT IN MOTORCYCLING. I AM VOLUNTARILY PARTICIPATING IN THE DEMONSTRATION RIDE AND I EXPRESSLLY AGREE TO ASSUME THE ENTIRE RISK OF ANY ACCIDENTS OR PERSONAL INJURY, INCLUDING DEATH, WHICH I MIGHT SUFFER AS A RESULT OF MY PARTICIPATION IN THE DEMONSTRATION RIDE. I PARTICIPATE IN THE RIDE KNOWING THE EXISTING WEATHER CONDITIONS, ROAD CONDITIONS AND OTHER SIMILAR CONDITIONS AND FACTORS ASSOCIATED WITH THIS DEMONSTRATION RIDE.</p>

			<p>BY SIGNING THIS RELEASE, I CERTIFY THAT I AM NOT RELYING ON ANY STATEMENTS OR REPRESENTATIVES OF ANYONE RELEASED THEREBY.</p>
		
			<div class="row" style="float: left; width: 100%; margin:  5px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label style="float: left; width: 20%;">THIS IS A RELEASE SIGNED </label>
					<div class="field" style="width: 80%; float: left;">
						<input type="text" name="release_sign" value="<?php echo isset($info['release_sign']) ? $info['release_sign'] : ''; ?>" style="width: 100%;">
						<span style="float: left; width: 100%; text-align: center;">(PLEASE READ BEFORE SIGNING)</span>
					</div>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin:  5px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label style="float: left; width: 18%;">PASSENGER SIGNATURE</label>
					<div class="field" style="width: 82%; float: left;">
						<input type="text" name="passenger_sign" value="<?php echo isset($info['passenger_sign']) ? $info['passenger_sign'] : ''; ?>" style="width: 100%;">
						<span style="float: left; width: 100%; text-align: center;">(I HAVE READ AND I AGREE)</span>
					</div>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>PRINT NAME </label>
					<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 90%">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>STREET ADDRESS</label>
					<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 85%">
				</div>
			</div>
		
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="width: 40%; float: left;">
					<label>CITY</label>
					<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 87%;">
				</div>
				<div class="form-field" style="width: 30%; float: left;">
					<label>STATE</label>
					<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<label>ZIP</label>
					<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 90%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 55%;">
					<label>PHONE NUMBER</label>
					<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 76%;">
				</div>
				<div class="form-field" style="float: left; width: 45%; margin: 5px 0;">
					<label>CELL PHONE</label>
					<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 78%">
				</div>
			</div>
		
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 70%;">
					<label>DRIVERS LICENSE NO.  & STATE</label>
					<input type="text" name="drivers_license_no" value="<?php echo isset($info['drivers_license_no']) ? $info['drivers_license_no'] : ''; ?>" style="width: 67%;">
				</div>
				<div class="form-field" style="float: left; width: 30%; margin: 5px 0;">
					<label>EXPIRATION</label>
					<input type="text" name="expiration" value="<?php echo isset($info['expiration']) ? $info['expiration'] : ''; ?>" style="width: 67%">
				</div>
			</div>
		
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 43%;">
					<label>MOTORCYCLE LICENSE   YES</label>
					<input type="text" name="motorcycle_yes" value="<?php echo isset($info['motorcycle_yes']) ? $info['motorcycle_yes'] : ''; ?>" style="width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 30%; margin: 5px 0;">
					<label>NO</label>
					<input type="text" name="motorcycle_no" value="<?php echo isset($info['motorcycle_no']) ? $info['motorcycle_no'] : ''; ?>" style="width: 50%">
					<label>(ATTACH COPY)</label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>MOTORCYCLE PRESENTLY OWNED</label>
					<input type="text" name="presently_owned" value="<?php echo isset($info['presently_owned']) ? $info['presently_owned'] : ''; ?>" style="width: 74.6%;">
				</div>
			</div>
			<!-- container end -->
		</div>
			<!-- no print buttons -->
		<br/>
		<div class="dontprint">
			<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;" >Print</button>
			<button class="btn btn-inverse pull-right" style="margin-left:5px;"  data-dismiss="modal" type="button">Close</button>
			<button type="submit" id="btn_save_quote"  class="btn btn-success pull-right" style="margin-left:5px;">Submit</button>
		</div>
	
	<?php echo $this->Form->end(); ?>

	<script type="text/javascript">
		$(document).ready(function(){
			$(".date_input_field").bdatepicker();
			
			$('#worksheet_wraper').stop().animate({
			  scrollTop: $("#worksheet_wraper")[0].scrollHeight
			}, 800);

			$("#worksheet_container").scrollTop(0);

			$("#btn_print").click(function(){
				$( "#worksheet_container" ).printThis();
			});
			
			$("#btn_back").click(function(){ });
		});
	</script>
</div>