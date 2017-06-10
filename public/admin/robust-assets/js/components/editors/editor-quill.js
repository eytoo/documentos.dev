! function(a, b, c) {
    "use strict";
    var d = Quill["import"]("formats/font");
    var Delta = Quill.import('delta');

    d.whitelist = ["sofia", "slabo", "roboto", "inconsolata", "ubuntu"], Quill.register(d, !0);
    new Quill("#bubble-container .editor", {
        bounds: "#bubble-container .editor",
        modules: {
            formula: !0,
            syntax: !0
        },
        theme: "bubble"
    }), new Quill("#snow-container .editor", {
        bounds: "#snow-container .editor",
        modules: {
            formula: !0,
            syntax: !0,
            toolbar: "#snow-container .quill-toolbar"
        },
        theme: "snow"
    });

    var quill = new Quill("#full-container .editor", {
        bounds: "#full-container .editor",
        modules: {
            formula: !0,
            syntax: !0,
            toolbar: [
            [{
                font: []
            }, {
                size: []
            }],
            ["bold", "italic", "underline", "strike"],
            [{
                color: []
            }, {
                background: []
            }],
            [{
                script: "super"
            }, {
                script: "sub"
            }],
            [{
                header: "1"
            }, {
                header: "2"
            }, "blockquote", "code-block"],
            [{
                list: "ordered"
            }, {
                list: "bullet"
            }, {
                indent: "-1"
            }, {
                indent: "+1"
            }],
            ["direction", {
                align: []
            }],
            ["link", "image", "video", "formula"],            
            ["clean"],
            ]
        },
        theme: "snow",
        
    });

    function imageHandler(image, callback) {

        var uploader = $("#uploader");
        uploader.trigger('click');
        uploader.bind("change",function(){
            var data = new FormData();
            data.append('foto', uploader[0].files[0]);

            var IMGUR_API_URL = '/admin/post/uploadImage'; 

            /*var xhr = new XMLHttpRequest();
            xhr.open('POST', IMGUR_API_URL, true);
            //xhr.setRequestHeader('Authorization', 'Client-ID ' + IMGUR_CLIENT_ID);
            xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                      var response = JSON.parse(xhr.responseText);
                      if (response.status === 200 && response.success) {
                        callback(response.data.link);
                    } else {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                          callback(e.target.result);
                      };
                      reader.readAsDataURL(image);
                  }
              }
            }*/

            $.ajax({
                url: IMGUR_API_URL,
                type: 'post',
                data: data,
                cache: false,
                dataType: 'json',
                processData: false,
                contentType: false,
            })
            .done(function(response) {
                //if(callback) callback(response.data.link);
                //quill.insertEmbed('image',response.data.link);
                quill.updateContents(
                    new Delta()
                    .retain(quill.getSelection().index)
                    .insert({ 
                        image: response.data.link
                    }));
                data.delete();
                uploader.val("");
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

        });
    }

var change = new Delta();
quill.on('text-change', function(delta) {
   var change = $(".ql-editor").html();
   $(".contenido-entrada").val(change);
});

var toolbar = quill.getModule('toolbar');
toolbar.addHandler('image', imageHandler);

}(window, document, jQuery);