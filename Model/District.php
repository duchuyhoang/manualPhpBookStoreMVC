<?php

class District implements JsonSerializable
{
    private String $id_district;
    private String $district_name;
    private String $district_type;
    private String $province_id;
    public function __construct($id_district, $district_name, $district_type, $province_id)
    {

        $this->id_district = $id_district;
        $this->district_name = $district_name;
        $this->district_type = $district_type;
        $this->province_id = $province_id;
    }


    public function jsonSerialize()
    {
        return array(
            "id_district" => $this->id_district,
            "district_name" => $this->district_name,
            "district_type" => $this->district_type,
            "province_id" => $this->province_id,
        );
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
     * Get the value of district_type
     */
    public function getDistrict_type()
    {
        return $this->district_type;
    }

    /**
     * Set the value of district_type
     *
     * @return  self
     */
    public function setDistrict_type($district_type)
    {
        $this->district_type = $district_type;

        return $this;
    }

    /**
     * Get the value of province_id
     */
    public function getProvince_id()
    {
        return $this->province_id;
    }

    /**
     * Set the value of province_id
     *
     * @return  self
     */
    public function setProvince_id($province_id)
    {
        $this->province_id = $province_id;

        return $this;
    }
}
