/**
 * Created by jhtan on 2/27/15.
 */
(function ($) {
    "use strict";
    $(document).ready(function () {

        // TODOO View the Claim with AJAX
//        $('.claim-title').click(function () {
//            var $sidebarWrapperContent = $('#sidebar-wrapper-content');
//            $.ajax({
//                type: 'post',
//                url: '/claims/show',
//                data: {
//                    id: $(this).data('id')
//                },
//                success: function () {
//                    $sidebarWrapperContent.remove();
//                    alert(':O');
//                }
//            });
//        });


        // Design of the Create Claim Page.
        appMaster.preLoader();

        $('#reclamos-descripcion a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });

      // This timeout is a #chicle, because of the existence of a bug at
      // Leaflet. The tiles in leaflet don't load properly when they're
      // inner a hidden div.
      setTimeout( function () {
        $('#tab2').removeClass('active');

        // Rootwizard component
        $('#rootwizard').bootstrapWizard({
            onTabShow: function (tab, navigation, index) {
                var $total = navigation.find('li').length,
                    $current = index + 1;

                // If it's the last tab then hide the last button and show the finish instead
                if ($current >= $total) {
                    $('#nextButton').hide();
                    $('#lastButton').show().removeClass('disabled');
                } else {
                    $('#nextButton').show();
                    $('#lastButton').hide().addClass('disabled');
                }

                return 0;
            }
        });

      }, 1000);

        // Support a Claim
        $('#supportToClaimButton').click(function () {
            $.ajax({
                type: 'post',
                url: '/supportToClaim',
                data: {
                    claimId: $('#supportToClaimButton').data('claimId')
                },
                success: function (lol) {
                    //alert($('#supportToClaimButton').data('claimId'));
                    alert(lol);
                }
            });
        });

        // Shows a Share Popup if the Claim is new.
        if ($('#claimsIndex').hasClass('newClaim')) {
            $('#shareNewClaimModal').modal('show');
        };

        $('.delete-claim').click(function () {
          var ans = confirm('Realmente quiere borrar el reclamo de título: "' + $(this).data('title') + '" ?');
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