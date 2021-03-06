<?php


class Application extends CI_Controller
{


    public function __Construct()
    {


        parent::__construct();


        $this->load->helper('string');


        $this->load->helper(array('form', 'url'));


        $this->load->helper('email');


        $this->load->model('application_model');


        $this->load->library('encrypt');


        $this->load->helper('captcha');


        $this->load->helper('download');


        $this->load->library('session');


        //$this->load->helper('My_Encrypt');


    }


    public function index()


    {


        $this->load->helper('url');


        if (!file_exists(APPPATH . '/views/' . THEME . '/pages/application.php')) {


            // Whoops, we don't have a page for that!


            show_404();


        }


        $data = array(

            'applicants' => $this->input->post('applicants'),


            'nationality' => $this->input->post('nationality'),


            'travaldocument' => $this->input->post('travaldocument'),


            'arrivaldatemonth' => $this->input->post('arrivaldatemonth'),

            'arrivaldateday' => $this->input->post('arrivaldateday'),

            'arrivaldateyear' => $this->input->post('arrivaldateyear'),


            'CountryVisaPermit' => $this->input->post('CountryVisaPermit'),


            'TSD' => $this->input->post('TSD'),


            'VisaPermitExpire' => $this->input->post('VisaPermitExpire'),


            'VisaPermitExpireDateday' => $this->input->post('VisaPermitExpireDateday'),

            'VisaPermitExpireDatemonth' => $this->input->post('VisaPermitExpireDatemonth'),

            'VisaPermitExpireDateyear' => $this->input->post('VisaPermitExpireDateyear'),


            'firstname' => $this->input->post('firstname'),


            'lastname' => $this->input->post('lastname'),


            //'dob' => $this->input->post('dob'),


            'dobmonth' => $this->input->post('dobmonth'),


            'dobday' => $this->input->post('dobday'),


            'dobyear' => $this->input->post('dobyear'),


            'placeofbirth' => $this->input->post('placeofbirth'),


            'mothername' => $this->input->post('mothername'),


            'fathername' => $this->input->post('fathername'),


            'passportnumber' => $this->input->post('passportnumber'),


            //'pid' => $this->input->post('pid'),


            //'ped' => $this->input->post('ped'),


            'pidmonth' => $this->input->post('pidmonth'),


            'pidday' => $this->input->post('pidday'),


            'pidyear' => $this->input->post('pidyear'),


            'pedmonth' => $this->input->post('pedmonth'),


            'pedday' => $this->input->post('pedday'),


            'pedyear' => $this->input->post('pedyear'),


            'email' => $this->input->post('email'),


            'phone' => $this->input->post('phone'),


            'address' => $this->input->post('address'),


            //'state' => $this->input->post('state'),


            //'city' => $this->input->post('city'),


            //'country' => $this->input->post('country'),


            //'street' => $this->input->post('street'),


            //'zipcode' => $this->input->post('zipcode')


        );


        $data['title'] = ucfirst("Application"); // Capitalize the first letter


        //$data['captcha_message']="Captcha Incorrect";


        $data['countrylist'] = $this->application_model->get_country();


        $this->load->view(THEME . '/pages/application', $data);


        $this->load->view(THEME . '/templates/footer', $data);


    }


    public function appreview()


    {


        $this->load->helper(array('form', 'url'));


        $this->load->library('form_validation');


        session_start();


        //$this->form_validation->set_rules('TSD', 'Travel Support Document', 'required');


        /*if($this->input->post('TSD')=='1'){



        $this->form_validation->set_rules('CountryVisaPermit1', 'Country Visa Permit', 'required');



        //$countryPermit=$this->input->post('CountryVisaPermit1');



        }else{



        $this->form_validation->set_rules('CountryVisaPermit2', 'Country Visa Permit', 'required');



        //$countryPermit=$this->input->post('CountryVisaPermit2');



        }



        if($this->input->post('VisaPermitExpire')!='1'){



        $this->form_validation->set_rules('VisaPermitExpireDate', 'Visa Permit Expire Date', 'required');



        //$countryPermit=$this->input->post('CountryVisaPermit1');



        }*/


        $this->form_validation->set_rules('nationality', 'Nationality', 'required');


        $this->form_validation->set_rules('travaldocument', 'Traval Document', 'required');


        $this->form_validation->set_rules('firstname', 'Firstname', 'required');


        $this->form_validation->set_rules('lastname', 'Surname', 'required');


        $this->form_validation->set_rules('placeofbirth', 'Place Of Birth', 'required');


        $this->form_validation->set_rules('mothername', 'Mother Name', 'required');


        $this->form_validation->set_rules('fathername', 'Surname', 'required');


        $this->form_validation->set_rules('lastname', 'Father Name', 'required');


        $this->form_validation->set_rules('email', 'Email', 'email|required');


        $this->form_validation->set_rules('phone', 'Phone', 'required');


        $this->form_validation->set_rules('address', 'Address', 'required');


        //$this->form_validation->set_rules('country', 'Country', 'required');


        $this->form_validation->set_rules('passportnumber', 'Passport Number', 'required');


        //$this->form_validation->set_rules('captcha_input', 'Captcha', 'required');


        // $this->form_validation->set_rules('dob', 'Date of birth', 'required');


        //$this->form_validation->set_rules('arrivaldate', 'Arrival Date', 'required');


        //$this->form_validation->set_rules('pid', 'Passport Issue Date', 'required');


        //$this->form_validation->set_rules('ped', 'Passport Expiry Date', 'required');


        if ($this->form_validation->run() == TRUE) {


            $data1['title'] = ucfirst("Application Review"); // Capitalize the first letter


            if ($this->input->post('TSD') == '1') {


                $countryPermit = $this->input->post('CountryVisaPermit1');


            } else {


                $countryPermit = $this->input->post('CountryVisaPermit2');


            }


            $data = array(


                'nationality' => $this->input->post('nationality'),


                'travaldocument' => $this->input->post('travaldocument'),


                'arrivaldatemonth' => $this->input->post('arrivaldatemonth'),

                'arrivaldateday' => $this->input->post('arrivaldateday'),

                'arrivaldateyear' => $this->input->post('arrivaldateyear'),


                'CountryVisaPermit' => $countryPermit,


                'TSD' => $this->input->post('TSD'),


                'VisaPermitExpire' => $this->input->post('VisaPermitExpire'),


                'VisaPermitExpireDateday' => $this->input->post('VisaPermitExpireDateday'),

                'VisaPermitExpireDatemonth' => $this->input->post('VisaPermitExpireDatemonth'),

                'VisaPermitExpireDateyear' => $this->input->post('VisaPermitExpireDateyear'),


                'firstname' => $this->input->post('firstname'),


                'lastname' => $this->input->post('lastname'),


                //'dob' => $this->input->post('dob'),


                'dobmonth' => $this->input->post('dobmonth'),


                'dobday' => $this->input->post('dobday'),


                'dobyear' => $this->input->post('dobyear'),


                'placeofbirth' => $this->input->post('placeofbirth'),


                'mothername' => $this->input->post('mothername'),


                'fathername' => $this->input->post('fathername'),


                'passportnumber' => $this->input->post('passportnumber'),


                //'pid' => $this->input->post('pid'),


                //'ped' => $this->input->post('ped'),


                'pidmonth' => $this->input->post('pidmonth'),


                'pidday' => $this->input->post('pidday'),


                'pidyear' => $this->input->post('pidyear'),


                'pedmonth' => $this->input->post('pedmonth'),


                'pedday' => $this->input->post('pedday'),


                'pedyear' => $this->input->post('pedyear'),


                'email' => $this->input->post('email'),


                'phone' => $this->input->post('phone'),


                'address' => $this->input->post('address'),


                //'state' => $this->input->post('state'),


                //'city' => $this->input->post('city'),


                //'country' => $this->input->post('country'),


                //'street' => $this->input->post('street'),


                //'zipcode' => $this->input->post('zipcode')


            );


            //$data['nationality']=$this->application_model->get_country($this->input->post('nationality'));


            $nationality = $this->application_model->get_country($this->input->post('nationality'));


            $data['nationalityname'] = $nationality['country'];


            $data['nationality_price'] = $nationality['price'];


            $country = $this->application_model->get_country($this->input->post('country'));


            $data['countryname'] = $country['country'];


            $data['countrylist'] = $this->application_model->get_country();


            $this->load->view(THEME . '/pages/appreview.php', $data);


            $this->load->view(THEME . '/templates/footer', $data);


        } else {


            if ($this->input->post('TSD') == '1') {


                $countryPermit = $this->input->post('CountryVisaPermit1');


            } else {


                $countryPermit = $this->input->post('CountryVisaPermit2');


            }


            $data = array(


                'nationality' => $this->input->post('nationality'),


                'travaldocument' => $this->input->post('travaldocument'),


                'arrivaldatemonth' => $this->input->post('arrivaldatemonth'),

                'arrivaldateday' => $this->input->post('arrivaldateday'),

                'arrivaldateyear' => $this->input->post('arrivaldateyear'),


                'CountryVisaPermit' => $countryPermit,


                'TSD' => $this->input->post('TSD'),


                'VisaPermitExpire' => $this->input->post('VisaPermitExpire'),


                'VisaPermitExpireDateday' => $this->input->post('VisaPermitExpireDateday'),

                'VisaPermitExpireDatemonth' => $this->input->post('VisaPermitExpireDatemonth'),

                'VisaPermitExpireDateyear' => $this->input->post('VisaPermitExpireDateyear'),


                'firstname' => $this->input->post('firstname'),


                'lastname' => $this->input->post('lastname'),


                'dob' => $this->input->post('dob'),


                'placeofbirth' => $this->input->post('placeofbirth'),


                'mothername' => $this->input->post('mothername'),


                'fathername' => $this->input->post('fathername'),


                'passportnumber' => $this->input->post('passportnumber'),


                'pid' => $this->input->post('pid'),


                'ped' => $this->input->post('ped'),


                'email' => $this->input->post('email'),


                'phone' => $this->input->post('phone'),


                'address' => $this->input->post('address'),


                //'state' => $this->input->post('state'),


                //'city' => $this->input->post('city'),


                //'country' => $this->input->post('country'),


                //'street' => $this->input->post('street'),


                //'zipcode' => $this->input->post('zipcode')


            );


            $data1['title'] = ucfirst("Application"); // Capitalize the first letter

            $data['step'] = "2";


            $data['countrylist'] = $this->application_model->get_country();


            $this->load->view(THEME . '/templates/header', $data1);


            $this->load->view(THEME . '/pages/application.php', $data);


            $this->load->view(THEME . '/templates/footer', $data);


        }


    }


