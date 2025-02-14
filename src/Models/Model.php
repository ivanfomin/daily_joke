<?php

namespace DailyJoke\Models;

include_once __DIR__ . '/../../Exceptions/MultiException.php';


use DailyJoke\Db;
use Exceptions\MultiException;

class Model
{
    protected const TABLE = '';

    public int $id;

    public static function findAll(): array
    {
        $db = Db::instance();

        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id';
        return $db->query($sql, static::class);
    }


    public static function findById($id): static
    {
        $db = Db::instance();

        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';


        $model = $db->query($sql, static::class, ['id' => $id])[0];


        if ($model === null) {
            throw new \Exceptions\Http404Exception('Not found !');
        }


        return $model;
    }


    protected function insert()
    {
        $props = get_object_vars($this);

        $columns = [];
        $binds = [];
        $params = [];
        foreach ($props as $name => $value) {
            $columns[] = $name;
            $binds[] = ':' . $name;
            $params[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(',', $columns) . ') VALUES (' . implode(',', $binds) . ');';

        $db = Db::instance();
        $db->execute($sql, $params);
        $this->id = $db->lastId();
    }

    protected function update()
    {
        $props = get_object_vars($this);

        $params = [];
        $prepare = '';
        foreach ($props as $name => $value) {
            $prepare .= $name . ' = :' . $name . ', ';
            $params[':' . $name] = $value;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . mb_substr($prepare, 0, -2) . ' WHERE id=:id';

        $db = Db::instance();
        $db->execute($sql, $params);

    }

    public function save()
    {
        if (empty($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function delete()
    {
        if (!empty($this->id)) {
            $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id;';
            $db = Db::instance();
            $db->execute($sql, [':id' => $this->id]);
        }

    }

    public function fill(array $data)
    {
        $errors = new MultiException();


        foreach ($data as $key => $value) {

            $validateMethod = 'validate' . ucfirst($key);

            if (method_exists($this, $validateMethod)) {
                try {
                    $this->$validateMethod($value);
                    $this->$key = $value;

                } catch (\Exception $exception) {
                    $errors->add($exception);
                    continue;
                }
            }
        }
        if ($errors->count() > 0) {
            throw $errors;
        }
    }

}