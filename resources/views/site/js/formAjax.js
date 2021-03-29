$(function(){
    $("#form-ajax").submit(function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        let url = $(this).attr("action");  
        let method = $(this).attr("method");
        let divMessage = $("#message");
        
        
        $.ajax({
            url: url,
            data: data,
            dataType: "json",
            method: method,
            
            beforeSend: function (action) 
            {
                ajaxLoad("open");
            },
            success: function (response) 
            {               
                ajaxLoad('close');
                
                if (response.access == false) 
                {
                    divMessage.html(insertMessage("error", response.message));
                }
                if (response.redirect) 
                {
                    window.location.href = response.redirect;    
                }
            },
            error: function(response) 
            {
                ajaxLoad('close');
                
                if (response.status == 422) 
                {
                    let message = response.responseJSON.errors;
                    for (const [key, value] of Object.entries(message)) 
                    {
                        divMessage.html(insertMessage("info", value))
                    }
                }
            },
            complete: function(action) 
            {
                ajaxLoad("close");
            }
            
        })
    })
})