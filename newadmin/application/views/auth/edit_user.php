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
                                <li>Users</li>
                                <li><a class="link-effect" href="">Edit User</a></li>
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
                                    <button type="button"><i class="si si-settings"></i></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="close"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title"><?=$header_title;?></h3>
                        </div>
                        <div class="block-content">
                            <form class="js-validation-edit-user form-horizontal push-10-t" action="<?php echo base_url()?>index.php/<?php echo uri_string()?>" method="post">
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" id="first_name" value="<?php echo $first_name['value'];?>" name="first_name" placeholder="Choose a First Name..">
                                                    <label for="first_name">First Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" value="<?=$last_name['value'];?>" id="last_name" name="last_name" placeholder="Enter your Last Name..">
                                                    <label for="last_name">Last Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <div class="form-material">
                                                    <input class="form-control" type="password" id="password" name="password" placeholder="Choose a good one..">
                                                    <label for="password">Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <div class="form-material">
                                                    <input class="form-control" type="password" id="password_confirm" name="password_confirm" placeholder="..and confirm it to be safe!">
                                                    <label for="password_confirm">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" value="<?=$company['value'];?>" id="company" name="company">
                                                    <label for="company">Company</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" value="<?=$phone['value'];?>" id="phone" name="phone">
                                                    <label for="phone">Phone</label>
                                                </div>
                                            </div>
                                        </div>
<?php if ($this->ion_auth->is_admin()): ?>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label>Member Of Users</label>
                                            </div>
                                            <div class="col-xs-12">
                                                    <?php foreach ($groups as $group):?>
                                                  
                                                  <?php
                                                      $gID=$group['id'];
                                                      $checked = null;
                                                      $item = null;
                                                      foreach($currentGroups as $grp) {
                                                          if ($gID == $grp->id) {
                                                              $checked= ' checked="checked"';
                                                          break;
                                                          }
                                                      }
                                                  ?>
                                                  <label class="checkbox-inline"  for="groups">
                                                    <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>><span></span> <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                                                </label>
                                                                                                   
          <?php endforeach;?></div>
                                                   
                                              
                                        </div>
                                        <?php endif;?>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                            	<a href="<?=base_url();?>index.php/auth/users" class="btn btn-sm btn-inverse">Cancel</a>
                                                <button class="btn btn-sm btn-primary" name="submit" type="submit">Save User</button>
                                            </div>
                                        </div>
                                        <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>
                                    </form>
                        </div>
                    </div>
                    <!-- END My Block -->
                </div>
                <!-- END Page Content -->
            </main>