    public function appsubmit()
    {
        $txnID = $this->input->post('txn_id');
        if (isset($txnID)) {
            $reference_number = $this->input->post('referenceNumber');
            $this->load->database();
            $IPaddress = $_SERVER['REMOTE_ADDR'];

            $json = file_get_contents("http://ipinfo.io/{$IPaddress}/json");

            $details = json_decode($json);

            //print_r($details);


            $now = date("Y-m-d H:i:s");


            $data = array(


                'applicants' => $this->input->post('applicants'),


                'nationality' => $this->input->post('nationality'),


                'travaldocument' => $this->input->post('travaldocument'),


                'arrivaldate' => $this->input->post('arrivaldate'),


                'CountryVisaPermit' => $this->input->post('CountryVisaPermit'),


                'TSD' => $this->input->post('TSD'),


                'VisaPermitExpire' => $this->input->post('VisaPermitExpire'),


                'VisaPermitExpireDate' => $this->input->post('VisaPermitExpireDate'),


                'firstname' => implode('?|', $this->input->post('firstname')),


                'lastname' => implode('?|', $this->input->post('lastname')),


                'dob' => implode('?|', $this->input->post('dob')),


                'placeofbirth' => implode('?|', $this->input->post('placeofbirth')),


                'mothername' => implode('?|', $this->input->post('mothername')),


                'fathername' => implode('?|', $this->input->post('fathername')),


                'passportnumber' => implode('?|', $this->input->post('passportnumber')),


                'pid' => implode('?|', $this->input->post('pid')),


                'ped' => implode('?|', $this->input->post('ped')),


                'email' => $this->input->post('email'),


                'phone' => $this->input->post('phone'),


                'address' => $this->input->post('address'),

                'processingtime' => $this->input->post('processingtime'),

                'ipaddress' => $this->input->ip_address(),

                'country_access' => $details->city . ',' . $details->region . ',' . $details->country . '-' . $details->postal,

                'org' => $details->org,


                //'state' => $this->input->post('state'),


                //'city' => $this->input->post('city'),


                //'country' => $this->input->post('country'),


                //'street' => $this->input->post('street'),


                //'zipcode' => $this->input->post('zipcode'),


                'status' => "P",


                'createddate' => $now,


                'active' => '0',


                'invoiceid' => $reference_number


            );


            $price = $this->input->post('price');


            if ($this->db->insert('applications', $data)) {


                $this->load->helper('email');


                $this->load->library('email');


                $config['wordwrap'] = TRUE;


                $config['mailtype'] = "html";


                $config['protocol'] = 'sendmail';


                $config['mailpath'] = '/usr/sbin/sendmail';


                $this->email->initialize($config);


                $email = $this->input->post('email');


                $name = $_POST['firstname'][0];


                 $surname=$_POST['lastname'][0];


                $dob = $_POST['dob'][0];


                $id = $this->db->insert_id();;


                $passport = $this->input->post('passport');


                $email_body = 'This is Mail for Address Verification';


                $this->email->from(SITEEMAIL, SITENAME);


                $this->email->to($email);


                //$this->email->cc('rajendraprasad775@gmail.com');

                //$email_body="You are selected";
/*
              <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">This email stands to confirm that we have received your Turkey e-Visa application, Please note that your e-Visa has been processed. So try to pay via the link mentioned below, If you have already paid please ignore this.</p>
<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Your payment can be accepted through Debit/ Credit Card or Paypal Gateway.</b><br/><a href="' . base_url() . 'index.php/application/payments/' . $reference_number . '" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 2; color: #FFF; text-decoration: none; background-color: green;background-image:-moz-linear-gradient(center top , #5cb85c,#4cae4c);box-shadow: 0 0 0 1px #green, 0 0 0 2px #green;   border: 0 none;cursor: pointer;margin: 5px 10px 10px 0;font-weight:bold;padding:10px;border-radius:4px">Pay&nbsp;Now</a></p>*/

                $this->email->subject("Application Created for REF:" . $reference_number);


                $email_body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



                            <html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">



                            <head>



                            <meta name="viewport" content="width=device-width" />



                            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />



                            <title>Application Created Ref' . $reference_number . '</title>



                            </head>



                            <body bgcolor="#f6f6f6" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 0; padding: 0;">&#13;



                            &#13;



                            &#13;



                            <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 20px;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>



                            <td bgcolor="#FFFFFF" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;">&#13;



                            &#13;



                            &#13;



                            <div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">&#13;



                            <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">&#13;







                            



                                                   <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Dear ' . $name . '</b>,</p>

						<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 0.5; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Application ID :</b> ' . $reference_number . '</p>

						<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 0.5; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Service Selected :</b> E-Visa</p>

						<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 0.5; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Payment Status :</b> Completed</p>

							                        <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Thank you for submitting your Turkey e-visa application via: <a href="' . base_url() . '">' . base_url() . '</a></p>



                        <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">This email stands to confirm that we have received your Turkey e-Visa application, Please note that your e-Visa has been processed.</p>



															<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;font-style:italic"><b>In case you are not able to find the email from us in your inbox, please check the "Spam" or "Junk Mail" folder.</b></p>

                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Check your application status from this link <a href="' . base_url() . 'index.php/check-status">' . base_url() . 'index.php/check-status</a></p>



                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;font-style:italic">For assistance, please click here <a href="' . base_url() . 'index.php/contact-us">' . base_url() . 'index.php/contact-us</a>.</p>

 <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><strong>Kind Regards,</strong><br />
							 <strong>eVisas Support Team</strong><br />
 <strong>24X7 Email Application Support</strong></br>
 <strong>Web : <a href="http://turkeyevisa.online">www.turkeyevisa.online</a></strong></br>
<strong>Email : <a href="http://turkeyevisa.online">https://turkeyevisa.online/contact-us</a></strong></br>
<b>Tel : Toll Free </b>- 18778376771 ( 9:30 am to 5:30pm - Monday to Friday).<br/>
530 Cedar Dr, Irving, TX 75061, USA</td>



                            </tr></table></div>



                            



                            



                            </td>



                            <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>



                            </tr></table><table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; clear: both !important; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>



                            <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;">&#13;



                            &#13;



                            &#13;



                            <div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">&#13;



                            <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td align="center" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">&#13;



                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #666; font-weight: normal; margin: 0 0 10px; padding: 0;">



                            2015 ' . SITENAME . ' .&#13;



                            </p>



                            </td>



                            </tr></table></div>



                            



                            



                            </td>



                            <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>



                            </tr></table></body>



                            </html>';


//$email_body="You are selected";


                $this->email->message($email_body);


                if ($this->email->send()) {


                    $this->email->clear();


                    $email_body = 'This is Mail for Address Verification';


                    $this->email->from(SITEEMAIL, 'Turkish Application');


                    $this->email->to(SITEEMAIL);


                    //$this->email->cc('info@evisas.online');


                    $email_body = "Hi Admin<br/> new Application registered in " . base_url() . "<br/>



                                Name : $name $surname<br/>



                                Reference Number :$reference_number<br/>



                                View Full Details Click <a href='" . base_url() . "theback/applications.php?action=edit&id=$id'>View Application</a><br/><br/>this is System generated mail donot reply";


                    $this->email->subject("New Application Created for REF:" . $reference_number);


                    $this->email->message($email_body);


                    $this->email->send();

                    /*$servicefee = $this->input->post('processingtime');

                    if ($servicefee == "1") {
                        $sp = "49";
                    } else if ($servicefee == "2") {
                        $sp = "69";
                    } else {
                        $sp = "99";
                    };


                    $config['business'] = 'info@evisas.online';

                    $config["tax"] = $sp;


                    $config['cpp_header_image'] = 'https://turkeyevisa.online/themes/site2/img/quick_evisa_paypal.png'; //Image header url [750 pixels wide by 90 pixels high]


                    $config['return'] = base_url() . 'index.php/application/return_payment/' . $reference_number;


                    $config['cancel_return'] = base_url() . 'index.php/application/cancel_payment/' . $reference_number;


                    $config['notify_url'] = base_url() . 'index.php/application/notify_payment/' . $reference_number; //IPN Post


                    $config['production'] = TRUE; //Its false by default and will use sandbox


                    //$config['discount_rate_cart'] 	= 20; //This means 20% discount


                    $config["custom"] = $this->db->insert_id();


                    $config["invoice"] = $reference_number;  //The invoice id


                    $config["first_name"] = $this->input->post('firstname')[0];

                    $applicants = $this->input->post('applicants');


                    $config["last_name"] = $this->input->post('surname');


                    $config["address1"] = $this->input->post('address');


                    //$config["address2"] 			= $this->input->post('street');


                    //$config["city"] 				= $this->input->post('city');


                    //$config["state"] 				= $this->input->post('state');


                    //$config["zip"] 					= $this->input->post('zipcode');


                    $config["email"] = $this->input->post('email');


                    $config["night_phone_a"] = $this->input->post('phone');*/
                    $s_data = array(
                        'invoice' => $reference_number,
                        'txn_id' => $txnID,
                        'payment_date' => date('d-m-Y H:i:s'),
                        'settle_amount' => $this->input->post('totalAmount'),
                        'payment_status' => 'Completed',
                        'settle_currency' => 'USD',
                        'auth_amount' => $this->input->post('totalAmount'),
                        'payer_email' =>  $this->input->post('email'),
                        'payment_type' => 'instant'

                    );
                    $this->db->insert('visa_payments', $s_data);
                    /*$this->load->library('paypal', $config);
#$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);
                    $this->paypal->add($reference_number, $price + $sp, $applicants, $config["first_name"] . 'Visa Payment'); //First item
                    //$this->paypal->add('Pants',40); 	  //Second item
                    //$this->paypal->add('Blowse',10,10,'B-199-26'); //Third item with co
                    $this->paypal->pay(); //Proccess the payment
                    //}*/
                } else {
                    echo "<h1>Mail Not Sent </h1>";
                }
                $this->session->set_flashdata('error_msg', '<span id="error" style="color:green">Your payment is processed successfully and we received your eVisa</span>');
                redirect(base_url() . 'index.php/application/apppreview/'.$reference_number);
            }
        } else {


            redirect(base_url() . 'index.php/application');


            $data1['title'] = ucfirst("Application"); // Capitalize the first letter


            //$data['captcha_message']="Captcha Incorrect";


            $data['country'] = $this->application_model->get_country();


            $this->load->view(THEME . '/templates/header', $data1);


            $this->load->view(THEME . '/pages/application.php', $data);


            $this->load->view(THEME . '/templates/footer', $data);


        }


    }


