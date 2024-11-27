<?

require_once 'classes/DB.php';

function fillDBTable($name): int
{
    $ch = curl_init();

    $curlOpts = [
        CURLOPT_URL => "https://jsonplaceholder.typicode.com/$name",
        CURLOPT_HEADER => false,
        CURLOPT_RETURNTRANSFER => true,
    ];

    curl_setopt_array($ch, $curlOpts);
    $response = curl_exec($ch);
    $json = json_decode($response, true);
    curl_close($ch);

    $count = 0;
    foreach ($json as $jsonItem) {
        if (DB::insert($name, $jsonItem)) {
            $count++;
        };
    }

    return $count;
}

$postsQuantity = fillDBTable('posts');
$commentsQuantity = fillDBTable('comments');

if ($postsQuantity > 0 || $commentsQuantity > 0) {
    echo 'Загружено ' . $postsQuantity . ' записей и ' . $commentsQuantity . ' комментариев';
}



