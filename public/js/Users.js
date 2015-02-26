/**
 * Created by jhtan on 2/26/15.
 */

(function ($) {
    "use strict";
    $(document).ready(function () {
        $('.delete-user').click(function () {
            var ans = confirm('Realmente quiere borrar al usuario ' + $(this).data('username'));
            if (ans == true) {
                $.ajax({
                    type: 'post',
                    url: 'delete',
                    data: {
                        id: $(this).data('id')
                    },
                    success: function () {
                        location.reload();
                    }
                });
            }
        });
    });
})(jQuery);
