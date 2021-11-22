<?php

class Address implements JsonSerializable
{
    private $id_province;
    private $province_name;
    private $id_district;
    private $district_name;
    private $id_ward;
    private $ward_name;
    private $moreInfo;

    function __construct($id_province, $province_name, $id_district, $district_name, $id_ward, $ward_name, $moreInfo="")
    {
        $this->id_province = $id_province;
        $this->province_name = $province_name;
        $this->id_district = $id_district;
        $this->district_name = $district_name;
        $this->id_ward = $id_ward;
        $this->ward_name = $ward_name;
        $this->moreInfo = $moreInfo;
    }
    public function jsonSerialize()
    {
        return [
            "id_province" => $this->id_province,
            "province_name" => $this->province_name,
            "id_district" => $this->id_district,
            "district_name" => $this->district_name,
            "id_ward" => $this->id_ward,
            "ward_name" => $this->ward_name,
            "moreInfo" => $this->moreInfo,
        ];
    }
    /**
     * Get the value of id_province
     */ 
    public function getId_province()
    {
        return $this->id_province;
    }

    /**
     * Set the value of id_province
     *
     * @return  self
     */ 
    public function setId_province($id_province)
    {
        $this->id_province = $id_province;

        return $this;
    }

    /**
     * Set the value of province_name
     *
     * @return  self
     */ 
    public function setProvince_name($province_name)
    {
        $this->province_name = $province_name;

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

    /**
     * Get the value of district_name
     */ 
    public function getDistrict_name()
    {
        return $this->district_name;
    }

    /**
     * Set the value of district_name
     *
     * @return  self
     */ 
    public function setDistrict_name($district_name)
    {
        $this->district_name = $district_name;

        return $this;
    }

    /**
     * Get the value of province_name
     */ 
    public function getProvince_name()
    {
        return $this->province_name;
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
     * Get the value of moreInfo
     */ 
    public function getMoreInfo()
    {
        return $this->moreInfo;
    }

    /**
     * Set the value of moreInfo
     *
     * @return  self
     */ 
    public function setMoreInfo($moreInfo)
    {
        $this->moreInfo = $moreInfo;

        return $this;
    }
}