<?php


/**
 * Base class that represents a row from the 'news' table.
 *
 *
 *
 * @package    propel.generator.newshack.om
 */
abstract class BaseNews extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'NewsPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        NewsPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the bbc_id field.
     * @var        string
     */
    protected $bbc_id;

    /**
     * The value for the url field.
     * @var        string
     */
    protected $url;

    /**
     * The value for the image field.
     * @var        string
     */
    protected $image;

    /**
     * The value for the title field.
     * @var        string
     */
    protected $title;

    /**
     * The value for the content field.
     * @var        string
     */
    protected $content;

    /**
     * The value for the short_content field.
     * @var        string
     */
    protected $short_content;

    /**
     * The value for the keywords field.
     * @var        string
     */
    protected $keywords;

    /**
     * The value for the location field.
     * @var        string
     */
    protected $location;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [bbc_id] column value.
     *
     * @return string
     */
    public function getBbcId()
    {

        return $this->bbc_id;
    }

    /**
     * Get the [url] column value.
     *
     * @return string
     */
    public function getUrl()
    {

        return $this->url;
    }

    /**
     * Get the [image] column value.
     *
     * @return string
     */
    public function getImage()
    {

        return $this->image;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {

        return $this->title;
    }

    /**
     * Get the [content] column value.
     *
     * @return string
     */
    public function getContent()
    {

        return $this->content;
    }

    /**
     * Get the [short_content] column value.
     *
     * @return string
     */
    public function getShortContent()
    {

        return $this->short_content;
    }

    /**
     * Get the [keywords] column value.
     *
     * @return string
     */
    public function getKeywords()
    {

        return $this->keywords;
    }

    /**
     * Get the [location] column value.
     *
     * @return string
     */
    public function getLocation()
    {

        return $this->location;
    }

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return News The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = NewsPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [bbc_id] column.
     *
     * @param  string $v new value
     * @return News The current object (for fluent API support)
     */
    public function setBbcId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bbc_id !== $v) {
            $this->bbc_id = $v;
            $this->modifiedColumns[] = NewsPeer::BBC_ID;
        }


        return $this;
    } // setBbcId()

    /**
     * Set the value of [url] column.
     *
     * @param  string $v new value
     * @return News The current object (for fluent API support)
     */
    public function setUrl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->url !== $v) {
            $this->url = $v;
            $this->modifiedColumns[] = NewsPeer::URL;
        }


        return $this;
    } // setUrl()

    /**
     * Set the value of [image] column.
     *
     * @param  string $v new value
     * @return News The current object (for fluent API support)
     */
    public function setImage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->image !== $v) {
            $this->image = $v;
            $this->modifiedColumns[] = NewsPeer::IMAGE;
        }


        return $this;
    } // setImage()

    /**
     * Set the value of [title] column.
     *
     * @param  string $v new value
     * @return News The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[] = NewsPeer::TITLE;
        }


        return $this;
    } // setTitle()

    /**
     * Set the value of [content] column.
     *
     * @param  string $v new value
     * @return News The current object (for fluent API support)
     */
    public function setContent($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->content !== $v) {
            $this->content = $v;
            $this->modifiedColumns[] = NewsPeer::CONTENT;
        }


        return $this;
    } // setContent()

    /**
     * Set the value of [short_content] column.
     *
     * @param  string $v new value
     * @return News The current object (for fluent API support)
     */
    public function setShortContent($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->short_content !== $v) {
            $this->short_content = $v;
            $this->modifiedColumns[] = NewsPeer::SHORT_CONTENT;
        }


        return $this;
    } // setShortContent()

    /**
     * Set the value of [keywords] column.
     *
     * @param  string $v new value
     * @return News The current object (for fluent API support)
     */
    public function setKeywords($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->keywords !== $v) {
            $this->keywords = $v;
            $this->modifiedColumns[] = NewsPeer::KEYWORDS;
        }


        return $this;
    } // setKeywords()

    /**
     * Set the value of [location] column.
     *
     * @param  string $v new value
     * @return News The current object (for fluent API support)
     */
    public function setLocation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->location !== $v) {
            $this->location = $v;
            $this->modifiedColumns[] = NewsPeer::LOCATION;
        }


        return $this;
    } // setLocation()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->bbc_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->url = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->image = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->title = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->content = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->short_content = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->keywords = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->location = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 9; // 9 = NewsPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating News object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(NewsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = NewsPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(NewsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = NewsQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(NewsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                NewsPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = NewsPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . NewsPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(NewsPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '[id]';
        }
        if ($this->isColumnModified(NewsPeer::BBC_ID)) {
            $modifiedColumns[':p' . $index++]  = '[bbc_id]';
        }
        if ($this->isColumnModified(NewsPeer::URL)) {
            $modifiedColumns[':p' . $index++]  = '[url]';
        }
        if ($this->isColumnModified(NewsPeer::IMAGE)) {
            $modifiedColumns[':p' . $index++]  = '[image]';
        }
        if ($this->isColumnModified(NewsPeer::TITLE)) {
            $modifiedColumns[':p' . $index++]  = '[title]';
        }
        if ($this->isColumnModified(NewsPeer::CONTENT)) {
            $modifiedColumns[':p' . $index++]  = '[content]';
        }
        if ($this->isColumnModified(NewsPeer::SHORT_CONTENT)) {
            $modifiedColumns[':p' . $index++]  = '[short_content]';
        }
        if ($this->isColumnModified(NewsPeer::KEYWORDS)) {
            $modifiedColumns[':p' . $index++]  = '[keywords]';
        }
        if ($this->isColumnModified(NewsPeer::LOCATION)) {
            $modifiedColumns[':p' . $index++]  = '[location]';
        }

        $sql = sprintf(
            'INSERT INTO [news] (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '[id]':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '[bbc_id]':
                        $stmt->bindValue($identifier, $this->bbc_id, PDO::PARAM_STR);
                        break;
                    case '[url]':
                        $stmt->bindValue($identifier, $this->url, PDO::PARAM_STR);
                        break;
                    case '[image]':
                        $stmt->bindValue($identifier, $this->image, PDO::PARAM_STR);
                        break;
                    case '[title]':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case '[content]':
                        $stmt->bindValue($identifier, $this->content, PDO::PARAM_STR);
                        break;
                    case '[short_content]':
                        $stmt->bindValue($identifier, $this->short_content, PDO::PARAM_STR);
                        break;
                    case '[keywords]':
                        $stmt->bindValue($identifier, $this->keywords, PDO::PARAM_STR);
                        break;
                    case '[location]':
                        $stmt->bindValue($identifier, $this->location, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = NewsPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }



            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = NewsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getBbcId();
                break;
            case 2:
                return $this->getUrl();
                break;
            case 3:
                return $this->getImage();
                break;
            case 4:
                return $this->getTitle();
                break;
            case 5:
                return $this->getContent();
                break;
            case 6:
                return $this->getShortContent();
                break;
            case 7:
                return $this->getKeywords();
                break;
            case 8:
                return $this->getLocation();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {
        if (isset($alreadyDumpedObjects['News'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['News'][$this->getPrimaryKey()] = true;
        $keys = NewsPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getBbcId(),
            $keys[2] => $this->getUrl(),
            $keys[3] => $this->getImage(),
            $keys[4] => $this->getTitle(),
            $keys[5] => $this->getContent(),
            $keys[6] => $this->getShortContent(),
            $keys[7] => $this->getKeywords(),
            $keys[8] => $this->getLocation(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = NewsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setBbcId($value);
                break;
            case 2:
                $this->setUrl($value);
                break;
            case 3:
                $this->setImage($value);
                break;
            case 4:
                $this->setTitle($value);
                break;
            case 5:
                $this->setContent($value);
                break;
            case 6:
                $this->setShortContent($value);
                break;
            case 7:
                $this->setKeywords($value);
                break;
            case 8:
                $this->setLocation($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = NewsPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setBbcId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setUrl($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setImage($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTitle($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setContent($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setShortContent($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setKeywords($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setLocation($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(NewsPeer::DATABASE_NAME);

        if ($this->isColumnModified(NewsPeer::ID)) $criteria->add(NewsPeer::ID, $this->id);
        if ($this->isColumnModified(NewsPeer::BBC_ID)) $criteria->add(NewsPeer::BBC_ID, $this->bbc_id);
        if ($this->isColumnModified(NewsPeer::URL)) $criteria->add(NewsPeer::URL, $this->url);
        if ($this->isColumnModified(NewsPeer::IMAGE)) $criteria->add(NewsPeer::IMAGE, $this->image);
        if ($this->isColumnModified(NewsPeer::TITLE)) $criteria->add(NewsPeer::TITLE, $this->title);
        if ($this->isColumnModified(NewsPeer::CONTENT)) $criteria->add(NewsPeer::CONTENT, $this->content);
        if ($this->isColumnModified(NewsPeer::SHORT_CONTENT)) $criteria->add(NewsPeer::SHORT_CONTENT, $this->short_content);
        if ($this->isColumnModified(NewsPeer::KEYWORDS)) $criteria->add(NewsPeer::KEYWORDS, $this->keywords);
        if ($this->isColumnModified(NewsPeer::LOCATION)) $criteria->add(NewsPeer::LOCATION, $this->location);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(NewsPeer::DATABASE_NAME);
        $criteria->add(NewsPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of News (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setBbcId($this->getBbcId());
        $copyObj->setUrl($this->getUrl());
        $copyObj->setImage($this->getImage());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setContent($this->getContent());
        $copyObj->setShortContent($this->getShortContent());
        $copyObj->setKeywords($this->getKeywords());
        $copyObj->setLocation($this->getLocation());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return News Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return NewsPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new NewsPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->bbc_id = null;
        $this->url = null;
        $this->image = null;
        $this->title = null;
        $this->content = null;
        $this->short_content = null;
        $this->keywords = null;
        $this->location = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(NewsPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
