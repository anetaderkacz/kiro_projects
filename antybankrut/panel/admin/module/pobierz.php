<?php
include("../templates/".$ust['templates']."/config.php");
include("../db_connect.php");
if($indexphp!="ok"){exit();}


echo'

<table width="90%" cellspacing="0" cellpadding="0" style="border: 2px solid #cccccc;">
<tr>

</tr>';
echo'<center>';

$table='ban_dane';
echo $table;
getCsv("$table");


function getCsv($table, $sep="", $kw="", $nl="", $column="")
    {
        if(empty($column)) { $sql = mysql_query("select * from $table"); }
        else { $sql = mysql_query("select id, ".$column." from $table"); }
        if(empty($sep)) { $sep = ';'; };
        if(empty($kw)) { $kw = '"'; };
        if(empty($nl)) { $nl = "\n"; };
        $columns_total = mysql_num_fields($sql);
        for ($i = 0; $i < $columns_total; $i++)
            {
                $heading = mysql_field_name($sql, $i);
                $output .= $kw.$heading.$kw.$sep;
            }
        $output .=$nl;
        while ($row = mysql_fetch_array($sql))
            {
                for ($i = 0; $i < $columns_total; $i++)
                    {
                        $row["$i"] = preg_replace('/\s+/', ' ', $row["$i"]);
                        $row["$i"] = str_replace("$kw", "$kw$kw", $row["$i"]);
                        $row["$i"] = trim($row["$i"]);
                        $output .=$kw.$row["$i"].$kw.$sep;
                    }
                $output .=$nl;
            }
        $filename = "export_".$table.".csv";
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename='.$filename);
        echo $output;
        exit;
    }





?>