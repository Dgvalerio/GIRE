<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 28/10/2016
 * Time: 10:50
 */
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> G.I.R.E.: Palheta </title>
    <style>
        table { border-spacing: 0; width: 100%; }
        table td { height: 150px; border-radius: 10px; }

        tr > td:first-child:not(:last-child) { border-bottom-right-radius: 0; border-top-right-radius: 0; }
        tr > td:not(:first-child):not(:last-child) { border-radius: 0; }
        tr > td:last-child:not(:first-child) { border-bottom-left-radius: 0; border-top-left-radius: 0; }

        .plC9 { color: #000; }
        .plC0 { color: #fff; }

        .plT9 { background-color: #004D40; } .plBG9 { background-color: #263238; } .plB9 { background-color: #0D47A1; } .plAB9 { background-color: #1733FF; }
        .plT8 { background-color: #00695C; } .plBG8 { background-color: #37474F; } .plB8 { background-color: #1565C0; } .plAB8 { background-color: #2551FF; }
        .plT7 { background-color: #00796B; } .plBG7 { background-color: #455A64; } .plB7 { background-color: #1976D2; } .plAB7 { background-color: #2962FF; }
        .plT6 { background-color: #00897B; } .plBG6 { background-color: #546E7A; } .plB6 { background-color: #1E88E5; } .plAB6 { background-color: #2969FF; }
        .plT5 { background-color: #009688; } .plBG5 { background-color: #607D8B; } .plB5 { background-color: #2196F3; } .plAB5 { background-color: #2970FF; }
        .plT4 { background-color: #26A69A; } .plBG4 { background-color: #78909C; } .plB4 { background-color: #42A5F5; } .plAB4 { background-color: #2979FF; }
        .plT3 { background-color: #4DB6AC; } .plBG3 { background-color: #90A4AE; } .plB3 { background-color: #64B5F6; } .plAB3 { background-color: #3781FF; }
        .plT2 { background-color: #80CBC4; } .plBG2 { background-color: #B0BEC5; } .plB2 { background-color: #90CAF9; } .plAB2 { background-color: #448AFF; }
        .plT1 { background-color: #B2DFDB; } .plBG1 { background-color: #CFD8DC; } .plB1 { background-color: #BBDEFB; } .plAB1 { background-color: #82B1FF; }
        .plT0 { background-color: #E0F2F1; } .plBG0 { background-color: #ECEFF1; } .plB0 { background-color: #E3F2FD; } .plAB1 { background-color: #AAC8FF; }

        .plBG9 { background-color: rgba(038,050,056,1); } .plB9 { background-color: rgba(013,071,161,1); } .plAB9 { background-color: rgba(023,051,255,1); }
        .plBG8 { background-color: rgba(055,051,079,1); } .plB8 { background-color: rgba(021,101,192,1); } .plAB8 { background-color: rgba(037,081,255,1); }
        .plBG7 { background-color: rgba(069,090,100,1); } .plB7 { background-color: rgba(025,118,210,1); } .plAB7 { background-color: rgba(041,098,255,1); }
        .plBG6 { background-color: rgba(084,110,122,1); } .plB6 { background-color: rgba(030,136,229,1); } .plAB6 { background-color: rgba(041,105,255,1); }
        .plBG5 { background-color: rgba(096,125,139,1); } .plB5 { background-color: rgba(033,150,243,1); } .plAB5 { background-color: rgba(041,112,255,1); }
        .plBG4 { background-color: rgba(120,144,156,1); } .plB4 { background-color: rgba(066,165,245,1); } .plAB4 { background-color: rgba(041,121,255,1); }
        .plBG3 { background-color: rgba(144,164,174,1); } .plB3 { background-color: rgba(100,181,246,1); } .plAB3 { background-color: rgba(055,129,255,1); }
        .plBG2 { background-color: rgba(176,190,197,1); } .plB2 { background-color: rgba(144,202,249,1); } .plAB2 { background-color: rgba(068,138,255,1); }
        .plBG1 { background-color: rgba(207,216,220,1); } .plB1 { background-color: rgba(187,222,251,1); } .plAB1 { background-color: rgba(130,177,255,1); }
        .plBG0 { background-color: rgba(236,239,241,1); } .plB0 { background-color: rgba(227,242,253,1); } .plAB0 { background-color: rgba(170,200,255,1); }

        .plIfG { background-color: rgba(062,177,035,1); }
        .plIfR { background-color: rgba(255,025,007,1); }

        .plIfG { background-color: #3EB123; }
        .plIfR { background-color: #FF1907; }
    </style>
</head>
<body>
<table> <caption> <h1> Palheta </h1> </caption>
    <tr> <?php for ($i = 0; $i < 10; $i++) { print("<td class='plBG$i'> </td>"); } ?> </tr>
    <tr> <?php for ($i = 0; $i < 10; $i++) { print("<td class='plB$i'> </td>"); } ?> </tr>
    <tr> <?php for ($i = 0; $i < 10; $i++) { print("<td class='plAB$i'> </td>"); } ?> </tr>
    <tr>
        <td class="plIfG"> </td>
        <td class="plIfR"> </td>
    </tr>
</table>
</body>
</html>