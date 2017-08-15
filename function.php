<?php
/**
 * @var $tpl_name Name of the template
 * @var $tpl_values Values assigned to temlate
 */
function render($tpl_name, $tpl_values = array()){
    foreach ($tpl_values as $key => $value){
        $$key = $value;
    }

    if(file_exists('templates/'.$tpl_name.'.tpl.php')){
        include_once('templates/'.$tpl_name.'.tpl.php');
    }
}

function isUser(){
    return isset($_SESSION['ID_user']) AND $_SESSION['ID_user']>0;
}

function isLogged(){
    return isset($_SESSION['is_logged']) AND $_SESSION['is_logged'];
}

/* draws a calendar */
function draw_calendar($month,$year, $notes)
{


    /* draw table */
    $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

    /* table headings */
    $headings = array('Понеделник', 'Вторник', 'Сряда', 'Четвъртък', 'Петък', 'Събота', 'Неделя');
    $calendar .= '<tr class="calendar-row"><td class="calendar-day-head">' . implode('</td><td class="calendar-day-head">',
            $headings) . '</td></tr>';

    /* days and weeks vars now ... */
    $running_day = date('N', mktime(0, 0, 0, $month, 1, $year));
    $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
    $days_in_this_week = 1;
    $day_counter = 1;
    $dates_array = array();

    /* row for week one */
    $calendar .= '<tr class="calendar-row">';

    /* print "blank" days until the first of the current week */
    for ($x = 1; $x < $running_day; $x++){
        $calendar .= '<td class="calendar-day-np"> </td>';
        $days_in_this_week++;
    }

    /* keep going with days.... */
    for($list_day = 1; $list_day <= $days_in_month; $list_day++) {
        $calendar .= '<td class="calendar-day">';
        /* add in the day number */
        $calendar .= '<div class="day-number">' . $list_day . '</div>';

        /** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
        $date = $year . '-' . sprintf('%02d', $month) . '-' . sprintf('%02d', $list_day);
        $calendar .= '<p><a href="index.php?page=note&noteDate=' . $date .'"> Добави бележка</a></p>';
        if(isset($notes[$date])) {
            $calendar .= '  <p><a href="index.php?page=allnotes&noteDate=' . $date . '"> Бележки за деня</a></p>';
        }
        $calendar .= '</td>';
        if ($running_day == 7) {
            $calendar .= '</tr>';
            if ($day_counter  != $days_in_month) {
                $calendar .= '<tr class="calendar-row">';
            }
            $running_day = 0;
            $days_in_this_week = 0;
        }
        $days_in_this_week++;
        $running_day++;
        $day_counter++;
    }

    /* finish the rest of the days in the week */
    if($days_in_this_week < 8 && $days_in_this_week != 1) {
        for ($x = 1; $x <= (8 - $days_in_this_week); $x++) {
            $calendar .= '<td class="calendar-day-np"> </td>';
        }
    }

    if ($running_day != 1) {
        /* final row */
        $calendar .= '</tr>';
    }
    /* end the table */
    $calendar.= '</table>';

    /* all done, return result */
    return $calendar;
}