    public function notify_payment1()
    {


        $received_data = $this->input->post();


        if ($received_data) {


            $s_data = array(


                'txn_id' => $this->input->post('txn_id'),


                'txn_type' => $this->input->post('txn_type'),


                'receipt_id' => $this->input->post('receipt_id'),


                'receiver_email' => $this->input->post('receiver_email'),


                'payer_email' => $this->input->post('payer_email'),


                'payer_id' => $this->input->post('payer_id'),


                'auth_amount' => $this->input->post('mc_gross'),


                'auth_exp' => $this->input->post('auth_exp'),


                'auth_id' => $this->input->post('auth_id'),


                'auth_status' => $this->input->post('auth_status'),


                'echeck_time_processed' => $this->input->post('echeck_time_processed'),


                'invoice' => $this->input->post('invoice'),


                'item_namex' => $this->input->post('item_namex'),


                'payer_status' => $this->input->post('payer_status'),


                'payment_date' => $this->input->post('payment_date'),


                'payment_fee' => $this->input->post('payment_fee'),


                'payment_status' => $this->input->post('payment_status'),


                'payment_type' => $this->input->post('payment_type'),


                'pending_reason' => $this->input->post('pending_reason'),


                'settle_currency' => $this->input->post('settle_currency'),


                'settle_amount' => $this->input->post('settle_amount'),


                'shipping' => $this->input->post('shipping'),


                'shipping_method' => $this->input->post('shipping_method'),


                'invoiceid' => $this->input->post('custom'),


            );


            //store to db


            if ($this->db->insert('visa_payments', $s_data)) {


                $data['message_content'] = "<h1>Payment Status:" . $this->input->post('payment_status') . "</h1>";


                $invoiceid = $this->input->post('custom');


                $payment_id = $this->db->insert_id();


                $now = date("Y-m-d H:i:s");


                $p_data = array(


                    'paymentid' => $payment_id,


                    'paymentdate' => $now,


                );


                $this->db->where('invoiceid', $invoiceid);


                if ($this->db->update('applications', $p_data)) {


                    $this->load->helper('email');


                    $this->load->library('email');


                    $config['wordwrap'] = TRUE;


                    $config['mailtype'] = "html";


                    $config['protocol'] = 'sendmail';


                    $config['mailpath'] = '/usr/sbin/sendmail';


                    $this->email->initialize($config);


                    $get_app = $this->application_model->get_application($invoiceid);


                    $name = $get_app['firstname'] . ' ' . $get_app['surname'];


                    $dob = $get_app['dob'];


                    $status = $get_app['status'];


                    $passport = $get_app['passport'];


                    $email = $get_app['email'];


                    $this->email->from('info@evisas.online', SITENAME);


                    $this->email->to($email);


                    //$email_body="You are selected";


                    $this->email->subject("Payment Notification for REF:" . $invoiceid);


                    if ($this->input->post('payment_status') == 'Completed') {


                        $email_body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



                                    <html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">



                                    <head>



                                    <meta name="viewport" content="width=device-width" />



                                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />



                                    <title>Application Created Ref' . $invoiceid . '</title>



                                    </head>



                                    <body bgcolor="#f6f6f6" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 0; padding: 0;">&#13;



                                    &#13;



                                    &#13;



                                    <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 20px;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>&#13;



                                    <td bgcolor="#FFFFFF" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;">&#13;



                                    &#13;



                                    &#13;



                                    <div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">&#13;



                                    <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">&#13;







                                 



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Dear ' . $name . '</b>,</p>&#13;







                                    <h1 style="font-family: \'Helvetica Neue\', Helvetica, Arial, \'Lucida Grande\', sans-serif; font-size: 36px; line-height: 1.2; color: #000; font-weight: 200; margin: 40px 0 10px; padding: 0;">Your Application Submitted Successful.</h1>&#13;



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">This e-mail has been automatically generated by our electronic visa processing system</p>



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Your Electronic Visa application for Turkey has been submitted. Your application reference is <b>' . $invoiceid . '</b></p>



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Check your application status from the below link <a href="' . VISASTATUSLINK . '">' . VISASTATUSLINK . '</a></p>



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Please retain this e-mail for your records.</li>



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;font-style:italic">For assistance, please click here<a href="' . CONTACTLINK . '">' . CONTACTLINK . '</a>.</p>



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Please quote your application reference when contacting us for any queries regarding your e-visa processing.</li>



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">We are available  Via Email/Chat 24 hours a day,7 days for a week</p><br/><br/>



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Kind Regards</b></p>



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Support Team,</p>



                                    </td>



                                    </tr></table></div>



                                    



                                    



                                    </td>



                                    <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>



                                    </tr></table><table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; clear: both !important; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>



                                    <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;">



                                    



                                    



                                    <div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">



                                    <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td align="center" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #666; font-weight: normal; margin: 0 0 10px; padding: 0;">



                                    2015 ' . SITENAME . ' .



                                    </p>



                                    </td>



                                    </tr></table></div>



                                    



                                    



                                    </td>



                                    <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>



                                    </tr></table></body>



                                    </html>';


                    } else {


                        $email_body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



                                    <html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">



                                    <head>



                                    <meta name="viewport" content="width=device-width" />



                                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />



                                    <title>Application Created Ref' . $invoiceid . '</title>



                                    </head>



                                    <body bgcolor="#f6f6f6" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 0; padding: 0;">&#13;



                                    &#13;



                                    &#13;



                                    <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 20px;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>&#13;



                                    <td bgcolor="#FFFFFF" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;">&#13;



                                    &#13;



                                    &#13;



                                    <div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">&#13;



                                    <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">&#13;







                                    



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Dear ' . $name . '</b>,</p>&#13;







                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Your Application for Turkey e-Visa payment has failed.</p>



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Click the following link to attempt another payment and complete your application</p>



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><a href="' . base_url() . 'index.php/application/payments/' . $invoiceid . '" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 2; color: #FFF; text-decoration: none; background-color: green;background-image:-moz-linear-gradient(center top , #be1c03, #670600);box-shadow: 0 0 0 1px #green, 0 0 0 2px #green;   border: 0 none;cursor: pointer;margin: 5px 10px 10px 0;font-weight:bold;padding:10px;border-radius:4px">Pay&nbsp;Now</a></p>&#13;



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;font-style:italic">For assistance, please click here<a href="' . CONTACTLINK . '">' . CONTACTLINK . '</a>.</p>



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Please quote your application reference when contacting us for any queries regarding your e-visa processing.</li>



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">We are available  Via Email/Chat 24 hours a day,7 days for a week</p><br/><br/>

 




                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Kind Regards</b></p>



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Support Team,</p>



                                    </td>



                                    </tr></table></div>



                                    



                                   



                                    </td>



                                    <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>



                                    </tr></table><table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; clear: both !important; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>



                                    <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;">



                                   



                                    <div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">



                                    <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td align="center" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">



                                    <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #666; font-weight: normal; margin: 0 0 10px; padding: 0;">



                                    2015 ' . SITENAME . ' .



                                    </p>



                                    </td>



                                    </tr></table></div>



                                    



                                    



                                    </td>



                                    <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>



                                    </tr></table></body>



                                    </html>';


                    }


                    $this->email->message($email_body);


                    $this->email->send();


                }


            }


        }//if data received from server end


        //echo "<pre>".$received_data."</pre>";


        $data1['title'] = "Payment Information";


        $data['message_title'] = "Payment Notification";


        $this->load->view(THEME . '/templates/header', $data1);


        $this->load->view(THEME . '/pages/message.php', $data);


        $this->load->view(THEME . '/templates/footer', $data);


    }


