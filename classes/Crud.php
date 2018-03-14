<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 2/14/2018
 * Time: 9:14 AM
 */


class Crud extends DbConnect
{
    /**
     * This class has been build for the reason to make dynamic DB calls. The reason for this is that you don't need
     * a lot of useless functions repeating each DB process. This class makes it possible to create an instance and
     * give it the information the construtor needs and the what you want to send.
     * EXAMPLE
     * $colums = array("*");
     * $getAllUsers = new Crud("user", $colums);
     * $getAllUsers = $getAllUsers->selectFromTable();
     */

//properties

private $prop_table;
private $prop_columns;
private $prop_where;
private $prop_whereConditions;
private $prop_orderBy;
private $prop_value;

//constructor
    /**
     *  @param
     */
   public function __construct($table, $columns, $where='', $whereConditions='', $orderBy='', $value='')
    {
        parent::__construct();
        $this->setPropTable($table);
        $this->setPropColumns($columns);
        $this->setPropWhere($where);
        $this->setPropWhereConditions($whereConditions);
        $this->setPropOrderBy($orderBy);
        $this->setPropValue($value);
    }

    /**
     * getters and setters
     */

    /**
     * @return mixed
     */

    public function getPropTable()
    {
        return $this->prop_table;
    }

    /**
     * @param mixed $prop_table
     */
    public function setPropTable($prop_table)
    {
        $this->prop_table = $prop_table;
    }

    /**
     * @return mixed
     */
    public function getPropColumns()
    {
        return $this->prop_columns;
    }

    /**
     * @param mixed $prop_columns
     */
    public function setPropColumns($prop_columns)
    {
        $this->prop_columns = $prop_columns;
    }

    /**
     * @return mixed
     */
    public function getPropWhere()
    {
        return $this->prop_where;
    }

    /**
     * @param mixed $prop_where
     */
    public function setPropWhere($prop_where)
    {
        $this->prop_where = $prop_where;
    }

    /**
     * @return mixed
     */
    public function getPropWhereConditions()
    {
        return $this->prop_whereConditions;
    }

    /**
     * @param mixed $prop_whereConditions
     */
    public function setPropWhereConditions($prop_whereConditions)
    {
        $this->prop_whereConditions = $prop_whereConditions;
    }

    /**
     * @return mixed
     */
    public function getPropOrderBy()
    {
        return $this->prop_orderBy;
    }

    /**
     * @param mixed $prop_orderBy
     */
    public function setPropOrderBy($prop_orderBy)
    {
        $this->prop_orderBy = $prop_orderBy;
    }

    /**
     * @return mixed
     */
    public function getPropValue()
    {
        return $this->prop_value;
    }
//
//    /**
//     * @param mixed $prop_value
//     */
    public function setPropValue($prop_value)
    {
        $this->prop_value = $prop_value;
    }




//methods

