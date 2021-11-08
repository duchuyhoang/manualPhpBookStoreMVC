<?php

class City implements JsonSerializable
{
    private String $id_city;
    private String $city_name;
    private String $city_type;


    public function __construct($id_city, $city_name, $city_type)
    {
        $this->id_city = $id_city;
        $this->city_name = $city_name;
        $this->city_type = $city_type;
    }

    public function jsonSerialize()
    {
        return [
            "id_city" => $this->id_city,
            "city_name" => $this->city_name,
            "city_type" => $this->city_type,
        ];
    }


    /**
     * Get the value of id_city
     */
    public function getId_city()
    {
        return $this->id_city;
    }

    /**
     * Set the value of id_city
     *
     * @return  self
     */
    public function setId_city($id_city)
    {
        $this->id_city = $id_city;

        return $this;
    }

    /**
     * Get the value of city_name
     */
    public function getCity_name()
    {
        return $this->city_name;
    }

    /**
     * Set the value of city_name
     *
     * @return  self
     */
    public function setCity_name($city_name)
    {
        $this->city_name = $city_name;

        return $this;
    }

    /**
     * Get the value of city_type
     */
    public function getCity_type()
    {
        return $this->city_type;
    }

    /**
     * Set the value of city_type
     *
     * @return  self
     */
    public function setCity_type($city_type)
    {
        $this->city_type = $city_type;

        return $this;
    }
}
