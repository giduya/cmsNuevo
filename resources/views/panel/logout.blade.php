@yield('messagebox')

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa-sign-out"></span>¿ Cerrar <strong>Sesión</strong> ?</div>
      <div class="mb-content">
        <p>Presiona <span class="label label-danger label-form">NO</span> si deseas continuar trabajando. Presiona <span class="label label-success label-form">SÍ</span> para cerrar tu sesión actual.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <a href="{{ url('logout') }}" class="btn btn-success btn-lg">Sí</a>
          <button class="btn btn-danger btn-lg mb-control-close">No</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- MESSAGE BOX-->

<!-- START PRELOADS -->
<audio id="audio-alert" src="{{ asset('app/audio/alert.mp3') }}" preload="auto"></audio>
<audio id="audio-fail" src="{{ asset('app/audio/fail.mp3') }}" preload="auto"></audio>
<!-- END PRELOADS -->

@yield('js')

<!-- START SCRIPTS -->
<script src="{{ asset('app/js/plugins.js') }}"></script>
<script src="{{ asset('app/js/faq.js') }}"></script>
<script src="{{ asset('app/js/actions2.js') }}"></script>
<script src="{{ asset('app/js/lightbox.js') }}"></script>
<script>
  var options = {
    mediaSelector: '.lightbox',
  };

	var mobx = new ModuloBox( options );
	mobx.init();
</script>
<!-- END SCRIPTS -->




<!-- WhatsHelp.io widget -->
<script>
    (function () {
        var options = {
            facebook: "526392554052398", // Facebook page ID
            whatsapp: "+5217224277722", // WhatsApp number
            telegram: "ayudig", // Telegram bot username
            email: "hola@ayuntamientodigital.gob.mx", // Email
            call: "+527224277722", // Call phone number
            company_logo_url: "//storage.getbutton.io/widget/c3/c38f/c38f2acdaa482c27f766525b28083db9/logo.jpg", // URL of company logo (png, jpg, gif)
            greeting_message: "Hola, ¿En que podemos ayudarte?.", // Text of greeting message
            call_to_action: "¿Necesitas ayuda? Escríbenos!", // Call to action
            button_color: "#0072BB", // Color of button
            position: "left", // Position may be 'right' or 'left'
            order: "facebook,whatsapp,call,email,telegram", // Order of buttons
            ga: true, // Google Analytics enabled
            branding: true, // Show branding string
            mobile: true, // Mobile version enabled
            desktop: true, // Desktop version enabled
            greeting: true, // Greeting message enabled
            shift_vertical: 60, // Vertical position, px
            shift_horizontal: 60, // Horizontal position, px
            domain: "ayuntamientodigital.gob.mx", // site domain
            key: "5RebRaoKSxy1OPn3fvVlgg", // pro-widget key
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /WhatsHelp.io widget -->
</body>
</html>