    public function insertIntoTable()
{
//  INSERT INTO $table ($columns,) VALUES ('')
    $table = $this->getPropTable();
    $columns = $this->getPropColumns();
    $values = $this->getPropValue();
    $countArrayColumns = count($columns);
    $counterColumns = 1;

    //building the sql query. .= means that it should be pasted to the $sql.
    $sql = "INSERT INTO ";
    $sql .=" `$table` ";
    $sql .="(";
    //foreach through $column and it gets every item until the countArrayColumns is less than counterColumns.
    foreach ($columns as $column)
    {
        $sql .= "`$column`";
        if ($counterColumns<$countArrayColumns)
        {
            $sql .= ", ";
        }
        $counterColumns++;
    }

    $sql .=") ";
    $sql .=" VALUES ";
    $sql .="(";

    //reset the counterColumns
    $counterColumns = 1;
    //foreach through $column and it gets every item until the countArrayColumns is less than counterColumns.
    // Doing this for the bindParam
    foreach ($columns as $column)
    {
        $sql .= ":$column";
        if ($counterColumns<$countArrayColumns)
        {
            $sql .= ", ";
        }
        $counterColumns++;
    }

    $sql .= ")";

    //extends makes it possible to get to the connect methode within DbConnect.php.
    $query = $this->connect()->prepare($sql);

        // $db = new DbConnect();
        // $db = $db->connect();
        //
        // $query = $db->prepare($sql);
    //looping through the foreach and getting the index from the columns. (the index numbers!) the $values will be binded to a certain Index number.
    foreach($columns as $columnIndex => $column) {
        $query->bindParam(":".$column , $values[$columnIndex]);
    }

    $query-> execute();
}
    public function selectFromTable()
    {
        //SELECT $columms FROM `$table` WHERE $where = $whereConditions order by $orderBy;
        $table = $this->getPropTable();
        $columns = $this->getPropColumns();
        $where = $this->getPropWhere();
        $whereConditions = $this->getPropWhereConditions();
        $orderBy = $this->getPropOrderBy();
        $countArray = count($columns);
        $counter = 1;
        //building the sql query. .= means that it should be pasted to the $sql.
        $sql = "SELECT ";
        //foreach through $columns and it gets every item until the countArray is less than $counter.
        foreach ($columns as $column)
        {
            $sql .= "$column";
            if ($counter<$countArray)
            {
                $sql .= ", ";
            }
            $counter++;
        }

        $sql .=" FROM $table ";
        //not identical to.
        if($where !== "")
        {
            $sql .= "WHERE $where = '$whereConditions'";
        }
        //not identical to.
        if($orderBy !== "")
        {
            $sql .= " ORDER BY $orderBy";
        }
//        var_dump($this->connect());
        $query = $this->connect()->prepare($sql);
        //binding the $wherecondition
        $query->bindParam(":".$whereConditions , $whereConditions);
        $query-> execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function updateIntoTable()
    {
        //UPDATE $table SET $columns = :$columns  WHERE $column = :id
        //bindparam :$columns, $values[];
        $table = $this->getPropTable();
        $columns = $this->getPropColumns();
        $newValues = $this->getPropValue();
        $where = $this->getPropWhere();
        $whereConditions = $this->getPropWhereConditions();
        $countArrayColumns = count($columns);
        $counterColumns = 1;
        //building the sql query. .= means that it should be pasted to the $sql.
        $sql = "UPDATE ";
        $sql .=" `$table` ";
        $sql .="SET ";
        //foreach through $columns and it gets every item until the $countArrayColumns is less than $counterColumns.
        foreach ($columns as $column)
        {
            $sql .= "`$column` = :$column";
            if ($counterColumns<$countArrayColumns)
            {
                $sql .= ", ";
            }
            $counterColumns++;
        }

        $sql .=" WHERE ";
        $sql .= " $where = :$whereConditions";

        $query = $this->connect()->prepare($sql);

        //looping through the foreach and getting the index from the columns. (the index numbers!) the $newValues will be binded to a certain Index number.
        foreach($columns as $columnIndex => $column) {
            $query->bindParam(":".$column , $newValues[$columnIndex]);
        }
        //binding the $wherecondition
        $query->bindParam(":".$whereConditions , $whereConditions);
        $query-> execute();
    }
    public function deleteFromTable()
    {
      //DELETE FROM $table WHERE $column = :id
      $table = $this->getPropTable();
      $columns = $this->getPropColumns();
      $whereConditions = $this->getPropWhereConditions();
      $countArrayColumns = count($columns);
      $counterColumns = 1;

      $sql = "DELETE FROM ";
      $sql .=" `$table` ";
      $sql .="WHERE ";
      //foreach through $columns and it gets every item until the $countArrayColumns is less than $counterColumns.
      foreach ($columns as $column)
      {
          $sql .= "`$column` = :$column";
          if ($counterColumns<$countArrayColumns)
          {
              $sql .= ", ";
          }
          $counterColumns++;
      }
      $query = $this->connect()->prepare($sql);
      //binding the $wherecondition
      $query->bindParam(":".$column , $whereConditions);
      $query-> execute();
    }
}
