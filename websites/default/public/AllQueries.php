<?php
class AllQueries{

    // function for inserting data to specific database table...
    function insert($pdo, $table, $values){
        $keys = array_keys($values);
        $val1 = implode(', ', $keys);
        $val2 = implode(', :', $keys);
        $stmt = $pdo->prepare('INSERT INTO '. $table .' (' . $val1 . ')' . ' VALUES (:' . $val2 . ')');
        $stmt->execute($values);
    }


    // function to find specific data from specific database table...
    function find($pdo, $table, $field, $value) {
        $stmt = $pdo->prepare('SELECT * FROM ' . $table . ' WHERE ' . $field . ' = :value');
        $criteria = [
            'value' => $value
        ];
        $stmt->execute($criteria);
        return $stmt->fetch();
    }

    // function to find specific multiple data from specific database table...
    function select($pdo, $table, $field, $value) {
        $stmt = $pdo->prepare('SELECT * FROM ' . $table . ' WHERE ' . $field . ' = ' . $value);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // function to select all the data from specific database table...
    function selectAll($pdo, $table) {
        $stmt = $pdo->prepare('SELECT * FROM ' . $table );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // function to update the specific table's data...
    function update($pdo, $table, $record, $primaryKey) {
        $query = 'UPDATE ' . $table . ' SET ';
        $parameters = [];
        foreach ($record as $key => $value) {
        $parameters[] = $key . ' = :' .$key;
        }
        $query .= implode(', ', $parameters);
        $query .= ' WHERE ' . $primaryKey . ' = :primaryKey';
        $record['primaryKey'] = $record[$primaryKey];
        $stmt = $pdo->prepare($query);
        $stmt->execute($record);
    }

    // function to delete the specific data from specific database table...
    function delete($pdo, $table, $field, $value) {
        $stmt = $pdo->prepare('DELETE FROM ' . $table . ' WHERE ' . $field . ' = :value');
        $criteria = [
            'value' => $value
        ];
        $stmt->execute($criteria);
       }

    //    function to count rows of table
    function countRows($pdo, $table){
        $stmt = $pdo->prepare('SELECT * FROM ' . $table);
        $stmt->execute();
        return $stmt->rowCount();
    }

    // function to select the limited data
    function limitSelection($pdo, $table, $field,$value){
        $stmt = $pdo->prepare('SELECT * FROM '.$table.' ORDER BY '. $field.' desc LIMIT '. $value);
	    $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>