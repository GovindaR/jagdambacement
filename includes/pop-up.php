<script type="text/javascript">
    $(window).load(function(){
      var mobile = (/iphone|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase())); 
        if(mobile) {
          $('#myModal').hide();
       }
       else{
         $('#myModal').modal('show');
       }
    });
</script>
<!-- Modal -->
<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style='width:800px;'>
    <div class="modal-content">
      <div class="modal-body">
         <p><a href="https://www.youtube.com/watch?v=B1mN6XowLeE" target="_blank" rel="nofollow"><img src="img/notice-01.jpg" class='img-responsive' /></p>
                          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->

<!--<div style="max-width:800px; margin:0 auto;text-align:center;position:relative;">
    <div id="dropin" class="dropBox">
<div align="right" class="dropBoxClose"><a href="#" onClick="dismissbox();return false">Close <span>X</span></a></div>
<img src="img/dashain.jpg"  /> </div>
</div>-->