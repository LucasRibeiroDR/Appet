<?php
function build_calendar($month, $year)
{
    $mysqli = new mysqli('localhost', 'root', '', 'petsbd');

    // Database 
    date_default_timezone_set('America/Sao_Paulo');
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

    $daysOfWeek = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado');
    // What is the first day of the month in question?
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
    // How many days does this month contain?
    $numberDays = date('t', $firstDayOfMonth);
    // Retrieve some information about the first day of the
    // month in question.
    $dateComponents = getdate($firstDayOfMonth);
    // What is the name of the month in question?
    $monthName = $dateComponents['month'];
    // What is the index value (0-6) of the first day of the
    // month in question.
    $dayOfWeek = $dateComponents['wday'];
    // Create the table tag opener and day headers 
    $dateToday = date('Y-m-d');

    $calendar = "<center><h1>$monthName $year</h1>";
    $calendar .= "<a class='btn btn-primary- btn-xs' href='?month=" . date('m', mktime(0, 0, 0, $month - 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "' title='Mês anterior'>←</a> ";
    $calendar .= "<a class='btn btn-primary- btn-xs' href='?month=" . date('m') . "&year=" . date('Y') . "'title='Mês atual'>Mês atual</a> ";
    $calendar .= "<a class='btn btn-primary- btn-xs' href='?month=" . date('m', mktime(0, 0, 0, $month + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "' title='Proximo mês'>→</a></center> ";

    $calendar .= "</br></br><table class='table table-bordered'>";
    $calendar .= "<tr>";
    // Create the calendar headers 
    foreach ($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    }
    // Create the rest of the calendar
    // Initiate the day counter, starting with the 1st. 
    $calendar .= "</tr><tr>";
    $currentDay = 1;
    // The variable $dayOfWeek is used to 
    // ensure that the calendar 
    // display consists of exactly 7 columns.
    if ($dayOfWeek > 0) {
        for ($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td class='empty'></td>";
        }
    }
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    while ($currentDay <= $numberDays) {
        //Seventh column (Saturday) reached. Start a new row. 
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        $dayName = strtolower(date('l', strtotime($date)));
        $enventNum = 0;
        $today = $date == date('Y-m-d') ? 'today' : '';
        if ($dayName == 'saturday' || $dayName == 'sunday') {
            $calendar .= "<td class='$today'><h4>$currentDay</h4></td>";
            // $calendar.="<td class='$today'><h4>$currentDay</h4> <a class='btn btn-danger btn-xs' disabled  title='Não atendemos nos fins de semana'>X</a></td>"; 
        } else if ($date < date('Y-m-d')) {
            $calendar .= "<td class='$today'><h4>$currentDay</h4> <a class='btn btn-outline-danger btn-xs' title='Dia inválido para marcar uma consulta' disabled>x</a></td>";
        } else {
            $totalAppointments = checkSlots($mysqli, $date);
            if ($totalAppointments == 8) {
                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a href='#' class='btn btn-success btn-xs'title='Dia já está lotado'>x</a></td>";
            } else {
                // $availableSlots = 8 - $totalAppointments;
                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a href='/appointments/create?date=" . $date . "' class='btn btn-outline-secondary btn-xs'>  + </a></td>";
            }
        }
        //Increment counters 
        $currentDay++;
        $dayOfWeek++;
    }
    // Complete the row of the last week in month, if necessary 
    if ($dayOfWeek != 7) {
        $remainingDays = 7 - $dayOfWeek;
        for ($l = 0; $l < $remainingDays; $l++) {
            $calendar .= "<td class='empty'></td>";
        }
    }

    $calendar .= "</tr></table>";

    return $calendar;
}

function checkSlots($mysqli, $date)
{
    $mysqli = new mysqli('localhost', 'root', '', 'petsbd');
    $stmt = $mysqli->prepare("SELECT * FROM appointments WHERE date = ?");
    $stmt->bind_param('s', $date);
    $totalAppointments = 0;
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($result->fetch_assoc()) {
                $totalAppointments++;
            }
            $stmt->close();
        }
    }
    return $totalAppointments;
}
?>
@extends('layouts.main')

@section('title', 'PetsOn | Calendário')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<link rel="stylesheet" href="{{asset('site/bootstrap.css')}}">
<link rel="stylesheet" href="/css/globalColors.css">
<link rel="stylesheet" href="/css/styles.css">
<link rel="stylesheet" href="{{ asset('css/cssAdmin/dashboard.css') }}">
<link rel="stylesheet" href="/css/calendar.css">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="calendar">
                <?php
                $dateComponents = getdate();
                if (isset($_GET['month']) && isset($_GET['year'])) {
                    $month = $_GET['month'];
                    $year = $_GET['year'];
                } else {
                    $month = $dateComponents['mon'];
                    $year = $dateComponents['year'];
                }
                echo build_calendar($month, $year);
                ?>
            </div>
        </div>
    </div>
</div>
@endsection