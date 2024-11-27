<?
require_once 'classes/DB.php';

$result = [
    'success' => 'N',
];

if (!empty($_POST['value'])) {
    $resultSQL = DB::selectSearch($_POST['value']);
    if ($resultSQL) {
        $html =
            '<div class="search-wrapper">
                <div class="row">
                    <div class="row-item title">Заголовок</div>
                    <div class="row-item title">Комментарий</div>
                </div>';
                foreach ($resultSQL as $row) {
                    $html .=
                        '<div class="row">
                            <div class="row-item title">';
                                $html .= $row['title'];
                            $html .= '</div>
                            <div class="row-item">';
                                $html .= $row['body'];
                            $html .= '</div>';
                    $html .= '</div>';
                }
        $html .= '</div>';

        $result['html'] = $html;
        $result['success'] = 'Y';
    }
}
echo json_encode($result);