<?php
    class alert {
        private $type;
        private $message;
        private $urls;
        private $redirurl = "http://localhost/PC-Building/";
        private $loggerMessage;

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
            unset($_SESSION["error"]);
            unset($_SESSION["seccess"]);
            unset($_SESSION["success"]);
        }
        public function header($url) {
            $this->urls = $url;
            header("Location: {$this->redirurl}{$url}");
        }
        public function Logger($message) {
            $this->loggerMessage = $message;
            echo "<script>
                console.log({$this->loggerMessage});
            </script>";
        }
    }

?>