    public function cancel_payment($id = NULL)
    {


        $this->load->helper('email');


        $this->load->library('email');


        //echo $id;


        //$this->load->model('application_model');


        //$get_app=$this->application_model->get_application($id);


        //print_r($get_app);


        if ($id != NULL) {


            $config['wordwrap'] = TRUE;


            $config['mailtype'] = "html";


            $config['protocol'] = 'sendmail';


            $config['mailpath'] = '/usr/sbin/sendmail';


            $this->email->initialize($config);


            $get_app = $this->application_model->get_application($id);


            $name = $get_app['firstname'] . ' ' . $get_app['surname'];


            $dob = $get_app['dob'];


            $status = $get_app['status'];


            $passport = $get_app['passport'];


            $email = $get_app['email'];


            $reference_number = $get_app['invoiceid'];


            // $this->email->from('info@evisas.online', 'Turkey Visa Pro');


            //$this->email->to($email);


            // $passport=$this->input->post('passport');


            //$email_body='This is Mail for Address Verification';


            $this->email->from(SITEEMAIL, SITENAME);


            $this->email->to($email);


            //$this->email->cc('rajendraprasad775@gmail.com');


            //$email_body="You are selected";


            $this->email->subject("Payment Status Notification for REF:" . $reference_number);


            $email_body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



                        <html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">



                        <head>



                        <meta name="viewport" content="width=device-width" />



                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />



                        <title>Turkey Visa Application Ref' . $reference_number . '</title>



                        </head>



                        <body bgcolor="#f6f6f6" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 0; padding: 0;">&#13;



                        &#13;



                        &#13;



                        <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 20px;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>&#13;



                        <td bgcolor="#FFFFFF" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;">&#13;



                        &#13;



                        &#13;



                        <div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">&#13;



                        <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">&#13;



                        <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Dear ' . $name . '</b>,</p>&#13;

						<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 0.5; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Application ID :</b> ' . $reference_number . '</p>

						<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 0.5; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Service Selected :</b> E-Visa</p>

						<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 0.5; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Payment Status :</b> Unpaid</p>

<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Thank you for your Turkey visa application via: <a href="' . base_url() . '">' . base_url() . '</a></p>



                        <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">This email to confirm that <a href="' . base_url() . '">' . base_url() . '</a> has received your e-visa application, <a href="' . base_url() . '">' . base_url() . '</a>  notes that your payment has not yet been completed. Please process the payment within a 24 HR notification window, your authorisation is required before <a href="' . base_url() . '">' . base_url() . '</a> can process the e-Visa application.</p>

<br/>

                        <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Your payment can be accepted through Debit/ Credit Card or Paypal Gateway.<br/> <a href="' . base_url() . 'index.php/application/payments/' . $reference_number . '" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 2; color: #FFF; text-decoration: none; background-color: green;background-image:-moz-linear-gradient(center top , #5cb85c, #4cae4c);box-shadow: 0 0 0 1px #green, 0 0 0 2px #green;   border: 0 none;cursor: pointer;margin: 5px 10px 10px 0;font-weight:bold;padding:10px;border-radius:4px">Pay&nbsp;Now</a></p></b>



                        <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;font-style:italic"><b>Incase you are not able to find the email confirmation from us in your inbox, please check the "Spam" or "Junk Mail" folder.</b></p>

						 <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;font-style:italic">Check your application status from this link <a href="' . base_url() . 'index.php/check-status">' . base_url() . 'index.php/check-status</a>.</p>

                        <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;font-style:italic">For assistance, please click here <a href="' . base_url() . 'index.php/contact-us">' . base_url() . 'index.php/contact-us</a>.</p>
                        <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 0.5; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Kind Regards</b></p>
							 <strong>Turkey eVisa Support Team</strong><br />
 <strong>24X7 Email Application Support</strong></br>
 <strong>Web : <a href="http://turkeyevisa.online">www.turkeyevisa.online</a></strong></br>
<strong>Email : <a href="http://turkeyevisa.online">https://turkeyevisa.online/contact-us</a></strong></br>
<b>Tel : Toll Free </b>- 18778376771 ( 9:30 am to 5:30pm - Monday to Friday).<br/>
Red Hill House, 41 Hope Street, Saltney, Chester CH4 8BU, United Kingdom.</td>



                        </td>



                        </tr></table></div>



                        



                        </td>



                        <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>



                        </tr></table><table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; clear: both !important; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>



                        <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;">



                        



                        <div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">



                        <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td align="center" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">



                        <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #666; font-weight: normal; margin: 0 0 10px; padding: 0;">



                        2015 ' . SITENAME . ' .



                        </p>



                        </td>



                        </tr></table></div>



                        



                        </td>



                        <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>



                        </tr></table></body>



                        </html>';


//$email_body="You are selected";


            $this->email->message($email_body);


            if ($this->email->send()) {


                $data1['title'] = "Payment Information";


                $data['message_title'] = "Oops Payment with PayPal was cancel";

                $name = explode('?|', $get_app['firstname'])[0];

                $data['message_content'] = "<p><b>Dear " . $name . "</b><br/><br/><b>Thank you for choosing <a href='" . base_url() . "'>" . base_url() . "</a> online services.</b><br/><br>

Our dedicated team will contact you via email shortly in 5  -10 minutes with link to pay by 



credit/debit card or other payment method if you don't want to pay via PayPal. Please wait for 



a while or you can email to <a href='mailto:" . SITEEMAIL . "'>" . SITEEMAIL . "</a> for urgent matter.<br/><br>



Before we send you a payment link, would you please check your email now including spam box 



or junk box to get email confirmation for your Turkey visa order and double check your 



passport information.<br/><br/>



Thank you very much for your patience.</p>";


                $this->load->view(THEME . '/templates/header', $data1);


                $this->load->view(THEME . '/pages/message1.php', $data);


                $this->load->view(THEME . '/templates/footer', $data);


            } else {


                $data1['title'] = "Payment Information";


                $data['message_title'] = "Payment Cancelled";


                $data['message_content'] = "<h1>You Have Canceled Your Payment</h1>";


                $this->load->view(THEME . '/templates/header', $data1);


                $this->load->view(THEME . '/pages/message.php', $data);


                $this->load->view(THEME . '/templates/footer', $data);


            }


        } else {


            $data1['title'] = "Payment Information";


            $data['message_title'] = "Payment Cancelled";


            $data['message_content'] = "<h1>You Have Canceled Your Payment</h1>";


            $this->load->view(THEME . '/templates/header', $data1);


            $this->load->view(THEME . '/pages/message.php', $data);


            $this->load->view(THEME . '/templates/footer', $data);


        }


    }


