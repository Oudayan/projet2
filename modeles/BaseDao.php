<?php
/**
 * @file     BaseDao.php
 * @author   Oudayan Dutta
 * @version  1.0
 * @date     31 janvier 2018
 * @brief    Modèle parent 
 * @details  Fonctions CRUD commumnes à toutes les classes et modèles
 */
	abstract class BaseDao {
		protected $db;
		public function __construct(PDO $dbPDO) {			
			$this->db = $dbPDO;
		}
			
		/**
		 * @brief      Deletes a row from a table
		 * @param      <string>  $primaryKey     ID of the primary key
		 * @return     <object>
		 */
		protected function delete($primaryKey) {
			$sql = "DELETE FROM " . $this->getTableName() . " WHERE " . $this->getPrimaryKey() ."=?";
			$data = array($primaryKey);
			return $this->query($sql, $data);
		}
		/**
		 * @brief      Reads the content from a table
		 * @param      <string>   $searchValue  Value of the primary key OR specified column
		 * @param      <string>   $primaryKey   Name of the primary key OR specified column
		 * @return     <object>                 All fields of the table
		 */
		protected function load($searchValue, $primaryKey = NULL) {
			if (!isset($primaryKey)) {
				$sql = "SELECT * FROM " . $this->getTableName() . " WHERE " . $this->getPrimaryKey() ."=?";
			}
			else {
				$sql = "SELECT * FROM " . $this->getTableName() . " WHERE " . $primaryKey ."=?";
			}
			$data = array($searchValue);
			return $this->query($sql, $data);
		}
		/**
		 * @brief      Reads all the rows from a table
		 * @return     <object>  All fields from all tables
		 */
		protected function loadAll() {
			$sql = "SELECT * FROM " . $this->getTableName();
			return $this->query($sql);
		}
		/**
		 * @brief      Updates the value of a field in a table
		 * @param      <string> $id     Value of the primary key OR specified column
		 * @param      <string> $field  Name of the column to update
     * @param      <string> $value  Value of the column to update
     * @return     <object>  
		 */
		protected function updateField($id, $field, $value) {
            $sql = "UPDATE " . $this->getTableName() . " SET " . $field . "=? WHERE " . $this->getPrimaryKey() . "=?";
            $data = array($value, $id);
            return $this->query($sql, $data);
        }
       
		/**
		 * @brief      Makes a query to a table with the parameters you'll send
		 * @param      <string>   $sql    The query
		 * @param      <array>    $data   The values to insert into the query
		 * @return     <type>
		 */
		final protected function query($sql, $data = array()) {
			try {
				$stmt = $this->db->prepare($sql);
				$stmt->execute($data);
			}
			catch (PDOException $e) {
				trigger_error("<p>La requête suivante a donné une erreur : $sql</p><p>Exception : " . $e->getMessage() . "</p>");
			}
			return $stmt;
		}
		
		/**
		 * @brief      Gets the name of the primary key of a table
		 * @return     <string>  Name of the primary key
		 */
		final protected function getPrimaryKey() {
			//copyright salim
			$sql = "SHOW columns FROM " . $this->getTableName();
			$results = $this->query($sql);
			foreach ($results as $row) {
				if ($row["Key"]=="PRI") {
					return $row["Field"];
				}
			}
		}
		/**
		 * Gets the table name.
		 */
		abstract function getTableName();
	}
?>
