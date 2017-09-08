/*
 *  Document   : base_pages_login.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Login Page
 */

var BasePagesLogin = function() {
    // Init Login Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationLogin = function(){
        jQuery('.js-validation-login').validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group .form-material').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'identity': {
                    required: true,
                    minlength: 3
                },
                'password': {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                'identity': {
                    required: 'Please enter a username',
                    minlength: 'Your username must consist of at least 3 characters'
                },
                'password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long'
                }
            }
        });
    };

    return {
        init: function () {
            // Init Login Form Validation
            initValidationLogin();
        }
    };
}();
var BaseUsers = function() {
    // Init Login Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initCreateUser = function(){
        jQuery('.js-validation-create-user').validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group .form-material').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'first_name': {
                    required: true,
                    minlength: 3
                },
                'last_name': {
                    required: true,
                },
                'password': {
                    minlength: 5
                },
                'password_confirm': {
                    equalTo: '#password'
                },
                'company': {
                    required: true
                },
                'phone': {
                    required: true,
                    number: true
                },
                'groups': {
                    required: true
                }
            },
 			messages: {
                'first_name': {
                    required: 'Please enter a First Name',
                    minlength: 'Your username must consist of at least 3 characters'
                },
				'last_name': {
                    required: 'Please enter a Last Name',
                    minlength: 'Your username must consist of at least 3 characters'
                },
                'password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long'
                },
                'password_confirm': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long',
                    equalTo: 'Please enter the same password as above'
                },
                'company': 'Please Enter a Company',
                'phone': 'Please Enter a Phone',
                'groups': 'You must selectat lease one group'
            }
        });
		
    };
	    var initEditUser = function(){
        jQuery('.js-validation-edit-user').validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group .form-material').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'first_name': {
                    required: true,
                    minlength: 3
                },
                'last_name': {
                    required: true,
                },
                'password': {
                    minlength: 5
                },
                'password_confirm': {
                    equalTo: '#password'
                },
                'company': {
                    required: true
                },
                'phone': {
                    required: true,
                    number: true
                },
                'groups': {
                    required: true
                }
            },
 			messages: {
                'first_name': {
                    required: 'Please enter a First Name',
                    minlength: 'Your username must consist of at least 3 characters'
                },
				'last_name': {
                    required: 'Please enter a Last Name',
                    minlength: 'Your username must consist of at least 3 characters'
                },
                'password': {
                    minlength: 'Your password must be at least 5 characters long'
                },
                'password_confirm': {
                    minlength: 'Your password must be at least 5 characters long',
                    equalTo: 'Please enter the same password as above'
                },
                'company': 'Please Enter a Company',
                'phone': 'Please Enter a Phone',
                'groups': 'You must selectat lease one group'
            }
        });
		
    };

    return {
        init: function () {
            // Init Login Form Validation
            initEditUser();
			initCreateUser();
        }
    };
}();
// Initialize when page loads
jQuery(function(){ BasePagesLogin.init(); BaseUsers.init(); });