    public function return_payment($id = NULL)
    {


        $received_data = $this->input->post();


        //print_r($received_data);


        $invoiceid = $id;


        $this->load->helper('email');


        $this->load->library('email');


        $config['wordwrap'] = TRUE;


        $config['mailtype'] = "html";


        $config['protocol'] = 'sendmail';


        $config['mailpath'] = '/usr/sbin/sendmail';


        $this->email->initialize($config);


        $get_app = $this->application_model->get_application($invoiceid);


        //print_r($get_app);


        $name = explode('?|', $get_app['firstname'])[0];


        $dob = $get_app['dob'];


        $status = $get_app['status'];


        $passport = $get_app['passport'];


        $email = $get_app['email'];


        $this->email->from(SITEEMAIL, SITENAME);


        $this->email->to($email);


        //$email_body="You are selected";


        $this->email->subject("Application Successful for REF:" . $invoiceid);


        $p_data = array(


            'txn_id' => $this->input->post('txn_id'),


            'txn_type' => $this->input->post('txn_type'),


            'receipt_id' => $this->input->post('receipt_id'),


            'receiver_email' => $this->input->post('receiver_email'),


            'payer_email' => $this->input->post('payer_email'),


            'payer_id' => $this->input->post('payer_id'),


            'auth_amount' => $this->input->post('mc_gross'),


            'auth_exp' => $this->input->post('auth_exp'),


            'auth_id' => $this->input->post('auth_id'),


            'auth_status' => $this->input->post('auth_status'),


            'echeck_time_processed' => $this->input->post('echeck_time_processed'),


            'invoice' => $this->input->post('invoice'),


            'item_namex' => $this->input->post('item_namex'),


            'payer_status' => $this->input->post('payer_status'),


            'payment_date' => $this->input->post('payment_date'),


            'payment_fee' => $this->input->post('payment_fee'),


            'payment_status' => $this->input->post('payment_status'),


            'payment_type' => $this->input->post('payment_type'),


            'pending_reason' => $this->input->post('pending_reason'),


            'settle_currency' => $this->input->post('settle_currency'),


            'settle_amount' => $this->input->post('settle_amount'),


            'shipping' => $this->input->post('shipping'),


            'shipping_method' => $this->input->post('shipping_method'),


            'invoiceid' => $this->input->post('custom'),


        );


        $this->db->where('invoice', $invoiceid);


        if ($this->db->update('visa_payments', $p_data)) {


            $email_body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

                            <html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">







                            <head>







                            <meta name="viewport" content="width=device-width" />







                            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />







                            <title>Application Created Ref' . $invoiceid . '</title>







                            </head>







                            <body bgcolor="#f6f6f6" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 0; padding: 0;">&#13;







                            &#13;







                            &#13;







                            <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 20px;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>&#13;







                            <td bgcolor="#FFFFFF" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;">&#13;







                            &#13;







                            &#13;







                            <div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">&#13;







                            <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">&#13;











                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Dear ' . $name . '</b>,<br/><b>Invoice ID :' . $invoiceid . '</b></p>&#13;















                            <p style="font-family: \'Helvetica Neue\', Helvetica, Arial, \'Lucida Grande\', sans-serif; font-size: 36px; line-height: 1.2; color: #000; font-weight: 200; margin: 40px 0 10px; padding: 0;">Thank you for choosing <a href="' . base_url() . '">' . base_url() . '</a> online services</p>&#13;







                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Our dedicated team will contact you via email shortly in 5 � 10 minutes with link to pay by credit/debit card or other payment method if you don�t want to pay via PayPal. Please wait for a while or you can email to <a href="mailto:' . SITEEMAIL . '">' . SITEEMAIL . '</a> for urgent matter.</p>







                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Before we send you a payment link, would you please check your email now including spam box or junk box to get email confirmation for your Turkey visa order and double check your passport information</b></p>







                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Check your application status from the below link <a href="' . VISASTATUSLINK . '">' . VISASTATUSLINK . '</a></p>







                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Please retain this e-mail for your records.</li>







                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;font-style:italic">For assistance, please click here<a href="' . CONTACTLINK . '">' . CONTACTLINK . '</a>.</p>



                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Thank you very much for your patience.</b></p>









                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Support Team,</p>







                            </td>&#13;







                            </tr></table></div>&#13;







                            &#13;







                            &#13;







                            </td>&#13;







                            <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>&#13;







                            </tr></table><table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; clear: both !important; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>&#13;







                            <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;">&#13;







                            &#13;







                            &#13;







                            <div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">&#13;







                            <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td align="center" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">&#13;







                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #666; font-weight: normal; margin: 0 0 10px; padding: 0;">







                            2015 ' . SITENAME . ' .&#13;







                            </p>&#13;







                            </td>&#13;







                            </tr></table></div>&#13;







                            &#13;







                            &#13;







                            </td>&#13;







                            <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>&#13;







                            </tr></table></body>







                            </html>';


            $this->email->message($email_body);


            $this->email->send();


            // TODO: process order here


        }


        // ...


        $data1['title'] = "Return Payment";


        $data['message_title'] = "Payment Successful";


        $data['message_content'] = "<p><b>Dear: $name</b>

<b>Application ID: $invoiceid</b>

<b>Service Selected: e-Visa</b>

************************************************<br/>

Thank you for your Turkey visa application via: <b> " . base_url() . " </b><br/>

This is to confirm your Turkey Visa application has been successfully sent. We will be processing your visa application accordingly. 

<ul><li>To check the status of your application, you can sign in at our website https://www.turkeyvisapro.com/checkstatus</li>

<li>Please check your email to confirm the information submitted is correct. In case you are not able to find the email from us in your inbox, please check the 'Spam' or 'Junk Mail' Folder.</li></ul>

If you have further concerns, please email us at <a href='mailto:" . SITEEMAIL . "'>" . SITEEMAIL . "</a> or call our Toll Free - 18778376771 for immediate assistance.

";


        $this->load->view(THEME . '/templates/header', $data1);


        $this->load->view(THEME . '/pages/message.php', $data);


        $this->load->view(THEME . '/templates/footer', $data);


    }


    public function address_approve($id = NULL)
    {


        $custid = $id;


        $verify = $this->application_model->address_verify($custid);


        if ($verify) {


            $data1['title'] = "Address Verification";


            $data['message_title'] = "Address Verification";


            $data['message_content'] = "<h1>Address Verification Completed</h1>";


            $this->load->view(THEME . '/templates/header', $data1);


            $this->load->view(THEME . '/pages/message.php', $data);


            $this->load->view(THEME . '/templates/footer', $data);


        } else {


            $data1['title'] = "Address Verification";


            $data['message_title'] = "Address Verification";


            $data['message_content'] = "<h1>Address Verification Failed</h1>";


            $this->load->view(THEME . '/templates/header', $data1);


            $this->load->view(THEME . '/pages/message.php', $data);


            $this->load->view(THEME . '/templates/footer', $data);


        }


    }


    public function download_evisa($id = NULL)
    {


        if ($id != NULL) {


            $custid = $id;


            $download = $this->application_model->download_evisa($custid);


            if ($download != 'nodata') {


                //$data = file_get_contents(FCPATH."uploads/".$download['visapdf']); // Read the file's contents

                //redirect(base_url()."uploads/".$download['visapdf']);

                $data1['title'] = "Download E-Visa";


                $data['message_title'] = "Download E-Visa ";
                $data['message_titles'] = "$custid ";


                $data['message_content'] = "<h4 style='color: green'>Your application has been successfully completed.</h4> <p>Congratulations! Your e-Visa application for Turkey has been approved by the Turkish Embassy. Download your e-Visa by clicking the below download button, print it and carry whilst travelling to Turkey. A PDF reader must be installed on your computer to open your e-Visa. Visit<a target='_blank' href='https://get.adobe.com/reader/'> http://www.adobe.com</a> to download PDF reader for free.</p>

<p>If you are experiencing problems with the download of your e-Visa, please feel free to contact us at info@evisas.online 24/7 support team available to assist you.</p>

";
                /*<a style='
                    background-color: #c61334;
                    border: medium none;
                    border-radius: 0;
                    box-shadow: 6px 6px 0 #efe9e9;
                    color: #fff;
                    font-size: 18px;
                    font-weight: 900;
                    line-height: 32px;
                    margin-right: 13px;
                    padding: 0px 5px;
                    transition: all 0.2s ease 0s;'  class='btn'  href=".base_url()."uploads/".$download['image']."  download=".$download['image'].">Download your e-Visa</a>";
                /*$downloads = $this->db->query("SELECT * FROM upload_images where id='$id'");

                foreach ($downloads->result_array() as $download)
                {
                echo $row['image'];
                }*/


                $this->load->view(THEME . '/templates/header', $data1);


                $this->load->view(THEME . '/pages/payment.php', $data);


                $this->load->view(THEME . '/templates/footer', $data);

                //$name = $custid.".pdf";


                //force_download($name, $data);


            } else {


                $data1['title'] = "Download E-Visa";

                $data['message_title'] = "Download E-Visa";

                // $data['message_titles']="$custid";

                $data['message_content'] = "<h1>No Visa Found for this user</h1>";

                $data['message_content1'] = "";

                $this->load->view(THEME . '/templates/header', $data1);


                $this->load->view(THEME . '/pages/message.php', $data);


                $this->load->view(THEME . '/templates/footer', $data);


            }


        } else {


            $data1['title'] = "Download E-Visa";


            $data['message_title'] = "Download E-Visa";

            // $data['message_titles']="$custid";

            $data['message_content'] = "<h1>No Visa Found for this user</h1>";


            $this->load->view(THEME . '/templates/header', $data1);


            $this->load->view(THEME . '/pages/message.php', $data);


            $this->load->view(THEME . '/templates/footer', $data);


        }


    }


