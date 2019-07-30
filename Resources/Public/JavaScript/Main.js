jQuery(function() {
  var schoolType = parseInt(jQuery("#schoolDirectoryType").data("type"));
  var schoolCareForm = parseInt(jQuery("#schoolDirectoryCareForm").data("careForm"));
  var schoolProfile = parseInt(jQuery("#schoolDirectoryProfile").data("profile"));

  var uriRenderType = jQuery("#schoolDirectoryRenderType").data("type");
  var uriRenderCareForm = jQuery("#schoolDirectoryRenderCareForm").data("careForm");
  var uriRenderProfile = jQuery("#schoolDirectoryRenderProfile").data("profile");

  // hide both selectboxes at loading
  jQuery( "#schoolType").hide();
  jQuery( "#schoolCareForm").hide();
  jQuery( "#schoolProfile").hide();

  showType();
  if (schoolCareForm) {
    showCareForm(schoolType);
  }
  if (schoolProfile) {
    showProfile(schoolType, schoolCareForm);
  }

  // show care form after selecting an type
  jQuery( "#schoolType select").on( "change", function() {
    jQuery( "#schoolCareForm").hide();
    jQuery( "#schoolProfile").hide();
    showCareForm(jQuery( this ).val());
  });

  // show profile after selecting an care form
  jQuery( "#schoolCareForm select").on( "change", function() {
    jQuery( "#schoolProfile").hide();
    showProfile(jQuery( "#schoolType select").val(), jQuery( this ).val());
  });

  /**
   * Show type
   *
   * @return void
   */
  function showType() {
    jQuery.ajax({
      type: "POST",
      url: uriRenderType,
      cache: false,
      dataType: "json"
    }).done(
      function(data) {
        if (!data.error) {
          // add empty option
          var $option = jQuery( "<option />" ).attr( "value", "").html( "" );
          jQuery( "#schoolType select").append( $option );

          // add options from ajax request
          jQuery.each(data.types, function(index, value) {
            $option = jQuery( "<option />" ).attr( "value", value.uid).html( value.title );
            if (schoolType === value.uid) {
              $option.attr( "selected", "selected" );
            }
            jQuery( "#schoolType select").append( $option );
          });
          jQuery( "#schoolType").show();
        }
      }
    ).fail(function() {
      console.log( "error" );
    });
  }

  /**
   * show care form
   *
   * @param {integer} schoolType
   * @return void
   */
  function showCareForm(schoolType) {
    jQuery.ajax({
      type: "POST",
      url: uriRenderCareForm,
      cache: false,
      dataType: "json",
      data: {
        schoolType: schoolType
      }
    }).done(
      function(data) {
        if (!data.error) {
          jQuery( "#schoolCareForm select option").remove();
          jQuery( "#schoolCareForm select").append( jQuery( "<option />" ).attr( "value", '0').html( '' ) );
          jQuery.each(data.careForms, function(index, value) {
            $option = jQuery( "<option />" ).attr( "value", value.uid).html( value.title );
            if (schoolCareForm == value.uid) {
              $option.attr( "selected", "selected" );
            }
            jQuery( "#schoolCareForm select").append( $option );
          });
          jQuery( "#schoolCareForm").show();
        }
      }
    ).fail(function() {
      console.log( "error" );
    });
  }

  /**
   * show profile
   *
   * @param {integer} schoolType
   * @param {integer} schoolCareForm
   * @return void
   */
  function showProfile(schoolType, schoolCareForm) {
    jQuery.ajax({
      type: "POST",
      url: uriRenderProfile,
      cache: false,
      dataType: "json",
      data: {
        schoolType: schoolType,
        schoolCareForm: schoolCareForm
      }
    }).done(
      function(data) {
        if (!data.error) {
          jQuery( "#schoolProfile select option").remove();
          jQuery( "#schoolProfile select").append( jQuery( "<option />" ).attr( "value", '0').html( '' ) );
          jQuery.each(data.profiles, function(index, value) {
            $option = jQuery( "<option />" ).attr( "value", value.uid).html( value.title );
            if (schoolProfile == value.uid) {
              $option.attr( "selected", "selected" );
            }
            jQuery( "#schoolProfile select").append( $option );
          });
          jQuery( "#schoolProfile").show();
        }
      }
    ).fail(function() {
      console.log( "error" );
    });
  }
});
