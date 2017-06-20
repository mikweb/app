/* 
 * Ntheme JS file
 */


(function ($) {
    // Modal Delete Handler
    modalDelete = function () {
        $('body').on('click', 'a.modal-delete', function (e) {
            e.preventDefault();
            $('#modal-delete-handler').find('form').attr("action", $(this).attr('href'));
            $('#modal-delete-handler').modal("show", $(this));
            return false;
        });
    };
    modalDelete();
    // Add CSS class 's' to animate scroll 
    anchorAnimateScroll = function () {
        $("a.s").on('click', function (event) {
            if (this.hash !== "") {
                event.preventDefault();
                $('.navbar-collapse').collapse('hide');
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 500, function () {
                    window.location.hash = hash;
                });
            }
        });
    };
    anchorAnimateScroll();
    // HTML5 search input clear handle
    clearSearch = function () {
        $('.has-clear input[type="text"]').on('input propertychange', function () {
            var $this = $(this);
            var visible = Boolean($this.val());
            $this.siblings('.form-control-clear').toggleClass('hidden', !visible);
        }).trigger('propertychange');
        $('.form-control-clear').click(function () {
            $(this).siblings('input[type="text"]').val('').trigger('propertychange').focus();
        });
    };
    clearSearch();
    // Fire/Fix Bootstrap Tooltip compenent
    fireTooltip = function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('body').on('click', '[data-toggle="tooltip"]', function () {
            $('.tooltip').hide();
        });
    };
    fireTooltip();
    // Open an URL in POP: for social network sharing
    popAnchor = function () {
        $('body').on('click', '.a-pop', function (e) {
            window.open($(this).attr('href'), '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');
            return false;
        });
    };
    popAnchor();
})(jQuery);