<?php



/**
 * This class defines the structure of the 'user' table.
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
class UserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'newshack.map.UserTableMap';

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
        $this->setName('user');
        $this->setPhpName('User');
        $this->setClassname('User');
        $this->setPackage('newshack');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('user_name', 'UserName', 'VARCHAR', true, 255, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 255, null);
        $this->addColumn('salt', 'Salt', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Keywords', 'Keywords', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), null, null, 'Keywordss');
        $this->addRelation('Location', 'Location', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), null, null, 'Locations');
    } // buildRelations()

} // UserTableMap
