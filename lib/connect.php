<?php
    class DBC
    {
        public $db;
        public $query;
        public $result;

        public function DBI()   //DB연결
        {
            $this->db = new mysqli('localhost', 'root', 'namjin13', 'timetable'); //host, id, pw, database 순서입니다.
            $this->db->query('SET NAMES UTF8');
            if(mysqli_connect_errno())
            {
                header("Content-Type: text/html; charset=UTF-8");
                echo "데이터 베이스 연동에 실패했습니다.";
                exit;
            }
        }

        public function DBQ()   //쿼리 실행
        {
            $this->result = $this->db->query($this->query);
        }

        public function DBO()   //접속 종료
        {
            $this->result->free;
            $this->db->close();
        }
    }
?>