    public function check_status()
    {


        $btn_clk = $this->input->post('checkstatus');


        if (isset($btn_clk)) {


            $this->load->library('form_validation');


            $this->form_validation->set_rules('applicationnumber', 'Application / Reference Number', 'required');


            if ($this->form_validation->run() == FALSE) {


                $data1['title'] = "Check-status";


                $this->load->view(THEME . '/templates/header', $data1);


                $this->load->view(THEME . '/pages/check-status', $data);


                $this->load->view(THEME . '/templates/footer', $data);


            } else {


                $appnumber = $this->input->post('applicationnumber');


                $checkstatus = $this->application_model->check_status($appnumber);


                //echo sizeof($checkstatus);


                if (sizeof($checkstatus) > 0) {


                    $data1['title'] = "Check Status";


                    $data['visa_status'] = $checkstatus;


                    if ($checkstatus['status'] == 'C') {


                        /*  $data['message_content']="<h1>Application Success</h1><br/>



                                                   Congratulations!! Your application for Turkey electronic Visa is approved. Download your e-Visa by







                                                   clicking the below download button, print it and carry while travelling to Turkey



                                                   <br/><a href=".base_url()."uploads/".$download['visapdf']." class='ka_button large_button large_cherry' download=".$download['visapdf'].">Download Visa</a>";*/


                        $custid = $this->input->post('applicationnumber');;


                        $download = $this->application_model->download_evisa($custid);

                        $data1['title'] = "Download E-Visa";


                        $data['message_title'] = "Download E-Visa ";
                        $data['message_titles'] = "$custid ";


                        $data['message_content'] = "<h4 style='color: green'>Your application has been successfully completed.</h4> <p>Congratulations! Your e-Visa application for Turkey has been approved by the Turkish Embassy. Download your e-Visa by clicking the below download button, print it and carry whilst travelling to Turkey. A PDF reader must be installed on your computer to open your e-Visa. Visit<a target='_blank' href='https://get.adobe.com/reader/'> http://www.adobe.com</a> to download PDF reader for free.</p>

<p>If you are experiencing problems with the download of your e-Visa, please feel free to contact us at info@evisas.online 24/7 support team available to assist you.</p>

";


                        $this->load->view(THEME . '/templates/header', $data1);


                        $this->load->view(THEME . '/pages/payment.php', $data);


                        $this->load->view(THEME . '/templates/footer', $data);

                    } else {
                        $this->load->view(THEME . '/templates/header', $data1);


                        $this->load->view(THEME . '/pages/check-status', $data);


                        $this->load->view(THEME . '/templates/footer', $data);
                    }

                } else {


                    //echo $checkstatus;


                    $data1['title'] = "Check Status";


                    $data['message_title'] = "Download E-Visa";


                    $data['message_content'] = "<p class='alert alert-error error'><b>No such application found. If you are having trouble, please contact support</b></p>";


                    $this->load->view(THEME . '/templates/header', $data1);


                    $this->load->view(THEME . '/pages/check-status', $data);


                    $this->load->view(THEME . '/templates/footer', $data);


                }


            }


        } else {


            $data['title'] = "check-status";


            //$data['']


            //$data['message_title']="Check Status";


            //$data['message_content']="<h1>No Visa Found for this user</h1>";


            $data['message_title'] = "Download E-Visa";


            $data['message_content'] = "<p class='alert alert-error'>No such application found. If you are having trouble, please contact support</p>";


            $this->load->view(THEME . '/templates/header', $data);


            $this->load->view(THEME . '/pages/check-status', $data);


            $this->load->view(THEME . '/templates/footer', $data);


        }


    }


    public function generate_pdf()
    {


        $this->load->library('pdf');


        $this->pdf->load_view('invoice');


        $this->pdf->render();


        $this->pdf->stream("invoice.pdf");


    }


    public function payments($id = NULL)
    {


        if ($id != NULL) {


            $custid = $id;


            $visadata = $this->application_model->get_application($custid);
            if ($visadata) {
                $config['business'] = 'info@evisas.online';


                $config['cpp_header_image'] = 'https://turkeyevisa.online/themes/site2/img/quick_evisa_paypal.png'; //Image header url [750 pixels wide by 90 pixels high]


                $config['return'] = base_url() . 'index.php/application/return_payment/' . $id;


                $config['cancel_return'] = base_url() . 'index.php/application/cancel_payment/' . $id;


                $config['notify_url'] = base_url() . 'index.php/application/notify_payment/' . $id; //IPN Post


                $config['production'] = TRUE; //Its false by default and will use sandbox


                //$config['discount_rate_cart'] 	= 20; //This means 20% discount


                $config["custom"] = $visadata['id'];


                $config["invoice"] = $visadata['invoiceid'];  //The invoice id


                $config["first_name"] = $visadata['firstname'];


                $config["last_name"] = $visadata['lastname'];


                $config["address1"] = $visadata['address'];


                //$config["address2"] 			= $this->input->post('street');


                //$config["city"] 				= $this->input->post('city');


                //$config["state"] 				= $this->input->post('state');


                //$config["zip"] 					= $this->input->post('zipcode');


                $config["email"] = $visadata['email'];


                $config["night_phone_a"] = $visadata['phone'];

                $applicants = $visadata['applicants'];

                $servicefee = $visadata['processingtime'];

                if ($servicefee == "1") {
                    $sp = "49";
                } else if ($servicefee == "2") {
                    $sp = "69";
                } else {
                    $sp = "99";
                };


                $price = $this->application_model->get_country($visadata['nationality'])['price'];


                $this->load->library('paypal', $config);


#$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);


                $this->paypal->add($visadata['invoiceid'], $price + $sp, $applicants, $config["first_name"] . 'Visa Payment'); //First item


                //$this->paypal->add('Pants',40); 	  //Second item


                //$this->paypal->add('Blowse',10,10,'B-199-26'); //Third item with code


                $this->paypal->pay(); //Proccess the payment

            } else {

                $data1['title'] = "Payment Information";


                $data['message_title'] = "<h1>No Such Application Found.Please Contact Support</h1>";


                $this->load->view(THEME . '/templates/header', $data1);


                $this->load->view(THEME . '/pages/message.php', $data);


                $this->load->view(THEME . '/templates/footer', $data);
            }

        }


    }

    function get_country_list()
    {

        $this->load->model('application_model');

        $applicants = $this->input->post('applicants');

        $servicefee = $this->input->post('proc_fee');

        $price = $this->application_model->get_country($this->input->post('id'));

        $total = $price['price'] * $applicants;

        if ($servicefee == "1") {
            $sp = "30";
        } else if ($servicefee == "2") {
            $sp = "69";
        } else {
            $sp = "99";
        };

        $listdata = array(

            "price" => $price['price'],

            "apptotal" => $total,

            "total" => $total + ($applicants * $sp),

            "service_fee" => $sp,

            'applicants' => $applicants

        );

        echo json_encode($listdata);

    }

    function ip_details($IPaddress)

    {

        $json = file_get_contents("http://ipinfo.io/{$IPaddress}");

        $details = json_decode($json);

        return $details;

    }


    public function check_status_json()
    {

        //var_dump($this->input->post());

        $btn_clk = $this->input->post('checkstatus');


        if (isset($btn_clk)) {


            $this->load->library('form_validation');


            $this->form_validation->set_rules('applicationnumber', 'Application / Reference Number', 'required');


            if ($this->form_validation->run() == FALSE) {

                $json = array(

                    'result' => 'error',

                    'msg' => "Application Number Emptty"

                );


                echo json_encode($json);


            } else {


                $appnumber = $this->input->post('applicationnumber');


                $checkstatus = $this->application_model->check_status($appnumber);


                //echo sizeof($checkstatus);


                if (sizeof($checkstatus) > 0) {


                    $data1['title'] = "Check Status";


                    $data['visa_status'] = $checkstatus;


                    if ($checkstatus['status'] == 'C') {
                        $this->load->view(THEME . '/templates/header', $data1);

                        $this->load->view(THEME . '/pages/check-status', $data);

                        $this->load->view(THEME . '/templates/footer', $data);


                    }


                    echo json_encode($result);


                } else {


                    //echo $checkstatus;


                    $data1['title'] = "Check Status";


                    $data['message_title'] = "Download E-Visa";

                    $this->load->view(THEME . '/templates/header', $data1);

                    $data['message_content'] = "<p class='alert alert-error error'><b>No such application found. If you are having trouble, please contact support</b></p>";

                    $this->load->view(THEME . '/templates/footer', $data);

                    $result = array(

                        'result' => 'error',

                        'msg' => $data['message_content']

                    );


                    echo json_encode($result);

                }


            }


        } else {


            $data['title'] = "check-status";


            //$data['']


            //$data['message_title']="Check Status";


            //$data['message_content']="<h1>No Visa Found for this user</h1>";


            $data['message_title'] = "Download E-Visa";


            $data['message_content'] = "<p class='alert alert-error'>No such application found. If you are having trouble, please contact support</p>";


            $result = array(

                'result' => 'error',

                'msg' => $data['message_content']

            );


            echo json_encode($result);


        }


    }

