<?php
include_once 'DB.php';
include_once 'helper/Helper.php';

class Manage {

    private $dbObj;
    private $helpObj;
    private $msg;

    public function __construct() {

        $this->dbObj = new Database();
        $this->helpObj = new Helper();
    }


    /*
     * showing applicant list in applicationlist.php 
     * */

    public function addRegistant($data) {
        date_default_timezone_set('Asia/Dhaka');
        
        $registration_type = $this->helpObj->validAndEscape($data['registration_type']);

        $registration_id = $this->manageRegistrationID($registration_type); //this is generating from function according to rules.

        $fullname = $this->helpObj->validAndEscape(ucfirst($data['fullname']));
        $fullnameinbangla = $this->helpObj->validAndEscape($data['fullnameinbangla']);
        $dob = $this->helpObj->validAndEscape($data['dob']);
        $gender = $this->helpObj->validAndEscape($data['gender']);
        $father = $this->helpObj->validAndEscape($data['father']);
        $contact = $this->helpObj->validAndEscape($data['contact']);
        $address = $this->helpObj->validAndEscape($data['address']);
        $email = $this->helpObj->validAndEscape($data['email']);
        $batchyear = $this->helpObj->validAndEscape($data['batchyear']);
        $academic = $this->helpObj->validAndEscape($data['academic']);
        $occupation = $this->helpObj->validAndEscape($data['occupation']);

        if (!isset($data['no_of_family_member'])) { //as there is a disabled attribute in html form for onchange event
            $no_of_family_member = 0;
        } else if(isset($data['no_of_family_member'])) {
            $no_of_family_member = $this->helpObj->validAndEscape($data['no_of_family_member']);
        }

        $date = date('Y-m-d h:i:s');

        $photo  =  'photo' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
        $file_size = $_FILES['photo']['size'];
        $msg = '';

        
        if ($file_size > 409600) {
                return "<div style='background:#fff; width:95%; display: inline-block; color: red; padding:20px;box-shadow:0 1px 1px 0px #ccc; margin-right: 30px !important;' class='table-container' id='errormessage'> Error! Image should be less than 400KB</div>";
        } else{ 
            $query = "insert into registration(id,registration_type,
            fullname,fullnameinbangla,dob,gender,father,contact,address,email,batchyear,academic,
            occupation,photo,no_of_family_member, date
            ) values('$registration_id','$registration_type','$fullname','$fullnameinbangla','$dob','$gender','$father','$contact','$address','$email','$batchyear','$academic','$occupation','$photo','$no_of_family_member', '$date')";

            $stmt = $this->dbObj->link->query($query) or die($this->dbObj->link->error)."at line number ".__LINE__;
            if ($stmt) {
                move_uploaded_file($_FILES["photo"]["tmp_name"], "photo/".$photo);

                $checkstmt = $this->dbObj->link->query("SELECT * from registration where email='$email'");
                $registant_id = ''; //get registant id for payment for  payment after complete registrtion
                if ($checkstmt) {
                    $registant_id = $checkstmt->fetch_object()->id;
                    $data['registant_id'] = $registant_id;
                    $this->sendMessageConfirmation($fullname,$contact,$registration_id,$data['amount']); //send sms confirmation
                    $status = $this->addPayment($registration_id, $data['amount']);
                }

                $stmt = $this->dbObj->link->query("select * from registration order by id desc limit 1") or die($db->link->error)." at line number ".__LINE__;
                if ($stmt) {
                    $data = $stmt->fetch_assoc();
                    $id = $data['id'];
                    $contact = $data['contact'];
                    header("location: confirmcard.php?action=preview&rid=".$registration_id);
                    
                }
               
            } else {
                return "<span class='alert alert-warning'>Failed! Unknown Error. Please Contact Support</span>";
            }
        }
        
    }

    /*
    @ manage id for registration
    @ for ex-student 4001-8000
    @ for regular student 8001-rest
    */
    function manageRegistrationID($type)
    {
        $id = '';

        if ($type == "Ex Student" || $type == "Ex Student(Abroad)") {
            $checkquery = "SELECT * from registration WHERE registration_type='Ex Student(Abroad)' or registration_type='Ex Student' ORDER by id DESC limit 1";
            $checkstmt = $this->dbObj->link->query($checkquery);
            if ($checkstmt) {
                $data = $checkstmt->fetch_assoc();
                $row = $checkstmt->num_rows;
                if ($row > 0) {

                    $id = $data['id'];
                    $id = $id + 1;
                    
                } else {
                    $id = 4001;
                }
            }
        } else if($type == "Current Student") {
            $checkquery = "SELECT * from registration WHERE registration_type='Current Student' ORDER by id DESC limit 1";
            $checkstmt = $this->dbObj->link->query($checkquery);
            if ($checkstmt) {
                $data = $checkstmt->fetch_assoc();
                $row = $checkstmt->num_rows;
                if ($row > 0) {

                    $id = $data['id'];
                    $id = $id + 1;
                   
                } else {
                    $id = 8001;
                    
                }
            }
        }

        return $id;
       
    }



    /*
    @ add payment in payment.php
    @ action index.php
    @method post
    */
    function addPayment($registration_id,$amount)
    {
       
        $query = "insert into ledger(registant_id,amount) 
        values('$registration_id','$amount')";
        $stmt = $this->dbObj->link->query($query)  or die($db->link->error)." at line number ".__LINE__;;
        if ($stmt) {
            return  true;
        }else{
           return false;
        }

    }


    /**
    * check ledger for payment transaction
    * wheather the transaction id is used of not before
    */

    function checkTransaction($data)
    {
       

        /*$checkquery = "select * from ledger where  method='$method' and transaction_id='$transaction_id'";
        $checkstmt = $this->dbObj->link->query($checkquery);
        if ($checkstmt) {
            if ($checkstmt->num_rows > 0) {
                 return true;
            }else{
                return false;
            }
        }*/
    }


    /*
    @ show registant in pending.php
    @ table = ledger
    */
    function showPendingRegistant()
    {

        $query = "select * from ledger order by serial desc";
        $stmt = $this->dbObj->link->query($query);
        if ($stmt) {
            return $stmt;
        }else{
            return false;
        }

    }


    /*
    @ send confirmation sms to registants
    @ 
    */
    function sendMessageConfirmation($fullname,$contact,$registration_id,$amount)
    {

        /*$message = "Dear ".$fullname.", your registration to '75 Years Celebration - CGSA College' has successfully completed. For details visit http://75.cgsacollege.edu.bd/";*/
        $message = "Dear ".$fullname.", we accepted your registration. Your ID is ".$registration_id.". Please pay your registration fee TK ".$amount."/- for collecting invitation card. CGSA College";
        

        $token = "77f9a4d2c5ea51913e1cd7624705239c";
        $url = "http://sms.greenweb.com.bd/api.php";
        
        $data= array(
        'to'=> $contact,
        'message'=>$message,
        'token'=>"$token"
        ); // Add parameters in key value

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch); //execute statement to send sms

    }


    
    /*
    @ send message in contact.php
    @ send message to admin email
    */
    function sendMessage($data)
    {
        session_start();

        $subject = $this->helpObj->validAndEscape($data['subject']);
        $name = $this->helpObj->validAndEscape($data['name']);
        $email = $this->helpObj->validAndEscape($data['email']);
        $contact = $this->helpObj->validAndEscape($data['contact']);
        $message = $data['message'];

        $to = 'arif98741@gmail.com';

        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: ". $email . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $message = "<h4>Name: ".$name."</h4>";
        $message .= "<h4>Email: ".$email."</h4>";
        $message .= "<h4>Mobile: ".$contact."</h4>";
        $message .= "<article>Message: ".$message."</article>";


        $status = mail($to, $subject, $message, $headers);

        if ($status) {
            //send message to send email
            $headers = "From: " ."no-reply@cgsa.gov.bd". "\r\n";
            $headers .= "Reply-To: ". "no-reply@cgsa.gov.bd" . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            mail($email, 'Thanks for Contact - CGSA College','Your message has successfully received. Please wait for the reply...',$headers);

            return  "<col-md-12><span class='alert alert-success'>Your message has successfully received. Please wait for the reply by checking email.<strong>Celebration 75 years - CGSA COLLEGE</strong></span></div>";
        }else{
            return  "<col-md-12><span class='alert alert-warning'>Unknown Error! Failed to send message. Try again later.......</div>";
        }
       
    }

}
