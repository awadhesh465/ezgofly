<section>
<style type="text/css">
.widget {
    padding: 0;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    margin: 0 0 30px 0;
}

.widget-header {
    position: relative;
    min-height: 35px;
    background: #fff;
    -webkit-box-shadow: 0 0 4px rgba(0, 0, 0, .3);
    -moz-box-shadow: 0 0 4px rgba(0, 0, 0, .3);
    box-shadow: 0 0 4px rgba(0, 0, 0, .3);
    color: #555;
    padding-left: 12px;
    text-align: right;
    border-bottom: 3px solid #016dab;
    padding-top: 5px;
    padding-bottom: 5px;
    overflow: hidden;
}
.widget-header > .widget-caption {
    line-height: 34px;
    padding: 0;
    margin: 0;
    float: left;
    text-align: left;
    font-weight: 400 !important;
    font-size: 18px;
}
.widget-body {
    background-color: #fbfbfb;
    -webkit-box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);
    -moz-box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);
    box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);
    padding: 12px;
}
.booking-item-payment {
    border: 1px solid #ccc;
}
.booking-item-payment .booking-item-payment-details {
    list-style: none;
    margin: 0;
    padding: 15px;
    border-top: 1px solid #d9d9d9;
    /* border-bottom: 1px solid #d9d9d9; */
    background: #fff;
}

.text-darken {
    color: #626262;
}
.list {
    list-style: none;
    margin: 0;
    padding: 0;
}
.payment label {
    font-size: 14px;
}
.widget label {
    font-weight: 600;
    color: #000000;
    display: block;
}
#payment_form__ .form-control {
    height: 34px;
    padding: 6px 12px;
}
.payment .form-control {
    margin-bottom: 0;
}
.widget .form-control {
    -webkit-border-radius: 0;
    border-radius: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
    height: 35px;
    padding: 5px 15px;
}
.payment-icon ul {
    margin-top: 25px;
    overflow: hidden;
    margin-bottom: 3px;
}
.payment-icon ul li {
    float: left;
    margin-right: 5px;
}
.right-side-label {
    margin-top: 25px;
    position: unset;
    /* overflow: hidden; */
    margin-bottom: 3px;
}
.btn-secondary {
    background-color: #ff6000;
    color: #fff;
    font-size: 14px;
}
.btn_____lg {
    width: 35%;
    letter-spacing: 1.5px;
    font-size: 18px !important;
    line-height: normal;
    text-transform: uppercase;
    font-weight: 600;
    margin-top: 30px;
    margin-bottom: 30px;
}
.btn_____lg:hover{
    color: #fff;
}



.email-html{

}

