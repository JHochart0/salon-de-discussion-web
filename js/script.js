
$(document).ready(function(){
    
    $("#publie").val("");
    $('#publie').keypress(function(e){

        if(e.which == 13){

            valeurTextArea = $("#publie").val();
            variable=$.ajax({

            	type:'POST',
            	url:'ajax.php',
            	data:{
            		texte:valeurTextArea
            	},
            	success: function(response){
                    $("#publie").val("");
                    setTimeout(function(){
                        var objDiv = document.getElementById("affichage");
                        objDiv.scrollTop = objDiv.scrollHeight - objDiv.clientHeight;
                    }, 150);
                },
            	error: function(response){
            		alert("Erreur de saisie de message");
            	},
                dataType:'json'
                
        	});
            
            


        }

    });
    

    setInterval(function(){    
        variable2=$.ajax({

                type:'POST',
                url:'ajax2.php',
                success: function(response){
                    affichageMessage(response);
                },
                error: function(response){
                    alert("Erreur de saisie de message");
                },
                dataType:'json'
                
                });
        
    }, 20);

    function affichageMessage(messages){
        $('#affichage').empty();
        messages.forEach(element => 
            $("#affichage").append("<div id='message'><img id='imgProfil' src='img/"+element.pseudo+".JPG'></img><div id='messageEcrit'> <h3 id='pseudo' class='"+element.pseudo+"'> "+element.pseudo+" </h3> <h5 id='date'>"+element.mes_date+" </h5>  <p id='texte'>"+ element.mes_texte +"</p> </div> </div>")
        );
        
        
        
    }

});