    public function invoice($id = NULL)
    {
        if ($id != NULL) {
            $this->load->library('ciqrcode');


            $custid = $id;

            $visadata = $this->application_model->get_application($custid);
            $active = $visadata['active'];
            $status = $visadata['status'];
            $payment = $visadata['paymentid'];
            if ($status == 'C' || $payment != '' || $active == '1') {
                $applicants = $visadata['applicants'];
                $servicefee = $visadata['processingtime'];
                $price = $this->application_model->get_country($visadata['nationality']);
                $total = $price['price'] * $applicants;
                if ($servicefee == "1") {
                    $sp = "49";
                } else if ($servicefee == "2") {
                    $sp = "69";
                } else {
                    $sp = "99";
                };
                $visadata['paymentdetails'] = array(
                    "price" => $price['price'],
                    "apptotal" => $total,
                    "singletotal" => $price['price'] + $sp,
                    "total" => $total + ($applicants * $sp),
                    "service_fee" => $sp,
                    'applicants' => $applicants
                );

                $params['data'] = base_url() . 'index.php/application/invoice/' . $id;
                $params['level'] = 'H';
                $params['size'] = 10;
                $params['savename'] = FCPATH . '/uploads/QRcode/' . $id . '.png';
                $this->load->library('ciqrcode');
                $visadata['qrcode'] = '<img src="' . base_url() . 'uploads/QRcode/' . $id . '.png" width="100" />';
                $this->ciqrcode->generate($params);
                $this->load->view(THEME . '/pages/invoice_view.php', $visadata);
            } else {
                $data1['title'] = "No Invoice Found";

                $data['message_title'] = "No Invoice Found for " . $id;

                $data['message_content'] = "No Invoice found for $id . if already Paid Please contact";

                $this->load->view(THEME . '/templates/header', $data1);

                $this->load->view(THEME . '/pages/message', $data);

                $this->load->view(THEME . '/templates/footer', $data);
            }
        }


    }

    public function notify_payment($id = NULL)
    {

        # STEP 1: Read POST data
        $this->send_notification_mail('Enter Notify curl');
        # reading posted data from directly from $_POST causes serialization
        # issues with array data in POST
        # reading raw POST data from input stream instead.
        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
            $keyval = explode('=', $keyval);
            if (count($keyval) == 2)
                $myPost[$keyval[0]] = urldecode($keyval[1]);
        }
        # read the post from PayPal system and add 'cmd'
        $req = 'cmd=_notify-validate';
        if (function_exists('get_magic_quotes_gpc')) {
            $get_magic_quotes_exists = true;
        }
        foreach ($myPost as $key => $value) {
            if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }


        # STEP 2: Post IPN data back to paypal to validate

        //$action = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        $action = 'https://www.paypal.com/cgi-bin/webscr';
        $ch = curl_init($action);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

        # In wamp like environments that do not come bundled with root authority certificates,
        # please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path
        # of the certificate as shown below.
        # curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
        if (!($res = curl_exec($ch))) {
            # $this->write_log("Got " . curl_error($ch) . " when processing IPN data");
            curl_close($ch);
            //$this->send_notification_mail('Curl error');
            //$this->write_log('curl error');
            exit;
        }
        curl_close($ch);

        $this->send_notification_mail('After curl');

        # STEP 3: Inspect IPN validation result and act accordingly

