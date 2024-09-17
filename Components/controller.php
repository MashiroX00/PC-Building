<?php
    class Controller {
        private $db;

        public function __construct($connecdb)
        {
            $this->db = $connecdb;
        }

        public function updateTable($table, array $collumn,array $value,int $id) {
            if (count($collumn) !== count($value)) {
                throw new Exception("Collumn And Value must match.");
            }

            $setcollumn = [];
            foreach($collumn as $col) {
                $setcollumn[] = $col . " = ?";
            }
            $setcollumnToString = implode(", ",$setcollumn);
            $sql = "UPDATE $table SET $setcollumnToString WHERE id = ?";

            $stmt = $this->db->prepare($sql);
            $value[] = $id;

            return $stmt->execute($value);
        }

        public function Savescore($userid,$gameid,$score) {
           $sql = "INSERT INTO timermodetmp (userid,gameid,score) VALUES (?,?,?)";
           $stmt = $this->db->prepare($sql);
           return $stmt->execute([$userid,$gameid,$score]);
        }

        public function Calscore($gameid,$userid,$GameType) {
            $Scores = $this->db->prepare("SELECT score FROM timermodetmp WHERE gameid = ?");
            $Scores->execute([$gameid]);
            $FetchScores = $Scores->fetchAll(PDO::FETCH_ASSOC);
            $cal = 0;
            foreach ($FetchScores as $s) {
                $Parseint = (int)$s['score'];
                $cal += $Parseint;
            }
            $sv = "INSERT INTO career (user_id,score,Game_type) VALUES (?,?,?)";
            $Save = $this->db->prepare($sv);
            $Save->execute([$userid,$cal,$GameType]);

            $dt = "DELETE FROM timermodetmp WHERE userid = ?";
            $DELETE = $this->db->prepare($dt);
            return  $DELETE->execute([$userid]);
            
        }
    }
?>
