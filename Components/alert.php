<?php
    class alert {
        private $type;
        private $message;
        private $urls;
        private $ip;
        private $redirurl;
        private $loggerMessage;
        private $RawLOG;
        private $SessionName;
        private $SessionMessage;
        private $protocol;

        public function __construct() {
            $this->protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
            $this->ip = $_SERVER['HTTP_HOST'];
            $this->redirurl = $this->protocol."://".$this->ip."/PC-Building/";
        }

        public function getserverip() {
            return $this->redirurl;
        }


        public function setalert($type,$message) {
            $this->type = $type;
            $this->message = $message;
            $_SESSION[$this->type] = $this->message;

        }

        public function showalert() {
            if (isset($_SESSION["success"])) {
                echo "<div class='alert alert-success'>";
                echo $_SESSION["success"];
                echo "</div>";
            }elseif(isset($_SESSION["error"])) {
                echo "<div class='alert alert-warning'>";
                echo $_SESSION["error"];
                echo "</div>";
            }
        }
        public function unsetalert() {
            unset($_SESSION['error'],$_SESSION['seccess'],$_SESSION["success"]);
        }

        //แสดง session สถานะการทำงาน
        public function Logmessage() {
            $this->RawLOG = $_SESSION['error'] ?? $_SESSION['seccess'] ?? $_SESSION["success"] ?? null;
            if (empty($this->RawLOG)) {
                return false;
            }else {
                return "{$this->RawLOG}";
                
            }
        }
        //แสดง session ออกมาเป็นตัวอักษร
        public function ShowSession($name) {
            $this->SessionName = $name;
            if (empty($_SESSION["$this->SessionName"])) {
                return false;
            }else {
                return $_SESSION["$this->SessionName"];
            }
        } 

        //ลบ sessiom
        public function delsession($name) {
            $this->SessionName = $name;
            if (empty($_SESSION["$this->SessionName"])) {
                return false;
            }else {
                unset($_SESSION["$this->SessionName"]);
                return true;
            }
        }

        //สร้าง session
        public function CreSession($name,$value) {
            $this->SessionName = $name;
            $this->SessionMessage = $value;
            $_SESSION["$this->SessionName"] = $this->SessionMessage;
        }

        //redir
        public function header($url) {
            $this->urls = $url;
            header("Location: {$this->redirurl}{$this->urls}");
        }

        public function Logger($message) {
            $this->loggerMessage = $message;
            echo "<script>
                console.log({$this->loggerMessage});
            </script>";
        }
    }
?>