</style>
  
  <br>
 
    <div class="container">
       <form action="<?php echo base_url('frontend/mail_send') ?>" method="post">
        <div class="col-xs-12 col-sm-4 col-md-9">
            <div class="widget" id="dvPaymentDetails">
               <div class="widget-header header-large bordered-bottom bordered-bottom bordered-darkgray">
                  <span class="widget-caption mt8">Payment(Secure SSL Encrypted Transaction)</span>
               </div>
               <div class="widget-body clearfix">
                  <div class="booking-item-payment">
                     <div class="booking-item-payment-details">
                        <div class="row">
                           <div class="form-group col-sm-6">
                              <label>Payment Method</label>
                              <select class="ddl ccpmt-list safari_select form-control pl-2" data-val="true" data-val-required="Please select payment method type" id="PaymentDetails_PaymentMethod" name="PaymentDetails.PaymentMethod" onfocusout="ValidatePaymentType(this,false);">
                                 <option selected="selected" value="1">Visa</option>
                                 <option value="2">MasterCard</option>
                                 <option value="3">American Express</option>
                                 <option value="5">Discover</option>
                              </select>
                           </div>
                           <div class="col-md-6 form-group payment-icon">
                              <ul>
                                 <li><a href="javascript:void(0)"><img src="https://www.cruisewavetravel.com/travelresources/images/homepage/payment/mastercard-c.png"></a></li>
                                 <li><a href="javascript:void(0)"><img src="https://www.cruisewavetravel.com/travelresources/images/homepage/payment/visa-c.png"></a></li>
                                 <li><a href="javascript:void(0)"><img src="https://www.cruisewavetravel.com/travelresources/images/homepage/payment/discover-c.png"></a></li>
                                 <li><a href="javascript:void(0)"><img src="https://www.cruisewavetravel.com/travelresources/images/homepage/payment/american_express-c.png"></a></li>
                                 <li><a href="javascript:void(0)"><img src="https://www.cruisewavetravel.com/travelresources/images/homepage/payment/club-c.png"></a></li>
                              </ul>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-6">
                              <label>Card Number</label>
                              <input autocomplete="off" autocompletetype="None" class="form-control txt-box ccnum" data-val="true" data-val-required="+ Please provide Credit Card Number." id="PaymentDetails_CardNumber" keydown="return clearError(event)" maxlength="18" name="PaymentDetails.CardNumber" onblur="IsNumeric(this); ValidateCreditCard(this,false);" placeholder="Credit or Debit Card Number" type="text" value="">
                              <span class="cc-card-icon"></span>
                              <div id="error_payment" class="payment_space validation-summary-errors1 validation-summary error-ui">
                                 <span style="font-weight: bold; "><span class="field-validation-valid" data-valmsg-for="PaymentDetails.CardNumber" data-valmsg-replace="true"></span></span>
                              </div>
                              <div class="error-ui payment_space">
                                 <span id="CreditCardNo" style="display: none;"></span>
                              </div>
                           </div>
                           <div class="form-group col-sm-6 right-side-label">
                              <ul>
                                 <li>(pay with credit or debit card)</li>
                              </ul>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-6">
                              <label>Card Holder Name</label>
                              <input autocomplete="off" autocompletetype="None" class="form-control txt-box ccname" data-val="true" data-val-required="+ Please provide Card Holder Name." id="PaymentDetails_CardHolderName" keydown="return LettersWithSpaceOnly(event);" maxlength="50" name="PaymentDetails.CardHolderName" onblur="GetValidPaxName(this); ValidateName(this,false);" placeholder="Card Holder's Name" type="text" value="">
                              <div class="payment_space validation-summary-errors1 validation-summary error-ui" id="error_payment1">
                                 <span style="font-weight: bold;"><span class="field-validation-valid" data-valmsg-for="PaymentDetails.CardHolderName" data-valmsg-replace="true"></span></span>
                              </div>
                              <div class="error-ui payment_space">
                                 <span id="CardName" style="display: none;"></span>
                              </div>
                           </div>
                           <div class="form-group col-sm-6 right-side-label">
                              <ul>
                                 <li>(as it appears on your credit card)</li>
                              </ul>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-6">
                              <label>CVV</label>
                              <input autocomplete="off" autocompletetype="None" class="form-control txt-box ccname" data-val="true" data-val-required="+ Please provide CVV Number." id="PaymentDetails_CVVNumber" keydown="return clearError(event)" maxlength="4" name="PaymentDetails.CVVNumber" onblur="ValidateCVV(this,false); IsNumeric(this);" placeholder="CVV" type="text" value="">
                              <div class="payment_space validation-summary-errors1 validation-summary error-ui" id="error_payment4">
                                 <span style="font-weight: bold;"><span class="field-validation-valid" data-valmsg-for="PaymentDetails.CVVNumber" data-valmsg-replace="true"></span></span>
                              </div>
                              <div class="error-ui">
                                 <span id="CVVNo" style="display: none;"></span>
                              </div>
                           </div>
                           <div class="form-group col-sm-6 right-side-label">
                              <ul>
                                 <li class="pull-left"><img src="https://www.cruisewavetravel.com/travelresources/images/homepage/payment/cvv.png"></li>
                                 <li>
                                    <span id="cvvHover">
                                       &nbsp;&nbsp;3 digit number from your card
                                       <div class="cvvPopup1" id="youthPopup">
                                          <div class="cvvPopup-arw icon ic-triangles-u"></div>
                                          <div class="close icon ic-cancel"></div>
                                          <!-- <div class="cvvPopup-hd">
                                             <h2>Why do we need this?</h2>
                                             <p>For your protection, we require that you enter a credit card verification number.</p>
                                          </div>
                                          <div class="cvvPopup-cont">
                                             <div class="cvvPopup-box">
                                                <span class="crd1"></span>
                                                <strong>For Visa, MasterCard, Discover, Diners Club, and Carte Blanche:</strong>
                                                <p>The Verification number is the final 3-digit number located on the back of the credit card.</p>
                                             </div>
                                             <div class="line"></div>
                                             <div class="cvvPopup-box">
                                                <span class="crd2"></span>
                                                <strong style="padding-bottom: 12px">For American Express</strong>
                                                <p>The Verification number is the 4-digit number located on the front of the credit card.</p>
                                             </div>
                                          </div> -->
                                       </div>
                                    </span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Expiration Month</label>
                                 <select class="ddl safari_select form-control pl-2" data-val="true" data-val-number="The field ExpirationMonth must be a number." data-val-required="+ Please provide Card Expiration Month." id="PaymentDetails_ExpirationMonth" name="PaymentDetails.ExpirationMonth" onblur="ValidateMonth(this,false);">
                                    <option selected="selected" value="0">Month</option>
                                    <option value="1">01 - January</option>
                                    <option value="2">02 - February</option>
                                    <option value="3">03 - March</option>
                                    <option value="4">04 - April</option>
                                    <option value="5">05 - May</option>
                                    <option value="6">06 - June</option>
                                    <option value="7">07 - July</option>
                                    <option value="8">08 - August</option>
                                    <option value="9">09 - September</option>
                                    <option value="10">10 - October</option>
                                    <option value="11">11 - November</option>
                                    <option value="12">12 - December</option>
                                 </select>
                                 <div class="payment_space validation-summary-errors1 validation-summary error-ui" id="error_payment2">
                                    <span style="font-weight: bold;"><span class="field-validation-valid" data-valmsg-for="PaymentDetails.ExpirationMonth" data-valmsg-replace="true"></span></span>
                                    <input type="hidden" name="search_data[]" value="<?php  print_r($search_data); ?>">
                                 </div>
                                 <div class="error-ui payment_space">
                                    <span id="CardMonth" style="display: none;"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Expiration Year</label>
                                 <select class="ddl safari_select form-control pl-2" data-val="true" data-val-number="The field ExpirationYear must be a number." data-val-required="+ Please provide Card Expiration Year." id="PaymentDetails_ExpirationYear" name="PaymentDetails.ExpirationYear" onblur="ValidateYear(this,false);">
                                    <option selected="selected" value="0">Year</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                    <option value="2032">2032</option>
                                    <option value="2033">2033</option>
                                    <option value="2034">2034</option>
                                    <option value="2035">2035</option>
                                    <option value="2036">2036</option>
                                    <option value="2037">2037</option>
                                 </select>
                                 <div class="payment_space validation-summary-errors1 validation-summary error-ui" id="error_payment3">
                                    <span style="font-weight: bold;"><span class="field-validation-valid" data-valmsg-for="PaymentDetails.ExpirationYear" data-valmsg-replace="true"></span></span>
                                 </div>
                                 <div class="error-ui payment_space">
                                    <span id="CardYear" style="display: none;"></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="error-ui">
                                 <span id="CardWrngMonth" style="display: none;"></span>
                              </div>
                           </div>
                           <div class="col-sm-12">
                              <img src="https://www.cruisewavetravel.com/travelresources/Images/comodo_secure.png" class="img-responsive pull-right" style="width:auto;" alt="Alternate Text">
                              <img src="https://www.cruisewavetravel.com/travelresources/frontpage/images/McAfee-SECURE253x89.png" style="width:115px;margin-right:15px;margin-top:10px;" class="pull-right">
                           </div>
                        </div>
                     </div>
                     <div class="error-ui">
                        <span id="" style="display:none;"></span>
                        <span id="" style="display:none;"></span>
                        <span id="0" style="display:none;"></span>
                        <span id="0" style="display:none;"></span>
                        <span id="" style="display:none;"></span>
                     </div>
                  </div>
                 
               </div>
            </div>

            <div class="row">
               <div class="col-md-6 " id="dvBillingDetails">
                  <div class="widget">
                     <div class="widget-header header-large bordered-bottom bordered-bottom bordered-darkgray">
                        <span class="widget-caption mt8">Credit Card Billing Information</span>
                     </div>
                     <div class="widget-body clearfix">
                        <div class="booking-item-payment">
                           <div class="booking-item-payment-details clearfix">
                              <div class="form-group">
                                 <label>Country</label>
                                 <div class="credit_card_selection styled-select styled-payment select_option_billinginfo">
                                    <select class="form-control ccpmt-list pl-2" data-val="true" data-val-required="+ Please provide CountryName." id="BillingDetails_CountryName" name="BillingDetails.CountryName">
                                       <option value="us">United States</option>
                                       <option value="ca">Canada</option>
                                       <option value="uk">United Kingdom</option>
                                       <option value="">---------------------------------------</option>
                                       <option value="af">Afghanistan, Islamic State of</option>
                                       
                                    </select>
                                 </div>
                                 <div class="payment_space validation-summary-errors1 validation-summary error-ui" id="error_billing">
                                    <span style="font-weight: bold; ">
                                    <span class="field-validation-valid" data-valmsg-for="BillingDetails.CountryName" data-valmsg-replace="true"></span>
                                    </span>
                                 </div>
                                 <div class="error-ui payment_space">
                                    <span id="CountryName" style="display: none; "></span>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Address</label>
                                 <div class="credit_card_selection  card_info con_info">
                                    <input autocomplete="off" autocompletetype="None" class="form-control" data-val="true" data-val-length="Must have a minimum length of 3 and maximum length of 50." data-val-length-max="50" data-val-length-min="3" data-val-required="+ Please provide Address." id="BillingDetails_Address1" maxlength="50" name="BillingDetails.Address1" type="text" value="">
                                 </div>
                                 <div class="iPad_portrait_add payment_space validation-summary-errors1 validation-summary error-ui" id="error_billing1">
                                    <span style="font-weight: bold; "><span class="field-validation-valid" data-valmsg-for="BillingDetails.Address1" data-valmsg-replace="true"></span></span>
                                 </div>
                                 <div class="error-ui payment_space">
                                    <span id="Address" style="display: none; "></span>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>City</label>
                                 <div class="credit_card_selection card_info con_info">
                                    <input autocomplete="off" autocompletetype="None" class="form-control" data-val="true" data-val-length="Must have a minimum length of 3 and maximum length of 50." data-val-length-max="50" data-val-length-min="3" data-val-required="+ Please provide City." id="BillingDetails_City" name="BillingDetails.City" onblur="GetValidPaxName(this);" placeholder="City Name" type="text" value="">
                                 </div>
                                 <div class="payment_space validation-summary-errors1 validation-summary error-ui" id="error_billing2">
                                    <span style="font-weight: bold; "><span class="field-validation-valid" data-valmsg-for="BillingDetails.City" data-valmsg-replace="true"></span></span>
                                 </div>
                                 <div class="error-ui">
                                    <span id="City" style="display: none;"></span>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>State</label>
                                 <div class="credit_card_selection styled-select styled-payment" id="dvStateCode">
                                    <select class="form-control pl-2" id="BillingDetails_StateCode" name="BillingDetails.StateCode">
                                       <option value="AK">ALASKA</option>
                                       <option value="AL">ALABAMA</option>
                                       <option value="AR">ARKANSAS</option>
                                       <option value="AZ">ARIZONA</option>
                                       <option value="CA">CALIFORNIA</option>
                                       <option value="CO">COLORADO</option>
                                       
                                    </select>
                                    <input id="BillingDetails_State" name="BillingDetails.State" type="hidden" value="AK">
                                 </div>
                                 <div class="credit_card_selection hide">
                                    <input autocomplete="off" autocompletetype="None" class="form-control" id="BillingDetails_StateName" name="BillingDetails.StateName" placeholder="State Name" type="text" value="" style="display: none;">
                                 </div>
                                 <div class="payment_space validation-summary-errors1 validation-summary error-ui" id="error_billing3">
                                    <span style="font-weight: bold;">
                                    <span class="field-validation-valid" data-valmsg-for="BillingDetails.StateName" data-valmsg-replace="true"></span>
                                    </span>
                                 </div>
                                 <div class="error-ui payment_space">
                                    <span id="State" style="display: none; "></span>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Zip</label>
                                 <div class="pmt-ccdtl-group light-clr-shade bill_contact_info">
                                    <div class="credit_card_selection card_info con_info"><input autocomplete="off" autocompletetype="None" class="form-control" data-val="true" data-val-required="+ Please provide Zipcode." id="BillingDetails_ZipCode" maxlength="13" name="BillingDetails.ZipCode" placeholder="Zip" type="text" value=""></div>
                                    <div class="payment_space validation-summary-errors1 validation-summary error-ui" id="error_billing4">
                                       <span style="font-weight: bold;"><span class="field-validation-valid" data-valmsg-for="BillingDetails.ZipCode" data-valmsg-replace="true"></span></span>
                                    </div>
                                    <div class="error-ui payment_space">
                                       <span id="Zip" style="display: none; "></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="error-ui">
                           <span id="" style="display:none;"></span>
                           <span id="" style="display:none;"></span>
                           <span id="" style="display:none;"></span>
                           <span id="" style="display:none;"></span>
                           <span id="" style="display:none;"></span>
                        </div>
                        
                     </div>
                  </div>
               </div>
               <div class="col-md-6 " id="dvContactDetails">
                  <div class="widget">
                     <div class="widget-header header-large bordered-bottom bordered-bottom bordered-darkgray">
                        <span class="widget-caption mt8">Contact Information</span>
                     </div>
                     <div class="widget-body clearfix">
                        <div class="booking-item-payment">
                           <div class="booking-item-payment-details clearfix">
                              <div class="form-group">
                                 <label>Billing Phone</label>
                                 <div class="phonecode" style="display:none;">
                                    <input class="form-control" id="ContactDetails_BilingDisplayCode" name="ContactDetails.BilingDisplayCode" readonly="readonly" type="text" value="" style="display: none;">
                                 </div>
                                 <div class="phonecode" style="display:none;">
                                    <input class="form-control" id="ContactDetails_BillingCountryPhone" name="ContactDetails.BillingCountryPhone" readonly="readonly" style="display:none;" type="text" value="">
                                 </div>
                                 <div class="credit_card_selection card_info con_info">
                                    <input autocomplete="off" autocompletetype="None" class="form-control txt-box" data-val="true" data-val-required="+ Please provide Billing Phone number." id="ContactDetails_BillingPhone" keydown="return clearError(event)" maxlength="15" name="ContactDetails.BillingPhone" onblur="IsNumeric(this); ValidatePhone(this);" placeholder="Billing Phone" type="text" value="">
                                 </div>
                                 <div class="payment_space validation-summary-errors1 validation-summary error-ui" id="error_contact">
                                    <span style="font-weight: bold;"><span class="field-validation-valid" data-valmsg-for="ContactDetails.BillingPhone" data-valmsg-replace="true"></span></span>
                                 </div>
                                 <div class="error-ui payment_space">
                                    <span id="Billphone" style="display: none;"></span>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Mobile Phone</label>
                                 <div class="phonecode" style="display:none;">
                                    <input id="ContactDetails_MobilePhoneCode" name="ContactDetails.MobilePhoneCode" readonly="readonly" type="text" value="" style="display: none;">
                                 </div>
                                 <div class="phonecode" style="display:none;">
                                    <input class="form-control" id="ContactDetails_MobileDisplayCode" name="ContactDetails.MobileDisplayCode" readonly="readonly" style="display:none;" type="text" value="">
                                 </div>
                                 <div class="credit_card_selection  card_info con_info">
                                    <input autocomplete="off" autocompletetype="None" class="form-control" id="ContactDetails_MobilePhone" keydown="return clearError(event)" maxlength="15" name="ContactDetails.MobilePhone" onblur="IsNumeric(this); ValidatePhone(this);" placeholder="Mobile Phone" type="text" value="">
                                    <div class="error-ui payment_space">
                                       <span id="Mobile" style="display: none; "></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Email</label>
                                 <div class="credit_card_selection card_info con_info">
                                    <input autocomplete="off" autocompletetype="None" class="form-control txt-box" data-val="true" data-val-regex="+ Please provide valid Email." data-val-regex-pattern="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*" data-val-required="+ Please provide Email address." id="ContactDetails_Email" name="ContactDetails.Email" onblur="ValidateAndCompareEmail(this,false);" placeholder="Email" type="text" value="">
                                 </div>
                                 <div class="payment_space validation-summary-errors1 validation-summary error-ui" id="error_contact1">
                                    <span style="font-weight: bold;"><span class="field-validation-valid" data-valmsg-for="ContactDetails.Email" data-valmsg-replace="true"></span></span>
                                 </div>
                                 <div class="error-ui payment_space">
                                    <span id="Email" style="display: none; "></span>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Confirm Email</label>
                                 <div class="credit_card_selection  card_info con_info">
                                    <input autocomplete="off" autocompletetype="None" class="form-control txt-box" id="ContactDetails_RetypeEmail" name="ContactDetails.RetypeEmail" onblur="CompareEmail();" placeholder="Confirm Email" type="text" value="">
                                 </div>
                                 <div class="error-ui payment_space">
                                    <span id="retype-Email" style="display: none;"></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="error-ui">
                           <span id="" style="display:none;color:#fff !important;"></span>
                           <span id="" style="display:none;color:#fff !important;"></span>
                           <span id="" style="display:none;color:#fff !important;"></span>
                           <span id="" style="display:none;color:#fff !important;"></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="widget">
               <div class="widget-header header-large bordered-bottom bordered-bottom bordered-darkgray">
                  <span class="widget-caption mt8">Policies &amp; Reviews</span>
               </div>
               <div class="widget-body clearfix">
                  <p>
                     <em>Entered details should be cross checked for any inaccuracy. Please check the dates and times of flight departures twice before confirming. Tickets booked from this website are non-transferable and once tickets are issued, names cannot be changed. The cost for most airlines tickets and our service fees are non-refundable. Travelers are suggested to check airlines’ terms and policies before booking. The ticket costs are inclusive of our service fees and taxes. In some cases, tickets may be refunded for no charges if requested within four (4) hours from the time of purchase, and for a fee, if requested within twenty-four (24) hours from the time of purchase. Date and routing changes will be subject to airline penalties and our service fees. Fares can fluctuate until tickets are purchased.</em>
                  </p>
               </div>
            </div>

            <p>
                By clicking Book Now, I agree that I have read and accepted the above policies and Ezgofly.com’s
                <a style="color:#0673b8;" href="/terms">Terms &amp; Conditions</a> and
                <a style="color:#0673b8;" href="/privacy-policy">Privacy Policy</a>.
            </p>

            <div id="dvBookFlight" class="text-center">
                <button type="submit" id="btnSubmitPayment" class="btn btn-secondary btn-lg btn_____lg"  working-caption="Processing…" default-caption="Book Now">Book Now</button>
            </div>



        </div>
        </form>
        <div class="col-xs-12 col-sm-4 col-md-3">
        
        </div>
    </div>
    
  </section>

  
  <!-- ------------------------ // Top Airlines --------------------- -->
