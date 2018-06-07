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
        $fullname = $this->helpObj->validAndEscape($data['fullname']);
        $dob = $this->helpObj->validAndEscape($data['dob']);
        $gender = $this->helpObj->validAndEscape($data['gender']);
        $father = $this->helpObj->validAndEscape($data['father']);
        $contact = $this->helpObj->validAndEscape($data['contact']);
        $address = $this->helpObj->validAndEscape($data['address']);
        $email = $this->helpObj->validAndEscape($data['email']);
        $batchyear = $this->helpObj->validAndEscape($data['batchyear']);
        $academic = $this->helpObj->validAndEscape($data['academic']);
        $occupation = $this->helpObj->validAndEscape($data['occupation']);
        $no_of_family_member = $this->helpObj->validAndEscape($data['no_of_family_member']);
        $date = date('Y-m-d h:i:s');

        $photo  =  'photo' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
        $msg = '';

        $checkstmt = $this->dbObj->link->query("SELECT * from registration where email ='$email' or contact='$contact'");
        if ($checkstmt) {
            $row = $checkstmt->num_rows;
            if($row > 0){
                return "<col-md-12 width='100%'><span class='alert alert-warning'>You have already registered on <strong>Celebration 75 years - CGSA COLLEGE</strong>.</span></div>";
            }else if($this->checkTransaction($data) == true)
            {
                return  "<col-md-12><span class='alert alert-warning'>Failed to pay. Transaction id was used before for <strong>Celebration 75 years - CGSA COLLEGE</strong></span></div>";
            }else{
                $query = "insert into registration(registration_type,
                fullname,dob,gender,father,contact,address,email,batchyear,academic,
                occupation,photo,no_of_family_member, date
                ) values('$registration_type','$fullname','$dob','$gender','$father','$contact','$address','$email','$batchyear','$academic','$occupation','$photo','$no_of_family_member', '$date')";

                $stmt = $this->dbObj->insert($query);
                if ($stmt) {
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "photo/".$photo);

                    $checkstmt = $this->dbObj->link->query("SELECT * from registration where email='$email'");
                    $registant_id = ''; //get registant id for payment for  payment after complete registrtion
                    if ($checkstmt) {
                        $registant_id = $checkstmt->fetch_object()->id;
                        $data['registant_id'] = $registant_id;
                        $status = $this->addPayment($data);
                    }

                    $stmt = $this->dbObj->link->query("select id from registration order by id desc limit 1") or die($db->link->error)." at line number ".__LINE__;
                    if ($stmt) {
                        $data = $stmt->fetch_assoc();
                        $id = $data['id'];
                        header("location: confirmcard.php?action=preview&rid=".$id);
                        
                    }

                    
                     
                   
                } else {
                    return "<span class='alert alert-warning'>Failed! Unknown Error. Please Contact Support</span>";
                }
            }
        }

        
    }


    /*
    @ add payment in payment.php
    @ action index.php
    @method post
    */
    function addPayment($data)
    {
        $registant_id = $this->helpObj->validAndEscape($data['registant_id']);
        $method = $this->helpObj->validAndEscape($data['method']);
        $amount = $this->helpObj->validAndEscape($data['amount']);
        $transaction_id = $this->helpObj->validAndEscape($data['transaction_id']);

        $checkquery = "select * from ledger where method='$method' and transaction_id='$transaction_id'";
        $checkstmt = $this->dbObj->link->query($checkquery);
        if ($checkstmt) {
           
            $query = "insert into ledger(registant_id,method,transaction_id,amount) 
            values('$registant_id','$method','$transaction_id','$amount')";
            $stmt = $this->dbObj->link->query($query);
            if ($stmt) {
                return  true;
            }else{
               return false;
            }
            
        }

    }


    /**
    * check ledger for payment transaction
    * wheather the transaction id is used of not before
    */

    function checkTransaction($data)
    {
        $method = $this->helpObj->validAndEscape($data['method']);
        $transaction_id = $this->helpObj->validAndEscape($data['transaction_id']);

        $checkquery = "select * from ledger where  method='$method' and transaction_id='$transaction_id'";
        $checkstmt = $this->dbObj->link->query($checkquery);
        if ($checkstmt) {
            if ($checkstmt->num_rows > 0) {
                 return true;
            }else{
                return false;
            }
        }
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
