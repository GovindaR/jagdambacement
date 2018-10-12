<div class="backToTop" id="backToTop"></div>
<div class="feedbackIcon hidden-xs"><img src="img/feedback.png" width="35" height="176" /></div>
<div class="feebackWrapper">
<div class="container">
	<div class="row">
    	<div class="col-sm-6"><h3>Feedback & Suggestions</h3>
            <p>We would like to hear from you. Please help us to improve us by sending us your feedback and suggestions.</p>
            <div class="map"><img src="img/map.png" width="180" height="120" /></div>
            <div class="address"><strong>Jagdamba Cement</strong>
            Neupane Tower, 6th Floor<br />
            Subidhanagar, Tinkune<br />
            Kathmandu, Nepal<br />
            Phone: 4111500, 4111550<br />
            Email: info@jagdambacement.com</div></div>
        <div class="col-md-6">
        <form action="<?php echo URL_PATH; ?>feedback.php" method="post" class="form-inline">
        	<div class="refer">
            <p>How would you prefer to be contacted?</p>
            <input type="radio" name="contactOption" value="phone" id="phone" />
            <label for="phone">Phone</label>
            <input type="radio" name="contactOption" value="email" checked="checked" id="email" />
            <label for="email" >Email</label>
            
            </div>
            
            <div class="input">
            <input type="text" title="Full Name" required='required' name="FullName" placeholder="FULL NAME*" class="left form-control" />
            <input type="email" title="Email Address" required='required' name="EmailAddress" id="EmailAddress" placeholder="EMAIL*" class="right form-control" />
            <input type="text" title='Phone Number' name="PhoneNumber" id="PhoneNumber" placeholder="PHONE*" class="right none form-control" />
            
            <div style="clear:both;"></div>
            <div class="refer" style="display:none;" id="timeTocall">
            <p>What is the best time to call?</p>
            <input type="radio" name="timeToCall" value="PM" id="pm" />
            <label for="pm">PM</label>
            <input type="radio" name="timeToCall" value="AM" id="am" />
            <label for="am">AM</label>
            <input type="radio" name="timeToCall" value="Anytime" checked="checked" id="anytime" />
            <label for="anytime">Anytime</label>
            
            </div>
            <div style="clear:both;"></div>
            <textarea class="form-control" required='required' name="comment" rows="5" placeholder='YOUR FEEDBACK & SUGGESTIONS*'></textarea>
            </div>
            <span class="catpch_holder"><img src="captcha/captcha_image.php" width="100" height="20" align="left"/> &nbsp; </span>
             <input style="width:100px;" class="form-control" type="text" required='required' placeholder='SECURITY CODE*' name="security_code" id="security_code" tabindex="10" value="" autocomplete="off" />
             <div style="clear:both;height:10px;"></div>
            <input type="submit" name="contactOption" value="send" class="btm" />
            
        </form>
        </div>
    </div>
</div>
</div>