        if (strcmp($res, "VERIFIED") == 0) {
            # assign posted variables to local variables
            $uniqid = $_POST['invoice'];
            $item_name = $_POST['item_name'];
            $item_number = $_POST['item_number'];
            $payment_status = $_POST['payment_status'];
            $payment_amount = $_POST['mc_gross'];
            $payment_currency = $_POST['mc_currency'];
            $txn_id = $_POST['txn_id'];
            $txn_type = $_POST['txn_type'];
            $receiver_email = $_POST['receiver_email'];
            $payer_email = $_POST['payer_email'];
            # check whether the payment_status is Completed
            # check that txn_id has not been previously processed
            # check that receiver_email is your Primary PayPal email
            # check that payment_amount/payment_currency are correct
            $this->send_notification_mail('verified');
            $this->send_notification_mail('verified post data : ' . serialize($_POST));
            $this->load->model('application_model');
            $order = $this->application_model->get_application($uniqid);
            //$order1=$this->application_model->get_application($id);
            $this->send_notification_mail('verified ORDER data using ID : ' . serialize($order));
            if ($order) {
                //$order 		= $order->row();
                //$order_id 	= $order->id;
                $this->send_notification_mail('within valid order block');

                $my_receiver_email = 'visapro24@gmail.com';

                /*$msg =  'Status : '.$payment_status.'|'.
                        'emails :'.$my_receiver_email.' = '.$receiver_email.
                        'amount : '.$order->amount.' = '.$payment_amount.
                        'curr :'.$payment_currency.' = '.get_settings('paypal_settings','currency','USD');

                $this->send_notification_mail($msg);*/
                if ($payment_status == 'Completed' /*&& $this->register_model->check_txn_id($txn_id)==TRUE*/ &&
                    $my_receiver_email == $receiver_email && $payment_currency == 'USD'
                ) {
                    # process payment
                    $response = serialize($_POST);
                    $this->send_notification_mail('before update');
                    if ($txn_type == 'web_accept') {
                        $this->send_notification_mail('within update');
                        $p_data = array(

                            'txn_id' => $this->input->post('txn_id'),

                            'txn_type' => $this->input->post('txn_type'),

                            'receipt_id' => $this->input->post('receipt_id'),

                            'receiver_email' => $this->input->post('receiver_email'),

                            'payer_email' => $this->input->post('payer_email'),

                            'payer_id' => $this->input->post('payer_id'),

                            'auth_amount' => $this->input->post('mc_gross'),

                            'auth_exp' => $this->input->post('auth_exp'),

                            'auth_id' => $this->input->post('auth_id'),

                            'auth_status' => $this->input->post('auth_status'),

                            'echeck_time_processed' => $this->input->post('echeck_time_processed'),

                            'invoice' => $this->input->post('invoice'),

                            'item_namex' => $this->input->post('item_namex'),

                            'payer_status' => $this->input->post('payer_status'),

                            'payment_date' => $this->input->post('payment_date'),

                            'payment_fee' => $this->input->post('payment_fee'),

                            'payment_status' => $this->input->post('payment_status'),

                            'payment_type' => $this->input->post('payment_type'),

                            'pending_reason' => $this->input->post('pending_reason'),

                            'settle_currency' => $this->input->post('settle_currency'),

                            'settle_amount' => $this->input->post('settle_amount'),

                            'shipping' => $this->input->post('shipping'),

                            'shipping_method' => $this->input->post('shipping_method'),

                            'invoiceid' => $this->input->post('custom'),

                        );;
                        $paymentid = $this->application_model->save_payment($p_data);
                        $now = date("Y-m-d H:i:s");
                        $sdata = array(
                            'paymentid' => $paymentid,
                            'paymentdate' => $now(),
                            'notes' => "Payment Status: " . $payment_status
                        );
                        $this->application_model->update_application($sdata, $id);
                        $this->send_confirmation_mail($id);
                    }

                    //$this->write_log($txn_type.' from '.$username);
                } else {
                    //$this->send_notification_mail('within update: '.$payment_status);
                    $now = date("Y-m-d H:i:s");
                    $sdata = array(
                        'paymentid' => $paymentid,
                        'paymentdate' => $now,
                        'notes' => "Payment Status: " . $payment_status
                    );
                    $this->application_model->update_application($sdata, $id);
                    $this->send_confirmation_mail($id);
                    $this->send_notification_mail('payment mail sent ' . $payment_status);
                }

                if ($txn_type == 'subscr_cancel') {
                    $this->send_notification_mail('subscriber cancel');
                } else if ($txn_type == 'subscr_eot' || $txn_type == 'subscr_failed') {
                    $this->send_notification_mail('subscriber failed');
                }
            }

        } else if (strcmp($res, "INVALID") == 0) {
            $this->write_log('invalid payment');
        }
    }

    public function send_notification_mail($msg)
    {
        $this->load->helper('date');
        $datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
        $time = time();
        $this->load->library('email');
        $this->email->from('rajendraprasad775@gmail.com', 'Paypal Test');
        $this->email->to('rajendraprasad775@gmail.com');
        $this->email->subject('Paypal subscription(' . mdate($datestring, $time) . ')');
        $this->email->message($msg);

        //$this->email->send();
    }

    public function send_confirmation_mail($id)
    {
        $invoiceid = $id;


        $this->load->helper('email');


        $this->load->library('email');


        $config['wordwrap'] = TRUE;


        $config['mailtype'] = "html";


        $config['protocol'] = 'sendmail';


        $config['mailpath'] = '/usr/sbin/sendmail';


        $this->email->initialize($config);


        $get_app = $this->application_model->get_application($invoiceid);


        //print_r($get_app);


        $name = explode('?|', $get_app['firstname'])[0];


        $dob = $get_app['dob'];


        $status = $get_app['status'];


        $passport = $get_app['passport'];


        $email = $get_app['email'];


        $this->email->from('info@evisas.online', 'Turkey eVisa');


        $this->email->to($email);


        //$email_body="You are selected";


        $this->email->subject("Application Successful for REF:" . $invoiceid);
        $email_body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                            <html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">



                            <head>



                            <meta name="viewport" content="width=device-width" />



                            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />



                            <title>Application Created Ref' . $invoiceid . '</title>



                            </head>



                            <body bgcolor="#f6f6f6" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 0; padding: 0;">&#13;



                            &#13;



                            &#13;



                            <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 20px;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>&#13;



                            <td bgcolor="#FFFFFF" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;">&#13;



                            &#13;



                            &#13;



                            <div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">&#13;



                            <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">&#13;





                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Dear ' . $name . '</b>,<br/><b>Invoice ID :' . $invoiceid . '</b></p>







                            <p style="font-family: \'Helvetica Neue\', Helvetica, Arial, \'Lucida Grande\', sans-serif; font-size: 24px; line-height: 1.2; color: #000; font-weight: 200; margin: 40px 0 10px; padding: 0;">Thank you for choosing <a href="' . base_url() . '">' . base_url() . '</a> online services</p>



                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">This is to confirm your Turkey Visa application has been successfully sent. We will be processing your visa application accordingly. 
<ul><li>To check the status of your application, you can sign in at our website <a href="' . base_url() . 'index.php/application/check-status">' . base_url() . 'index.php/application/check-status</a></li>
<li>Please check your email to confirm the information submitted is correct. In case you are not able to find the email from us in your inbox, please check the "Spam" or "Junk Mail" Folder.</li></ul></p>



                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Please Print your invoice <a href="' . base_url() . 'index.php/application/invoice/' . $invoiceid . '"><b>Print Invoice</b></a></b></p>

                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Check your application status from the below link <a href="' . base_url() . 'index.php/application/check-status">' . base_url() . 'index.php/application/check-status</a></p>



                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Please retain this e-mail for your records.</li>



                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;font-style:italic">For assistance, please click here <a href="' . base_url() . 'index.php/contact">' . base_url() . 'index.php/contact</a>.</p>

                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><b>Thank you very much for your patience.</b></p><br />
   <strong>Turkey eVisa</strong><br />
   24X7 Application support<br />
   Tel : Toll Free - 18778376771</p></td>



                            </td>



                            </tr></table></div>



                          



                           



                            </td>



                            <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>



                            </tr></table><table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; clear: both !important; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>



                            <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;">



                            



                           



                            <div style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">



                            <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td align="center" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">



                            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #666; font-weight: normal; margin: 0 0 10px; padding: 0;">



                            2015 ' . SITENAME . ' .



                            </p>



                            </td>



                            </tr></table></div>



                            



                            



                            </td>



                            <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>



                            </tr></table></body>



                            </html>';


        $this->email->message($email_body);

        $this->email->send();
    }

    public function apppreview($id)
    {


        $get_app = $this->application_model->get_application($id);
        $data1['title'] = ucfirst("Application Review"); // Capitalize the first letter


        if ($get_app['TSD'] == '1') {


            $countryPermit = $get_app['CountryVisaPermit1'];


        } else {


            $countryPermit = $get_app['CountryVisaPermit2'];


        }


        $data = array(


            'nationality' => $get_app['nationality'],


            'travaldocument' => $get_app['travaldocument'],

            'arrivaldate' => $get_app['arrivaldate'],
            'applicants' => $get_app['applicants'],
            'processingtime' => $get_app['processingtime'],

            /*'arrivaldatemonth' => $get_app['arrivaldatemonth'],

            'arrivaldateday' => $get_app['arrivaldateday'],

            'arrivaldateyear' => $get_app['arrivaldateyear'],*/


            'CountryVisaPermit' => $countryPermit,


            'TSD' => $get_app['TSD'],


            'VisaPermitExpire' => $get_app['VisaPermitExpire'],

            /*'VisaPermitExpireDateday' => $get_app['VisaPermitExpireDateday'],

            'VisaPermitExpireDatemonth' => $get_app['VisaPermitExpireDatemonth'],

            'VisaPermitExpireDateyear' => $get_app['VisaPermitExpireDateyear'],*/


            'firstname' => explode('?|', $get_app['firstname']),


            'lastname' => explode('?|', $get_app['lastname']),


            'dob' => explode('?|', $get_app['dob']),


            /*
                                        'dobmonth' => $get_app['dobmonth'],



                                        'dobday' => $get_app['dobday'],



                                        'dobyear' => $get_app['dobyear'],*/


            'placeofbirth' => explode('?|', $get_app['placeofbirth']),


            'mothername' => explode('?|', $get_app['mothername']),


            'fathername' => explode('?|', $get_app['fathername']),


            'passportnumber' => explode('?|', $get_app['passportnumber']),


            'pid' => explode('?|', $get_app['pid']),


            'ped' => explode('?|', $get_app['ped']),


            /*'pidmonth' => $get_app['pidmonth'],



            'pidday' => $get_app['pidday'],



            'pidyear' => $get_app['pidyear'],



            'pedmonth' => $get_app['pedmonth'],



            'pedday' => $get_app['pedday'],



            'pedyear' => $this->input->post('pedyear'),*/


            'email' => $get_app['email'],


            'phone' => $get_app['phone'],


            'address' => $get_app['address'],


            //'state' => $this->input->post('state'),


            //'city' => $this->input->post('city'),


            //'country' => $this->input->post('country'),


            //'street' => $this->input->post('street'),


            //'zipcode' => $this->input->post('zipcode')


        );


        //$data['nationality']=$this->application_model->get_country($this->input->post('nationality'));


        $nationality = $this->application_model->get_country($get_app['nationality']);


        $data['nationalityname'] = $nationality['country'];


        $data['nationality_price'] = $nationality['price'];


        $country = $this->application_model->get_country($get_app['country']);


        $data['countryname'] = $country['country'];


        $data['countrylist'] = $this->application_model->get_country();
        $this->load->view(THEME . '/pages/apppreview.php', $data);
        $this->load->view(THEME . '/templates/footer.php', $data);
    }


    public function processPayments()
    {
        $amount = $this->input->post('amount');
        //$amount = 0.01;
        /*echo $amount;
                echo $this->input->post('cardNumber');
                echo $this->input->post('expireday');
                echo $this->input->post('expireyear');
                echo $this->input->post('cvv');
                exit;*/
        define('URL', 'https://api.authorize.net/xml/v1/request.api');
        define('HEADER', 'Accept:application/xml');
        define('POST', 'POST');
        define('LOGINID', '68GVBxm8Ze3s');
        define('TRANSACTIONKEY', '43n46DU54m8Bfm9f');
        $referenceID = strtoupper(uniqid('QV-'));
        $data = '<createTransactionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>' . LOGINID . '</name>
    <transactionKey>' . TRANSACTIONKEY . '</transactionKey>
  </merchantAuthentication>
  <refId>' . $referenceID . '</refId>
  <transactionRequest>
    <transactionType>authCaptureTransaction</transactionType>
    <amount>' . $amount . '</amount>
    <payment>
      <creditCard>
        <cardNumber>' . $this->input->post('cardNumber') . '</cardNumber>
        <expirationDate>' . $this->input->post('expireday') . $this->input->post('expireyear') . '</expirationDate>
        <cardCode>' . $this->input->post('cvv') . '</cardCode>
      </creditCard>
    </payment>
    <order>
     <invoiceNumber>' . $referenceID . '</invoiceNumber>
     <description>Product Description</description>
    </order>
    <lineItems>
      <lineItem>
        <itemId>1</itemId>
        <name>eVisa</name>
        <description>Australia E Visa Online</description>
        <quantity>1</quantity>
        <unitPrice>99.00</unitPrice>
      </lineItem>
    </lineItems>
  </transactionRequest>
</createTransactionRequest>';

        $headers[] = HEADER;

        $ch = curl_init(URL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, POST);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);

        $soap = simplexml_load_string($result);
        $res = (array)$soap;
        foreach ($res as $key => $value) {
            if (is_object($value)) {
                $firstArray = (array)$value;
                if (is_object($firstArray)) {
                    $second = (array)$firstArray;
                } else {
                    foreach ($firstArray as $k1 => $v1) {
                        $results[$k1] = $v1;
                    }
                }
            } else {
                $results[$key] = $value;
            }
        }
        $returnArray = array();
        if (isset($results['messages'])) {
            $code = (array)$results['messages']->message->code[0];
            $description = (array)$results['messages']->message->description[0];
            $returnArray['code'] = $code;
            $returnArray['message'] = $description;
            /*
            $returnArray['code'] = $results['messages']->message->code;
            $returnArray['message'] = $results['messages']->message->description;*/
        }
        if (isset($results['errors'])) {
            $code = (array)$results['errors']->error->errorCode[0];
            $description = (array)$results['errors']->error->errorText[0];
            $returnArray['code'] = $code[0];
            $returnArray['message'] = $description[0];
        }
        $returnArray['auth'] = $results['authCode'];
        $returnArray['transactionHash'] = $results['transHash'];
        $returnArray['transactionID'] = $results['transId'];
        $returnArray['avs'] = $results['avsResultCode'];
        $returnArray['cvv'] = $results['cvvResultCode'];
        $returnArray['accountNumber'] = $results['accountNumber'];
        $returnArray['accountType'] = $results['accountType'];
        $returnArray['refID'] = $referenceID;

        print json_encode($returnArray);

    }

}