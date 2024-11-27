<?
class DB
{
    const host = 'localhost';
    const user = 'root';
    const password = 'root';
    const dbname = 'inline_test';

    public static function connect(): false|mysqli
    {
        return mysqli_connect(self::host, self::user, self::password, self::dbname);
    }

    public static function insert($tableName, $values)
    {
        $columns = implode(', ', array_keys($values));
        $values = self::generateStr($values);
        $query = 'INSERT INTO ' . $tableName . ' (' . $columns . ') VALUES (' . $values . ')';
        return mysqli_query(self::connect(), $query) or die(mysqli_error(self::connect()));
    }

    public static function selectSearch($inputVal)
    {
        $query = 'SELECT posts.title, comments.body FROM posts JOIN comments ON posts.id = comments.postId WHERE comments.body LIKE "' . $inputVal . '%"';
        $resQuery = mysqli_query(self::connect(), $query) or die(mysqli_error(self::connect()));;
        $result = [];
        while ($row = mysqli_fetch_assoc($resQuery)) {
            $result[] = $row;
        }
        return $result;
    }

    public static function generateStr($array)
    {
        $row = '';
        foreach ($array as $value) {
            if ($row == '') {
                if (gettype($value) == 'integer') {
                    $row .= $value;
                } else {
                    $row .= '"' . $value . '"';
                }
            } else {
                if (gettype($value) == 'integer') {
                    $row .= ', ' . $value;
                } else {
                    $row .= ', "' . $value . '"';
                }
            }
        }
        return $row;
    }

}