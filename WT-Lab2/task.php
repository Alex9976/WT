<!DOCTYPE HTML>
<html>
<head>
    <title></title>
</head>          
<body>

<form method="post" align="center">
N: <input type="number" min="10" name="Num" required><br>
<input type="submit">
</form>


<table width="50%" align="center">

    <?php
    if(isset($_POST['Num'])) 
	{
        $numOfLines = $_POST['Num'];
    }
    else 
	{
        $numOfLines = 0;
    }
    $color = 0;

    for ($i = 1; $i <= $numOfLines; $i++, $color += 0x010101) 
	{
        if ($i % 5 != 0) 
		{
			
			// Generate color in HEX/HTML format
            echo '<tr><td height="20" bgcolor=#',str_repeat("0", abs(6 - strlen(dechex ( $color )))), dechex ( $color ),'></td></tr>';
        }
        else 
		{
            echo '<tr><td height="20" bgcolor=#00FF00></td></tr>';
        }

        if ($color >= 0xFFFFFF) 
		{
            $color = 0;
        }
    }

    ?>

</table>

</body>
</html>
