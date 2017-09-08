 <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/core/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/core/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/core/jquery.slimscroll.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/core/jquery.scrollLock.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/core/jquery.appear.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/core/jquery.countTo.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/core/jquery.placeholder.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/core/js.cookie.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/app.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/summernote/summernote.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/dropzonejs/dropzone.min.js"></script>
        
        <!-- Page JS Plugins -->
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <!-- Page JS Code -->
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/base_pages_login.js"></script>
                <!-- Page JS Plugins -->
        <!-- Page JS Code -->
        <script type="text/javascript">
		$('#refreshapps').click(function(){
		$('#appsupdate').load('<?=site_url('application/update_sidebar_apps');?>');
		});
		$('#refreshmessages').click(function(){
		$('#msgsupdate').load('<?=site_url('application/update_sidebar_msgs');?>');
		});
		 $('#modal-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
		$('#modal-visaupload').on('show.bs.modal', function(e) {
            $(this).find('form').attr("action", $(e.relatedTarget).data('href'));
        });
		$('#modal-visaupload').on('hidden.bs.modal', function () {
			location.reload();
		})
		$('#email_template').change(function(){
			$.ajax({
				   url: "<?=site_url('application/template_json/')?>/"+$(this).val(),
				   error: function() {
					  $('#info').html('<p>An error has occurred</p>');
				   },
				   success: function(data) {
				   console.log(JSON.parse(data));
					 $('#templateData').code(JSON.parse(data).templateData);
				   },
				   type: 'POST'
				});
		});
            $(function () {
				
                // Init page helpers (Summernote + CKEditor plugins)
                App.initHelpers(['summernote','table-tools']);
            });
        </script>
    </body>
</html>