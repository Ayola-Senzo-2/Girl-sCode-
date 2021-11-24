<?php
namespace Phppot;

use Phppot\DataSource;

class departingRank
{
    private $ds;
    
    function __construct()
    {
        require_once __DIR__ . './../lib/DataSource.php';
        $this->ds = new DataSource();
    }
    
  
    public function getAllRank()
    {
        $query = "SELECT * FROM ranks order by rankName";
        $result = $this->ds->select($query);
        return $result;
    }
    
    
    
    public function getDestinationBYRankId($rankId)
    {
        $query = "SELECT * FROM destination WHERE rankID = ? order by destinationName";
        $paramType = 'd';
        $paramArray = array(
            $countryId
        );
        $result = $this->ds->select($query, $paramType, $paramArray);
        return $result;
    }
}