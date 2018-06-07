<?php
include_once 'DB.php';
include_once 'helper/Helper.php';

class Dashboard {

    private $dbObj;
    private $helpObj;
    private $msg;

    public function __construct() {

        $this->dbObj = new Database();
        $this->helpObj = new Helper();
    }


    /*
    @ show total registered registant in index.php
    @ table = registration
    */
    function totalRegistant()
    {

        $query = "SELECT * FROM `registration` where status='approved'";
        $stmt = $this->dbObj->link->query($query);
        if ($stmt) {
            return $stmt->num_rows;
        }else{
            return 0;
        }

    }

    
    /*
    @ show pending registant in index.php
    @ table = registration
    */
    function pendingRegistant()
    {

        $query = "SELECT * FROM `registration` where status='pending'";
        $stmt = $this->dbObj->link->query($query);
        if ($stmt) {
            return $stmt->num_rows;
        }else{
            return 0;
        }

    }

    /*
    @ show approved registant today in index.php
    @ table = registration
    */
    function todayRegistant()
    {
        date_default_timezone_set('Asia/Dhaka');
        $starting = date('Y-m-d ')."00:00:00";
        $ending = date('Y-m-d ')."23:59:59";

        $query = "SELECT * FROM registration where status='approved' and date between '$starting' and '$ending'";
        $stmt = $this->dbObj->link->query($query) or die($this->dbObj->link->error)." ".__LINE__;
        if ($stmt) {
            return $stmt->num_rows;
        }else{
            return 0;
        }

    }

    /*
    @ show total active payment in index.php
    @ table = ledger
    */
    function totalPayment()
    {
        $query = "SELECT sum(amount) as 'totalamount' FROM `ledger` where status='active'";
        $stmt = $this->dbObj->link->query($query);
        if ($stmt) {
            $data = $stmt->fetch_assoc();
            if ($data['totalamount'] == 'null' || $data['totalamount'] == 0) {
                return 0;
            }else{
                return round($data['totalamount']);
            }
            
        }

    }

    /*
    @ show total news in index.php
    @ table = news
    */
    function totalNews()
    {
        $query = "SELECT * FROM `news` where status='active'";
        $stmt = $this->dbObj->link->query($query);
        if ($stmt) {
            return $stmt->num_rows;
        }else{
            return 0;
        }

    }

    /*
    @ show total news in index.php
    @ table = news
    */
    function totalCommitteeMember()
    {
        $query = "SELECT * FROM `committee`";
        $stmt = $this->dbObj->link->query($query);
        if ($stmt) {
            return $stmt->num_rows;
        }else{
            return 0;
        }

    }












}
