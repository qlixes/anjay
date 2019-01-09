function submitForm(e, form_name, link, content_embed = '') {
    console.log("###SUBMITFORM ", link, form_name, $("form[name='" + form_name + "']").serializeArray() );
    if(e) {
        e.preventDefault();
    }
    $.ajax({
        url: link + "/" + Math.random(),
        data: $("form[name='"+ form_name +"']").serialize() + "&submit=1",
        type: "POST"
    }).done(function(res) {
        if(content_embed) {
            $(content_embed).html(res);
        } else {
            res = JSON.parse(res);
            console.log("Response =>",res);
            showNotification(res.message, res.error);
            if(res.error == 0) {
                if(res.redirect) {
                    window.location = res.redirect;
                } else {
                    setTimeout(function() { window.location.reload() }, 1500); 
                }
            }
        }
    }).fail(function() {
        showNotification('System cannot proceed your request, please try again later', 1);
    });
}

function sendAjax(uri, data, refresh = true, type = '') {
    if(!type) {
        type = "POST";
    }

    let processRequest = $.ajax({
        url: uri + "/" + Math.random(),
        data: data,
        type: type,
        async: refresh
    }).done(function(res) {
        res = JSON.parse(res);
        showNotification(res.message, res.error);
        if(res.error == 0) {
            if(refresh === true) {
                setTimeout(function() { window.location.reload() }, 2000); 
            }
        }
    }).fail(function(err) {
        showNotification(err.status + ' ' + err.statusText, 1);
    });

    if(refresh === false && processRequest.status == 200) {
        // just return responseText
        let object_result = JSON.parse(processRequest.responseText);
        return object_result;
    } else {
        return false;
    }
}

function showNotification(text, type = '', title = '', customSetting = {}) {
    let classname = '';
    let title_text = '';
    switch(type) {
        case 3:
        case 'info':
            classname = 'gritter-info';
            title_text = 'Information';
            break;
        case 2:
        case 'warning':
            classname = 'gritter-warning';
            title_text = 'Warning!';
            break;
        case 1:
        case 'error':
            classname = 'gritter-error';
            title_text = 'Oops!';
            break;
        case 0:
        case 'success':
            classname = 'gritter-success';
            title_text = 'Success';
            break;
        default:
            classname = 'gritter-light';
            title_text = 'Notification';
            break;
    }

    title_text = (title) ? title : title_text;

    let props = {
        'title': title_text,
        'text': text,
        'class_name': classname,
        'time': 3000
    }

    // to add your own gritter notification setting :)
    if(customSetting !== null && typeof customSetting === 'object') {
        for(var key in customSetting) {
            props[key] = customSetting[key];
        }
    }

    // $.gritter.add(props);
}