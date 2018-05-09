<?php
/**
 * Yadal interface for DB2
 *
 * @todo This file is not finished at all!!!!
 *
 * @package Yadal
 */

/**
 * class DB2
 *
 * Yadal - Yet Another Database Abstraction Layer
 * DB2
 *
 * @author Sebastian Buse
 * @package Yadal
 */
class DB2 extends Yadal {
  var $_dsn;		// dsn

    /**
     * DB2::DB2()
     *
     * Constructor
     *
     * @return ODBC
     * @access public
     * @author Sebastian Buse
     */ 
    function DB2( $db ) {
      $this->Yadal( $db );
      $this->_nameQuote = "";
      $this->_quoteNumbers = false;
    }
    
    /**
     * DB2::connect()
     *
     * Make a connection with the database and
     * select the database.
     *
     * @param string dns: the dns to connect to
     * @param string username: the username which should be used to login
     * @param string password: the password which should be used to login
     * @return resource: The connection resource or false on failure
     * @access public
     * @author Sebastian Buse
     */
    function connect($dsn, $username, $password) {
      $this->_conn = db2_connect($dsn, $username, $password);
        if( $this->_conn ) {
        $this->_isConnected = true;
        // return the connection resource
        return $this->_conn;
        }
      return false;
    }
    
    /**
     * DB2::close()
     *
     * Close the connection
     *
     * @return bool
     * @access public
     * @author Sebastian Buse
     */
    function close(){
      if( $this->_isConnected ){
        $this->_isConnected = false;
        return db2_close( $this->_conn );
      }   
      return true;
    }
    
    /**
     * DB2::query()
     *
     * Execute the query
     *
     * @param string $query: the query
     * @return resource
     * @access public
     * @author Sebastian Buse
     */
    function query( $query ) {
      $this->_lastQuery = $query;
      return db2_exec( $this->_conn, $query ); 
    }
    
    /**
     * DB2::freequery()
     *
     * Execute the query
     *
     * @param string $query: the query
     * @return resource
     * @access public
     * @author Sebastian Buse
     */
    function freequery( $query ) {
      $this->_lastQuery = $query;
      return db2_free_stmt( $this->_conn, $query );
    }
    
    /**
     * DB2::getInsertId()
     *
     * Get the id of the last inserted record
     *
     * @return int
     * @access public
     * @author Sebastian Buse
     */
    function getInsertId() {
    return db2_last_insert_id ($this->_conn);
    }
    
    /**
     * DB2::result()
     *
     * Return a specific result of a sql resource
     *
     * @param resource $sql: The sql where you want to get a result from
     * @param int $row: The row where you want a result from
     * @param string $field: The field which result you want
     * @return string
     * @access public
     * @author Sebastian Buse
     */
    function result( $sql, $row=0, $field = null){
      return db2_fetch_assoc( $sql, $row, $field );
    }
    
    /**
     * DB2::getError()
     *
     * Return the last error
     *
     * @return string
     * @access public
     * @author Sebastian Buse
     */
    function getError(){
      return db2_stmt_errormsg ();
    }
    
    /**
     * DB2::recordCount()
     *
     * Return the number of records found by the query
     *
     * @param resource $sql: The resource which should be counted
     * @return int
     * @access public
     * @author Sebastian Buse
     */
    function recordCount( $sql ){
      $query = str_replace('SELECT *', 'SELECT COUNT(*)', $this->_lastQuery);
      $ret = $this->query($query);
      $rows = $this->getRecord($ret);
      return $rows[1];
    }
    
    /**
     * DB2::getRecord()
     *
     * Fetch a record in assoc mode and return it
     *
     * @param resource $sql: The resource which should be used to retireve a record from
     * @return assoc array or false when there are no records left
     * @access public
     * @author Sebastian Buse
     */
    function getRecord( $sql ){
      return db2_fetch_assoc( $sql );
    }
    
    /**
     * DB2::getFieldNames()
     *
     * Return the field names of the table
     *
     * @param string $table: the table where we should fetch the field names from
     * @return array
     * @access public
     * @author Sebastian Buse
     */
    function getFieldNames( $table  ) {
      if( isset( $this->_cache['fields'][$table] ) ) {
       return $this->_cache['fields'][$table];
      }      
      $this->_schema = $this->getSchema($table);
      $tableonly = str_replace($this->_schema.'.', '', $table); 
      $query = "SELECT * FROM ".$this->_schema.".".$tableonly." FETCH FIRST 10 ROWS ONLY;";  
      $rows = $this->query($query);
      $row = db2_fetch_assoc($rows);
      $result=array_keys($row);
        if( !$result ){
        trigger_error(
          "Could not retrieve the fields from table!\n".
          "Query: ".$query."\n".
          "Error: ".$this->getError(),
        E_USER_WARNING
        );
        return false;
        }
      // save the result in the cache
      $this->_cache['fields'][$table] = $result;
      return $result;
    }
    
