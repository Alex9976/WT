<!DOCTYPE HTML>
<html>
<head>
    <title></title>
    <style>
        .element {
            display: flex;
            margin: 50px auto;
            flex-direction: column;
        }
        .table_name {
            text-align: center;
            font-size: 20px;
            font-weight: 700;
        }
        td {          
            width: 100%;     
            border: solid 1px black;   
        }
        tr {
            display: inline-flex;
            width: 100%;
            justify-content: center;
        }
    </style>
</head>          
<body>

<?php

    $mySQL = mysqli_connect("localhost", "root", "", "site_db");    

    //$SQL = "SELECT * FROM `table`";
    $SQL = "SHOW TABLES";
    $request = mysqli_query($mySQL, $SQL);
    if ($request)
        $data = mysqli_fetch_all($request);

    $tables[] = null;
    $j = 0;
    foreach ($data as $field)
    {
        foreach ($field as $element)
        {
            $tables[$j] = $element;
            $j++;
        }
    }
    for ($i = 0; $i < count($tables); $i++)
    {
        echo '<div class="element"><div class="table_name">', $tables[$i], '</div><table align="center" width="100%">';

        $SQL = "DESCRIBE " . $tables[$i];
        $data = null;
        $request = mysqli_query($mySQL, $SQL);
        if ($request)
            $data = mysqli_fetch_all($request);
            echo '<tr>';
            foreach ($data as $item)
            {
                if ($item[3] == "PRI")
                {
                    echo '<td><b>', "$item[0], type: $item[1], PRIMARY",'</b></td>';  
                }
                else if ($item[3] == "")
                {
                    echo '<td><b>', "$item[0], type: $item[1]",'</b></td>';  
                }
                else
                {
                    echo '<td><b>', "$item[0], type: $item[1], SECONDARY",'</b></td>';  
                }
            }
            echo '</tr>';


        $SQL = "SELECT * FROM $tables[$i]";
        $data = null;
        $request = mysqli_query($mySQL, $SQL);
        if ($request)
            $data = mysqli_fetch_all($request);
        
        foreach ($data as $field)
        {
            echo '<tr>';
            foreach ($field as $item)
            {
                echo '<td>', $item,'</td>';
            }
            echo '</tr>';
        }

        echo '</table></div>';
    }
?>

</body>
</html>