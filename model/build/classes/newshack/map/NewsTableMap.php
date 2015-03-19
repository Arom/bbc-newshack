<?php



/**
 * This class defines the structure of the 'news' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.newshack.map
 */
class NewsTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'newshack.map.NewsTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('news');
        $this->setPhpName('News');
        $this->setClassname('News');
        $this->setPackage('newshack');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 10000, null);
        $this->addColumn('content', 'Content', 'VARCHAR', true, 10000, null);
        $this->addColumn('short_content', 'ShortContent', 'VARCHAR', true, 10000, null);
        $this->addColumn('keywords', 'Keywords', 'VARCHAR', true, 10000, null);
        $this->addColumn('location', 'Location', 'VARCHAR', true, 10000, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // NewsTableMap
