<!doctype html>
<html lang="en">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <h1>demande de pause</h1>




  <div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Alerte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <a></a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btnAccepter">accepter</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">refuser</button>
        </div>
      </div>
    </div>
  </div>





  <form class="form-inline">
    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Preference</label>
    <select class="custom-select selectionNom my-1 mr-sm-2" id="inlineFormCustomSelectPref">
      <option selected>choisir nom...</option>
      <option value="1">Antoine Bousquet</option>
      <option value="2">Antoine Langlois</option>
      <option value="3">Cédric Sapina</option>
	  <option value="3">Danny Chénard</option>
	  <option value="3">Francis La Rivière Morin</option>
	  <option value="3">Gilles Gaudreault</option>
	  <option value="3">Julien Van  Themsche</option>
	  <option value="3">Kariane Riendeau</option>
	  <option value="3">Percy Missengui</option>
	  <option value="3">Rémy Cotnoir Thériault</option>
	  <option value="3">Stephane Fabrice Eye</option>
	  <option value="3">Tommy Audet</option>
	  <option value="3">Thierry David 3</option>
	  <option value="3">Étienne Dolbec</option>
    </select>

    <div class="custom-control custom-checkbox my-1 mr-sm-2">
      <input type="checkbox" class="custom-control-input" id="customControlInline">
      <label class="custom-control-label" for="customControlInline">cocher pour pause de 30 minutes</label>
    </div>


  </form>

  <button type="" class="btn btn-primary my-1" id="submit">Submit</button>

  <div id="ps">

  </div>


<?php
echo ' <script>
    $(document).ready(function() {


      var compteur = 0;
      var arrayAgent = [];


      $("#submit").on("click", function() {

        compteur += 1;

        var selectedName = $("#inlineFormCustomSelectPref").children("option:selected").text();
        var pause = "";


// modal qui show up
        if($(".modal").on('hidden.bs.modal')){
    				$(".modal").modal("show");
    				$(".modal").find(".modal-body").append(selectedName + " souhaite prendre une pause de " + pause + "<br>");


    					$(".modal").on('hide.bs.modal', function(){
    					$(".modal").find(".modal-body").html("");
    					});

    			}



        for (i = compteur - 1; i < compteur; i++) {
          arrayAgent.push(new Agents(selectedName, pause, i));
          //array nom ,15 min, 0

          if ($("#customControlInline").prop("checked") == true) {

            pause = " pause de 30 min. ";

          /*  console.log(pause + selectedName);
            $("#ps").append("<p></p>").css("font-size", "1.2rem");
            $("p").eq(i).attr("id", "tester" + i);
            $("button").eq(i).attr("id", "btnStart" + i);
            $("button").eq(i +1).addClass("btn btn-secondary"); */


			$(document).on("click", "#btnAccepter", function(){
			for (i = compteur - 1; i < compteur; i++) {
					$(".modal").modal("hide");


            $("#ps").append("<p></p>").css("font-size", "1.2rem");
            $("p").eq(i).attr("id", "tester" + i);
            // $("button").eq(i).attr("id", "btnStart" + i);
            // $("button").eq(i +1).addClass("btn btn-secondary");
					arrayAgent[i].temps(selectedName, pause, 1800000, i);
					// $(document).on("click", "#btnAccepter", false);
					}
				});
              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




          } else if ($("#customControlInline").prop("checked") == false) {

                pause = " pause de 15 min. ";

            // startTime(selectedName, pause, 900000);


				$(document).on("click", "#btnAccepter", function(){
					for (i = compteur - 1; i < compteur; i++) {
							$(".modal").modal("hide");


										$("#ps").append("<p></p>" ).css("font-size", "1.2rem");
										$("p").eq(i).attr("id", "tester" + i);
										// $("button").eq(i).attr("id", "btnStart" + i);
										// $("button").eq(i +1).addClass("btn btn-secondary");

							arrayAgent[i].temps(selectedName, pause, 900000, i);
							// $(document).on("click", "#btnAccepter", false);

						}
				});

          }
        }










      });









    });


    function Agents(nom, tempsString) {
      this.nom = nom;
      this.tempsString = tempsString;

      this.temps = function(agent, pauseDurationString, pauseDuration, incrementId) {

        // $(".modal").modal("toggle");
        // $("modal-body").append("<a></a>");
        // $("modal-body,a").html(agent + " est en retard ! ");

        var countDownDate = new Date().getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

          // Get todays date and time
          var now = new Date().getTime();

          // Find the distance between now and the count down date
          var distance = (countDownDate + pauseDuration) - now;

          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // Display the result in the element with id="demo"
          document.getElementById("tester" + incrementId).innerHTML = minutes + "m " + seconds + "s " + agent + pauseDurationString;

          // If the count down is finished, write some text
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("tester" + incrementId).innerHTML = "EXPIRED";
            $("#tester" + incrementId).css("background-color", "red");


			if($(".modal").on('hidden.bs.modal')){
				$(".modal").modal("show");
			}

///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////

			var modalText = [];

			if($(".modal").on('shown.bs.modal')){
				 modalText.push(agent + " est en retard ! " + pauseDurationString + "<br>");
				 $(".modal").find(".modal-body").append("<a></a>");
				 for(i=0; i<modalText.length; i++){
					$(".modal").find(".modal-body").append(modalText[i]);
				 }

			}







            // var minutesLabel = document.getElementById("minutes");
            // var secondsLabel = document.getElementById("seconds");
            var totalSeconds = 0;
            setInterval(setTime, 1000);

            function setTime() {
              ++totalSeconds;
              document.getElementById("tester" + incrementId).innerHTML = agent + " en retard depuis :  " + pad(parseInt(totalSeconds / 60)) + " : " + pad(totalSeconds % 60);
              // document.getElementById("tester"+ incrementId).innerHTML = pad(parseInt(totalSeconds/60));
            }

            function pad(val) {
              var valString = val + "";
              if (valString.length < 2) {
                return "0" + valString;
              } else {
                return valString;
              }


            }


          }



        }, 1000);

      }




    }



////////////////////////////////////////////





  </script>'
?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
