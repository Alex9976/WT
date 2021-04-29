<?php

$i = 0;
$file = fopen("patterns.txt", "r");

while (!feof($file))
{
    $patArr[$i] = fgets($file);
    $dataArr[$i] = fgets($file);
    $formatArr[$i] = fgets($file);
    $i++;
}

for ($j = 0; $j < $i; $j++)
{
    $buf = "";
    for ($k = 0; $k < strlen($dataArr[$j]); $k++)
    {
        if (preg_match("/^[a-zа-яA-ZА-Я]/u", $dataArr[$j][$k]))
        {
            $buf .= $dataArr[$j][$k];
        }
    }
    $dataArr[$j] = $buf;
}

$page = file_get_contents("index.html");

for ($j = 0; $j < $i; $j++)
{
    if ($dataArr[$j] == "")
    {
        $page = preg_replace($patArr[$j], $formatArr[$j], $page);
    }
    else
    {
        $iss = is_callable($dataArr[$j], false, $callableName);
        $page = preg_replace($patArr[$j], $callableName("$formatArr[$j]"), $page);
    }
}

echo $page;