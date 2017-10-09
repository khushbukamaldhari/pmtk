<?php
require_once 'config.php';
include_once 'includes/header.php';
?>
<div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle selected">
                    <p>1</p>
                </a>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle selected" disabled="disabled">
                    <p>2</p>
                </a>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle selected" disabled="disabled">
                    <p>3</p>
                </a>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle selected" disabled="disabled">
                    <p>4</p>
                </a>
            </div>
        </div>
    </div>
    <form role="form" id='register-validation' class="register-validation">
        <div class="row setup-content" id="step-1">
            <div class="col-xs-3"></div>
            <div class="col-xs-6 reg_step_1">
                <div class="col-md-12">

                    <div class="form-group">
                        <label class="control-label "><span class="reg_step_3_label">User Name</span></label>
                        <div>
                            <input  maxlength="100" type="text" name='uname' required="required" class="form-control" placeholder="Enter First Name"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><span class="reg_step_3_label">Email</span></label>
                        <div>
                            <input maxlength="100" type="email" required="required" name='email' class="form-control" placeholder="Enter Email ID " />
                        </div>
                    </div>
                    <div>
                        <div>
                            <input type="checkbox" /><span class="reg_step_3_label">Publish My Email</span>
                            <br/>
                            <input  type="checkbox" /><span class="reg_step_3_label">Subscribe to Newsletter</span>
                            <br/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><span class="reg_step_3_label">Password</span></label>
                        <div>
                            <input maxlength="100" type="password" required="required" id='register_password'  name='password' class="form-control" placeholder="Enter Password " />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><span class="reg_step_3_label">Confirm Password</span></label>
                        <div>
                            <input maxlength="100" type="password"  name="con_password"  required="required"  class="form-control" placeholder="Enter Re - Password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><span class="reg_step_3_label">Account Type</span></label>
                        <div>
                            <select name="account_type"  class="form-control account_type" >
                                <option value="">- Select -</option>
                                <option value="cook">Cooks &amp; Chefs</option>
                                <option value='tast'>Taste</option>
                                <option value="delivery">Delivery Driver</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group" id="sex">
                        <label class="control-label"><span class="reg_step_3_label">Sex</span></label>
                        <div>
                            <select name="sex_name"  class="form-control" >
                                <option value="0">- Select -</option>
                                <option value="1">Man</option>
                                <option value='2'>Woman</option>
                                <option value="3">Dishes</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group" id="individual">
                        <label class="control-label"><span class="reg_step_3_label">Individual Page</span></label>
                        <div>
                            <?php echo "<h5 style='float:left;'>" . BASE_URL . "</h5>"; ?><input type="text" class=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><span class="reg_step_3_label">Skills</span></label>
                        <div>
                            <textarea class="form-control" name="skill"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><span class="reg_step_3_label">Passion</span></label>
                        <div>
                            <textarea class="form-control" name="passion"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
            <div class="col-xs-3"></div>

        </div>
        <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Step 2</h3>
                    <div class="form-group">
                        <label class="control-label">Company Name</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Company Address</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3>Select Package</h3>
                    <div class="reg_step_3" >
                        <div class="panel panel-default" style="margin: 10px 10px;">
                            <div class="panel-heading ui-draggable-handle">

                                <h3 class="panel-title">Basic Chef</h3>                                      
                            </div>
                            <div class="panel-body">
                                <span class="btn btn-danger btn-block reg_step_3_sub_heading">$9.99</span>
                            </div>
                            <div class="panel-body list-group" style="text-align: center;">
                                <span class="list-group-item"><label class="reg_step_3_label">Add Profiles</label><i class="fa fa-check-square reg_step_3_label_fa"></i></span>
                                <span class="list-group-item"><label  class="reg_step_3_label">View contact details</label><i class="fa fa-check-square reg_step_3_label_fa"></i></span>
                                <span class="list-group-item"><label  class="reg_step_3_label">Contact sellers</label><i class="fa fa-times-circle reg_step_3_label_fa" style="color:red;"></i></span>
                                <span class="list-group-item"><label  class="reg_step_3_label">View pictures</label><i class="fa fa-check-square reg_step_3_label_fa"></i></span>
                                <span class="list-group-item"><label  class="reg_step_3_label">Featured account</label><i class="fa fa-check-square reg_step_3_label_fa"></i></span>
                                <span class="list-group-item"><label  class="reg_step_3_label">Request cuisine samples</label><i class="fa fa-check-square reg_step_3_label_fa"></i></span>
                                <span class="list-group-item"><label  class="reg_step_3_label">Featured: <br/>of 1</label><i class="fa fa-check-square reg_step_3_label_fa"></i></span>
                                <span class="list-group-item" style="text-align: center;">
                                        <i class="fa fa-question-circle reg_step_3_label_fa_question" data-toggle="tooltip" data-placement="top" title="" data-original-title="With account type you can only create a portfolio of two listings per cuisine type"></i>
                                   </span>
                                <span class="list-group-item"><input type="radio"  name="plan"/><br/><input type="checkbox" style="text-align: center;"/><label  class="reg_step_3_label">Recurring</label></span>
                            </div>
                        </div>
                        <div class="panel panel-default" style="margin: 10px 10px;">
                            <div class="panel-heading ui-draggable-handle">

                                <h3 class="panel-title">Premium </h3>                                      
                            </div>
                            <div class="panel-body">
                                <span  class="btn btn-danger btn-block reg_step_3_sub_heading">Free</span>
                            </div>
                            <div class="panel-body list-group"  style="text-align: center;">
                                <span class="list-group-item"><label class="reg_step_3_label">Add Profiles</label><i class="fa fa-check-square reg_step_3_label_fa"></i></span>
                                <span class="list-group-item"><label  class="reg_step_3_label">View contact details</label><i class="fa fa-check-square reg_step_3_label_fa"></i></span>
                                <span class="list-group-item"><label  class="reg_step_3_label">Contact sellers</label><i class="fa fa-check-square reg_step_3_label_fa"></i></span>
                                <span class="list-group-item"><label  class="reg_step_3_label">View pictures</label><i class="fa fa-check-square reg_step_3_label_fa"></i></span>
                                <span class="list-group-item"><label  class="reg_step_3_label">Featured account</label><i class="fa fa-check-square reg_step_3_label_fa"></i></span>
                                <span class="list-group-item"><label  class="reg_step_3_label">Request cuisine samples</label><i class="fa fa-check-square reg_step_3_label_fa"></i></span>
                                <span class="list-group-item"><label  class="reg_step_3_label">Featured: <br/>of 1</label><i class="fa fa-check-square reg_step_3_label_fa"></i></span>
                                <span class="list-group-item" style="text-align: center;">
                                       <i class="fa fa-question-circle reg_step_3_label_fa_question" data-toggle="tooltip" data-placement="top" title="" data-original-title="Love to cook? Now is your chance to build a cooking portfolio on PMTC, offer samples and gain customers. "></i>
                               </span>
                                <span class="list-group-item"><input type="radio"  name="plan"/><br/></span>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-lg pull-right" type="submit">Next</button>

                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-4">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Step 4</h3>
                    <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
include_once 'includes/footer.php';
?>