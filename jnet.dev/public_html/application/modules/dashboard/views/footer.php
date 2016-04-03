<div class="copy">
            <p>Copyright &copy; 2015 JNET. All Rights Reserved | Design by <a href="http://jnet.vn/" target="_blank">JNET.VN</a> </p>
	    </div>
		</div>
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
     <!--note bottom-->
    <div id="bottom-notice" class="navbar navbar-inverse navbar-fixed-bottom" style="opacity: 0.7;min-height: 30px;display: none;">
        <div class="container" style="text-align: center;padding-top: 10px;color: white;">
            <h5 id="message-notice">Cập nhật thành công</h5>
        </div>
    </div>
    <script>
    	function jnetnotice(message) {
    		$('#message-notice').text(message);	
		//	$('#bottom-notice').slideUp(function() {
		//	    setTimeout(function() {
		//	        $('#bottom-notice').slideDown();
		//	    }, 10);
		//	});
		   $("#bottom-notice").slideDown(200, function(){
			    setTimeout(function(){
			$("#bottom-notice").slideUp(200);  
			},3000);
			});
		}
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="template/backend/1/js/bootstrap.min.js"></script>
</body>
</html>