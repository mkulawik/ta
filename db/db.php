<?php

function db_connect($host, $user, $pwd, $db) {

	$dbCon = mysql_connect($host, $user, $pwd);

	if(!$dbCon) {
		if(APP_DB_MODE == 'DEBUG')
			echo('Database connection error: ' . mysql_error() . '<br />');
		
		if(APP_DB_DIE_ON_FAIL) {
			echo('critical database error occured. Please try again afterr some time.<br />');
			exit();
		}
	}

	$isConnected = mysql_select_db($db);

	if(!$isConnected) {
		if(APP_DB_MODE == 'DEBUG')
			echo('2 Database error: ' . mysql_error() . '<br />');
		
		if(APP_DB_DIE_ON_FAIL) {
			echo('A critical database error occured. Please try again afterr some time.<br />');
			exit();
		}
	}

	return $dbCon;
}


function db_query($sql) {
	if(APP_DB_SHOW_SQL)
	echo($sql);

	$res = mysql_query($sql);

	if(!$res) {
		if(APP_DB_MODE == 'DEBUG')
			echo('<br>'.$sql.'<br>Database query error: ' . mysql_error() . '<br />');
	    
		if(APP_DB_DIE_ON_FAIL) {
			echo('A critical database error occured. Please try again afterr some time.<br />');
			exit();
		}
	}

	return $res;
}


function db_insertId() {
	return mysql_insert_id();
}


function db_numRows($res) {
	return mysql_num_rows($res);
}


function db_fetchAssoc($res) {
	return mysql_fetch_assoc($res);
}


function db_freeResult($res) {
	mysql_free_result($res);
}


function db_insert($table, &$data) {
	$params = '';
	$vals = '';

	foreach($data as $key => $val) {
		if(strlen($params) > 0) $params .= ', ';
		if(strlen($vals) > 0) $vals .= ', ';

		$params .= $key;
		$vals .= "'" . $val . "'";
	//	$vals .= "'" . db_encode($val) . "'";
	}

	$sql = 'INSERT INTO ' . APP_DB_PREFIX . $table . ' (' . $params . ') VALUES (' . $vals . ')';

	db_query($sql);
}


function db_update($table, &$data, $filter) {
	$params = '';
	$vals = '';

	foreach($data as $key => $val) {
		if(strlen($vals) > 0) $vals .= ', ';
		
//		$vals .= $key . "='" . db_encode($val) . "'";
		$vals .= $key . "='" . $val . "'";
	}

	$sql = 'UPDATE ' . APP_DB_PREFIX . $table . ' SET ' . $vals . ' WHERE ' . $filter;

	db_query($sql);
}


function db_delete($table, $filter) {
   $sql = 'DELETE FROM ' . APP_DB_PREFIX . $table . ' WHERE ' . $filter;
   
   db_query($sql);
}


function db_getRs($table, $filter='', $sort='', $lim='') {
	global $CFG;

	$sql = 'SELECT * FROM ' . APP_DB_PREFIX . $table;

	if(!empty($filter)) { $sql .= ' WHERE ' . $filter; }
	if(!empty($sort)) { $sql .= ' ORDER BY ' . $sort; }
	if(!empty($lim)) { $sql .= ' LIMIT ' . $lim; }
//	echo '<br>'.$sql;
	return db_query($sql);
}


function db_encode($p) {
   // return addslashes("'", "''", $p);
   return mysql_real_escape_string($p);
}


function db_getHtmlSelect($arrParam, $selected='', $filter='', $sort='', $lim='') {
   $sql = 'SELECT ' . $arrParam['valueCol'] . ', ' . $arrParam['labelCol'] . ' FROM ' . APP_DB_PREFIX . $arrParam['table'];
   
   if(!empty($filter)) $sql .= ' WHERE ' . $filter;
   if(!empty($sort)) $sql .= ' ORDER BY ' . $sort;
   if(!empty($lim)) $sql .= ' LIMIT ' . $lim;
   
   $rs = db_query($sql);
   
   $retVal = '';
   while($row = db_fetchAssoc($rs)) {
      $sSeleccted = ($row[$arrParam['valueCol']] == $selected) ? ' selected' : '';
	  $colLabel = $row[$arrParam['labelCol']];
	  $colValue = $row[$arrParam['valueCol']];
	  $retVal .= '<option value="' . $colValue . '"' . $sSeleccted . '>' . $colLabel . '</option>' . "\n";
   }   
   return $retVal;
}


// example usage:
// db_getHtmlTreeSelect(array(
//                           'table'=>'category',
//                           'idCol'=>'id',
//                           'valueCol'=>'id',
//                           'labelCol'=>'name',
//                           'parentCol'=>'parent_id'
//                      ),
//                      $parent,
//                      $selected='',
//                      $pad='-',
//                      $filter='',
//                      $sort='',
//                      $lim='');

