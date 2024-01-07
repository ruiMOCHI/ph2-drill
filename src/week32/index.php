<?php

$host = "db";
$dbname = "ph2drill";
$user = "root";
$password = "password";

class Study
{
    public $day;
    public $hours;

    public function get_day()
    {
        return $this->day;
    }

    public function get_hours()
    {
        return (int)$this->hours;
    }
}

try {
    $pdo = new PDO(
        "mysql:dbname=$dbname;host=$host;charset=utf8mb4",
        $user,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
    $sql = "SELECT DATE_FORMAT(studies.date, '%Y-%m-%d') day, sum(studies.hours) hours FROM studies group by day";
    $studies = $pdo->query($sql)->fetchAll(\PDO::FETCH_CLASS, Study::class);
    $formatted_study_data = array_map(function ($study) {
        return [$study->get_day(), $study->get_hours()];
    }, $studies);
    $chart_data = json_encode($formatted_study_data);
} catch (PDOException $e) {
    exit($e->getMessage());
}
?>


<div id="chart_div"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback(function() {
        const data = new google.visualization.DataTable();
        data.addColumn('string', 'hoge date');//?を'string'に変更
        data.addColumn('number', 'fuga hours');//?を'number'に変更
        data.addRows([           //ph2drillのstudiesテーブルを参照して配列を埋め込む
            ['2022-06-14 00:00:00', 3],
            ['2022-06-15 00:00:00', 7],
            ['2022-06-16 00:00:00', 3],
            ['2022-06-17 00:00:00', 7],
            ['2022-06-18 00:00:00', 3],
            ['2022-06-19 00:00:00', 7],
            ['2022-06-20 00:00:00', 3],
            ['2022-06-21 00:00:00', 7],
            ['2022-06-22 00:00:00', 3],
            ['2022-06-27 00:00:00', 4],
            ['2022-06-28 00:00:00', 3],
            ['2022-06-29 00:00:00', 7],
            ['2022-06-30 00:00:00', 3],
        ]);
        const chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, {
            title: '日毎の学習時間'
        });
    });
</script>