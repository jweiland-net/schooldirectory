jQuery(function () {
    var schoolData = $('#schooldirectory_data');

    var schoolType = schoolData.data('type');
    var schoolCareForm = schoolData.data('careform');
    var schoolProfile = schoolData.data('profile');

    // hide both selectboxes at loading
    jQuery("#schoolType").hide();
    jQuery("#schoolCareForm").hide();
    jQuery("#schoolProfile").hide();

    showType();
    if (schoolCareForm) showCareForm(schoolType);
    if (schoolProfile) showProfile(schoolType, schoolCareForm);

    // show care form after selecting an type
    jQuery("#schoolType select").on("change", function () {
        jQuery("#schoolCareForm").hide();
        jQuery("#schoolProfile").hide();
        showCareForm(jQuery(this).val());
    });

    // show profile after selecting an care form
    jQuery("#schoolCareForm select").on("change", function () {
        jQuery("#schoolProfile").hide();
        showProfile(jQuery("#schoolType select").val(), jQuery(this).val());
    });

    /**
     * show type
     *
     * @return void
     */
    function showType() {
        var ajaxUri = "index.php?eID=schooldirectory_selector_renderTypeAction";
        jQuery.ajax({
            type: "POST", url: ajaxUri, cache: false, dataType: "json", success: function (data) {
                if (!data.error) {
                    // add empty option
                    $option = jQuery("<option />").attr("value", "").html("");
                    jQuery("#schoolType select").append($option);

                    // add options from ajax request
                    jQuery.each(data.types, function (index, value) {
                        $option = jQuery("<option />").attr("value", value.uid).html(value.title);
                        if (schoolType == value.uid) {
                            $option.attr("selected", "selected");
                        }
                        jQuery("#schoolType select").append($option);
                    });
                    jQuery("#schoolType").show();
                }
            }
        });
    }

    /**
     * show care form
     *
     * @param {int} schoolType
     * @return void
     */
    function showCareForm(schoolType) {
        var ajaxUri = "index.php?eID=schooldirectory_selector_renderCareFormAction";
        jQuery.ajax({
            type: "POST", url: ajaxUri, cache: false, dataType: "json", data: {
                schoolType: schoolType
            }, success: function (data) {
                if (!data.error) {
                    jQuery("#schoolCareForm select option").remove();
                    jQuery("#schoolCareForm select").append(jQuery("<option />").attr("value", '0').html(''));
                    jQuery.each(data.careForms, function (index, value) {
                        $option = jQuery("<option />").attr("value", value.uid).html(value.title);
                        if (schoolCareForm == value.uid) {
                            $option.attr("selected", "selected");
                        }
                        jQuery("#schoolCareForm select").append($option);
                    });
                    jQuery("#schoolCareForm").show();
                }
            }
        })
    }

    /**
     * show profile
     *
     * @param {int} schoolType
     * @param {int} schoolCareForm
     * @return void
     */
    function showProfile(schoolType, schoolCareForm) {
        var ajaxUri = "index.php?eID=schooldirectory_selector_renderProfileAction";
        jQuery.ajax({
            type: "POST", url: ajaxUri, cache: false, dataType: "json", data: {
                schoolType: schoolType, schoolCareForm: schoolCareForm
            }, success: function (data) {
                if (!data.error) {
                    jQuery("#schoolProfile select option").remove();
                    jQuery("#schoolProfile select").append(jQuery("<option />").attr("value", '0').html(''));
                    jQuery.each(data.profiles, function (index, value) {
                        $option = jQuery("<option />").attr("value", value.uid).html(value.title);
                        if (schoolProfile == value.uid) {
                            $option.attr("selected", "selected");
                        }
                        jQuery("#schoolProfile select").append($option);
                    });
                    jQuery("#schoolProfile").show();
                }
            }
        })
    }
});
