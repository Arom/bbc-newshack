<?php


/**
 * Base class that represents a query for the 'news' table.
 *
 *
 *
 * @method NewsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method NewsQuery orderByBbcId($order = Criteria::ASC) Order by the bbc_id column
 * @method NewsQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method NewsQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method NewsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method NewsQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method NewsQuery orderByShortContent($order = Criteria::ASC) Order by the short_content column
 * @method NewsQuery orderByKeywords($order = Criteria::ASC) Order by the keywords column
 * @method NewsQuery orderByLocation($order = Criteria::ASC) Order by the location column
 *
 * @method NewsQuery groupById() Group by the id column
 * @method NewsQuery groupByBbcId() Group by the bbc_id column
 * @method NewsQuery groupByUrl() Group by the url column
 * @method NewsQuery groupByImage() Group by the image column
 * @method NewsQuery groupByTitle() Group by the title column
 * @method NewsQuery groupByContent() Group by the content column
 * @method NewsQuery groupByShortContent() Group by the short_content column
 * @method NewsQuery groupByKeywords() Group by the keywords column
 * @method NewsQuery groupByLocation() Group by the location column
 *
 * @method NewsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method NewsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method NewsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method News findOne(PropelPDO $con = null) Return the first News matching the query
 * @method News findOneOrCreate(PropelPDO $con = null) Return the first News matching the query, or a new News object populated from the query conditions when no match is found
 *
 * @method News findOneByBbcId(string $bbc_id) Return the first News filtered by the bbc_id column
 * @method News findOneByUrl(string $url) Return the first News filtered by the url column
 * @method News findOneByImage(string $image) Return the first News filtered by the image column
 * @method News findOneByTitle(string $title) Return the first News filtered by the title column
 * @method News findOneByContent(string $content) Return the first News filtered by the content column
 * @method News findOneByShortContent(string $short_content) Return the first News filtered by the short_content column
 * @method News findOneByKeywords(string $keywords) Return the first News filtered by the keywords column
 * @method News findOneByLocation(string $location) Return the first News filtered by the location column
 *
 * @method array findById(int $id) Return News objects filtered by the id column
 * @method array findByBbcId(string $bbc_id) Return News objects filtered by the bbc_id column
 * @method array findByUrl(string $url) Return News objects filtered by the url column
 * @method array findByImage(string $image) Return News objects filtered by the image column
 * @method array findByTitle(string $title) Return News objects filtered by the title column
 * @method array findByContent(string $content) Return News objects filtered by the content column
 * @method array findByShortContent(string $short_content) Return News objects filtered by the short_content column
 * @method array findByKeywords(string $keywords) Return News objects filtered by the keywords column
 * @method array findByLocation(string $location) Return News objects filtered by the location column
 *
 * @package    propel.generator.newshack.om
 */
abstract class BaseNewsQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseNewsQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'newshack';
        }
        if (null === $modelName) {
            $modelName = 'News';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new NewsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   NewsQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return NewsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof NewsQuery) {
            return $criteria;
        }
        $query = new NewsQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   News|News[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NewsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(NewsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 News A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 News A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT [id], [bbc_id], [url], [image], [title], [content], [short_content], [keywords], [location] FROM [news] WHERE [id] = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new News();
            $obj->hydrate($row);
            NewsPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return News|News[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|News[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return NewsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NewsPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return NewsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NewsPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(NewsPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(NewsPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the bbc_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBbcId('fooValue');   // WHERE bbc_id = 'fooValue'
     * $query->filterByBbcId('%fooValue%'); // WHERE bbc_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bbcId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewsQuery The current query, for fluid interface
     */
    public function filterByBbcId($bbcId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bbcId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bbcId)) {
                $bbcId = str_replace('*', '%', $bbcId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NewsPeer::BBC_ID, $bbcId, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%'); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewsQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $url)) {
                $url = str_replace('*', '%', $url);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NewsPeer::URL, $url, $comparison);
    }

    /**
     * Filter the query on the image column
     *
     * Example usage:
     * <code>
     * $query->filterByImage('fooValue');   // WHERE image = 'fooValue'
     * $query->filterByImage('%fooValue%'); // WHERE image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $image The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewsQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $image)) {
                $image = str_replace('*', '%', $image);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NewsPeer::IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewsQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NewsPeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the content column
     *
     * Example usage:
     * <code>
     * $query->filterByContent('fooValue');   // WHERE content = 'fooValue'
     * $query->filterByContent('%fooValue%'); // WHERE content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $content The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewsQuery The current query, for fluid interface
     */
    public function filterByContent($content = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($content)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $content)) {
                $content = str_replace('*', '%', $content);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NewsPeer::CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the short_content column
     *
     * Example usage:
     * <code>
     * $query->filterByShortContent('fooValue');   // WHERE short_content = 'fooValue'
     * $query->filterByShortContent('%fooValue%'); // WHERE short_content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shortContent The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewsQuery The current query, for fluid interface
     */
    public function filterByShortContent($shortContent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shortContent)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shortContent)) {
                $shortContent = str_replace('*', '%', $shortContent);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NewsPeer::SHORT_CONTENT, $shortContent, $comparison);
    }

    /**
     * Filter the query on the keywords column
     *
     * Example usage:
     * <code>
     * $query->filterByKeywords('fooValue');   // WHERE keywords = 'fooValue'
     * $query->filterByKeywords('%fooValue%'); // WHERE keywords LIKE '%fooValue%'
     * </code>
     *
     * @param     string $keywords The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewsQuery The current query, for fluid interface
     */
    public function filterByKeywords($keywords = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keywords)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $keywords)) {
                $keywords = str_replace('*', '%', $keywords);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NewsPeer::KEYWORDS, $keywords, $comparison);
    }

    /**
     * Filter the query on the location column
     *
     * Example usage:
     * <code>
     * $query->filterByLocation('fooValue');   // WHERE location = 'fooValue'
     * $query->filterByLocation('%fooValue%'); // WHERE location LIKE '%fooValue%'
     * </code>
     *
     * @param     string $location The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewsQuery The current query, for fluid interface
     */
    public function filterByLocation($location = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($location)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $location)) {
                $location = str_replace('*', '%', $location);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NewsPeer::LOCATION, $location, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   News $news Object to remove from the list of results
     *
     * @return NewsQuery The current query, for fluid interface
     */
    public function prune($news = null)
    {
        if ($news) {
            $this->addUsingAlias(NewsPeer::ID, $news->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
