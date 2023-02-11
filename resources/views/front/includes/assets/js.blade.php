<script src="{{ asset('/') }}frontend/assets/js/jquery-3.4.1.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/select2.min.js"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
<script src="{{ asset('/') }}frontend/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/aos.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script> <!-- ck editor script -->
<script src="{{ asset('/') }}backend/assets/js/vendor/toastrjs.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/custom.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/customJs.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(function () {
        $( "#datepicker" ).datepicker();

        // $('.defaultSelect2').select2({
        //     width: 'resolve',
        // });

    })
</script>

@if(\Illuminate\Support\Facades\Session::has('success'))
    <script>
        toastr.success("{{ \Illuminate\Support\Facades\Session::get('success') }}");
    </script>
    {{ \Illuminate\Support\Facades\Session::forget('success') }}
@endif

@if(\Illuminate\Support\Facades\Session::has('error'))
    <script>
        toastr.error("{{ \Illuminate\Support\Facades\Session::get('error') }}");
    </script>
    {{ \Illuminate\Support\Facades\Session::forget('error') }}
@endif

<script>
    $(function () {
        $('.select2').select2({
            width: 'resolve',
            placeholder: $(this).attr('data-placeholder'),
        });
    })
</script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = false;
    //
    // var pusher = new Pusher('3538fa3ad54285c4fd36', {
    //     cluster: 'ap2',
    // });
    //
    // var jobPostNotificationChannel = pusher.subscribe('job-post-notification-channel');
    // jobPostNotificationChannel.bind('job-post-notification-event', function (data) {
    //     console.log(JSON.stringify(data));
    // });
</script>

<script>
    // comment out after project done
    $(function () {
        // getNotifications();
    })

    function getNotifications() {
        let notificationsHtml = ``;
        $.ajax({
            url:baseUrl+'customer/notification/list',
            method:'GET',
            data:{
                limit:5,
            },
            success:function (response) {
                console.log(response.notifications);
                // $(".notifications-count").text(response.notifications.length);
                // if (response.notifications.length) {
                //     $.each(response.notifications,function (key,notification) {
                //         let notificationMessage = notification.data.message.substring(0,30);
                //         notificationsHtml += `
                //       <div class="dropdown-divider"></div>
                //         <a href="javaScript:void(0)"  class="dropdown-item">
                //             <i class="fas fa-envelope mr-2"></i> `+notificationMessage+`
                //         </a>`;
                //     });
                //     notificationsHtml += `
                //         <div class="dropdown-divider"></div>
                //          <a href="javaScript:void(0);" onclick="markAllAsRead();" class="dropdown-item dropdown-footer text-center"><b>Mark All Read</b></a>`;
                //
                // }
                // else{
                //     notificationsHtml += `<a href="javaScript:void(0)" class="dropdown-item d-none no-notification"><i class="fa fa-bell-slash text-danger mr-2"></i>There is no notification</a>`;
                // }
                // notificationsHtml += `<a href="${BASE_URL}customer/notification" class="dropdown-item dropdown-footer text-center"><b>View All Notifications</b></a>`;
                // $(".notification-dropdown").html(notificationsHtml);
                //
                // $(".notification-dropdown .no-notification").removeClass('d-none');
            },
            error:function (errorResponse) {
                console.log(errorResponse);
            }
        });
    }

    /**
     * This function marks all notifications to read
     */
    function markAllAsRead() {
        $.ajax({
            url: baseUrl + 'customer/notification/mark-all-read',
            method: 'POST',
            data: {},
            success: function (response) {
                if (response.success){
                    toastr.success(response.message);
                    getNotifications();
                }
            }
        });
    }

</script>


@yield('script')
