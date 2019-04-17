<?php

namespace App\Repository;
use App\Database\ConnectionHandler;
use Exception;

class PostRepository extends Repository
{
    protected $tableName = 'post';

    public function newpost($post, $uid_FK){

        $connection=ConnectionHandler::getConnection();
        $query = "INSERT INTO post(post, uid_FK) values (?,?)";
        $statement = $connection->prepare($query); // can fail because of syntax errors, missing privileges
        if (false === $statement) { throw new Exception($connection->error); } 
        // can fail because the number of parameter doesn't match the placeholders or type conflict
        $rc = $statement->bind_param('si', $post, $uid_FK);
        if (false === $rc) { throw new Exception($statement->error); }
        if (!$statement->execute()) { throw new Exception($statement->error);}
    }
}