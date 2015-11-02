<?php 
$day = $_GET["day"]; 
$month = $_GET["month"]; 
$year = $_GET["year"]; 
$sel = $_GET["sel"]; 
$what = $_GET["what"]; 
$field = $_GET["field"]; 
$form = $_GET["form"]; 

if($day == "") $day = date("j"); 

if($month == "") $month = date("m"); 

if($year == "") $year = date("Y"); 

$currentTimeStamp = strtotime("$year-$month-$day"); 
$monthName = date("F", $currentTimeStamp); 
$numDays = date("t", $currentTimeStamp); 
$counter = 0; 
?> 
<html> 
<head> 
<script language="javascript"> 
    function goLastMonth(month,year,form,field) 
    { 
        if(month == 1) 
    { 
    --year; 
    month = 13; 
    }        
        document.location.href = 'calendar.php?month='+(month-1)+'&year='+year+'&form='+form+'&field='+field; 
    } 
    
    function goNextMonth(month,year,form,field) 
    { 
        if(month == 12) 
    { 
    ++year; 
    month = 0; 
    }    
        document.location.href = 'calendar.php?month='+(month+1)+'&year='+year+'&form='+form+'&field='+field; 
    } 
    
    function sendToForm(val,field,form) 
    { 
        eval("opener.document." + form + "." + field + ".value='" + val + "'"); 
        window.close(); 
    } 
</script> 
</head> 
<body style="margin:0px 0px 0px 0px" class="body"> 
<table width='175' border='0' cellspacing='0' cellpadding='0' class="body"> 
    <tr> 
        <td width='25' colspan='1'> 
        <input type='button' class='button' value=' P ' 
        onClick='<?php echo "goLastMonth($month,$year,\"$form\",\"$field\")"; ?>'> 
        </td> 
        <td width='125' align="center" colspan='5'> 
        <span class='title'><?php echo $monthName . " " . $year; ?></span><br> 
        </td> 
        <td width='25' colspan='1' align='right'> 
        <input type='button' class='button' value=' N ' 
        onClick='<?php echo "goNextMonth($month,$year,\"$form\",\"$field\")"; ?>'> 
        </td> 
    </tr> 

<?php 
    for($i = 1; $i < $numDays+1; $i++, $counter++) 
    { 
        $timeStamp = strtotime("$year-$month-$i"); 
        if($i == 1) 
        { 
        $firstDay = date("w", $timeStamp); 
        
        for($j = 0; $j < $firstDay; $j++, $counter++) 
        echo "<td> </td>"; 
        } 
        
        if($counter % 7 == 0) 
        echo "</tr><tr>"; 
        
        if(date("w", $timeStamp) == 0) 

        $class = "class='weekend'"; 
        else 
        if($i == date("d") && $month == date("m") && $year == date("Y")) 
        $class = "class='today'"; 
        else 
        $class = "class='normal'"; 
        
        echo "<td class='tr' bgcolor='#ffffff' align='center' width='25'><a class='buttonbar'
        onclick=\"sendToForm('".sprintf("%02d/%02d/%04d", $month, $i, $year)."','$field','$form');\">
        <font $class>$i</font></a></td>"; 
    } 
?> 

</table> 
</body> 
</html>