    /**
     * DB2::getSchema()
     *
     * Return the Schema of the used table
     *
     * @param string $table: The Table withe the Schema schema.table 
     * @return string Only the schema
     * @access public
     * @author Sebastian Buse
     */
    function getSchema( $table  ) {
    if( isset( $this->_cache['schema'][$table]) ){
      return $this->_cache['schema']['tables'];
    }
    if(strpos($table, ".")!==false){
     // Format SCHEMA.TABLE
     $array = explode('.', $table);     
     if( !$array[1] ){      
       trigger_error(
      	"Could not retrieve the schema from table!\n".
      	"Table: ".$table."\n".
        "Error: ",
        E_USER_WARNING
       );
       return false;
       }else{
       $result=$array[0];
       $this->_schema = $result;
       $this->_cache['schema']['tables'] = $result;
       return $result;
       }
    }else{
      // Format TABLE get schema from syscat
      $query = "select TABSCHEMA from syscat.tables where TABNAME = '".$table."'";
      $rows = $this->query($query);
      $row = db2_fetch_assoc($rows);
      $result=$row['TABSCHEMA'];
      $this->_schema = $result;
      $this->_cache['schema']['tables'] = $result;
      return $result;
    }
   } 
    
    
    /**
     * DB2::getTables() not O.K.
     *
     * Return the tables from the database
     *
     * @return array
     * @access public
     * @author Sebastian Buse
     */
    function getTables(){
      //return the data from the cache if it exists
      if( isset( $this->_cache['tables'] ) ){
      return $this->_cache['tables'];
      }
      $conn = $this->_conn;
      $schema = $this->_schema;
      //$query = "select * from syscat.tables where TABSCHEMA = 'SST';";
      $query = "select * from syscat.tables;";
      $rows = $this->query($query);
      //$row = db2_fetch_assoc($rows);
      //$result=array_keys($row);
      
      $result=array();
        while ($rowtable=db2_fetch_array($rows)){  
          
          $result[] = $rowtable[1];
          
        }
      // query failed ?
      //print_r($sql);
      if( !$result )
      {
      trigger_error(
          		  "Could not retrieve the tables from the database!\n".
          		  "Query: ".$this->getLastQuery()."\n".
          		  "Error: ".$this->getError(),
      E_USER_WARNING
      );
      return false;
      }
      // save the result in the cache
      $this->_cache['tables'] = $result;
      return $result;
    }
    
    /**
     * DB2::getNotNullFields()
     *
     * Retrieve the fields that can not contain NULL
     *
     * @param string $table: The table which fields we should retrieve
     * @return array
     * @access public
     * @author Sebastian Buse
     */
    function getNotNullFields ( $table ){
      if( isset( $this->_cache['notnull'][$table] ) ){
      return $this->_cache['notnull'][$table];
      }
      $conn = $this->_conn;
      //$schema = $this->_schema;
      $schema = $this->getSchema($table);
      $tableonly = str_replace($schema.'.', '', $table);
      $myTable = db2_columns($conn, '', $schema, $tableonly);
      $result=array();
        while ($rowtable=db2_fetch_array($myTable)){  
          if ($rowtable[17]=='NO'){
          $result[] = $rowtable[3];
          }
        }
        if( !$result ){
        trigger_error(
          "Could not retrieve the not-null-field from the table!\n".
          "Error: ".$this->getError(),
        E_USER_WARNING
        );
        return false;
        }
      // save the result in the cache
      $this->_cache['notnull'][$table] = $result;
      return $result;
    }
    
    /**
     * DB2::getFieldTypes()
     *
     * Retrieve the field types of the given table
     *
     * @param string $table: The table where we should fetch the fields and their types from
     * @return array
     * @access public
     * @author Sebastian Buse
     */
    function getFieldTypes( $table ){
      if( isset( $this->_cache['fieldtypes'][$table] ) ){
      return $this->_cache['fieldtypes'][$table];
      }
      $conn = $this->_conn;
      $schema = $this->getSchema($table);
      $tableonly = str_replace($schema.'.', '', $table);
      $myTable = db2_columns($conn, '', $schema, $tableonly);
      $x=1;
      $result=array();
      while ($rowtable=db2_fetch_array($myTable)){
        $res=$rowtable[3];
        $result[$res]=array();
        $result[$res][0]=$rowtable[5];
        $result[$res][1]=$rowtable[6];
        $result[$res][2]='';
          if ($rowtable[17]=='YES'){
          $this->_cache['fieldtypes'][$table] = $res;
          }
      }
      if( !$result ){
        trigger_error(
          "Could not retrieve the fieldtypes from the table!\n".
          "Query: ".$this->getLastQuery()."\n".
          "Error: ".$this->getError(),
        E_USER_WARNING
        );
        return false;
      }
      // save the result in the cache
      $this->_cache['fieldtypes'][$table] = $result;
      return $result;
    }
    
