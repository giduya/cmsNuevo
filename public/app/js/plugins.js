$(function()
{
  /* BOOTSTRAP SELECT */
  var formElements = function()
  {


    //Bootstrap tooltip
    var feTooltips = function()
    {
      $("body").tooltip({selector:'[data-toggle="tooltip"]',container:"body"});
    }//END Bootstrap tooltip



    //Tagsinput
    var feTagsinput = function()
    {
      if($(".tagsinput").length > 0)
      {

        $(".tagsinput").each(function()
        {
          if($(this).data("placeholder") != '')
          {
            var dt = $(this).data("placeholder");
          }
          else
          {
            var dt = 'añadir tag';
          }

          $(this).tagsInput({width: '100%',height:'auto',defaultText: dt});
        });
      }
    }// END Tagsinput



    //iCheckbox and iRadion - custom elements
    var feiRadio = function()
    {
      if($(".iradio").length > 0)
      {
        $(".iradio").iCheck({ radioClass: 'iradio_square-blue'});
      }
    }// END iCheckbox



    //iCheckbox and iRadion - custom elements
    var feiCheckbox = function()
    {
      if($(".icheck").length > 0)
      {
        $(".icheck").iCheck({ checkboxClass: 'icheckbox_square-blue'});
      }
    }// END iCheckbox



    //Bootstrap file input
    var feBsFileInput = function()
    {
      if($("input.fileinput").length > 0)
      {
        $("input.fileinput").bootstrapFileInput();
      }
    } //END Bootstrap file input



    // Summernote
    var feSummernote = function()
    {
      /* Email summernote editor */
      if($(".summernote").length > 0)
      {
        $(".summernote").summernote({
                                      callbacks: {
                                                  onPaste: function (e) {
                                                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                                                                          e.preventDefault();
                                                                          document.execCommand('insertText', false, bufferText);
                                                                        }
                                                                      },
                                     height: 400,
                                     toolbar: [
                                                ['style', ['style','bold', 'italic', 'underline', 'clear']],
                                                ['fontsize', ['fontsize']],
                                                ['para', ['ul','ol','paragraph']],
                                                ['insert', ['link']],
                                                ['table', ['table']],
                                                ['misc', ['fullscreen','undo','redo']]
                                              ]
                                     });
      }/* END Email summernote editor */
    }// END Summernote



    //Bootstrap datepicker
    var feDatepicker = function()
    {
      if($(".datepicker_lastweek").length > 0)
      {
        $(".datepicker_lastweek").datepicker({
          format: 'dd-mm-yyyy',
          startDate:'-6d',
          endDate:'5d',
          language: "es",
          autoclose: true
        });
      }
      if($(".datepicker_future").length > 0)
      {
        $(".datepicker_future").datepicker({
          format: 'dd-mm-yyyy',
          startDate:'+1d',
          language: "es",
          autoclose: true
        });
      }
      if($(".datepicker_year_before").length > 0)
      {
        $(".datepicker_year_before").datepicker({
          format: "dd-mm-yyyy",
          endDate: "today",
          startView: 2,
          language: "es",
          autoclose: true
        });
      }
      if($(".datepicker").length > 0)
      {
        $(".datepicker").datepicker({
          format: "dd-mm-yyyy",
          startView: 2,
          language: "es",
          autoclose: true
        });
      }
    }// END Bootstrap datepicker



    //Bootstrap select
    var feSelect = function()
    {
      if($(".select").length > 0)
      {
        $(".select").selectpicker();

        $(".select").on("change", function()
        {
          if($(this).val() == "" || null === $(this).val())
          {
            if(!$(this).attr("multiple"))

            $(this).val("").find("option").removeAttr("selected").prop("selected",false);
          }
          else
          {
            $(this).find("option[value="+$(this).val()+"]").attr("selected",true);
          }
        });
      }
    }/* BOOTSTRAP SELECT */



    //Validation Engine
    var feValidation = function()
    {
      if($("form[name^='validate']").length > 0)
      {
        // Validation prefix for custom form elements
        var prefix = "valPref_";

        //Add prefix to Bootstrap select plugin
        $("form[name^='validate'] .select").each(function()
        {
          $(this).next("div.bootstrap-select").attr("id", prefix + $(this).attr("id")).removeClass("validate[required]");
        });

        // Validation Engine init
        $("form[name^='validate']").validationEngine('attach', {
          promptPosition: "bottomLeft",
          autoHidePrompt:true,
          prettySelect : true,
          usePrefix: prefix
        });
      }
    }//END Validation Engine



    return {// Init all form element features
      init: function()
      {
        feSelect();
        feValidation();
        feTooltips();
        feDatepicker();
        feSummernote();
        feTagsinput();
        feiRadio();
        feiCheckbox();
        feBsFileInput();
      }
    }
  }();

    formElements.init();
});


$(function(){
  // New selector case insensivity
  $.expr[':'].containsi = function(a, i, m) {
    return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
  };
});
