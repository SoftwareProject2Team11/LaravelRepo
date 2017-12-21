@extends('layouts.app')

@section('content')

<a href="/traininglist" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>
 Back</a>

    <h1 class="center">{{$traininglist->trainingName}}</h1>
     
     <br><br>
<div class="row">
<div class="col-lg-4 trainingInfo">
     <div><p><b><i class="fa fa-calendar-check-o" aria-hidden="true"></i>

 Starting Date:</b>
 <br>

 <?php
 $date = date('d/m/Y', strtotime($traininglist->startDate));
 $time = date('H:i', strtotime($traininglist->startDate)); 
 
 echo $date . " at ";
 echo $time;
    ?>
    </p>
    </div>

    <div><p><b><i class="fa fa-calendar-times-o" aria-hidden="true"></i>
 End Date</b>
 <br>
 <?php
 $date = date('d/m/Y', strtotime($traininglist->endDate));
 $time = date('H:i', strtotime($traininglist->endDate));
 
 echo $date . " at ";
 echo $time;
    ?>
    </p>
    </div>

    <div><p><b><i class="fa fa-info-circle" aria-hidden="true"></i>
  Summary:</b>
  <br>
        {!!$traininglist->trainingSummary!!}
        </p>
    </div>

    <div><p><b><i class="fa fa-book" aria-hidden="true"></i>

  Materials:</b>
        <?php 
         $training_id = $traininglist->trainingId;
            $materials = DB::table('Material')
            ->where([
                ['trainingId', '=', $training_id],
            ])
            ->get();

            if(count($materials)>0){
                echo '<ul>';
                foreach ($materials as $material) {
                    $materialTitle = $material->title;
                    $materialAuthor = $material->author;
                    $materialISBN = $material->isbn;
                    echo "<li><b>$materialTitle</b> <br>$materialISBN (isbn) <br> $materialAuthor</li>";
                }
                echo '</ul>';
            }
            else{
                echo "No materials required";
            }
        ?>
        </p>
        </div>



        <p><b><i class="fa fa-map-marker" aria-hidden="true"></i>
  Location:
  <br></b>
        
        <?php

            $locationId = $traininglist->locationId;

            $addressId = DB::table('Location')
            ->select('addressId')
            ->where('locationId', $locationId)
            ->get(); 

            $addressId = substr($addressId, 14, -2);

            $streetName = DB::table('Address')
            ->select('streetname')
            ->where('addressId', (int)$addressId)
            ->get();

            $streetName = substr($streetName, 16, -3);

            $houseNumber = DB::table('Address')
            ->select('houseNumber')
            ->where('addressId', (int)$addressId)
            ->get();

            $houseNumber = substr($houseNumber, 16, -2);

            $city = DB::table('Address')
            ->select('city')
            ->where('addressId', (int)$addressId)
            ->get();

            $city = substr($city, 10, -3);

            $lat = DB::table('Address')
            ->select('lat')
            ->where('addressId', (int)$addressId)
            ->get();

            $lat = substr($lat, 8, -2);

            $long = DB::table('Address')
            ->select('long')
            ->where('addressId', (int)$addressId)
            ->get();

            $long = substr($long, 9, -2);

            echo "$streetName $houseNumber, $city";
        ?>
        </p>

    </div>
   


    <div class="col-lg-8">



    <div>

        <script type='text/javascript'>
            var latitude = "<?php echo $lat; ?>";
            var longitude ="<?php echo $long; ?>";

            function initialize()
            {
                var myLatLng = new google.maps.LatLng(latitude,longitude);

                var mapProp = {
                    zoom:15,
                    center: myLatLng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                var map=new google.maps.Map(document.getElementById('map_canvas'),mapProp);

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    optimized: false,
                    title:'Former About.com Headquarters'
                }); 
            }
        </script>

        <div id='map_canvas' style='width:100%; height:500px;'>

    </div>
</div>
    </div>



<?php
    use Carbon\Carbon;

    $training_id = $traininglist->trainingId;
    $userId = auth()->user()->id;

    $trainings = DB::table('Training_Requests')
    ->where([
        ['user_id', '=', $userId],
        ['trainingId', '=', $training_id],
    ])
    ->get();

    $status = DB::table('Training_Requests')
    ->where([
        ['user_id', '=', $userId],
        ['trainingId', '=', $training_id],
        //['status', '=', 2 ],
    ])
    ->get();

    $approved = DB::table('Training_Requests')
    ->where([
        ['user_id', '=', $userId],
        ['trainingId', '=', $training_id],
        ['status', '=', 2 ],
    ])
    ->get();

    $requested = DB::table('Training_Requests')
    ->where([
        ['user_id', '=', $userId],
        ['trainingId', '=', $training_id],
        ['status', '=', 1 ],
    ])
    ->get();

    $refused = DB::table('Training_Requests')
    ->where([
        ['user_id', '=', $userId],
        ['trainingId', '=', $training_id],
        ['status', '=', 3 ],
    ])
    ->get();

    $Today = Carbon::now()->addHours(1);

    $startDate = $traininglist->startDate; 
?>

    <div class="row">
            <div class="col-lg-12">
            <br> <br>
                <h2 class="text-center">Request Training</h2>



                @if(count($requested) > 0)
                <h3 class="text-center">You have already requested this training</h3>

                @elseif(count($approved) > 0)
                <h3 class="text-center">You have already been approved for this training</h3>

                @elseif(count($refused) > 0)
                <h3 class="text-center">Your training request has been refused.</h3>
                
            @elseif($startDate < $Today)
                <h3 class="text-center">This training is over! You can't make a request</h3>
            
            @else 
                {!! Form::open(['action' => 'TrainingRequestsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                    {{Form::label('reason', 'Reason')}}
                    {{Form::text('reason', '', ['class' => 'form-control', 'placeholder' => 'Write a reason on why you would like to receive this course'])}}
                </div>

                <div class="form-group">
                   
                    {!! Form::hidden('trainingId', $traininglist->trainingId, ['class' => 'form-control', 'readonly']) !!}
                </div>

                {{Form::submit('Request', ['class' => 'btn btn-primary'])}}

                {!! Form::close() !!}
                <br>

            @endif
            </div>
    </div>        
@endsection