    /**
     * DB2::escapeString()
     *
     * Public: escape the string we are going to save from dangerous characters
     * @param string $string
     * @return string
     * @author Sebastian Buse
     */
    function escapeString( $string ) {
      return db2_escape_string( $string );
    }
    
    /**
     * DB2::fetchKeys()
     *
     * Public: fetch the keys from the table
     *
     * @return array of the keys which are found
     * @author Sebastian Buse     
     */
    function fetchKeys( $table = null) {
      $table = is_null($table) ? $this->_table : $table;
      $conn = $this->_conn;
      $this->_schema = $this->getSchema($table);
      $tableonly= str_replace($this->_schema.'.', '', $table); 
      $myTable = db2_foreign_keys($conn, '', $this->_schema, $tableonly);
      $result=array();
        while ($rowtable=db2_fetch_array($myTable)) {
          $result[] = $rowtable[7];         
        }
      if( !$result ){
        trigger_error(
                      "Error, could not fetch the indexes from table '".$table."'! ".
                      "If you didn't define a primary key or another index type, ".
                      "please set the name of the field (which should be used for indexing) ".
                      "manually in the dbinfo() function!",
        E_USER_WARNING
        );
        return null;
      }
      // save the result in the cache
      $this->_cache['foreignkeys'][$table] = $result;
      return $result;    
      
    }
    
    /**
     * DB2::getPrKeys()
     *
     * Public: fetch the Primary keys from the table
     * @return array of the keys which are found
     * @author Sebastian Buse
     */
    function getPrKeys( $table ){
      if( isset( $this->_cache['keys'][$table] ) ){
      return $this->_cache['keys'][$table];
      }
      $conn = $this->_conn;
      //$schema = $this->_schema;
      $schema = $this->getSchema($table);
      $tableonly= str_replace($schema.'.', '', $table); 
      $myTable = db2_primary_keys($conn, '', $schema, $tableonly);
      $result=array();
        while ($rowtable=db2_fetch_array($myTable)) {
          //print_r ($rowtable);
          if ($rowtable[1] == $schema){
          $result[] = $rowtable[3];
          }
        }
      if( !$result ){
        trigger_error(
            "No primary Key in the table $table!\n".
            "Result: ".print_r($result)."\n".
            "Query: ".$this->getLastQuery()."\n".
            "Error: ".$this->getError(),
        E_USER_WARNING
        );
        return false;
      }
      // save the result in the cache
      $this->_cache['keys'][$table] = $result;
      return $result;    
    }  
    
    /**
     * DB2::fetchUniqueFields()
     *
     * Public: fetch the unique fields from the table
     * 
     * @param  string $table: The table where the unique-value-field should be collected from
     * @return array
     * @access public
     * @author Sebastian Buse
     */
    function fetchUniqueFields( $table = null ) {
     getUniqueFields($table);
    }
    
    /**
     * DB2::getUniqueFields()
     *
     * Fetch the unique fields from the table
     *
     * @param string $table: The table where the unique-value-field should be collected from
     * @return array: multidimensional array of the unique indexes on the table
     * @access public
     * @author Sebastian Buse
     */
    function getUniqueFields( $table ){  
      $t = strtoupper( $table );
      // return the data from the cache if it exists
      if( isset( $this->_cache['unique'][$t] ) ){
        return $this->_cache['unique'][$t];
      }
      $conn = $this->_conn;
      $schema = $this->getSchema($table);
      $tableonly= str_replace($schema.'.', '', $t); 
      //$myTable = db2_primary_keys($conn, '', '', $tableonly);
      $myTable = db2_primary_keys($conn, '', $schema, $tableonly);
      $result=array();
      //$result[0]= 'ID_VERBUND';
      while ($rowtable=db2_fetch_array($myTable)) {
        // save all keys which have to be unique / primary
        $result[] = $rowtable[3];
      }
      if( !$result ){
        trigger_error(
            "No unique / primary Key in the table $table!\n".
            "Result: ".print_r($result)."\n".
            "Query: ".$myTable."\n".
            "Error: ".$this->getError(),
        E_USER_WARNING
        );
        return false;
      }
      // save the result in the cache
      $this->_cache['unique'][$t] = $result;
      return $result;
    }
}
?>
