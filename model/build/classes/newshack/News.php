<?php



/**
 * Skeleton subclass for representing a row from the 'news' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.newshack
 */
class News extends BaseNews
{
    protected $domain;
    protected $category;

    
    public function getDomain(){
        return $this->domain;
    }
    
    public function setDomain($dom){
        $this->domain = $dom;
    }

    
    public function getCategory(){
        return $this->category;
    }
    
    public function setCategory($dom){
        $this->category = $dom;
    }
    
}