//-----------------------------------------------------------------------------------------------
function db_getHtmlTreeSelect($arrParam, $parent, $selected='', $pad='', $filter='', $sort='', $lim='') {
   $sql = 'SELECT ' . $arrParam['valueCol'] . ', ' . $arrParam['labelCol'] . ' FROM ' . APP_DB_PREFIX . $arrParam['table'] . 
          ' WHERE ' . $arrParam['parentCol'] . '=' . $parent;

   if(!empty($filter)) $sql .= ' AND ' . $filter;
   if(!empty($sort)) $sql .= ' ORDER BY ' . $sort;
   if(!empty($lim)) $sql .= ' LIMIT ' . $lim;
   
   
   $rs = db_query($sql);
   
   $retVal = '';
   
   while($row = db_fetchAssoc($rs)) {
      $sSeleccted = ($row[$arrParam['valueCol']] == $selected) ? ' selected' : '';
	  
	  $retVal .= '<option value="' . $row[$arrParam['valueCol']] . '"' . $sSeleccted . '>' . $pad . $row[$arrParam['labelCol']] .
	             '</option>' . "\n";
	  
	  $retVal .= db_getHtmlTreeSelect($arrParam, $row[$arrParam['idCol']], $selected, '&nbsp;' . $pad . '-&nbsp;', $filter, $sort, $lim);
   }
   
   db_freeResult($rs);
   
   return $retVal;
}


function db_fillHtmlTreePath($arrParam, $start, &$arrOutput, $filter='', $sort='', $lim='') {
   $sql = 'SELECT ' . $arrParam['idCol'] . ', ' . $arrParam['nameCol'] . ', ' . $arrParam['parentCol'] .
          ' FROM ' . APP_DB_PREFIX . $arrParam['table'] .
          ' WHERE ' . $arrParam['idCol'] . '=' . $start;
   
   if(!empty($filter)) $sql .= ' AND ' . $filter;
   if(!empty($sort)) $sql .= ' ORDER BY ' . $sort;
   if(!empty($lim)) $sql .= ' LIMIT ' . $lim;
   
   $rs = db_query($sql);
   
   if($row = db_fetchAssoc($rs)) {
      $arrOutput[] = array($arrParam['idCol'] => $row[$arrParam['idCol']], $arrParam['nameCol'] => $row[$arrParam['nameCol']]);
	  
	  $nextStart = $row[$arrParam['parentCol']];
	  
	  db_freeResult($rs);
	  
	  db_fillHtmlTreePath($arrParam, $nextStart, $arrOutput, $filter, $sort, $lim);
   }
}
//----------------------------------------------------------------------------------
function db_getField($table,$field,$filter)
{
	$rs = db_getRs($table,$filter);	
	$row = db_fetchAssoc($rs);
	return $row[$field];/**/
}
//----------------------------------------------------------------------------------
function db_getHtmlTreeMenu($arrParam, $parent, $selected='', $pad='', $filter='', $sort='', $lim='') {
   $sql = 'SELECT *' . 
   			/*APP_DB_PREFIX . $arrParam['table'] .'.description,' .
			APP_DB_PREFIX . $arrParam['table'] .'.link,' .
			APP_DB_PREFIX . $arrParam['table'] .'.target,' .
   		 	$arrParam['valueCol'] . ', ' . $arrParam['labelCol'] .
			/**/
			' FROM ' . APP_DB_PREFIX . $arrParam['table'] .		   
            ' WHERE ' . $arrParam['parentCol'] . '=' . $parent;
	global $g;
   if(!empty($filter)) $sql .= ' AND ' . $filter;
   if(!empty($sort)) $sql .= ' ORDER BY ' . $sort;
   if(!empty($lim)) $sql .= ' LIMIT ' . $lim;
   
   
   $rs = db_query($sql);
   $tCount = @mysql_num_rows($rs);
   
    $retVal = '';
	$coma = ",";
 if($tCount > 0)
 {
	if($pad == '')
	  $retVal .= "\n[";
	  $curCount=0;
	   while($row = db_fetchAssoc($rs)) {
	   $sep = '';
   		global $g;
		if($pad == '' and $g != 1)		{	if($arrParam['spliter'] == 'yes')   $sep = '_cmSplit,';				}
		if($row['link'] == '')
			$link = "cms.php?pageId=".$row['id'];
		else
			$link = $row['link'];
			
	  	  $coma = ($g == 1) ?   $coma='' : ', ';
		  $sSeleccted = ($row[$arrParam['valueCol']] == $selected) ? ' selected' : '';
  		  $retVal .= "\n".$coma.$sep." ['&nbsp;&nbsp;','".
		  $row[$arrParam['labelCol']]."','".
		  $link."','".
		  $row['target']."','".
		  $row['description'].'('.$row['id'].")' ";
		  $g = 0;
		  $curCount++;
		  $retVal .= db_getHtmlTreeMenu($arrParam, $row[$arrParam['idCol']], $selected, '&nbsp;' . $pad . '&nbsp;', $filter, $sort, $lim);
		  $tCount--;
		  $retVal .= ']' . "\n";
	   }
	if($pad == '')
		 $retVal .= "]";     
		 
   db_freeResult($rs);
 }   
   return $retVal;
}

?>