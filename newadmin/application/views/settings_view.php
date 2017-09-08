<main id="main-container">
  <!-- Page Header -->
  
  <div class="content bg-gray-lighter">
    <div class="row items-push">
      <div class="col-sm-7">
        <h1 class="page-heading">
          <?=$header_title;?>
        </h1>
      </div>
      <div class="col-sm-5 text-right hidden-xs">
        <ol class="breadcrumb push-10-t">
          <li>Settings</li>
          <li><a class="link-effect" href="">General Settings</a></li>
        </ol>
      </div>
    </div>
  </div>
  <!-- END Page Header -->
  <!-- Page Content -->
  <div class="content">
    <!-- My Block -->
    <div class="block">
      <div class="block-header">
        <ul class="block-options">
          <li>
            <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
          </li>
        </ul>
        <h3 class="block-title">
          <?=$header_title;?>
        </h3>
      </div>
      <div class="block-content">
        <?php if($message){?>
        <div class="alert <?=$messagetype;?> alert-dismissable">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
          <?php echo $message;?> </div>
        <?php }?>
        <form class="js-validation-edit-template form-horizontal push-10-t" action="<?php echo base_url()?>index.php/<?php echo uri_string()?>" method="post">
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Site Name :</label>
            <div class="col-md-7">
              <input class="form-control" type="text" id="sitename" value="<?php echo $settings->sitename;?>" name="sitename" placeholder="Choose a Site Name..">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Upload Directory :</label>
            <div class="col-md-7">
              <input class="form-control" type="text" id="uploads_dir" value="<?php echo $settings->uploads_dir;?>" name="uploads_dir" placeholder="Enter Uploads Dir for Visa..">
            </div>
          </div>
           <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Upload URL :</label>
            <div class="col-md-7">
              <input class="form-control" type="text" id="uploads_url" value="<?php echo $settings->uploads_url;?>" name="uploads_url" placeholder="Enter Uploads Dir for Visa..">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Site Email :</label>
            <div class="col-md-7">
              <input class="form-control" type="text" id="site_email" value="<?php echo $settings->site_email;?>" name="site_email" placeholder="Choose a Site Email..">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Records Per Page :</label>
            <div class="col-md-7">
              <input class="form-control" type="number" id="per_page" value="<?php echo $settings->per_page;?>" name="per_page" placeholder="Enter Records per Page..">
            </div>
          </div>
            <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Default Normal Service Fee :</label>
            <div class="col-md-7">
              <input class="form-control" type="number" id="normal" value="<?php echo $settings->normal;?>" name="normal" placeholder="Enter Default Normal Service Fee..">
              <span class="help">It will be overwritten in Countries settings</span>
            </div>
          </div>
                    <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Default Urgent Service Fee :</label>
            <div class="col-md-7">
              <input class="form-control" type="number" id="urgent" value="<?php echo $settings->urgent;?>" name="urgent" placeholder="Enter Default Urgent Service Fee..">
              <span class="help">It will be overwritten in Countries settings</span>
            </div>
          </div>
                    <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Default Immediate Service Fee :</label>
            <div class="col-md-7">
              <input class="form-control" type="number" id="immediate" value="<?php echo $settings->immediate;?>" name="immediate" placeholder="Enter Default immediate Service Fee..">
              <span class="help">It will be overwritten in Countries settings</span>
            </div>
          </div>
                    <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Currency :</label>
            <div class="col-md-7">
              <input class="form-control" type="text" id="currency" value="<?php echo $settings->currency;?>" name="currency" placeholder="Enter Default Currency..">
              <span class="help">It will be overwritten in Countries settings</span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email"></label>
            <div class="col-md-7">
                       <h4>Email Links Settings</h4>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Check Status Link :</label>
            <div class="col-md-7">
              <input class="form-control" type="text" id="checkstatus" value="<?php echo $settings->checkstatus;?>" name="checkstatus" placeholder="Choose a Check Status Link..">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">invoicelink :</label>
            <div class="col-md-7">
              <input class="form-control" type="text" id="invoicelink" value="<?php echo $settings->invoicelink;?>" name="invoicelink" placeholder="Choose a InvoiceLink..">
            </div>
          </div>
                    <div class="form-group">
            <label class="col-md-3 control-label" for="example-hf-email">Contact Us Link :</label>
            <div class="col-md-7">
              <input class="form-control" type="text" id="contactlink" value="<?php echo $settings->contactlink;?>" name="contactlink" placeholder="Enter Contact Link..">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12"> <a href="<?=base_url();?>index.php/template" class="btn btn-sm btn-inverse">Cancel</a>
              <button class="btn btn-sm btn-primary" name="submit" type="submit">Save Settings</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- END My Block -->
  </div>
  <!-- END Page Content -->
</main>
