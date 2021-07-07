          <!-- /.content -->
        </div>
    </div>
  
    <footer class="main-footer">
        &copy; <?= date('Y'); ?> Sistem Tempahan Peralatan ICT. All Rights Reserved.
    </footer>

  </div>
        
      <!-- Joblly App -->
      <script src="<?= base_url; ?>js/template.js"></script>
      <script src="<?= base_url; ?>js/pages/dashboard.js"></script>
      <script src="<?= base_url; ?>js/pages/calendar-dash.js"></script>

      <!-- Vendor JS -->
    <script src="<?= base_url; ?>js/vendors.min.js"></script>
    <!-- <script src="<?= assets_url; ?>js/pages/chat-popup.js"></script> -->
    <script src="<?= base_url; ?>icons/feather-icons/feather.min.js"></script>    
    <script src="<?= base_url; ?>vendor_components/datatable/datatables.min.js"></script>
    <script src="<?= base_url; ?>vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
    <script src="<?= base_url; ?>vendor_components/sweetalert/sweetalert.min.js"></script>
    <script src="<?= base_url; ?>vendor_components/select2/dist/js/select2.full.js"></script>


      
  </body>
  </html>


    <!-- logout modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Adakah anda pasti ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Pilih "Log Keluar" di bawah ini jika anda sudah bersedia untuk menamatkan sesi anda sekarang
          </div>
          <div class="modal-footer">
            <center>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a type="button" href="<?= base_url; ?>auth/logout" class="btn btn-danger">Log keluar</a>
            </center>
          </div>
        </div>
      </div>
    </div>
    <!-- modal -->

