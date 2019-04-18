<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

class PostRepository extends Repository
{
    protected $tableName = 'post';

    public function newpost($post, $uid_FK)
    {
        $connection=ConnectionHandler::getConnection();
        $query = "INSERT INTO post(post, uid_FK) values (?,?)";
        $statement = $connection->prepare($query); // can fail because of syntax errors, missing privileges
        if (false === $statement) {
            throw new Exception($connection->error);
        }
        // can fail because the number of parameter doesn't match the placeholders or type conflict
        $rc = $statement->bind_param('si', $post, $uid_FK);
        if (false === $rc) {
            throw new Exception($statement->error);
        }
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

    public function readPosts()
    {
        $query = "SELECT * FROM post ORDER BY pid DESC";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }
    public function deletePost($pid)
    {
        $connection=ConnectionHandler::getConnection();
        $query = "DELETE from post where pid=?";
        $statement = $connection->prepare($query); // can fail because of syntax errors, missing privileges
        if (false === $statement) {
            throw new Exception($connection->error);
        }
        // can fail because the number of parameter doesn't match the placeholders or type conflict
        $rc = $statement->bind_param('i', $pid);
        if (false === $rc) {
            throw new Exception($statement->error);
        }
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
}
