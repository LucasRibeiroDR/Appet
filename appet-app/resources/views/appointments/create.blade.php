@extends('layouts.main')

@section('title', 'APPet | Agendar nova consulta')
@section('content')
<?php
    date_default_timezone_set('America/Sao_Paulo');
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    $mysqli = new mysqli('localhost', 'root', '', 'petsbd');
    if(isset($_GET['date'])) {
        $date = $_GET['date'];
        $stmt = $mysqli->prepare("SELECT * FROM appointments WHERE date = ?");
        $stmt->bind_param('s', $date);
        $appointments = array();
        if($stmt->execute()){
            $result = $stmt->get_result();
        }
    } 

    if(isset($_POST['submit'])) {
        $stmt = $mysqli->prepare("SELECT * FROM appointments WHERE 'date' = ?");
        $stmt->bind_param('s', $date);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows>0){
                $msg = "<div class='alert alert-danger'>Já reservado</div>";
            } else {
                $stmt = $mysqli->prepare("INSERT INTO appointments ('date') VALUES (?])");
                $stmt->bind_param('s', $date);
                $stmt->execute();
                $msg = "<div class='alert alert-success'>Agendado com sucesso</div>";
                $stmt->close();
                $mysqli->close();
            }
        }
    }

    $duration = 60;
    $cleanup = 0;
    $start = "08:00";
    $end = "18:00";

    function timeslots($duration, $cleanup, $start, $end) {
        $tz = new DateTimeZone('America/Sao_Paulo');
        $start = new DateTime($start, $tz);
        $end = new DateTime($end, $tz);
        $interval = new DateInterval("PT".$duration."M");
        $cleanupInterval = new DateInterval("PT".$cleanup."M");
        $slots = array();
        
        for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
            $endPeriod = clone $intStart;
            $endPeriod->add($interval);
            if($endPeriod>$end){
                break;
            }
            
            $slots[] = $intStart->format("H:iA")." - ". $endPeriod->format("H:iA");
            
        }
        
        return $slots;
    }
?>
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Agendar nova consulta: <?php echo strftime('%B %d, %Y', strtotime($date)); ?></h1>
    <?php echo isset($msg)?$msg:'';?>
    
    <form action="/appointments" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="date">Data da consulta: </label>
            <input required readonly type="date" name="date" id="date" class="form-control" value="<?php echo $date; ?>">
        </div>

        <?php $timeslots = timeslots($duration, $cleanup, $start, $end); 
            foreach($timeslots as $ts){
        ?>
        <div class="hours">
            <div class="form-group">
            @if($ts == "12:00PM - 13:00PM" || $ts == "13:00PM - 14:00PM")
                <button disabled hidden class="btn btn-secondary " <?php echo $ts; ?>><?php echo $ts; ?></button>
            @else
            <button class="btn btn-outline-secondary" <?php echo $ts; ?>><?php echo $ts; ?></button>
            @endif
            </div>
        </div>
        <?php } ?>

        <div class="form-group">
            <label for="hour">Selecione o horário da consulta:</label>
            <select name="hour" id="hour" class="form-control">
                <option value="08:00:00">8:00</option>
                <option value="10:00:00">10:00</option>
                <option value="14:00:00">14:00</option>
                <option value="16:00:00">16:00</option>
            </select>
        </div>
        <div class="form-group">
            <label for="area_consulta">Selecione a area de consulta:</label>
            <select name="area_consulta" id="area_consulta" class="form-control">
                <option value="Oftalmologista">Oftalmologista</option>
                <option value="Clínico Geral">Clínico Geral</option>
            </select>
        </div>
        <div class="form-group">
            <label for="descricao">Faça uma breve observação sobre o que seu pet tem:</label>
            <textarea 
                required
                name="descricao" 
                class="form-control" 
                id="descricao" 
                placeholder="Faça uma breve observação sobre o que seu pet tem..."
                ></textarea>
            </div>
            <div class="form-group">
                <label for="pet_id">Selecione seu Pet</label>
                <select name="pet_id" id="pet_id" class="form-control">
                    @foreach ($pets as $pet)
                    <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input name="submit" type="submit" class="btn btn-primary" value="Criar nova consulta">
                <!-- <button name="submit" type="submit" class="btn btn-primary" value="">Criar nova consulta - test</button> -->
            </div> 
        </form>
    </div>
    @endsection