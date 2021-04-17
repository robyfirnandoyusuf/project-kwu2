notif = {
    // Color
    showNotification: function(color, message){
        type = ['','info','success','warning','danger','rose','primary'];

        $.notify({
            icon: "notifications",
            message: message + color

        },{
            type: type[color],
            timer: 3000,
            placement: {
                from: 'top',
                align: 'right'
            }
        });
    }
}