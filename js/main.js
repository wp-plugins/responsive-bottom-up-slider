( function($) {
    if (rs && rs.enabled && rs.enabled == '1') {
        //we're in business!
        rs.Cookies = Cookies.noConflict();
        var rs_nodisplay = rs.Cookies.get('rs_nodisplay');
        if (!rs_nodisplay) {
            var container = $('<div>').hide();
            $('body').append(container);
            container.attr('id','rs_container');
            container.css('position','fixed');
            container.css('bottom','0');
            container.css('width','100%');
            container.css('background-color','rgba(255,255,255,0.9)');
            container.css('border-top','1px solid #ccc');
            container.css('min-height','16.6%');
            container.css('z-index','16777271');
            var close = $('<a>').html('×');
            close.css('font-size','large');
            close.css('float','right');
            close.css('margin-right','2%');
            close.on('click',function() {
                var rs_expires = parseInt(rs.hide_days);
                $('#rs_container').fadeOut();
                rs.Cookies.set('rs_nodisplay','true', { expires: rs_expires });
            });
            container.append(close);
            var subdiv = $('<div>');
            subdiv.css('margin','0 auto');
            subdiv.css('max-width','66%');
            subdiv.css('opacity','1');
            subdiv.css('background-color','transparent');
            container.append(subdiv);
            subdiv.html(rs.content);
            var rs_timeout = 1000 * parseInt(rs.display_secs);
            setTimeout( function() {
                container.fadeIn();
            }, rs_timeout );
        }
    }
})(jQuery);
