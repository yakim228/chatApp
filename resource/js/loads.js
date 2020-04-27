var selectedMessage, selectedcontact;
$.getJSON('php/script/listUser.php', function(data){
    for (let i = 0; i < data.length; i++) {
        $("#contacts").append('<li class="list-group-item" id="contact'+data[i].id+'"><i class="fas fa-user-circle"></i>&nbsp;'+data[i].login+':&nbsp;&nbsp;Cras justo odiomj&nbsp;&nbsp;<span class="badge badge-primary badge-pill">14</span></li>');
        $("#contact"+data[i].id).click(function (){
            if(selectedMessage==null){
                selectedMessage = $("#message"+data[i].id);
                selectedMessage.css('display','block');


                selectedcontact = $(this);
                selectedcontact.addClass('bg-success');
            }
            selectedMessage.css('display','none');
            selectedMessage = $("#message"+data[i].id);
            selectedMessage.css('display','block');

            selectedcontact.removeClass('bg-success');
            selectedcontact = $(this);
            $(this).addClass('bg-success');
        });
    }
});
var user = [] ;
$.getJSON('php/script/listUser.php', function(data){
    for (let i = 0; i < data.length; i++) {
        user.push(data[i].id);
    }
});
var date, date_m;

$.getJSON('php/script/listMessage.php', function(data){
    user.forEach(element => {
        $("#messages").append('<div id="message'+element+'"><div style="display: block; width: 100%; height: 60px;"><div class="row"><form id="messageForm'+element+'" class="form saisie col-md-11"><div class="row"><div class="col-md-10"><input class="form-control trasparent" id="messageContent'+element+'" type="text" placeholder="ecrire un message"/></div><div class="col-md-1"><input type="submit"  id="sendSMS'+element+'" class="far fa-paper-plane send" /></div></div></form></div></div>');
        
        $("#messageForm"+element).submit(function(e){
            $.post('php/script/addMessage.php',
                {message: $("#messageContent"+element).val(), recepteur: element}, //data to be posted
                function(data){
                    if(data=='true'){
                        refresh();
                        // alert("envoyer");
                    }else{
                        alert(date_m);
                    }
                }
            );
            e.preventDefault();
        });
        for (let i = 0; i < data[0].length; i++) {
            date_m = data[0][i].date_message;
            date = new Date(data[0][i].date_message);
            if( ((data[0][i].id_expediteur) == data[1][0]) && data[0][i].id_recepteur == element){
                    $("#message"+element).append('<div style="display: block; width: 100%; margin-bottom: 40px; height: 60px;"><div class="col-md-4" style="float: right;"><li class="list-group-item d-flex justify-content-between align-items-center">'+data[0][i].message+'<span class="badge badge-success badge-pill">'+date.toLocaleString()+'</span></li></div></div>');
            }
            if(((data[0][i].id_recepteur == data[1][0] && data[0][i].id_expediteur) == element)){
                $("#message"+element).append('<div style="display: block; width: 100%; height: 60px;"><div class="col-md-4" style="float: left;"><li class="list-group-item d-flex justify-content-between align-items-center">'+data[0][i].message+'<span class="badge badge-primary badge-pill">'+date.toLocaleString()+'</span></li></div></div>');
            }
        }
        $("#message"+element).css('display','none');
        
    });
});


function refresh() {
    $.getJSON('php/script/instantMessages.php?recent='+date_m, function(data){
        if(data[0].length!=0){            
            user.forEach(element => {
                // alert(element)
                for (let i = 0; i < data[0].length; i++) {
                    date_m = data[0][i].date_message;
                    date = new Date(data[0][i].date_message);
                    if( ((data[0][i].id_expediteur) == data[1][0]) && data[0][i].id_recepteur == element){
                        $("#message"+element).append('<div style="display: block; width: 100%; margin-bottom: 40px; height: 60px;"><div class="col-md-4" style="float: right;"><li class="list-group-item d-flex justify-content-between align-items-center">'+data[0][i].message+'<span class="badge badge-success badge-pill">'+date.toLocaleString()+'</span></li></div></div>');
                    }
                    if(((data[0][i].id_recepteur == data[1][0] && data[0][i].id_expediteur) == element)){
                        $("#message"+element).append('<div style="display: block; width: 100%; height: 60px;"><div class="col-md-4" style="float: left;"><li class="list-group-item d-flex justify-content-between align-items-center">'+data[0][i].message+'<span class="badge badge-primary badge-pill">'+date.toLocaleString()+'</span></li></div></div>');
                    }
                }
                // $("#message"+element).css('display','none');
            });
        }
    });
}

setInterval(() => {
    refresh();
}, 5000);