<?php

namespace DailyJoke\Models;

use DailyJoke\Db;

class Joke extends Model
{
    protected const TABLE = 'jokes';
    public string $content = '';
    public int|null $likes;


    /**
     * @return int
     */
    /**
     * Returns the id of today's joke.
     * The id is stored in the file current_day.ini.
     * If the day in the file is not the current day, the id is incremented.
     * If the id is greater than the maximum id in the table, it is reset to 1.
     * The new id is then written back to the file.
     */

    public static function findTodayJoke(): int
    {
        $current = (int)getdate()['yday'];
        $data = parse_ini_file(__DIR__ . '/../../current_day.ini');
        $id = (int)$data['id'];
        $day = (int)$data['day'];
        $db = Db::instance();
        $lastId = $db->query('SELECT MAX(id) AS id FROM ' . self::TABLE)[0]->id;

        if ($current != $day || $id > $lastId) {

            if ($id > $lastId) {
                $id = 1;
            } else {
                $sql = 'SELECT id FROM ' . self::TABLE . ' WHERE id = (SELECT min(id) FROM ' . self::TABLE . ' WHERE id > ' . $id . ');';
                $id = $db->query($sql)[0]->id;
            }
            file_put_contents(__DIR__ . '/../../current_day.ini', 'day=' . $current . PHP_EOL . 'id=' . $id);
        }

        return $id;
    }

    public function validateContent($content)
    {
        $length = mb_strlen($content);
        if ($length < 5 || $length > 6000) {
            throw new \Exception('Анекдоты такими не бывают!');
        }
    }


}