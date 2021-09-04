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
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $appointments[] = $row['timeslot'];
                }
                $stmt->close();
            }
        } 
    }

    if(isset($_POST['submit'])) {
        $timeslot = $_POST['timeslot'];
        $stmt = $mysqli->prepare("SELECT * FROM appointments WHERE date = ? AND timeslot = ?");
        $stmt->bind_param('ss', $date, $timeslot);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows>0){
                $msg = "<div class='alert alert-danger'>Já reservado</div>";
            } else {
                $stmt = $mysqli->prepare("INSERT INTO appointments ('date', 'timeslot') VALUES (?, ?)");
                $stmt->bind_param('ss', $date, $timeslot);
                $stmt->execute();
                $msg = "<div class='alert alert-success'>Agendado com sucesso</div>";
                $appointments[] = $timeslot;
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

    <style>
        .btnbtn {
            border: none;
            outline: none;
            padding: 8px 14px;
            background-color: #f1f1f1;
            cursor: pointer;
            font-size: 12px;
        }
        /* Style the active class, and buttons on mouse-over */
        .active {
            background-color: #666;
            color: white;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // $(".appointment_hour").click(function(){
        //     var timeslot = $(this).attr('data-timeslot');
        //     $("#slot").html(timeslot);
        //     $("#timeslot").val(timeslot);
        //     $("#myModal").modal("show");
        // });
        $(document).ready(_ => {
            const added = [],
            input = document.getElementById("timeslot");
            $('button').on('click', ev => {
                const recurso = ev.currentTarget.innerText,    
                idx = added.indexOf(recurso);
                if (idx === -1) {added.push(recurso);}
                else {added.splice(idx, 1);}
                input.value = added.join(',');
            });
        });
    </script>

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
            <div id="" class="hours">
                <div id="" class="form-group">
                    @if($ts == "12:00PM - 13:00PM" || $ts == "13:00PM - 14:00PM")
                    <input disabled readonly class="btnbtn btn btn-outline-secondary" <?php echo $ts; ?> value="<?php echo $ts; ?>">
                    @else
                        <?php if(in_array($ts, $appointments)) { ?>
                            <button disabled class="btnbtn btn btn-danger"><?php echo $ts; ?></button>
                        <?php }else{ ?>
                            <button class="btnbtn btn btn-outline-secondary appointment_hour" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                        <?php }  ?>
                    @endif
                </div>
            </div>
        <?php } ?>

        <div class="form-group">
            <label for="timeslot">Horário da consulta:</label>
            <input readonly maxlength='1' type="text" name="timeslot" id="timeslot" class="form-control" value="">
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
                maxlength=200
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
            </div> 
        </form>
    </div>
@endsection