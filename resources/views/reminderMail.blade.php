<!DOCTYPE html>

<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
	* {
	    box-sizing: border-box;
	}
	
	[class*="col-"] {
    	float: left;
    	padding: 15px;
	}

    html {
        height: 100%;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        background-repeat: no-repeat;
        
        background: -webkit-linear-gradient( to bottom, #2c3ab0, #2088c9);
        background: -moz-linear-gradient( to bottom, #d1e7f9, #2088c9);
        background: -ms-linear-gradient( to bottom, #d1e7f9, #2088c9);
        background: -o-linear-gradient( to bottom, #d1e7f9, #2088c9);
        background: linear-gradient( to bottom, #d1e7f9, #2088c9);
    }
    
    h1 {
        font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
        color: red;
        padding-bottom: 30px;
        text-align: center;
    }

    h2{
        font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
        color: red;
        text-align: center;
    }
    
    #APP{
        font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
        color: green;
        text-align: center;
    }
    
    #NAPP{
        font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
        color: red;
        text-align: center;
    }

    p{
    	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
        color: black;
    }

    a{
        text-decoration: none;
        font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
        color: white;
    }

    ul{
    	color: white;
    }

    #NAppdiv{
    border-radius: 5px;
        border-style: solid;
        border-color: red;
    }

    #Appdiv{
        border-radius: 5px;
        border-style: solid;
        border-color: green;
    } 

    .col-1 {width: 8.33%;}
    .col-2 {width: 16.66%;}
    .col-3 {width: 25%;}
    .col-4 {width: 33.33%;}
    .col-5 {width: 41.66%;}
    .col-6 {width: 50%;}
    .col-7 {width: 58.33%;}
    .col-8 {width: 66.66%;}
    .col-9 {width: 75%;}
    .col-10 {width: 83.33%;}
    .col-11 {width: 91.66%;}
    .col-12 {width: 100%;}

    @media only screen and (max-width: 768px) {
        /* For mobile phones: */
        [class*="col-"] {
            width: 100%;
        }
    }
}
</style>

<title>Login</title>

</head>

<body>

<div>
    <h1>This is a reminder mail to see if you have any APPROVED trainings on your dashboard that are starting tomorrow!</h1>
    <h2>Check your dashboard to see if you have any APPROVED trainings</h2>
	<div class ="col-6" id="Appdiv">
		<h3 id="APP">I have an APPROVED training!</h3>
		<p>Check the beginning date of the APPROVED training to see if it starts tomorrow.
        <br/><br/>
        If it starts tomorrow make shure you buy the right materials for your training with you can find in the traininglist
        <br/><br/>
        We are looking forward to see you on the training!</p>
	</div>
    
	<div class ="col-6" id="NAppdiv">
   		<h3 id="NAPP">I have not an  APPROVED training!</h3>
		<p>Your request to the training was not approved, with means you can't go to the training
        <br/><br/>
        Their is no need to buy materials!    
        </p>
</div> 

</body>

</html> 