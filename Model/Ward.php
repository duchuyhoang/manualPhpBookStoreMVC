<?php

class Ward implements JsonSerializable{
    private String $id_ward;
    private String $ward_name;
    private String $ward_type;
    private String $id_district;

public function __construct($id_ward,$ward_name,$ward_type,$id_district){
    $this->id_ward=$id_ward;
    $this->ward_name=$ward_name;
    $this->ward_type=$ward_type;
    $this->id_district=$id_district;

}

public function jsonSerialize(){
    return [
        "id_ward"=>$this->id_ward,
        "ward_name"=>$this->ward_name,
        "ward_type"=>$this->ward_type,
        "id_district"=>$this->id_district,
    ];
}

    /**
     * Get the value of id_ward
     */ 
    public function getId_ward()
    {
        return $this->id_ward;
    }

    /**
     * Set the value of id_ward
     *
     * @return  self
     */ 
    public function setId_ward($id_ward)
    {
        $this->id_ward = $id_ward;

        return $this;
    }

    /**
     * Get the value of ward_name
     */ 
    public function getWard_name()
    {
        return $this->ward_name;
    }

    /**
     * Set the value of ward_name
     *
     * @return  self
     */ 
    public function setWard_name($ward_name)
    {
        $this->ward_name = $ward_name;

        return $this;
    }

    /**
     * Get the value of ward_type
     */ 
    public function getWard_type()
    {
        return $this->ward_type;
    }

    /**
     * Set the value of ward_type
     *
     * @return  self
     */ 
    public function setWard_type($ward_type)
    {
        $this->ward_type = $ward_type;

        return $this;
    }

    /**
     * Get the value of id_district
     */ 
    public function getId_district()
    {
        return $this->id_district;
    }

    /**
     * Set the value of id_district
     *
     * @return  self
     */ 
    public function setId_district($id_district)
    {
        $this->id_district = $id_district;

        return $this;
    }
}