<!--     <div class="modal fade" id="mdlExpirationWarning" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Amaran Tamat Tempoh Sesi</h5>

                </div>
                <div class="modal-body">
                    <p> Anda sudah lama tidak aktif. Untuk keselamatan anda, kami akan log keluar anda secara automatik. Klik "Tetap Dalam Talian" untuk meneruskan sesi anda. </p>
                    <p> Sesi anda akan tamat pada <span class="bold" id="sessionSecondsRemaining">120</span> saat.
                    </p>
                </div>
                <div class="modal-footer">
                    <button id="extendSession" type="button" class="btn btn-info" data-dismiss="modal">Kekal Dalam Talian</button>
                    <button id="logoutSession" type="button" class="btn btn-danger">Log keluar</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <script>
        // You could pull this out to its own file very easily
        window.app = window.app || {};

        app.session = {

            //Settings
            warningTimeout: 30000, //(ms) The time we give them to say they want to stay signed in
            inactiveTimeout: 180000, //(ms) The time until we display a warning message
            minWarning: 10000, //(ms) If they come back to page (on mobile), The minumum amount, before we just log them out
            timerSyncId: "SomethingUnique", //The key idleTimer will use to write to localStorage
            logoutUrl: "<?= base_url; ?>auth/logout", //Your url to log out, if you want you could build the url to pass a referal param
            keepAliveUrl: "api/user/KeepAlive", // The url for the keepalive api
            keepaliveInterval: 10000, //(ms) the interval to call keep alive url
            //From here down you shouldnt have to alter anything
            warningStart: null, //Date time the warning was started
            warningTimer: null, //Timer running every second to countdown to logout
            keepaliveTimer: null, //Timer for independent ping to keep session alive
            logout: function() {
                //Write to storage to tell other tab its time to sign out
                if (typeof(localStorage) !== "undefined") {
                    localStorage.setItem(app.session.timerSyncId, 0);
                }

                //Send this page to the logout url, that will destroy session and forward to login
                //window.location = app.session.logoutUrl;

                //To simulate logout we are just showing the logout dialog and locking the screen
                $("#mdlExpirationWarning").modal("hide");
                // $("#mdlLoggedOut").modal("show");

                window.location.href = "<?= base_url; ?>auth/logout";

            },
            keepAlive: function() {
                //Hide logout modal
                $("#mdlExpirationWarning").modal("hide");

                //Clear the timer
                clearTimeout(app.session.warningTimer);
                app.session.warningTimer = null;

                //Restart the idleTimer
                $(document).idleTimer("reset");
            },
            startKeepAliveTimer: function() {
                // Basically I just poll the server half way through the session life
                // to make sure the servers session stays valid
                clearTimeout(app.session.keepaliveTimer);
                app.session.keepaliveTimer = setInterval(function() {
                    app.session.sendKeepAlive();
                }, (app.session.inactiveTimeout / 2));
            },
            sendKeepAlive: function() {
                // Write a new date to storage so any other tabs are informed that this tab
                //  sent the keepalive
                if (typeof(localStorage) !== "undefined") {
                    localStorage.setItem(app.session.timerSyncId + "_keepalive", +new Date());
                }

                // The actual call to the keep alive api
                //$.post(app.session.keepAliveUrl).fail(function (jqXHR) {
                //    if (jqXHR.status == 500 || jqXHR.status == 0) {
                //        app.session.logout();
                //    }
                //});
            },
            showWarning: function(obj) {
                //Get time when user was last active
                var diff = (+new Date()) - obj.lastActive - obj.timeout,
                    warning = (+new Date()) - diff;

                // Destroy idleTimer so users are forced to click the extend button
                $(document).idleTimer("pause");

                //On mobile js is paused, so see if this was triggered while we were sleeping
                if (diff >= app.session.warningTimeout || warning <= app.session.minWarning) {
                    app.session.logout();
                } else {

                    //Show dialog, and note the time
                    $('#sessionSecondsRemaining').html(Math.round((app.session.warningTimeout - diff) / 1000));
                    $("#mdlExpirationWarning").modal("show");
                    app.session.warningStart = (+new Date()) - diff;

                    //Update counter downer every second
                    app.session.warningTimer = setInterval(function() {
                        var remaining = Math.round((app.session.warningTimeout / 1000) - (((+new Date()) - app.session.warningStart) / 1000));

                        if (remaining >= 0) {
                            $('#sessionSecondsRemaining').html(remaining);
                        } else {
                            app.session.logout();
                        }
                    }, 1000)
                }
            },
            localWrite: function(e) {

                if (typeof(localStorage) !== "undefined" && e.originalEvent.key == app.session.timerSyncId && app.session.warningTimer != null) {
                    // If another tab has written to cache then
                    if (e.originalEvent.newValue == 0) {
                        // If they wrote a 0 that means they chose to logout when prompted
                        app.session.logout();
                    } else {
                        // They chose to stay online, so hide the dialog
                        app.session.keepAlive();
                    }

                } else if (typeof(localStorage) !== "undefined" && e.originalEvent.key == app.session.timerSyncId + "_keepalive") {
                    // If the other tab sent a keepAlive poll to the server, reset the time here so we dont send two updates
                    // This isnt really needed per se but it will save some server load
                    app.session.startKeepAliveTimer();
                }
            }
        };

        $(function() {
            //This will fire at X after page load, to show an inactive warning
            $(document).on("idle.idleTimer", function(event, elem, obj) {
                app.session.showWarning(obj);
            });

            //Create a timer to keep server session alive, independent of idleTimer
            app.session.startKeepAliveTimer();

            //User clicked ok to extend session
            $("#extendSession").click(function() {
                app.session.keepAlive(); //Remove the warning dialog etc
            });

            //User clicked logout
            $("#logoutSession").click(function() {
                app.session.logout();
            });

            //Set up the idleTimer, if inactive for X seconds log them out
            $(document).idleTimer({
                timeout: app.session.inactiveTimeout - app.session.warningTimeout,
                timerSyncId: app.session.timerSyncId
            });

            // Monitor writes by other tabs
            $(window).bind("storage", app.session.localWrite);
        });
    </script> -->

  </body>
</html>
