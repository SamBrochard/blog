'use strict';
$(document).ready(function(){
$(document).on("click",".deleteCom",deleteCom);
$(document).on("click", ".deletePost",deletePost);
//$("#formComAdd").on("submit",addCom);
$("#sendAddCom").on("click",addCom);

function deleteCom(){
	var com = $(this).data('id');
	console.log(com);
	$.get('deleteCom.php?id='+com);
	$(this).parent().parent().empty();
}

function deletePost(){
	var article = $(this).data('index');
	$.get('deletePost.php?id='+article);
	$(this).parent().parent().empty();
}

function addCom(e){
	e.preventDefault();
	var $this = $(this);
	var comAuthor = $("#authorComAd").val();
	var comm2 = $("#comm").val();
	var idArticle = $(".addCom").val();
	var d = new Date();
	var date = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate() +" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
	if(comAuthor === '' || comm2 === '') {
		alert('Les champs doivent êtres remplis');
	} else {
            // Envoi de la requête HTTP en mode asynchrone
          /*  $.ajax({
                url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
                type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
                data: $this.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                success: function(html) { // Je récupère la réponse du fichier PHP
                    $(".Commentaire").append("<p> Par : "+comAuthor+" </p><p>"+comm+")</p><p> "+date+" </p>");                 
                    $("#authorComAd").val("");
                    $("#comm").val("");
                }
            })*/
            $.post("add_comment.php",{author : comAuthor, comm : comm2, id : idArticle} );
            $(".Commentaire").append("<div><p> Par : "+comAuthor+" </p><p>"+comm2+"</p><p> "+date+" </p></div>");
            $("#authorComAd").val("");
            $("#comm").val("");      
        }
    }

});
