<?php
    class Ajouter
    {
        /*----------------------------------------------------------
                        Attribut
        -----------------------------------------------------------*/
        private int $id_util;
        private int $id_art;
        private int $com;
        private int $date_com;
        private int $validate_com;
        /*----------------------------------------------------------
                        constructor
        -----------------------------------------------------------*/
        public function __construct()
        {

        }
         
        public function geIdUtil()
        {
            return $this->id_util;
        }
        public function setIdUtil($id)
        {
            $this->id_util = $id;
        }
        public function geIdArt()
        {
            return $this->id_art;
        }
        public function setIdArt($id)
        {
            $this->id_util = $id;
        }
        public function getCom()
        {
            return $this->com;
        }
        public function setCom($com)
        {
            $this->com = $com;
        }
        public function getDateCom()
        {
            return $this->date_com;
        }
        public function setDateCom($DateCom)
        {
            $this->date_com = $DateCom;
        }
        
        public function getValidateCom()
        {
            return $this->validate_com;
        }
        public function setValidateCom($ValideCom)
        {
            $this->validate_com = $ValideCom;
        }
        
    }
?>