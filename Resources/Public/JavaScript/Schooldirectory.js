let SchoolDirectory = function (schoolDirectoryElement) {
    let me = this;
    let selectorSchoolDirectoryData = ".schoolDirectoryData";
    let schoolDirectoryDataElement = null;
    let schoolDirectoryType = 0;
    let schoolDirectoryCareForm = 0;
    let schoolDirectoryProfile = 0;
    let schoolDirectoryStoragePages = '';

    me.init = function () {
        if (me.hasSchoolDirectoryData()) {
            me.hideElements();

            schoolDirectoryDataElement = me.getSchoolDirectoryData();
            schoolDirectoryType = parseInt(schoolDirectoryDataElement.dataset.type);
            schoolDirectoryCareForm = parseInt(schoolDirectoryDataElement.dataset.careform);
            schoolDirectoryProfile = parseInt(schoolDirectoryDataElement.dataset.profile);
            schoolDirectoryStoragePages = schoolDirectoryDataElement.dataset.storagepages;

            // Show care form after selecting a type
            document.querySelector('.schoolDirectoryType select').addEventListener('change',function() {
                schoolDirectoryType = schoolDirectoryElement.querySelector(".schoolDirectoryType select").value;
                schoolDirectoryCareForm = 0;
                schoolDirectoryProfile = 0;
                me.hideElement(".schoolDirectoryCareForm");
                me.hideElement(".schoolDirectoryProfile");
                me.addCareFormOptions();
            });

            // Show profile after selecting an care form
            document.querySelector('.schoolDirectoryCareForm select').addEventListener('change',function() {
                schoolDirectoryType = schoolDirectoryElement.querySelector(".schoolDirectoryType select").value;
                schoolDirectoryCareForm = schoolDirectoryElement.querySelector(".schoolDirectoryCareForm select").value;
                schoolDirectoryProfile = 0;
                me.hideElement(".schoolDirectoryProfile");
                me.addProfileOptions();
            });

            me.addTypeOptions();
        } else {
            console.log('SchoolDirectory plugin is not up2date. Please copy over schooldirectory data section from original template into you own templates.')
        }
    }

    me.hasSchoolDirectoryData = function() {
        return me.getSchoolDirectoryData() !== null;
    }

    me.getSchoolDirectoryData = function() {
        return schoolDirectoryElement.querySelector(selectorSchoolDirectoryData);
    }

    me.hideElements = function() {
        me.hideElement(".schoolDirectoryType");
        me.hideElement(".schoolDirectoryCareForm");
        me.hideElement(".schoolDirectoryProfile");
    }

    me.hideElement = function(elementClassName) {
        let element = schoolDirectoryElement.querySelector(elementClassName)
        if (element !== null) {
            element.style.display = "none";
        }
    }

    me.showElement = function(elementClassName) {
        let element = schoolDirectoryElement.querySelector(elementClassName)
        if (element !== null) {
            element.style.display = "block";
        }
    }

    me.addOptionsToSelectBox = function (selectBoxWrapperClassName, options, selectedValue, callback = null) {
        let selectBoxElement = schoolDirectoryElement.querySelector(selectBoxWrapperClassName + " select");

        if (selectBoxElement !== null) {
            me.addOptionToSelectBox(selectBoxElement, "", "");
            options.forEach(function (option) {
                me.addOptionToSelectBox(selectBoxElement, option["title"], option["uid"]);
            });

            if (selectedValue) {
                selectBoxElement.value = selectedValue;
                if (typeof x === "function") {
                    callback();
                }
            }

            me.showElement(selectBoxWrapperClassName);
        }
    }

    me.addOptionToSelectBox = function(element, label, value) {
        if (element !== null) {
            element.add(new Option(label, value));
        }
    }

    me.addTypeOptions = function () {
        me.fetchOptions(
            "ext=schooldirectory&method=getTypes&storagePages=" + encodeURIComponent(schoolDirectoryStoragePages),
            ".schoolDirectoryType",
            schoolDirectoryType,
            me.addCareFormOptions
        );
    }

    me.addCareFormOptions = function () {
        schoolDirectoryElement.querySelectorAll(".schoolDirectoryCareForm select option").forEach(function (option) {
            option.parentNode.removeChild(option);
        });
        me.fetchOptions(
            "ext=schooldirectory&method=getCareForms&storagePages=" + encodeURIComponent(schoolDirectoryStoragePages) + "&type=" + schoolDirectoryType,
            ".schoolDirectoryCareForm",
            schoolDirectoryCareForm,
            me.addProfileOptions
        );
    }

    me.addProfileOptions = function () {
        schoolDirectoryElement.querySelectorAll(".schoolDirectoryProfile select option").forEach(function (option) {
            option.parentNode.removeChild(option);
        });
        me.fetchOptions(
            "ext=schooldirectory&method=getProfiles&storagePages=" + encodeURIComponent(schoolDirectoryStoragePages) + "&type=" + schoolDirectoryType + "&careForm=" + schoolDirectoryCareForm,
            ".schoolDirectoryProfile",
            schoolDirectoryProfile
        );
    }

    me.fetchOptions = function (postBody, selectBoxWrapperClass, selectedValue, callback) {
        let host = window.location.protocol + "//" + window.location.host;
        fetch(host, {
            method: "POST",
            body: postBody,
            headers: {
                "Content-type": "application/json"
            }
        })
            .then(function(response) {
                return response.json();
            })
            .then(function(response) {
                if (response.success) {
                    me.addOptionsToSelectBox(selectBoxWrapperClass, response.data, selectedValue, callback);
                }
            });
    }
}

let schoolDirectoryPlugins = document.querySelectorAll(".tx-schooldirectory");
schoolDirectoryPlugins.forEach(function(schoolDirectoryPlugin) {
    let schoolDirectory = new SchoolDirectory(schoolDirectoryPlugin);
    schoolDirectory.init();
});
