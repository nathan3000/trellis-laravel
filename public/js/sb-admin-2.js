$(function() {

    $('a.submit').click(function(e) {
        console.log('hello');
        e.preventDefault();
        $('form').submit();
    });

});

$(function() {

    $('.people-search').keyup(function(e) {
        $.post( "/people/findPerson", $(this).serialize() , function( json ) {
            $.each(json, function (key, data) {
                var name = data.firstname + ' ' + data.lastname;
                console.log(name);
            });
        });
    });


    var bestPictures = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      remote: {
        url: "/people/findPerson",

        replace: function(url, query) {
            return url + "#" + query;
        },
        ajax : {
            beforeSend: function(jqXhr, settings){
               settings.data = $.param({q: $('#people-search').val()})
            },
            type: "POST"

        }
    }
    });
     
    bestPictures.initialize();
     
    $('#people-search').typeahead(null, {
      name: 'best-pictures',
      displayKey: 'firstname',
      source: bestPictures.ttAdapter()
    });
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse')
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse')
        }

        height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    })
});
