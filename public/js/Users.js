/**
 * Created by jhtan on 2/26/15.
 */

(function ($) {
    "use strict";
    $(document).ready(function () {
        $('.delete-user').click(function () {
//            alert($(this).data('id'));
            $.ajax({
                type: 'post',
                url: 'delete',
                data: {
                    id: $(this).data('id')
                }
            });
        });
    });
})(jQuery);
